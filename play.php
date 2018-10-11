<?php

class Ship
{
    public $name;

    public $weaponPower = 0;

    public $jediFactor = 0;

    public $strength = 0;

    public function sayHello()
    {
        echo 'Hello!';
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNameAndSpecs($useShortFormat)
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
                '%s (w:%s, j:%s, s:%s)',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        }

    }
}

$myShip = new Ship();
$myShip->name = 'TIE Fighter';
$myShip->weaponPower = 10;

echo 'Ship name: '.$myShip->getName();
echo '<hr>';
$myShip->sayHello();
echo '<hr>';
var_dump($myShip->weaponPower);
echo '<hr>';
echo 'Ship Description: '. $myShip->getNameAndSpecs(false);
echo '<hr>';
echo 'Ship Description: '. $myShip->getNameAndSpecs(true);
