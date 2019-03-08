<?php

namespace Af\Interfaces;

use Af\MoveDataObject;

interface RulesInterface
{
    /**
     * RulesInterface constructor.
     */
    function __construct();

    /**
     * @return bool
     */
    function isGotSnake(): bool;

    /**
     * @return bool
     */
    function isGotLadder(): bool;

    /**
     * @param int $oldPosition
     * @param int $diceValue
     * @return MoveDataObject
     */
    function applyRules(int $oldPosition, int $diceValue): MoveDataObject;
}