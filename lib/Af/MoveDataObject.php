<?php

namespace Af;

class MoveDataObject
{
    /**
     * @var int $diceValue
     * @var int $newPosition
     * @var string $event
     * @var bool $endGame
     */
    private $diceValue;
    private $newPosition;
    private $event;
    private $endGame;

    /**
     * MoveDataObject constructor.
     * @param int $diceValue
     * @param int $newPosition
     * @param string $event
     * @param bool $endGame
     */
    public function __construct(int $diceValue, int $newPosition, string $event = '', bool $endGame = false)
    {
        $this->diceValue = $diceValue;
        $this->newPosition = $newPosition;
        $this->event = $event;
        $this->endGame = $endGame;
    }

    /**
     * @return int
     */
    public function getDiceValue(): int
    {
        return $this->diceValue;
    }

    /**
     * @return int
     */
    public function getNewPosition(): int
    {
        return $this->newPosition;
    }

    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * @return bool
     */
    public function isEndGame(): bool
    {
        return $this->endGame;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->diceValue . '-' . $this->event . $this->newPosition . PHP_EOL;
    }
}