<?php

namespace Af;

use Af\Interfaces\RulesInterface;

class ClassicRules implements RulesInterface
{
    /**
     * @var int $newPosition
     * @var int $finalPosition
     * @var int $moveForSnake
     * @var int $moveForLadder
     */
    private $newPosition;
    private $finalPosition = 100;
    private $moveForSnake = -3;
    private $moveForLadder = 10;

    /**
     * ClassicRules constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return bool
     */
    function isGotSnake(): bool
    {
        return $this->newPosition % 9 === 0;
    }

    /**
     * @return bool
     */
    function isGotLadder(): bool
    {
        return ($this->newPosition === 25) || ($this->newPosition === 55);
    }

    /**
     * @param int $oldPosition
     * @param int $diceValue
     * @return MoveDataObject
     */
    function applyRules(int $oldPosition, int $diceValue): MoveDataObject
    {
        $this->newPosition = $oldPosition + $diceValue;
        if ($this->newPosition === $this->finalPosition) {
            return new MoveDataObject($diceValue, $this->newPosition, '', true);
        }
        if ($this->newPosition > $this->finalPosition) {
            $this->newPosition = $oldPosition;
        }
        if ($this->isGotSnake()) {
            $this->newPosition += $this->moveForSnake;
            return new MoveDataObject($diceValue, $this->newPosition, 'snake');
        }
        if ($this->isGotLadder()) {
            $this->newPosition += $this->moveForLadder;
            return new MoveDataObject($diceValue, $this->newPosition, 'ladder');
        }
        return new MoveDataObject($diceValue, $this->newPosition);
    }
}