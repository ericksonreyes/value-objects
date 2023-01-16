<?php

use EricksonReyes\ValueObject\Money\Currency;
use EricksonReyes\ValueObject\Money\Exception\InvalidExchangeRateAmountException;
use EricksonReyes\ValueObject\Money\Exception\MismatchedCurrencyException;
use EricksonReyes\ValueObject\Money\Money;
use PHPUnit\Framework\TestCase;

/**
 * Class MoneyTest
 */
class MoneyTest extends TestCase
{

    /**
     * @return void
     */
    public function testClassConstructor(): void
    {
        $currency = new Currency('PHP');
        $amount = 100.50;
        $money = new Money($currency, $amount);

        $this->assertEquals($currency, $money->currency());
        $this->assertEquals($amount, $money->amount());
    }

    /**
     * @return void
     */
    public function testCanBeAdded(): void
    {
        $currency = new Currency('PHP');
        $downPaymentAmount = 100.50;
        $installmentAmount = 105.75;
        $expectedTotalPayment = $downPaymentAmount + $installmentAmount;

        $downPayment = new Money($currency, $downPaymentAmount);
        $firstInstallment = new Money($currency, $installmentAmount);
        $grossPayment = $downPayment->addedBy($firstInstallment);

        $this->assertEquals($expectedTotalPayment, $grossPayment->amount());
    }

    public function testRequiresMatchingCurrencies()
    {
        $this->expectException(MismatchedCurrencyException::class);

        $philippineCurrency = new Currency(code: 'PHP');
        $americanCurrency = new Currency('USD');
        $amount = 10;

        $philippineMoney = new Money($philippineCurrency, $amount);
        $americanMoney = new Money($americanCurrency, $amount);
        $philippineMoney->addedBy($americanMoney);
    }

    /**
     * @return void
     */
    public function testCanBeDeducted(): void
    {
        $currency = new Currency('USD');
        $grossPay = 15000.00;
        $incomeTaxDeduction = 105.75;
        $expectedNetPay = $grossPay - $incomeTaxDeduction;

        $income = new Money($currency, $grossPay);
        $deduction = new Money($currency, $incomeTaxDeduction);
        $grossIncome = $income->deductedBy($deduction);

        $this->assertEquals($expectedNetPay, $grossIncome->amount());
    }

    /**
     * @return void
     */
    public function testCanBeIncreasedByPercentage(): void
    {
        $currency = new Currency('AUD');
        $previousBalance = 100.00;
        $interestRate = 2.75;
        $expectedCurrentBalance = 102.75;

        $currentBalance = new Money($currency, $previousBalance);
        $newBalance = $currentBalance->increaseByPercentage($interestRate);

        $this->assertEquals($expectedCurrentBalance, $newBalance->amount());
    }

    /**
     * @return void
     */
    public function testCanBeDecreasedByPercentage(): void
    {
        $currency = new Currency('AUD');
        $previousBalance = 100.00;
        $belowMaintainingBalancePenalty = 2.75;
        $expectedCurrentBalance = 97.25;

        $currentBalance = new Money($currency, $previousBalance);
        $newBalance = $currentBalance->decreaseByPercentage($belowMaintainingBalancePenalty);

        $this->assertEquals($expectedCurrentBalance, $newBalance->amount());
    }

    /**
     * @return void
     */
    public function testDetermineDifferenceInPercentage(): void
    {
        $currency = new Currency('AUD');
        $expectedDifferenceInPercent = 2.53165;
        $previousBalance = new Money($currency, 97.50);
        $currentBalance = new Money($currency, 100.00);

        $this->assertEquals(
            $expectedDifferenceInPercent,
            number_format($currentBalance->differenceInPercentage($previousBalance), 5)
        );
    }

    /**
     * @return void
     */
    public function testDetermineDifferenceByAmount(): void
    {
        $currency = new Currency('AUD');
        $expectedNewBalance = 2.50;
        $previousBalance = new Money($currency, 97.50);
        $currentBalance = new Money($currency, 100.00);
        $newBalance = $currentBalance->differenceByAmount($previousBalance);

        $this->assertEquals($expectedNewBalance, $newBalance->amount());
    }

