<?php

require __DIR__.'/lib/Ship.php';

function get_ships()
{
    $ships = array();

    $ship1 = new Ship();
    $ship1->name = 'Jedi Starfighter';
    $ship1->weaponPower = 5;
    $ship1->jediFactor = 15;
    $ship1->strength = 30;
    $ships['starfighter'] = $ship1;

    return $ships;
}

/**
 * Our complex fighting algorithm!
 *
 * @return array With keys winning_ship, losing_ship & used_jedi_powers
 */
function battle(array $ship1, $ship1Quantity, array $ship2, $ship2Quantity)
{
    $ship1Health = $ship1['strength'] * $ship1Quantity;
    $ship2Health = $ship2['strength'] * $ship2Quantity;

    $ship1UsedJediPowers = false;
    $ship2UsedJediPowers = false;
    while ($ship1Health > 0 && $ship2Health > 0) {
        // first, see if we have a rare Jedi hero event!
        if (didJediDestroyShipUsingTheForce($ship1)) {
            $ship2Health = 0;
            $ship1UsedJediPowers = true;

            break;
        }
        if (didJediDestroyShipUsingTheForce($ship2)) {
            $ship1Health = 0;
            $ship2UsedJediPowers = true;

            break;
        }

        // now battle them normally
        $ship1Health = $ship1Health - ($ship2['weapon_power'] * $ship2Quantity);
        $ship2Health = $ship2Health - ($ship1['weapon_power'] * $ship1Quantity);
    }

    if ($ship1Health <= 0 && $ship2Health <= 0) {
        // they destroyed each other
        $winningShip = null;
        $losingShip = null;
        $usedJediPowers = $ship1UsedJediPowers || $ship2UsedJediPowers;
    } elseif ($ship1Health <= 0) {
        $winningShip = $ship2;
        $losingShip = $ship1;
        $usedJediPowers = $ship2UsedJediPowers;
    } else {
        $winningShip = $ship1;
        $losingShip = $ship2;
        $usedJediPowers = $ship1UsedJediPowers;
    }

    return array(
        'winning_ship' => $winningShip,
        'losing_ship' => $losingShip,
        'used_jedi_powers' => $usedJediPowers,
    );
}

function didJediDestroyShipUsingTheForce(array $ship)
{
    $jediHeroProbability = $ship['jedi_factor'] / 100;

    return mt_rand(1, 100) <= ($jediHeroProbability*100);
}
