<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class PaymentSummary
 *
 * Payment/Refund break up
 *
 * @package paypal\Api
 *
 * @property \paypal\Api\Currency paypal
 * @property \paypal\Api\Currency other
 */
class PaymentSummary extends PayPalModel
{
    /**
     * Total Amount paid/refunded via paypal.
     *
     * @param \paypal\Api\Currency $paypal
     * 
     * @return $this
     */
    public function setPaypal($paypal)
    {
        $this->paypal = $paypal;
        return $this;
    }

    /**
     * Total Amount paid/refunded via paypal.
     *
     * @return \paypal\Api\Currency
     */
    public function getPaypal()
    {
        return $this->paypal;
    }

    /**
     * Total Amount paid/refunded via other sources.
     *
     * @param \PayPal\Api\Currency $other
     * 
     * @return $this
     */
    public function setOther($other)
    {
        $this->other = $other;
        return $this;
    }

    /**
     * Total Amount paid/refunded via other sources.
     *
     * @return \PayPal\Api\Currency
     */
    public function getOther()
    {
        return $this->other;
    }

}