    /**
     * @return void
     */
    public function testCanBeMultiplied(): void
    {
        $currency = new Currency('AUD');
        $monthsToRent = 12;
        $rentalFee = 8.75;
        $expectedTotalPayment = $rentalFee * $monthsToRent;

        $monthlyPayment = new Money($currency, $rentalFee);
        $amountPayable = $monthlyPayment->multipliedBy($monthsToRent);

        $this->assertEquals($expectedTotalPayment, $amountPayable->amount());
    }

    /**
     * @return void
     */
    public function testCanBeDiscountedOff(): void
    {
        $currency = new Currency('AUD');
        $originalPrice = 1758;
        $discountInPercentage = 13;
        $expectedFinalPrice = 1529.46;

        $purchasedItemPrice = new Money($currency, $originalPrice);
        $finalPrice = $purchasedItemPrice->discountedBy($discountInPercentage);

        $this->assertEquals($expectedFinalPrice, $finalPrice->amount());
    }

    /**
     * @return void
     */
    public function testCanBeComparedAgainstSmallerAmounts(): void
    {
        $currency = new Currency('AUD');
        $itemPrice = new Money($currency, 12356.90);
        $amountPaid = new Money($currency, 322.75);

        $this->assertTrue($amountPaid->isLessThan($itemPrice));
    }

    /**
     * @return void
     */
    public function testCanBeComparedAgainstSmallerOrEqualAmounts(): void
    {
        $currency = new Currency('AUD');
        $itemPrice = new Money($currency, 12356.90);
        $amountPaid = $sameAmount = new Money($currency, 322.75);

        $this->assertTrue($amountPaid->isLessThanOrEqualTo($itemPrice));
        $this->assertTrue($amountPaid->isLessThanOrEqualTo($sameAmount));
    }

    /**
     * @return void
     */
    public function testCanBeComparedForEquality(): void
    {
        $currency = new Currency('EUR');
        $itemPrice = new Money($currency, 12356.90);
        $amountPaid = new Money($currency, 12356.90);

        $this->assertTrue($amountPaid->isEqualTo($itemPrice));
    }

    /**
     * @return void
     */
    public function testCanBeComparedForInequality(): void
    {
        $currency = new Currency('EUR');
        $itemPrice = new Money($currency, 12356.90);
        $amountPaid = new Money($currency, 322.75);

        $this->assertTrue($amountPaid->isNotEqualTo($itemPrice));
    }

    /**
     * @return void
     */
    public function testCanBeComparedAgainstLargerAmounts(): void
    {
        $currency = new Currency('AUD');
        $amountPaid = new Money($currency, 12356.90);
        $itemPrice = new Money($currency, 322.75);

        $this->assertTrue($amountPaid->isGreaterThan($itemPrice));
    }

    /**
     * @return void
     */
    public function testCanBeComparedAgainstLargerOrEqualAmounts(): void
    {
        $currency = new Currency('AUD');
        $amountPaid = new Money($currency, 12356.90);
        $itemPrice = $sameAmount = new Money($currency, 322.75);

        $this->assertTrue($amountPaid->isGreaterThanOrEqualTo($itemPrice));
        $this->assertTrue($amountPaid->isGreaterThanOrEqualTo($sameAmount));
    }

    /**
     * @return void
     */
    public function testCanBeConvertedToAnotherCurrency(): void
    {
        $localCurrency = new Currency('PHP');
        $foreignCurrency = new Currency('USD');
        $philippinePeso = new Money($localCurrency, 1000);
        $exchangeRate = new Money($foreignCurrency, 0.0183405);
        $expectedConvertedAmount = 18.34;

        $americanDollar = $philippinePeso->convertToForeignCurrency($exchangeRate);

        $this->assertEquals($expectedConvertedAmount, number_format($americanDollar->amount(), 2));
        $this->assertEquals($foreignCurrency, $americanDollar->currency());
    }

    /**
     * @return void
     */
    public function testPreventNegativeCurrencyRateConversion(): void
    {
        $this->expectException(InvalidExchangeRateAmountException::class);

        $localCurrency = new Currency('PHP');
        $foreignCurrency = new Currency('USD');
        $philippinePeso = new Money($localCurrency, 1000);
        $exchangeRate = new Money($foreignCurrency, -12.00);

        $philippinePeso->convertToForeignCurrency($exchangeRate);
    }
}
