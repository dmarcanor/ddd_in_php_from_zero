<?php

declare(strict_types=1);


namespace MN\JoseQ\Shared\Infrastructure\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use MN\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;

final class JoseQEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__ . '/../../../../../databases/joseq.sql';

    public static function create(array $parameters, string $enviroment) : EntityManagerInterface
    {
        $isDevMode = 'prod' !== $enviroment;
        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../JoseQ', 'MN\JoseQ')
        );

        $dbalCustomTypeClasses = DbalTypeSearcher::inPath(__DIR__ . '/../../../../JoseQ', 'JoseQ');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypeClasses
        );
    }
}