<?php
  
  namespace Plugins\Lib\PayPal;
  /*
   * This is the initial paypal set-up
   * provide the app client id and client secret*/

  use PayPal\Api\Amount;
  use PayPal\Api\Details;
  use PayPal\Api\Item;
  use PayPal\Api\ItemList;
  use PayPal\Api\Payer;
  use PayPal\Api\Payment;
  use PayPal\Api\RedirectUrls;
  use PayPal\Api\Transaction;
  use PayPal\Auth\OAuthTokenCredential;
  use PayPal\Exception\PayPalConnectionException;
  use PayPal\Rest\ApiContext;

  class Setup
  {
   function __construct ()
   {
   
   }
   
    public function  paymentMethod()
    {
      $payer =  new Payer();
      $payer->setPaymentMethod(\Loader::PayPalConfig('PAYMENT_VIA'));
      return $payer;
    }
    
    public function createItem()
    {
      return new Item();
    }
    
    public function createItemList($item)
    {
      $item_list =  new ItemList();
      $item_list ->setItems([$item]);
      
      return true;
    }
    
    public function amountDetails()
    {
      return new Details();
    }
    
    public function setAmount($amount , $details)
    {
      $_amount = new Amount();
      $_amount->setCurrency(\Loader::PayPalConfig('CURRENCY'))
              ->setTotal($amount)
              ->setDetails($details);
      return true;
    }
    
    public function  transactionData($_amount , $item_list , $description )
    {
      $transaction = new Transaction();
      $transaction -> setAmount($_amount)
                   -> setItemList($item_list)
                   -> setDescription($description)
                   -> setInvoiceNumber(uniqid());
      return true;
    }
    
    public function  registerPayConsequence ()
    {
      $r_urls = new  RedirectUrls();
      $r_urls -> setReturnUrl(\Loader::appConfig('R_URL').'checkout/feedback?s=1')
              -> setCancelUrl(\Loader::appConfig('R_URL').'checkout/feedback?s=0');
      return $r_urls;
    }
    
    public function  finalizeTransaction ($payer , $redirect_urls , $transaction )
    {
      $payemnt = new Payment();
      $payemnt
          -> setIntent(\Loader::PayPalConfig('SET_INTENT'))
          -> setPayer($payer)
          -> setRedirectUrls($redirect_urls)
          -> setTransactions([$transaction]);
     
   return $payemnt;
    }
    
    public function hook($payment)
    {
      
      try {
        $payment -> create($this->init());
       
        
        \Redirect::external($payment -> getApprovalLink());
      } catch (PayPalConnectionException $pce) {
        echo '<pre>';
        print_r(json_decode($pce -> getData()));
    
        var_dump($pce -> getUrl());
        exit;
        ///die($e);
      }
      $approvalUrl = $payment -> getApprovalLink();
      header('location:' . $approvalUrl);
    }
  
    function init ()
    {
      return new ApiContext(
          new OAuthTokenCredential(
              \Loader ::PayPalConfig('CLIENT_ID'), \Loader ::PayPalConfig('SECRET')));
    }
  }