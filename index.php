<?php

use Game\GameMapBuilder;

spl_autoload_register(function ($class) {
    $prefix = 'Game\\';
    $base_dir = __DIR__ . '/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

try {

    $gameMapBuilder = new GameMapBuilder();

    $gameMapBuilder->setCountTransports(1);
    $gameMapBuilder->setCountHumans(1);
    $gameMapBuilder->setCountPlans(1);

    $gameMapBuilder->setCountTeams(2);

    $gameMapBuilder->setCountPlains(10);
    $gameMapBuilder->setCountMountains(10);
    $gameMapBuilder->setCountSwamps(10);
    $gameMapBuilder->setCountWaters(10);

    $gameMapBuilder->setHeight(4);
    $gameMapBuilder->setWidth(10);

    $gameMap = $gameMapBuilder->getGameMap();

    echo 'Done!';
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage();
}
