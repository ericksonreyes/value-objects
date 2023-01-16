<?php

namespace EricksonReyes\ValueObject\Money\Trait;

use EricksonReyes\ValueObject\Money\Exception\MismatchedCurrencyException;
use EricksonReyes\ValueObject\Money\MoneyInterface;

/**
 * Trait RequiresSameCurrency
 * @package ValueObject\Money\Trait
 */
trait RequiresSameCurrency
{

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return void
     */
    private function currenciesMustMatch(MoneyInterface $anotherMoney): void
    {
        if ($this->currency()->code() !== $anotherMoney->currency()->code()) {
            throw new MismatchedCurrencyException(
                'The expected currency is ' . $this->currency()->code() . '. ' .
                'The actual currency provided is ' . $anotherMoney->currency()->code() . '.'
            );
        }
    }
}
