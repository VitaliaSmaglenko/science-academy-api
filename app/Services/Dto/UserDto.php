<?php declare(strict_types=1);

namespace App\Services\Dto;

class UserDto
{
    private $name;
    private $surname;
    private $patronymic;
    private $email;
    private $password;
    private $scienceDegree;
    private $academicRank;
    private $position;
    private $departmentId;
    private $roleId;

    public function __construct(
        string $name,
        string $surname,
        string $patronymic,
        string $email,
        string $password,
        string $scienceDegree,
        string $academicRank,
        string $position,
        int $departmentId,
        int $roleId
    )
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
        $this->email = $email;
        $this->password = $password;
        $this->scienceDegree = $scienceDegree;
        $this->academicRank = $academicRank;
        $this->position = $position;
        $this->departmentId = $departmentId;
        $this->roleId = $roleId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getScienceDegree(): string
    {
        return $this->scienceDegree;
    }

    public function getAcademicRank(): string
    {
        return $this->academicRank;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getDepartmentId(): int
    {
        return $this->departmentId;
    }

    public function getRoleId(): int
    {
        return $this->roleId;
    }
}
