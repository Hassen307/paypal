<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Paypal;
use Redirect;

class PaypalController extends Controller
{
    private $_apiContext;

    public function __construct()
    {
        
        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));
		
		$this->_apiContext->setConfig(array(
			'mode' => 'sandbox',
			'service.EndPoint' => 'https://api.sandbox.paypal.com',
			'http.ConnectionTimeOut' => 30,
			'log.LogEnabled' => true,
			'log.FileName' => storage_path('logs/paypal.log'),
			'log.LogLevel' => 'FINE'
		));

    }
    
    
    
    public function checkout(){
        
        $payer =PayPal::Payer();
	$payer->setPaymentMethod('paypal');

	$amount = PayPal:: Amount();
	$amount->setCurrency('EUR');
	$amount->setTotal(60); // This is the simple way,
	// you can alternatively describe everything in the order separately;
	// Reference the PayPal PHP REST SDK for details.

	$transaction = PayPal::Transaction();
	$transaction->setAmount($amount);
	$transaction->setDescription('60 EUR');

	$redirectUrls = PayPal:: RedirectUrls();
	$redirectUrls->setReturnUrl(url('done'));
	$redirectUrls->setCancelUrl(url('cancel'));

	$payment = PayPal::Payment();
	$payment->setIntent('sale');
	$payment->setPayer($payer);
	$payment->setRedirectUrls($redirectUrls);
	$payment->setTransactions(array($transaction));

	$response = $payment->create($this->_apiContext);
	$redirectUrl = $response->links[1]->href;
	
	return Redirect::to( $redirectUrl );
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
        
           
       /* return User::create([
            'genre' => $data['genre'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'ddn'=> $day.$a.$month.$a.$year,
            
            
            
        ]);*/
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
