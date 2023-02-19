<?php

namespace EricksonReyes\ValueObject\Identifier;


/**
 * Interface IdentifierInterface
 * @package EricksonReyes\ValueObject\Id
 */
interface IdentifierInterface
{
    /**
     * @return string
     *
     * Usage:
     *
     * $newUser = new User($userId->value(), "Erickson Reyes");
     */
    public function value(): string;

    /**
     * @param \EricksonReyes\ValueObject\Identifier\IdentifierInterface $anotherIdentifier
     * @return bool
     *
     * Usage:
     *
     * if ($identifier->matches($anotherIdentifier)) {
     * }
     */
    public function matches(IdentifierInterface $anotherIdentifier): bool;

    /**
     * @param \EricksonReyes\ValueObject\Identifier\IdentifierInterface $anotherIdentifier
     * @return bool
     *
     * Usage:
     *
     * if ($identifier->doesNotMatch($anotherIdentifier)) {
     * }
     */
    public function doesNotMatch(IdentifierInterface $anotherIdentifier): bool;
}