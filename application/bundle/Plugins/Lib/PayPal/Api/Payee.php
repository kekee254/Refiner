<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class Payee
 *
 * A resource representing a Payee who receives the funds and fulfills the order.
 *
 * @package paypal\Api
 *
 * @property string email
 * @property string merchant_id
 */
class Payee extends PayPalModel
{
    /**
     * Email Address associated with the Payee's paypal Account. If the provided email address is not associated with any paypal Account, the payee can only receive paypal Wallet Payments. Direct Credit Card Payments will be denied due to card compliance requirements.
     *
     * @param string $email
     * 
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Email Address associated with the Payee's paypal Account. If the provided email address is not associated with any paypal Account, the payee can only receive paypal Wallet Payments. Direct Credit Card Payments will be denied due to card compliance requirements.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Encrypted paypal account identifier for the Payee.
     *
     * @param string $merchant_id
     * 
     * @return $this
     */
    public function setMerchantId($merchant_id)
    {
        $this->merchant_id = $merchant_id;
        return $this;
    }

    /**
     * Encrypted paypal account identifier for the Payee.
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchant_id;
    }

    /**
     * First Name of the Payee.
     * @deprecated Not publicly available
     * @param string $first_name
     * 
     * @return $this
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * First Name of the Payee.
     * @deprecated Not publicly available
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Last Name of the Payee.
     * @deprecated Not publicly available
     * @param string $last_name
     * 
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * Last Name of the Payee.
     * @deprecated Not publicly available
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Unencrypted paypal account Number of the Payee
     * @deprecated Not publicly available
     * @param string $account_number
     * 
     * @return $this
     */
    public function setAccountNumber($account_number)
    {
        $this->account_number = $account_number;
        return $this;
    }

    /**
     * Unencrypted paypal account Number of the Payee
     * @deprecated Not publicly available
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->account_number;
    }

    /**
     * Information related to the Payee.
     * @deprecated Not publicly available
     * @param \PayPal\Api\Phone $phone
     * 
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Information related to the Payee.
     * @deprecated Not publicly available
     * @return \PayPal\Api\Phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

}
