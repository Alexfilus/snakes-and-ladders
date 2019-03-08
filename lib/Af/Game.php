<?php

namespace Af;

use Af\Interfaces\DiceInterface;
use Af\Interfaces\RulesInterface;

class Game
{
    /**
     * @var int $position
     * @var DiceInterface $dice
     * @var RulesInterface $rules
     * @var bool $active
     */
    private $position;
    private $dice;
    private $rules;
    private $active = true;

    /**
     * Game constructor.
     *
     * @param DiceInterface $dice
     * @param RulesInterface $rules
     * @param int $startPosition
     */
    public function __construct(DiceInterface $dice, RulesInterface $rules, int $startPosition = 1)
    {
        $this->dice = $dice;
        $this->rules = $rules;
        $this->position = $startPosition;
    }

    private function endGame()
    {
        $this->active = false;
    }

    /**
     * @return MoveDataObject
     */
    public function makeMove(): MoveDataObject
    {
        $moveDataObject = $this->rules->applyRules($this->position, $this->dice->roll());
        if ($moveDataObject->isEndGame()) {
            $this->endGame();
        }
        $this->position = $moveDataObject->getNewPosition();
        return $moveDataObject;
    }

    public function play()
    {
        while ($this->active) {
            sleep(1);
            echo $this->makeMove();
        }
    }
}