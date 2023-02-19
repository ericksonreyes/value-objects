<?php

namespace EricksonReyes\ValueObject\Money;

/**
 * Interface MoneyInterface
 * @package ValueObject\Money
 */
interface MoneyInterface
{
    const ERROR_ZERO_OR_LESS_EXCHANGE_RATE = 'Exchange rate amount should not be zero or less.';

    /**
     * @return \EricksonReyes\ValueObject\Money\Currency
     */
    public function currency(): Currency;

    /**
     * @return float
     */
    public function value(): float;

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function addedBy(MoneyInterface $anotherMoney): MoneyInterface;

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function deductedBy(MoneyInterface $anotherMoney): MoneyInterface;

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isLessThan(MoneyInterface $anotherMoney): bool;

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isLessThanOrEqualTo(MoneyInterface $anotherMoney): bool;

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isEqualTo(MoneyInterface $anotherMoney): bool;

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isNotEqualTo(MoneyInterface $anotherMoney): bool;

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isGreaterThanOrEqualTo(MoneyInterface $anotherMoney): bool;

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isGreaterThan(MoneyInterface $anotherMoney): bool;

    /**
     * @param float $percentage
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function increaseByPercentage(float $percentage): MoneyInterface;

    /**
     * @param float $percentage
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function decreaseByPercentage(float $percentage): MoneyInterface;

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return float
     */
    public function differenceInPercentage(MoneyInterface $anotherMoney): float;

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function differenceByAmount(MoneyInterface $anotherMoney): MoneyInterface;

    /**
     * @param float $multiples
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function multipliedBy(float $multiples): MoneyInterface;

    /**
     * @param float $percentage
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function adjustedToPercentage(float $percentage): MoneyInterface;

    /**
     * @param float $discountRate
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function discountedBy(float $discountRate): MoneyInterface;

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $exchangeRate
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function convertToForeignCurrency(MoneyInterface $exchangeRate): MoneyInterface;
}
