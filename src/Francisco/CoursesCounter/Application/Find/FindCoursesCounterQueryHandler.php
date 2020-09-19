<?php

declare(strict_types=1);

namespace MN\Francisco\CoursesCounter\Application\Find;

use MN\Shared\Domain\Bus\Query\QueryHandler;

final class FindCoursesCounterQueryHandler implements QueryHandler
{
    private $finder;

    public function __construct(CoursesCounterFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(FindCoursesCounterQuery $query): CoursesCounterResponse
    {
        return $this->finder->__invoke();
    }
}