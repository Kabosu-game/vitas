<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\MailSend;
use App\Models\EmailTemplate;
use App\Traits\ImageUpload;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;

class EmailTemplateController extends Controller
{
    use ImageUpload;

    public function __construct()
    {
        $this->middleware('permission:email-template');
    }

    public function index(Request $request)
    {
        $emails = EmailTemplate::orderBy('for', 'asc')->orderBy('name', 'asc')->get();

        return view('backend.email.template', compact('emails'));
    }

    public function edit($id)
    {
        $template = EmailTemplate::find($id);

        return view('backend.email.edit', compact('template'));
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'message_body' => 'required',
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first(), 'Error');

            return redirect()->back();
        }

        $input = $request->all();
        $data = [
            'subject'      => $input['subject'],
            'message_body' => $input['message_body'], // Summernote sends HTML directly
            'title'        => $input['title'],
            'salutation'   => $input['salutation'],
            'button_level' => $input['button_level'] ?? '',
            'button_link'  => $input['button_link'] ?? '',
            'footer_status'=> $input['footer_status'],
            'footer_body'  => nl2br($input['footer_body'] ?? ''),
            'bottom_status'=> $input['bottom_status'],
            'bottom_title' => $input['bottom_title'] ?? '',
            'bottom_body'  => nl2br($input['bottom_body'] ?? ''),
            'status'       => $input['status'],
        ];

        $template = EmailTemplate::find($input['id']);

        // Handle banner upload or removal
        if ($request->hasFile('banner')) {
            $data['banner'] = self::imageUploadTrait($request->file('banner'), $template->banner);
        } elseif ($request->boolean('remove_banner')) {
            $data['banner'] = '';
        }

        $template->update($data);

        notify()->success(__('Email Template Updated Successfully'));

        return redirect()->route('admin.email-template');
    }

    public function sendTest(Request $request, $id)
    {
        $template = EmailTemplate::find($id);
        if (! $template) {
            return response()->json(['success' => false, 'message' => 'Template introuvable.']);
        }

        $recipient = $request->input('email') ?: Auth::user()->email;

        // Generic dummy values for every known shortcode
        $dummies = [
            '[[full_name]]'           => 'Jean Dupont',
            '[[user_name]]'           => 'jean.dupont',
            '[[first_name]]'          => 'Jean',
            '[[last_name]]'           => 'Dupont',
            '[[email]]'               => $recipient,
            '[[phone]]'               => '+33 6 12 34 56 78',
            '[[token]]'               => '482917',
            '[[txn]]'                 => 'TXN20240001',
            '[[amount]]'              => '500,00',
            '[[currency]]'            => setting('site_currency', 'global') ?? 'EUR',
            '[[deposit_amount]]'      => '500,00 EUR',
            '[[withdraw_amount]]'     => '200,00 EUR',
            '[[loan_amount]]'         => '2 000,00 EUR',
            '[[approved_amount]]'     => '2 000,00 EUR',
            '[[method_name]]'         => 'Virement bancaire',
            '[[gateway_name]]'        => 'Stripe',
            '[[plan_name]]'           => 'Épargne Premium',
            '[[installment_amount]]'  => '150,00 EUR',
            '[[installment_rate]]'    => '3%',
            '[[installment_interval]]'=> 'mensuel',
            '[[given_installment]]'   => '2',
            '[[total_installment]]'   => '12',
            '[[next_installment_date]]'=> now()->addMonth()->format('d/m/Y'),
            '[[delay_charge]]'        => '5,00 EUR',
            '[[loan_id]]'             => 'L12345678',
            '[[reference]]'           => 'REF-2024-00001',
            '[[loan_type]]'           => 'Personnel',
            '[[duration_months]]'     => '24',
            '[[purpose]]'             => 'Financement de projet',
            '[[status]]'              => 'approuvé',
            '[[title]]'               => 'Demande de support #42',
            '[[subject]]'             => 'Test de template e-mail',
            '[[message]]'             => 'Ceci est un message de test envoyé depuis le panneau d\'administration.',
            '[[admin_name]]'          => Auth::user()->full_name ?? 'Administrateur',
            '[[portfolio_name]]'      => 'Badge Or',
            '[[wallet_name]]'         => 'Principal',
            '[[site_title]]'          => setting('site_title', 'global') ?? 'Eurovitas Finanzen',
            '[[site_url]]'            => route('home'),
            '[[support_email]]'       => setting('support_email', 'global') ?? 'support@eurovitas.de',
        ];

        $find    = array_keys($dummies);
        $replace = array_values($dummies);

        $details = [
            'subject'      => str_replace($find, $replace, $template->subject),
            'banner'       => $template->banner ? asset($template->banner) : '',
            'title'        => str_replace($find, $replace, $template->title),
            'salutation'   => str_replace($find, $replace, $template->salutation),
            'message_body' => str_replace($find, $replace, $template->message_body),
            'button_level' => $template->button_level,
            'button_link'  => str_replace($find, $replace, $template->button_link),
            'footer_status'=> $template->footer_status,
            'footer_body'  => str_replace($find, $replace, $template->footer_body),
            'bottom_status'=> $template->bottom_status,
            'bottom_title' => str_replace($find, $replace, $template->bottom_title),
            'bottom_body'  => str_replace($find, $replace, $template->bottom_body),
            'site_logo'    => asset('logo/logo.png'),
            'site_title'   => setting('site_title', 'global') ?? 'Eurovitas Finanzen',
            'site_link'    => route('home'),
        ];

        try {
            Mail::to($recipient)->send(new MailSend($details));
            return response()->json([
                'success' => true,
                'message' => "E-mail de test envoyé à {$recipient}",
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur : ' . $e->getMessage(),
            ]);
        }
    }
}
