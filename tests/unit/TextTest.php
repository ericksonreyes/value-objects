<?php

use EricksonReyes\ValueObject\Text\Text;
use EricksonReyes\ValueObject\Text\TextInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class TextTest
 */
class TextTest extends TestCase
{

    const SAMPLE_TEXT = 'Hello World!';
    /**
     * @var \EricksonReyes\ValueObject\Text\TextInterface
     */
    private TextInterface $text;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->text = new Text(self::SAMPLE_TEXT);
    }

    /**
     * @return void
     */
    public function testClassConstructor(): void
    {
        $this->assertEquals(self::SAMPLE_TEXT, (string)$this->text);
    }

    /**
     * @return void
     */
    public function testStaticFactory(): void
    {
        $text = Text::fromString(self::SAMPLE_TEXT);
        $this->assertEquals(self::SAMPLE_TEXT, (string)$text);
    }

    /**
     * @return void
     */
    public function testLength(): void
    {
        $this->assertEquals(
            strlen(self::SAMPLE_TEXT),
            $this->text->length()
        );
    }

    /**
     * @return void
     */
    public function testDetermineEmptyTexts(): void
    {
        $randomEmptyText = str_repeat(' ', mt_rand(0, 5));

        $emptyText = new Text($randomEmptyText);

        $this->assertTrue($emptyText->isEmpty());
    }

    /**
     * @return void
     */
    public function testDetermineNoneEmptyTexts(): void
    {
        $this->assertTrue($this->text->isNotEmpty());
    }

    /**
     * @return void
     */
    public function testCheckIfTextHasMatchingKeywords(): void
    {
        $this->assertTrue($this->text->contains('WoRLd'));
        $this->assertTrue($this->text->contains('HeLLo'));
    }

    /**
     * @return void
     */
    public function testCheckIfTextHasNoMatchingKeywords(): void
    {
        $this->assertTrue($this->text->doesNotContain('Cows'));
        $this->assertTrue($this->text->doesNotContain('Cats'));
    }

    /**
     * @return void
     */
    public function testIfTextStartsWithAKeyword(): void
    {
        $this->assertTrue($this->text->startsWith('HeLLo'));
    }

    /**
     * @return void
     */
    public function testIfTextDoesNotStartsWithAKeyword(): void
    {
        $this->assertTrue($this->text->doesNotStartsWith('HeLLo!'));
    }

    /**
     * @return void
     */
    public function testIfTextEndsWithAKeyword(): void
    {
        $this->assertTrue($this->text->endsWith('World!'));
    }

    /**
     * @return void
     */
    public function testIfTextDoesNotEndsWithAKeyword(): void
    {
        $this->assertTrue($this->text->doesNotEndsWith('War'));
    }

    /**
     * @return void
     */
    public function testIfTextsMatches(): void
    {
        $sameTextButUppercased = new Text(strtoupper(self::SAMPLE_TEXT));
        $this->assertTrue($this->text->matches($sameTextButUppercased));
    }

    /**
     * @return void
     */
    public function testIfTextDoesNotMatches(): void
    {
        $sameTextButUppercased = new Text(strtoupper('World Hello!'));
        $this->assertTrue($this->text->doesNotMatch($sameTextButUppercased));
    }

    /**
     * @return void
     */
    public function testIfTextsExactlyMatches(): void
    {
        $sameText = new Text(self::SAMPLE_TEXT);
        $this->assertTrue($this->text->exactlyMatches($sameText));
    }

    /**
     * @return void
     */
    public function testIfTextDoesNotExactlyMatches(): void
    {
        $sameTextButUppercased = new Text(strtoupper('World Hello!'));
        $this->assertTrue($this->text->doesNotExactlyMatch($sameTextButUppercased));
    }

    /**
     * @return void
     */
    public function testCanBeLowerCased(): void
    {
        $this->assertEquals(
            mb_strtolower(self::SAMPLE_TEXT),
            $this->text->lowercased()
        );
    }

    /**
     * @return void
     */
    public function testCanBeUpperCased(): void
    {
        $this->assertEquals(
            mb_strtoupper(self::SAMPLE_TEXT),
            $this->text->uppercased()
        );
    }
}
