<?php

$configuration = array(
    'db_dsn' => 'mysql:host=localhost;dbname=oo_battle',
    'db_user' => 'root',
    'db_pass' => 'manumanu',
);

require __DIR__.'/lib/Ship.php';
require __DIR__.'/lib/BattleManager.php';
require __DIR__.'/lib/ShipLoader.php';
require_once __DIR__.'/lib/BattleResult.php';
