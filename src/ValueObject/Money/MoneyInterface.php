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
     * Usage:
     * <code>
     * $currency = $downPayment->currency();
     * </code>
     *
     * @return \EricksonReyes\ValueObject\Money\Currency
     */
    public function currency(): Currency;

    /**
     * Usage:
     * <code>
     * $value = $downPayment->value();
     * </code>
     *
     * @return float
     */
    public function value(): float;

    /**
     * Usage:
     * <code>
     * $netIncome = $grossIncome->addedBy($overtimePay);
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function addedBy(MoneyInterface $anotherMoney): MoneyInterface;

    /**
     * Usage:
     * <code>
     * $netIncome = $grossIncome->deductedBy($incomeTax);
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function deductedBy(MoneyInterface $anotherMoney): MoneyInterface;

    /**
     * Usage:
     * <code>
     * if ($currencyBalance->isLessThan($maintainingBalance)) {
     * }
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isLessThan(MoneyInterface $anotherMoney): bool;

    /**
     * Usage:
     * <code>
     * if ($height->isLessThanOrEqualTo($heightLimit)) {
     * }
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isLessThanOrEqualTo(MoneyInterface $anotherMoney): bool;

    /**
     * Usage:
     * <code>
     * if ($actualItemPrice->isEqualTo($expectedItemPrice)) {
     * }
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isEqualTo(MoneyInterface $anotherMoney): bool;

    /**
     * Usage:
     * <code>
     * if ($actualItemPrice->isNotEqualTo($expectedItemPrice)) {
     * }
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isNotEqualTo(MoneyInterface $anotherMoney): bool;

    /**
     * Usage:
     * <code>
     * if ($donation->isGreaterThanOrEqualTo($expectedDonation)) {
     * }
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isGreaterThanOrEqualTo(MoneyInterface $anotherMoney): bool;

    /**
     * Usage:
     * <code>
     * if ($donation->isGreaterThan($expectedDonation)) {
     * }
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isGreaterThan(MoneyInterface $anotherMoney): bool;

    /**
     * Usage:
     * <code>
     * $salaryAdjustment = $grossIncome->increaseByPercentage(10);
     * </code>
     *
     * @param float $percentage
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function increaseByPercentage(float $percentage): MoneyInterface;

    /**
     * Usage:
     * <code>
     * $incomeTaxAdjustment = $grossIncome->decreaseByPercentage(25);
     * </code>
     *
     * @param float $percentage
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function decreaseByPercentage(float $percentage): MoneyInterface;

    /**
     * Usage:
     * <code>
     * $salesDeclineInPercent = $previousSales->differenceInPercentage($currentSales);
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return float
     */
    public function differenceInPercentage(MoneyInterface $anotherMoney): float;

    /**
     * Usage:
     * <code>
     * $profit = $expenses->differenceByAmount($sales);
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function differenceByAmount(MoneyInterface $anotherMoney): MoneyInterface;

    /**
     * Usage:
     * <code>
     * $annualIncome = $expenses->multipliedBy(12);
     * </code>
     *
     * @param float $multiples
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function multipliedBy(float $multiples): MoneyInterface;

    /**
     * Usage:
     * <code>
     * $newFuelPrice = $currentFuelPrice->adjustedToPercentage($fuelPriceHikePercentage);
     * </code>
     *
     * @param float $percentage
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function adjustedToPercentage(float $percentage): MoneyInterface;

    /**
     * Usage:
     * <code>
     * $discountedPrice = $currentItemPrice->discountedBy($discountRageInPercentage);
     * </code>
     *
     * @param float $discountRate
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function discountedBy(float $discountRate): MoneyInterface;

    /**
     * Usage:
     * <code>
     * $phpToUsd = $amountInPhp->convertToForeignCurrency($usdToPhpConversionRate);
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $exchangeRate
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function convertToForeignCurrency(MoneyInterface $exchangeRate): MoneyInterface;
}
