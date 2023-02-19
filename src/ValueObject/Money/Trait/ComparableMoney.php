<?php

namespace EricksonReyes\ValueObject\Money\Trait;

use EricksonReyes\ValueObject\Money\MoneyInterface;

/**
 * Trait ComparableMoney
 * @package ValueObject\Money\Trait
 */
trait ComparableMoney
{

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isLessThan(MoneyInterface $anotherMoney): bool
    {
        $this->currenciesMustMatch($anotherMoney);

        return $this->value() < $anotherMoney->value();
    }

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isLessThanOrEqualTo(MoneyInterface $anotherMoney): bool
    {
        $this->currenciesMustMatch($anotherMoney);

        return $this->value() <= $anotherMoney->value();
    }

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isEqualTo(MoneyInterface $anotherMoney): bool
    {
        $this->currenciesMustMatch($anotherMoney);

        return $this->value() === $anotherMoney->value();
    }

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isNotEqualTo(MoneyInterface $anotherMoney): bool
    {
        $this->currenciesMustMatch($anotherMoney);

        return $this->value() !== $anotherMoney->value();
    }

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isGreaterThanOrEqualTo(MoneyInterface $anotherMoney): bool
    {
        $this->currenciesMustMatch($anotherMoney);

        return $this->value() >= $anotherMoney->value();
    }

    /**
     * @param \EricksonReyes\ValueObject\Money\MoneyInterface $anotherMoney
     * @return bool
     */
    public function isGreaterThan(MoneyInterface $anotherMoney): bool
    {

        $this->currenciesMustMatch($anotherMoney);

        return $this->value() > $anotherMoney->value();
    }
}
