<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Courses\Domain;


use MN\JoseQ\Courses\Domain\CourseId;
use MN\Tests\Shared\Domain\UuidMother;

final class CourseIdMother
{
    public static function create(string $value): CourseId
    {
        return new CourseId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CourseId
    {
        return self::create(UuidMOther::random());
    }
}