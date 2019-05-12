<?php

namespace AppBundle\Entity;

/**
 * transaction
 */
class transaction
{
    /**
     * @var transaction
     */
    public $transaction;

    /**
     * @var user
     */
    public $transactionUser;

    /**
     * @var payment
     */
    public $transactionPayment;

    /**
     * @var konto
     */
    public $transactionKonto;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $erstellDatum;

    /**
     * @var int
     */
    private $kontoId;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $paymentId;

    /**
     * @var string
     */
    private $zielIban;

    /**
     * @var string
     */
    private $zielBic;

    /**
     * @var string
     */
    private $zielInhaber;

    /**
     * @var string
     */
    private $betrag;

    /**
     * @var string
     */
    private $addInfos;


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
     * Set kontoId
     *
     * @param integer $kontoId
     *
     * @return transaction
     */
    public function setKontoId($kontoId)
    {
        $this->kontoId = $kontoId;

        return $this;
    }

    /**
     * Get kontoId
     *
     * @return int
     */
    public function getKontoId()
    {
        return $this->kontoId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return transaction
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set paymentId
     *
     * @param integer $paymentId
     *
     * @return transaction
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;

        return $this;
    }

    /**
     * Get paymentId
     *
     * @return int
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Set zielIban
     *
     * @param string $zielIban
     *
     * @return transaction
     */
    public function setZielIban($zielIban)
    {
        $this->zielIban = $zielIban;

        return $this;
    }

    /**
     * Get zielIban
     *
     * @return string
     */
    public function getZielIban()
    {
        return $this->zielIban;
    }

    /**
     * Set zielBic
     *
     * @param string $zielBic
     *
     * @return transaction
     */
    public function setZielBic($zielBic)
    {
        $this->zielBic = $zielBic;

        return $this;
    }

    /**
     * Get zielBic
     *
     * @return string
     */
    public function getZielBic()
    {
        return $this->zielBic;
    }

    /**
     * Set zielInhaber
     *
     * @param string $zielInhaber
     *
     * @return transaction
     */
    public function setZielInhaber($zielInhaber)
    {
        $this->zielInhaber = $zielInhaber;

        return $this;
    }

    /**
     * Get zielInhaber
     *
     * @return string
     */
    public function getZielInhaber()
    {
        return $this->zielInhaber;
    }

    /**
     * Set betrag
     *
     * @param string $betrag
     *
     * @return transaction
     */
    public function setBetrag($betrag)
    {
        $this->betrag = $betrag;

        return $this;
    }

    /**
     * Get betrag
     *
     * @return string
     */
    public function getBetrag()
    {
        return $this->betrag;
    }

    /**
     * Set addInfos
     *
     * @param string $addInfos
     *
     * @return transaction
     */
    public function setAddInfos($addInfos)
    {
        $this->addInfos = $addInfos;

        return $this;
    }

    /**
     * Get addInfos
     *
     * @return string
     */
    public function getAddInfos()
    {
        return $this->addInfos;
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

    /**
     * @return user
     */
    public function getTransactionUser()
    {
        return $this->transactionUser;
    }

    /**
     * @param user $transactionUser
     */
    public function setTransactionUser($transactionUser)
    {
        $this->transactionUser = $transactionUser;
    }

    /**
     * @return payment
     */
    public function getTransactionPayment()
    {
        return $this->transactionPayment;
    }

    /**
     * @param payment $transactionPayment
     */
    public function setTransactionPayment($transactionPayment)
    {
        $this->transactionPayment = $transactionPayment;
    }

    /**
     * @return konto
     */
    public function getTransactionKonto()
    {
        return $this->transactionKonto;
    }

    /**
     * @param konto $transactionKonto
     */
    public function setTransactionKonto($transactionKonto)
    {
        $this->transactionKonto = $transactionKonto;
    }

    /**
     * @return date
     */
    public function getErstellDatum()
    {
        return $this->erstellDatum;
    }

    /**
     * @param date $erstellDatum
     */
    public function setErstellDatum($erstellDatum)
    {
        $this->erstellDatum = $erstellDatum;
    }
}

