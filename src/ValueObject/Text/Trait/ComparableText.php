<?php

namespace EricksonReyes\ValueObject\Text\Trait;

use EricksonReyes\ValueObject\Text\TextInterface;

/**
 * Trait ComparableText
 * @package EricksonReyes\ValueObject\Text\Trait
 */
trait ComparableText
{

    /**
     * @param string $searchString
     * @return bool
     */
    public function contains(string $searchString): bool
    {
        $lowerCasedStoredString = strtolower($this->value);
        $lowerCasedSearchString = strtolower(trim($searchString));
        return str_contains($lowerCasedStoredString, $lowerCasedSearchString);
    }

    /**
     * @param string $searchString
     * @return bool
     */
    public function doesNotContain(string $searchString): bool
    {
        return $this->contains($searchString) === false;
    }

    /**
     * @param string $searchString
     * @return bool
     */
    public function startsWith(string $searchString): bool
    {
        $lowerCasedStoredString = strtolower($this->value);
        $lowerCasedSearchString = strtolower(trim($searchString));
        return str_starts_with($lowerCasedStoredString, $lowerCasedSearchString);
    }

    /**
     * @param string $searchString
     * @return bool
     */
    public function doesNotStartsWith(string $searchString): bool
    {
        return $this->startsWith($searchString) === false;
    }

    /**
     * @param string $searchString
     * @return bool
     */
    public function endsWith(string $searchString): bool
    {
        $lowerCasedStoredString = strtolower($this->value);
        $lowerCasedSearchString = strtolower(trim($searchString));
        return str_ends_with($lowerCasedStoredString, $lowerCasedSearchString);
    }

    /**
     * @param string $searchString
     * @return bool
     */
    public function doesNotEndsWith(string $searchString): bool
    {
        return $this->endsWith($searchString) === false;
    }

    /**
     * @param \EricksonReyes\ValueObject\Text\TextInterface $anotherText
     * @return bool
     */
    public function matches(TextInterface $anotherText): bool
    {
        $lowerCasedStoredString = strtolower($this->value);
        $lowerCasedSearchString = strtolower((string)$anotherText);

        return $lowerCasedStoredString === $lowerCasedSearchString;
    }

    /**
     * @param \EricksonReyes\ValueObject\Text\TextInterface $anotherText
     * @return bool
     */
    public function doesNotMatch(TextInterface $anotherText): bool
    {
        return $this->matches($anotherText) === false;
    }

    /**
     * @param \EricksonReyes\ValueObject\Text\TextInterface $anotherText
     * @return bool
     */
    public function exactlyMatches(TextInterface $anotherText): bool
    {
        return $this->value === (string)$anotherText;
    }

    /**
     * @param \EricksonReyes\ValueObject\Text\TextInterface $anotherText
     * @return bool
     */
    public function doesNotExactlyMatch(TextInterface $anotherText): bool
    {
        return $this->exactlyMatches($anotherText) === false;
    }
}
