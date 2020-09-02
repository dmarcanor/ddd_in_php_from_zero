<?php


declare(strict_types=1);


namespace MN\Francisco\Courses\Application;


use MN\Francisco\Courses\Domain\Course;
use MN\Francisco\Courses\Domain\CourseDuration;
use MN\Francisco\Courses\Domain\CourseId;
use MN\Francisco\Courses\Domain\CourseName;
use MN\Francisco\Courses\Domain\CourseRepository;
use MN\Shared\Domain\Bus\Event\EventBus;

final class CourseCreator
{

    private $repository;
    private $bus;

    public function __construct(CourseRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus = $bus;
    }

    public function __invoke(CreateCourseRequest $request): void
    {
        $course = new Course(new CourseId($request->id()), new CourseName($request->name()), new CourseDuration($request->duration()));

        $this->repository->save($course);
        $this->bus->publish($course->pullDomainEvents());
    }
}