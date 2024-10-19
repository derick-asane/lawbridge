<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Auth;

class PaymentController extends Controller
{
    //implementing the geolcation here...
    public function locateShop()
    {
        // Hardcoded shop coordinates (replace with actual shop latitude and longitude)
        $coordinates = [
            'lat' => 40.7128, // Example latitude for New York City
            'lng' => -74.0060, // Example longitude for New York City
        ];

        return view('client.location', compact('coordinates'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.subscribe');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $amount = $request->input('amount');
        $mobile_number = $request->input('number');
        
        $response = $this->initiatePayment($amount, $mobile_number);

        if ($response) {
            $user_id = Auth::user()->id;
            $payment = Payment::Create([
                'user_id' => $user_id,
                'amount' => $amount,
                'mobile_number' => $mobile_number,
            ]);

             return view('client.mycase')->with('payment-succes', 'Payment successful');
        }

        return redirect()->back()->withErrors('Payment initiation failed.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }

    private function initiatePayment($amount, $phoneNumber)
    {
        $url = 'https://api.monetbil.com/payment/v1/place_payment';

        $apiKey= 'kvSBLerwew1yTq6GCUGCsDJ5rE3FkWKC';
        $apiSecret = 'PseyhrN1graWKgxtFA9287ItctBIkKq1m7qK1Izoovl8ZsQJObRzvpa58toOuO1p';

        $client = new Client();

        $response = $client->post($url,
        
        [
            'verify' => 'C:\Users\DERICK\Desktop\others\stachys\lawbridge\cacert.pem',
            'form_params' => [
                'amount' => $amount,
                'phonenumber' => $phoneNumber,
                'apikey' => $apiKey,
                'service' => $apiSecret,
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        return $data;
    }
}
