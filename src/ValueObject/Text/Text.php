<?php

namespace EricksonReyes\ValueObject\Text;

use EricksonReyes\ValueObject\Text\Trait\ComparableText;
use EricksonReyes\ValueObject\Text\Trait\ConvertableText;

/**
 * Class Text
 * @package EricksonReyes\ValueObject\Text
 */
class Text implements TextInterface
{
    use ComparableText, ConvertableText;


    /**
     * @var string
     */
    private readonly string $value;

    /**
     * @var int
     */
    private readonly int $length;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = trim($value);
        $this->length = mb_strlen($this->value);
    }

    /**
     * @param string $string
     * @return \EricksonReyes\ValueObject\Text\TextInterface
     */
    public static function fromString(string $string): TextInterface
    {
        return new static($string);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function length(): int
    {
        return $this->length;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->length() === 0;
    }

    /**
     * @return bool
     */
    public function isNotEmpty(): bool
    {
        return $this->isEmpty() === false;
    }
}
