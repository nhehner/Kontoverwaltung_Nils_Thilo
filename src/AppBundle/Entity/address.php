<?php

namespace AppBundle\Entity;

/**
 * address
 */
class address
{
    /**
     * @var address
     */
    public $address;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $strasse;

    /**
     * @var string
     */
    private $hausnummer;

    /**
     * @var string
     */
    private $ort;

    /**
     * @var string
     */
    private $plz;

    /**
     * @var string
     */
    private $firma;

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
     * Set strasse
     *
     * @param string $strasse
     *
     * @return address
     */
    public function setStrasse($strasse)
    {
        $this->strasse = $strasse;

        return $this;
    }

    /**
     * Get strasse
     *
     * @return string
     */
    public function getStrasse()
    {
        return $this->strasse;
    }

    /**
     * Set hausnummer
     *
     * @param string $hausnummer
     *
     * @return address
     */
    public function setHausnummer($hausnummer)
    {
        $this->hausnummer = $hausnummer;

        return $this;
    }

    /**
     * Get hausnummer
     *
     * @return string
     */
    public function getHausnummer()
    {
        return $this->hausnummer;
    }

    /**
     * Set ort
     *
     * @param string $ort
     *
     * @return address
     */
    public function setOrt($ort)
    {
        $this->ort = $ort;

        return $this;
    }

    /**
     * Get ort
     *
     * @return string
     */
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * Set plz
     *
     * @param string $plz
     *
     * @return address
     */
    public function setPlz($plz)
    {
        $this->plz = $plz;

        return $this;
    }

    /**
     * Get plz
     *
     * @return string
     */
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * Set firma
     *
     * @param string $firma
     *
     * @return address
     */
    public function setFirma($firma)
    {
        $this->firma = $firma;

        return $this;
    }

    /**
     * Get firma
     *
     * @return string
     */
    public function getFirma()
    {
        return $this->firma;
    }

    /**
     * Set aktiv
     *
     * @param boolean $aktiv
     *
     * @return address
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
     * @return address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param address $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
}

