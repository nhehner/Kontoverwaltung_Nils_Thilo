<?php

namespace AppBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $vorname;

    /**
     * @var string
     */
    private $nachname;

    /**
     * @var string
     */
    private $geburtstag;

    /**
     * @var string
     */
    private $loginname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $passwort;

    /**
     * @var string
     */
    private $adresse;

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
    private $avatar;

    /**
     * @var string
     */
    private $rolle;


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
     * Set vorname
     *
     * @param string $vorname
     *
     * @return User
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;

        return $this;
    }

    /**
     * Get vorname
     *
     * @return string
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * Set nachname
     *
     * @param string $nachname
     *
     * @return User
     */
    public function setNachname($nachname)
    {
        $this->nachname = $nachname;

        return $this;
    }

    /**
     * Get nachname
     *
     * @return string
     */
    public function getNachname()
    {
        return $this->nachname;
    }

    /**
     * Set geburtstag
     *
     * @param string $geburtstag
     *
     * @return User
     */
    public function setGeburtstag($geburtstag)
    {
        $this->geburtstag = $geburtstag;

        return $this;
    }

    /**
     * Get geburtstag
     *
     * @return string
     */
    public function getGeburtstag()
    {
        return $this->geburtstag;
    }

    /**
     * Set loginname
     *
     * @param string $loginname
     *
     * @return User
     */
    public function setLoginname($loginname)
    {
        $this->loginname = $loginname;

        return $this;
    }

    /**
     * Get loginname
     *
     * @return string
     */
    public function getLoginname()
    {
        return $this->loginname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set passwort
     *
     * @param string $passwort
     *
     * @return User
     */
    public function setPasswort($passwort)
    {
        $this->passwort = $passwort;

        return $this;
    }

    /**
     * Get passwort
     *
     * @return string
     */
    public function getPasswort()
    {
        return $this->passwort;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return User
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ort
     *
     * @param string $ort
     *
     * @return User
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
     * @return User
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
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set rolle
     *
     * @param string $rolle
     *
     * @return User
     */
    public function setRolle($rolle)
    {
        $this->rolle = $rolle;

        return $this;
    }

    /**
     * Get rolle
     *
     * @return string
     */
    public function getRolle()
    {
        return $this->rolle;
    }
}

