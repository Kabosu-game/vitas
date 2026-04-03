<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\NotifyTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    use NotifyTrait;

    public function __invoke()
    {
        $url = request()->segment(1);

        return view('frontend::pages.'.$url);
    }

    public function getPage($section)
    {
        return view('frontend::pages.'.$section);
    }

    public function blogDetails($id)
    {
        $blogInstance = new Blog;

        $blog = $blogInstance->findOrFail($id);

        $blogs = $blogInstance->where('locale', app()->getLocale())->where('id', '!=', $id)->limit(5)->get();
        if (! count($blogs)) {
            $blogs = $blogInstance->where('locale', defaultLocale())->where('id', '!=', $id)->limit(5)->get();
        }

        return view('frontend::pages.blog_details', compact('blog', 'blogs'));
    }

    public function mailSend(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'msg' => 'required',
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first(), 'Error');

            return redirect()->back();
        }

        try {

            $input = $request->all();

            $shortcodes = [
                '[[full_name]]' => $input['name'],
                '[[email]]' => $input['email'],
                '[[subject]]' => $input['subject'],
                '[[message]]' => $input['msg'],
                '[[site_title]]' => setting('site_title', 'global'),
                '[[site_url]]' => route('home'),
            ];

            $this->mailNotify(setting('support_email', 'global'), 'contact_mail', $shortcodes);

            $status = 'success';
            $message = __('Message send successfully!');

        } catch (Exception $e) {

            $status = 'warning';
            $message = __('Sorry, something went wrong!');
        }

        notify()->$status($message, $status);

        return redirect()->back();

    }
}
