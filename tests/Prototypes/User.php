<?php

namespace ArtARTs36\ControlTime\Tests\Prototypes;

use ArtARTs36\EmployeeInterfaces\Employee\EmployeeInterface;
use ArtARTs36\EmployeeInterfaces\WorkCondition\WorkConditionInterface;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements \ArtARTs36\ControlTime\Contracts\User, EmployeeInterface
{
    protected $table = 'test_users';

    protected $fillable = [
        'name',
    ];

    public function getId(): int
    {
        return 1;
    }

    public function getName(): string
    {
        return 'name';
    }

    public function getPatronymic(): ?string
    {
        return 'patronymic';
    }

    public function getFamily(): string
    {
        return 'family';
    }

    public function setName(string $name): EmployeeInterface
    {
        // TODO: Implement setName() method.
    }

    public function setPatronymic(string $patronymic): EmployeeInterface
    {
        // TODO: Implement setPatronymic() method.
    }

    public function setFamily(string $family): EmployeeInterface
    {
        // TODO: Implement setFamily() method.
    }

    public function getCurrentWorkCondition(): ?WorkConditionInterface
    {
        // TODO: Implement getCurrentWorkCondition() method.
    }

    public function getWorkConditions(): array
    {
        return [];
    }
}
