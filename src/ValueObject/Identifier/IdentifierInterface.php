<?php

namespace EricksonReyes\ValueObject\Identifier;


/**
 * Interface IdentifierInterface
 * @package EricksonReyes\ValueObject\Id
 */
interface IdentifierInterface
{
    /**
     * Usage:
     * <code>
     * $newUser = new User($userId->value(), "Erickson Reyes");
     * </code>
     *
     * @return string
     */
    public function value(): string;

    /**
     * Usage:
     * <code>
     * if ($identifier->matches($anotherIdentifier)) {
     * }
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Identifier\IdentifierInterface $anotherIdentifier
     * @return bool
     */
    public function matches(IdentifierInterface $anotherIdentifier): bool;

    /**
     * Usage:
     * <code>
     * if ($identifier->doesNotMatch($anotherIdentifier)) {
     * }
     * </code>
     *
     * @param \EricksonReyes\ValueObject\Identifier\IdentifierInterface $anotherIdentifier
     * @return bool
     */
    public function doesNotMatch(IdentifierInterface $anotherIdentifier): bool;
}