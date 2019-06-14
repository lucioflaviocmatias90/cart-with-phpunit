<?php


namespace App;


class PaymentProcessor
{
    private $order;
    private $creditCardHolder;
    private $creditCardNumber;
    private $creditCardExpirationDate;
    private $creditCardCVV;
    private $status;
    private $provider;

    /**
     * PaymentProcessor constructor.
     * @param $order
     * @param $creditCardHolder
     * @param $creditCardNumber
     * @param $creditCardExpirationDate
     * @param $creditCardCVV
     * @param $status
     * @param $provider
     */
    public function __construct($order = null, $creditCardHolder = null, $creditCardNumber = null, $creditCardExpirationDate = null, $creditCardCVV = null, $status = null, $provider = null)
    {
        $this->order = $order;
        $this->creditCardHolder = $creditCardHolder;
        $this->creditCardNumber = $creditCardNumber;
        $this->creditCardExpirationDate = $creditCardExpirationDate;
        $this->creditCardCVV = $creditCardCVV;
        $this->status = $status;
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getCreditCardHolder()
    {
        return $this->creditCardHolder;
    }

    /**
     * @param mixed $creditCardHolder
     */
    public function setCreditCardHolder($creditCardHolder)
    {
        $this->creditCardHolder = $creditCardHolder;
    }

    /**
     * @return mixed
     */
    public function getCreditCardNumber()
    {
        return $this->creditCardNumber;
    }

    /**
     * @param mixed $creditCardNumber
     */
    public function setCreditCardNumber($creditCardNumber)
    {
        $this->creditCardNumber = $creditCardNumber;
    }

    /**
     * @return mixed
     */
    public function getCreditCardExpirationDate()
    {
        return $this->creditCardExpirationDate;
    }

    /**
     * @param mixed $creditCardExpirationDate
     */
    public function setCreditCardExpirationDate($creditCardExpirationDate)
    {
        $this->creditCardExpirationDate = $creditCardExpirationDate;
    }

    /**
     * @return mixed
     */
    public function getCreditCardCVV()
    {
        return $this->creditCardCVV;
    }

    /**
     * @param mixed $creditCardCVV
     */
    public function setCreditCardCVV($creditCardCVV)
    {
        $this->creditCardCVV = $creditCardCVV;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    public function process()
    {
        $result = $this->provider->process($this->order, $this->creditCardHolder, $this->creditCardNumber, $this->creditCardExpirationDate, $this->creditCardCVV);

        $this->order->setStatus($result);

        $this->status = $result;

        return $this;
    }
}