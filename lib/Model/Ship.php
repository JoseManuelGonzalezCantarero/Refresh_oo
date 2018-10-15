<?php

class Ship
{
    private $id;

    private $name;

    private $weaponPower = 0;

    private $jediFactor = 0;

    private $strength = 0;

    private $underRepair;

    public function __construct($name)
    {
        $this->name = $name;
        // randomly put this ship under repair
        $this->underRepair = mt_rand(1, 100) < 30;
    }

    public function sayHello()
    {
        echo 'Hello!';
    }

    public function getNameAndSpecs($useShortFormat = false)
    {
        if ($useShortFormat) {
            return sprintf(
                '%s: %s/%s/%s',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        } else {
            return sprintf(
                '%s: w:%s, j:%s, s:%s',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        }
    }

    public function doesGivenShipHaveMoreStrength($givenShip)
    {
        return $givenShip->strength > $this->strength;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function setStrength($number)
    {
        if (!is_numeric($number)) {
            throw new \Exception('Strength must be a number, duh!');
        }

        $this->strength = $number;
    }

    public function getWeaponPower()
    {
        return $this->weaponPower;
    }

    public function setWeaponPower($weaponPower)
    {
        $this->weaponPower = $weaponPower;
    }

    public function getJediFactor()
    {
        return $this->jediFactor;
    }

    public function setJediFactor($jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function isFunctional()
    {
        return !$this->underRepair;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getType()
    {
        return 'Empire';
    }
}
