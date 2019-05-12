<?php

namespace AppBundle\Entity;

/**
 * konto
 */
class konto
{
    /**
     * @var konto
     */
    public $konto;

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
    private $guthaben;

    /**
     * @var string
     */
    private $beschreibung;

    /**
     * @var string
     */
    private $iban;

    /**
     * @var string
     */
    private $bic;

    /**
     * @var string
     */
    private $inhaber;

    /**
     * @var string
     */
    private $kreditkarte;

    /**
     * @var \DateTime
     */
    private $gueltigBis;

    /**
     * @var bool
     */
    private $aktiv;

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
     * Set guthaben
     *
     * @param string $guthaben
     *
     * @return konto
     */
    public function setGuthaben($guthaben)
    {
        $this->guthaben = $guthaben;

        return $this;
    }

    /**
     * Get guthaben
     *
     * @return string
     */
    public function getGuthaben()
    {
        return $this->guthaben;
    }

    /**
     * Set beschreibung
     *
     * @param string $beschreibung
     *
     * @return konto
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
     * Set iban
     *
     * @param string $iban
     *
     * @return konto
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set bic
     *
     * @param string $bic
     *
     * @return konto
     */
    public function setBic($bic)
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * Get bic
     *
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * Set inhaber
     *
     * @param string $inhaber
     *
     * @return konto
     */
    public function setInhaber($inhaber)
    {
        $this->inhaber = $inhaber;

        return $this;
    }

    /**
     * Get inhaber
     *
     * @return string
     */
    public function getInhaber()
    {
        return $this->inhaber;
    }

    /**
     * Set kreditkarte
     *
     * @param string $kreditkarte
     *
     * @return konto
     */
    public function setKreditkarte($kreditkarte)
    {
        $this->kreditkarte = $kreditkarte;

        return $this;
    }

    /**
     * Get kreditkarte
     *
     * @return string
     */
    public function getKreditkarte()
    {
        return $this->kreditkarte;
    }

    /**
     * Set gueltigBis
     *
     * @param \DateTime $gueltigBis
     *
     * @return konto
     */
    public function setGueltigBis($gueltigBis)
    {
        $this->gueltigBis = $gueltigBis;

        return $this;
    }

    /**
     * Get gueltigBis
     *
     * @return \DateTime
     */
    public function getGueltigBis()
    {
        return $this->gueltigBis;
    }

    /**
     * Set aktiv
     *
     * @param boolean $aktiv
     *
     * @return konto
     */
    public function setAktiv($aktiv)
    {
        $this->aktiv = $aktiv;

        return $this;
    }

    /**
     * Get aktiv
     *
     * @return bool
     */
    public function getAktiv()
    {
        return $this->aktiv;
    }

    /**
     * @return konto
     */
    public function getKonto()
    {
        return $this->konto;
    }

    /**
     * @param konto $konto
     */
    public function setKonto($konto)
    {
        $this->konto = $konto;
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

