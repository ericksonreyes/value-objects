<?php

namespace EricksonReyes\ValueObject\Money\Trait;

use EricksonReyes\ValueObject\Money\Exception\InvalidExchangeRateAmountException;
use EricksonReyes\ValueObject\Money\MoneyInterface;

/**
 * Trait ConvertableMoney
 * @package ValueObject\Money\Trait
 */
trait ConvertableMoney
{

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $exchangeRate
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function convertToForeignCurrency(MoneyInterface $exchangeRate): MoneyInterface
    {
        if ($exchangeRate->amount() <= 0) {
            throw new InvalidExchangeRateAmountException(
                MoneyInterface::ERROR_ZERO_OR_LESS_EXCHANGE_RATE
            );
        }

        $convertedAmount = $this->amount() * $exchangeRate->amount();

        return new self(
            $exchangeRate->currency(),
            $convertedAmount
        );
    }
}
