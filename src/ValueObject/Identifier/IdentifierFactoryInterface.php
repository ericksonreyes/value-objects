<?php

namespace EricksonReyes\ValueObject\Identifier;


/**
 * Interface IdentifierFactoryInterface
 * @package EricksonReyes\ValueObject\Identifier
 */
interface IdentifierFactoryInterface
{
    /**
     * Usage:
     * <code>
     * $newUserId = IdentifierFactoryInterface::makeFromString("user-1234");
     * </code>
     *
     * @param string $value
     * @return \EricksonReyes\ValueObject\Identifier\IdentifierInterface
     */
    public static function makeFromString(string $value): IdentifierInterface;

    /**
     * Usage:
     * <code>
     * $newUserId = IdentifierFactoryInterface::make();
     * </code>
     *
     * @return \EricksonReyes\ValueObject\Identifier\IdentifierInterface
     */
    public static function make(): IdentifierInterface;

    /**
     * Usage:
     * <code>
     * $dateSignedUp = date('Y-m-d');
     * $prefix = $dateSignedUp . '-';
     * $newCustomerId = IdentifierFactoryInterface::makeWithPrefix($prefix);
     * </code>
     *
     * @param string $prefix
     * @return \EricksonReyes\ValueObject\Identifier\IdentifierInterface
     */
    public static function makeWithPrefix(string $prefix): IdentifierInterface;

    /**
     * Usage:
     * <code>
     * $yearEnrolled = date('Y');
     * $suffix = '-' . $yearEnrolled;
     * $newStudentId = IdentifierFactoryInterface::makeWithSuffix($suffix);
     * </code>
     *
     * @param string $suffix
     * @return \EricksonReyes\ValueObject\Identifier\IdentifierInterface
     */
    public static function makeWithSuffix(string $suffix): IdentifierInterface;

    /**
     * Usage:
     * <code>
     * $enrolledCourseAbbreviation = 'IT;
     * $prefix = $enrolledCourseAbbreviation . '-';
     *
     * $yearEnrolled = date('Y');
     * $suffix = '-' . $yearEnrolled;
     *
     * $newStudentId = IdentifierFactoryInterface::makeWithPrefixAndSuffix($prefix, $suffix);
     * </code>
     *
     * @param string $prefix
     * @param string $suffix
     * @return \EricksonReyes\ValueObject\Identifier\IdentifierInterface
     */
    public static function makeWithPrefixAndSuffix(string $prefix, string $suffix): IdentifierInterface;

}