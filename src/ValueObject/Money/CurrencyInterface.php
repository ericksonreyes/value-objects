<?php

namespace EricksonReyes\ValueObject\Money;

/**
 * Interface CurrencyInterface
 * @package ValueObject\Money
 */
interface CurrencyInterface
{

    /**
     * Usage:
     * <code>
     * $currencyCode = $currency->code();
     * </code>
     *
     * @return string
     */
    public function code(): string;

    /**
     * Usage:
     * <code>
     * $currencyName = $currency->name();
     * </code>
     *
     * @return string
     */
    public function name(): string;
}
