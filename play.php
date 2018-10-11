<?php

class Ship
{
    public $name;
}

$myShip = new Ship();
$myShip->name = 'TIE Fighter';

echo 'Ship name: '.$myShip->name;
