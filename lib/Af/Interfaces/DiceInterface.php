<?php

namespace Af\Interfaces;

interface DiceInterface
{
    /**
     * DiceInterface constructor.
     */
    function __construct();

    /**
     * @return int
     */
    function roll(): int;
}