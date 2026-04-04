<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\CardStatus;
use App\Enums\TxnStatus;
use App\Enums\TxnType;
use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;
use Txn;

class CardController extends Controller
{
    const CARD_FEE = 10; // €

    public function index()
    {
        $cards = Card::currentUser()->latest()->get();

        return view('frontend::user.virtual_card.card.index', compact('cards'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cardholder_name' => ['required', 'string', 'max:100'],
        ]);

        $user = auth()->user();

        if ($user->balance < self::CARD_FEE) {
            notify()->error(__('Solde insuffisant. Un minimum de €') . self::CARD_FEE . ' est requis.');
            return back();
        }

        // Déduire les frais de la balance
        $user->decrement('balance', self::CARD_FEE);

        // Créer la carte en attente
        Card::create([
            'user_id'          => $user->id,
            'card_holder_id'   => null,
            'card_id'          => 'EV-' . strtoupper(uniqid()),
            'currency'         => 'EUR',
            'type'             => 'virtual',
            'status'           => CardStatus::Pending,
            'amount'           => 0,
            'provider'         => 'manual',
            'card_number'      => 'PENDING',
            'cvc'              => null,
            'expiration_month' => null,
            'expiration_year'  => null,
            'last_four_digits' => null,
            'cardholder_name'  => $request->cardholder_name,
        ]);

        // Enregistrer la transaction
        Txn::new(self::CARD_FEE, 0, $user->balance, 'System', 'Frais de création de carte virtuelle', TxnType::CardCreate, TxnStatus::Success, 'EUR', 0, $user->id, null, 'User', [], 'default');

        notify()->success('Votre demande de carte a été envoyée. Elle sera activée sous 24h.');

        return back();
    }

    public function details($card_id)
    {
        $card = Card::currentUser()->where('card_id', $card_id)->firstOrFail();

        return view('frontend::user.virtual_card.card.details', compact('card'));
    }
}
