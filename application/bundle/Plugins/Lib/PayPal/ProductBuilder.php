<?php
  
  namespace Plugins\Lib\PayPal;
  
  use Loader;
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
  use Redirect;

  class ProductBuilder
  {
    
    public function apiCall ()
    {
      $pay = $this -> initApi(1, 'Mushrooms', 125, 1, 0, 0, "Testing the Refiner API");
      try {
        $pay -> create($this -> Api());
        $pay -> getApprovalLink();
        
        Redirect ::external($pay -> getApprovalLink());
        
      } catch (PayPalConnectionException $pce) {
        echo '<pre>';
        print_r(json_decode($pce -> getData()));
        return false;
      }
    }
    
    Public function initApi ($product_id, $product_name, $product_price, $quantity, $shipping_costs, $tax, $product_description)
    {
      $amt = $product_price;
      /*________________________________________________________________________________________*/
      
      $payer = new Payer();
      $payer -> setPaymentMethod(Loader ::PayPalConfig('PAYMENT_VIA'));
      /*________________________________________________________________________________________*/
      
      $item = new Item();
      $item -> setName($product_name)
          -> setCurrency(Loader ::PayPalConfig('CURRENCY'))
          -> setQuantity($quantity)
          -> setPrice($amt);
      /*________________________________________________________________________________________*/
      
      
      $item_list = new ItemList();
      $item_list -> setItems([$item]);
      /*________________________________________________________________________________________*/
      
      $details = new Details();
      $details -> setSubtotal($amt);
      /*________________________________________________________________________________________*/
      
      //$amount_one = $paypal_client -> setAmount($amount, $detail);
      
      $amount = new Amount();
      $amount -> setCurrency(Loader ::PayPalConfig('CURRENCY'))
          -> setTotal($amt)
          -> setDetails($details);
      /*________________________________________________________________________________________*/
      
      $trs = new Transaction();
      $trs -> setAmount($amount)
          -> setItemList($item_list)
          -> setDescription($product_description)
          -> setInvoiceNumber(uniqid());
      /*________________________________________________________________________________________*/
      
      $r_urls = new  RedirectUrls();
      $r_urls -> setReturnUrl(Loader ::appConfig('R_URL') . 'checkout/feedback?s=1')
          -> setCancelUrl(Loader ::appConfig('R_URL') . 'checkout/feedback?s=0');
      
      /*________________________________________________________________________________________*/
      
      $payment = new Payment();
      $payment -> setIntent('sale')
          -> setPayer($payer)
          -> setRedirectUrls($r_urls)
          -> setTransactions(array($trs));
      /*________________________________________________________________________________________*/
      
      
      
      return $payment;
    }
    
    public function Api ()
    {
      return new ApiContext(
          new OAuthTokenCredential(
              Loader ::PayPalConfig('CLIENT_ID'), Loader ::PayPalConfig('SECRET')));
    }
    
  }