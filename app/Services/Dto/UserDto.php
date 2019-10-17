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

    public function setName(string $name): UserDto
    {
        $this->name = $name;

        return $this;
    }

    public function setSurname(string $surname): UserDto
    {
        $this->surname = $surname;

        return $this;
    }

    public function setPatronymic(string $patronymic): UserDto
    {
         $this->patronymic = $patronymic;

        return $this;
    }

    public function setEmail(string $email): UserDto
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword(string $password): UserDto
    {
        $this->password = $password;

        return $this;
    }

    public function setScienceDegree(string $scienceDegree): UserDto
    {
        $this->scienceDegree = $scienceDegree;

        return $this;
    }

    public function setAcademicRank(string $academicRank): UserDto
    {
        $this->academicRank = $academicRank;

        return $this;
    }

    public function setPosition(string $position): UserDto
    {
        $this->position = $position;

        return $this;
    }

    public function setDepartmentId(int $departmentId): UserDto
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    public function setRoleId(int $roleId): UserDto
    {
        $this->roleId = $roleId;

        return $this;
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
