<?php

namespace AppBundle\Entity;

/**
 * payment
 */
class payment
{
    /**
     * @var payment
     */
    public $payment;

    /**
     * @var transaction
     */
    public $transaction;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $zahlungsanbieter;

    /**
     * @var string
     */
    private $beschreibung;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var string
     */
    private $apiUrl;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set zahlungsanbieter
     *
     * @param string $zahlungsanbieter
     *
     * @return payment
     */
    public function setZahlungsanbieter($zahlungsanbieter)
    {
        $this->zahlungsanbieter = $zahlungsanbieter;

        return $this;
    }

    /**
     * Get zahlungsanbieter
     *
     * @return string
     */
    public function getZahlungsanbieter()
    {
        return $this->zahlungsanbieter;
    }

    /**
     * Set beschreibung
     *
     * @param string $beschreibung
     *
     * @return payment
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;

        return $this;
    }

    /**
     * Get beschreibung
     *
     * @return string
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return payment
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set apiUrl
     *
     * @param string $apiUrl
     *
     * @return payment
     */
    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;

        return $this;
    }

    /**
     * Get apiUrl
     *
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @return payment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param payment $payment
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
    }

    /**
     * @return transaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param transaction $transaction
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
    }
}

