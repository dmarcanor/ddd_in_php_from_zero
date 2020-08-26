<?php


declare(strict_types=1);


namespace MN\Tests\Pereira\Courses\Infrastructure\Persistence;


use MN\Tests\Pereira\Courses\CoursesModuleInfrastructureTestCase;
use MN\Tests\Pereira\Courses\Domain\CourseMother;

final class DoctrineCourseRepositoryTest extends CoursesModuleInfrastructureTestCase
{
    /**
     * @test
     */
    public function try_it_should_save_a_course()
    {
        $course = CourseMother::random();
        $this->repository()->save($course);
    }
}