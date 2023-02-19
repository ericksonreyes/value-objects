<?php

namespace EricksonReyes\ValueObject\Identifier;


/**
 * Interface IdentiferGeneratorInterface
 * @package EricksonReyes\ValueObject\Identifier
 */
interface IdentifierGeneratorInterface
{
    /**
     * @param string $value
     * @return \EricksonReyes\ValueObject\Identifier\IdentifierInterface
     */
    public static function fromString(string $value): IdentifierInterface;

    /**
     * @return \EricksonReyes\ValueObject\Identifier\IdentifierInterface
     */
    public static function generate(): IdentifierInterface;

    /**
     * @param string $prefix
     * @return \EricksonReyes\ValueObject\Identifier\IdentifierInterface
     */
    public static function generateWithPrefix(string $prefix): IdentifierInterface;

    /**
     * @param string $suffix
     * @return \EricksonReyes\ValueObject\Identifier\IdentifierInterface
     */
    public static function generateWithSuffix(string $suffix): IdentifierInterface;

    /**
     * @param string $prefix
     * @param string $suffix
     * @return \EricksonReyes\ValueObject\Identifier\IdentifierInterface
     */
    public static function generateWithPrefixAndSuffix(string $prefix, string $suffix): IdentifierInterface;

}