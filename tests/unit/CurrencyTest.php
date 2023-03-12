<?php

use EricksonReyes\ValueObject\Money\Currency;
use EricksonReyes\ValueObject\Money\Exception\UnknownCurrencyCodeException;
use PHPUnit\Framework\TestCase;

/**
 * Class TestCurrency
 */
class CurrencyTest extends TestCase
{

    /**
     * @return void
     */
    public function testClassConstructor(): void
    {
        $currency = new Currency(code: 'php');
        $this->assertSame('PHP', $currency->code());
        $this->assertSame('Philippines Peso', $currency->name());
    }

    public function testAllowOnlyRecognizedCurrencyCodes(): void
    {
        $this->expectException(UnknownCurrencyCodeException::class);
        $currency = new Currency(code: 'AaA');
    }
}
