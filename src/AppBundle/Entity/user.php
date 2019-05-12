<?php

namespace AppBundle\Entity;

/**
 * user
 */
class user
{
    /**
     * @var user
     */
    public $user;

    /**
     * @var role
     */
    public $role;

    /**
     * @var konto
     */
    public $kontos;

    /**
     * @var address
     */
    public $addresses;

    /**
     * @var transaction
     */
    public $transactions;

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
     * @var \DateTime
     */
    private $geburtstag;

    /**
     * @var string
     */
    private $benutzername;

    /**
     * @var string
     */
    private $passwort;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $avatar;

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
     * @return user
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
     * @return user
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
     * @param \DateTime $geburtstag
     *
     * @return user
     */
    public function setGeburtstag($geburtstag)
    {
        $this->geburtstag = $geburtstag;

        return $this;
    }

    /**
     * Get geburtstag
     *
     * @return \DateTime
     */
    public function getGeburtstag()
    {
        return $this->geburtstag;
    }

    /**
     * Set benutzername
     *
     * @param string $benutzername
     *
     * @return user
     */
    public function setBenutzername($benutzername)
    {
        $this->benutzername = $benutzername;

        return $this;
    }

    /**
     * Get benutzername
     *
     * @return string
     */
    public function getBenutzername()
    {
        return $this->benutzername;
    }

    /**
     * Set passwort
     *
     * @param string $passwort
     *
     * @return user
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
     * Set email
     *
     * @param string $email
     *
     * @return user
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
     * Set avatar
     *
     * @param string $avatar
     *
     * @return user
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
     * @return user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param user $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return konto
     */
    public function getKontos()
    {
        return $this->kontos;
    }

    /**
     * @param konto $kontos
     */
    public function setKontos($kontos)
    {
        $this->kontos = $kontos;
    }

    /**
     * @return address
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param address $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * @return transaction
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param transaction $transactions
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * @return role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param role $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
}

