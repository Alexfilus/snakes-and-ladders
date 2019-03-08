<?php

namespace Af;

use Af\Interfaces\DiceInterface;

class Dice implements DiceInterface
{
    /**
     * @var int $startValue
     * @var int $finalValue
     */
    private $startValue;
    private $finalValue;

    /**
     * Dice constructor.
     * @param int $startValue
     * @param int $finalValue
     */
    public function __construct(int $startValue = 1, int $finalValue = 6)
    {
        $this->startValue = $startValue;
        $this->finalValue = $finalValue;
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function roll(): int
    {
        return random_int($this->startValue, $this->finalValue);
    }
}