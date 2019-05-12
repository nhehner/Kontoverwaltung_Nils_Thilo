<?php

namespace AppBundle\Entity;

/**
 * role
 */
class role
{
    /**
     * @var role
     */
    public $role;

    /**
     * @var user
     */
    public $users;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $beschreibung;


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
     * Set name
     *
     * @param string $name
     *
     * @return role
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set beschreibung
     *
     * @param string $beschreibung
     *
     * @return role
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

    /**
     * @return user
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param user $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }
}

