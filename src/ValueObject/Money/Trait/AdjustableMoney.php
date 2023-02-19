<?php

namespace EricksonReyes\ValueObject\Money\Trait;

use EricksonReyes\ValueObject\Money\MoneyInterface;

/**
 * Trait AdjustableMoney
 * @package ValueObject\Money\Trait
 */
trait AdjustableMoney
{

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function addedBy(MoneyInterface $anotherMoney): MoneyInterface
    {
        $this->currenciesMustMatch($anotherMoney);

        $sum = $anotherMoney->value() + $this->value();
        return new self($this->currency(), $sum);
    }

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function deductedBy(MoneyInterface $anotherMoney): MoneyInterface
    {
        $this->currenciesMustMatch($anotherMoney);

        $change = $this->value() - $anotherMoney->value();
        return new self($this->currency, $change);
    }

    /**
     * @param float $percentage
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function increaseByPercentage(float $percentage): MoneyInterface
    {
        $increase = $this->value() * ($percentage / 100);
        return new self(
            $this->currency(),
            $this->value() + $increase
        );
    }

    /**
     * @param float $percentage
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function decreaseByPercentage(float $percentage): MoneyInterface
    {
        $decrease = $this->value() * ($percentage / 100);
        return new self(
            $this->currency(),
            $this->value() - $decrease
        );
    }

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return float
     */
    public function differenceInPercentage(MoneyInterface $anotherMoney): float
    {
        $this->currenciesMustMatch($anotherMoney);

        $firstAmount = $this->value();
        $secondAmount = $anotherMoney->value();

        $dividend = ($firstAmount - $secondAmount);
        $divisor = ($firstAmount + $secondAmount) / 2;
        $quotient = $dividend / $divisor;
        return $quotient * 100;
    }

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function differenceByAmount(MoneyInterface $anotherMoney): MoneyInterface
    {
        $this->currenciesMustMatch($anotherMoney);

        $firstAmount = $this->value();
        $secondAmount = $anotherMoney->value();

        $amountDifference = ($firstAmount - $secondAmount);

        return new self($anotherMoney->currency(), $amountDifference);
    }

    /**
     * @param float $multiples
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function multipliedBy(float $multiples): MoneyInterface
    {
        return new self(
            $this->currency(),
            $this->value() * $multiples
        );
    }

    /**
     * @param float $discountRate
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function discountedBy(float $discountRate): MoneyInterface
    {
        $deduction = $this->adjustedToPercentage($discountRate);

        return new self(
            $this->currency(),
            $this->value() - $deduction->value()
        );
    }

    /**
     * @param float $percentage
     * @return \EricksonReyes\ValueObject\Money\MoneyInterface
     */
    public function adjustedToPercentage(float $percentage): MoneyInterface
    {
        $percentageInDecimals = $percentage / 100;

        return new self(
            $this->currency(),
            $percentageInDecimals * $this->value()
        );
    }
}
