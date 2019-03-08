<?php
require 'lib/bootstrap.php';

$game = new \Af\Game(
    new \Af\Dice(),
    new \Af\ClassicRules()
);
$game->play();