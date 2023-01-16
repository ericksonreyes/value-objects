<?php

namespace EricksonReyes\ValueObject\Text\Trait;

use EricksonReyes\ValueObject\Text\TextInterface;

/**
 * Trait ConvertableText
 * @package EricksonReyes\ValueObject\Text\Trait
 */
trait ConvertableText
{
    /**
     * @return \EricksonReyes\ValueObject\Text\TextInterface
     */
    public function uppercased(): TextInterface
    {
        return new self(mb_strtoupper($this->value));
    }

    /**
     * @return \EricksonReyes\ValueObject\Text\TextInterface
     */
    public function lowercased(): TextInterface
    {
        return new self(mb_strtolower($this->value));
    }
}
