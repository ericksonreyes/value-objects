<?php

namespace EricksonReyes\ValueObject\Money;

/**
 * Interface CurrencyInterface
 * @package ValueObject\Money
 */
interface CurrencyInterface
{

    /**
     * @return string
     */
    public function code(): string;

    /**
     * @return string
     */
    public function name(): string;
}
