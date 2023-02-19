<?php

namespace EricksonReyes\ValueObject\Money;

use EricksonReyes\ValueObject\Money\Trait\AdjustableMoney;
use EricksonReyes\ValueObject\Money\Trait\ComparableMoney;
use EricksonReyes\ValueObject\Money\Trait\ConvertableMoney;
use EricksonReyes\ValueObject\Money\Trait\RequiresSameCurrency;

/**
 * Class Money
 * @package ValueObject\Money
 */
class Money implements MoneyInterface
{

    use AdjustableMoney, ConvertableMoney, ComparableMoney, RequiresSameCurrency;

    /**
     * @param \EricksonReyes\ValueObject\Money\Currency $currency
     * @param float $value
     */
    public function __construct(private readonly Currency $currency, private readonly float $value)
    {
    }

    /**
     * @return \EricksonReyes\ValueObject\Money\Currency
     */
    public function currency(): Currency
    {
        return $this->currency;
    }

    /**
     * @return float
     */
    public function value(): float
    {
        return $this->value;
    }
}
