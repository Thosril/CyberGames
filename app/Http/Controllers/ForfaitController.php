<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Http\Controllers\Controller; // Ajoute cette ligne

class ForfaitController extends Controller
{
    public function index()
    {
        $forfaits = Forfait::all();
        return view('forfaits.index', compact('forfaits'));
    }

    public function acheter(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        // Créer une session de paiement avec Stripe
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $request->forfait_nom,
                        ],
                        'unit_amount' => $request->forfait_prix * 100,  // Prix en centimes
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('forfaits.success'),
            'cancel_url' => route('forfaits.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        return view('forfaits.success');
    }

    public function cancel()
    {
        return view('forfaits.cancel');
    }
}
