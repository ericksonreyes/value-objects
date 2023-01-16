<?php

namespace EricksonReyes\ValueObject\Text;

use Stringable;

/**
 * Interface TextInterface
 * @package EricksonReyes\ValueObject\Text
 */
interface TextInterface extends Stringable
{

    /**
     * @return int
     */
    public function length(): int;

    /**
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * @return bool
     */
    public function isNotEmpty(): bool;

    /**
     * @param string $searchString
     * @return bool
     */
    public function contains(string $searchString): bool;

    /**
     * @param string $searchString
     * @return bool
     */
    public function doesNotContain(string $searchString): bool;

    /**
     * @param string $searchString
     * @return bool
     */
    public function startsWith(string $searchString): bool;

    /**
     * @param string $searchString
     * @return bool
     */
    public function doesNotStartsWith(string $searchString): bool;

    /**
     * @param string $searchString
     * @return bool
     */
    public function endsWith(string $searchString): bool;

    /**
     * @param string $searchString
     * @return bool
     */
    public function doesNotEndsWith(string $searchString): bool;

    /**
     * @param \EricksonReyes\ValueObject\Text\TextInterface $anotherText
     * @return bool
     */
    public function matches(TextInterface $anotherText): bool;

    /**
     * @param \EricksonReyes\ValueObject\Text\TextInterface $anotherText
     * @return bool
     */
    public function doesNotMatch(TextInterface $anotherText): bool;

    /**
     * @param \EricksonReyes\ValueObject\Text\TextInterface $anotherText
     * @return bool
     */
    public function exactlyMatches(TextInterface $anotherText): bool;

    /**
     * @param \EricksonReyes\ValueObject\Text\TextInterface $anotherText
     * @return bool
     */
    public function doesNotExactlyMatch(TextInterface $anotherText): bool;

    /**
     * @return \EricksonReyes\ValueObject\Text\TextInterface
     */
    public function uppercased(): TextInterface;

    /**
     * @return \EricksonReyes\ValueObject\Text\TextInterface
     */
    public function lowercased(): TextInterface;
}
