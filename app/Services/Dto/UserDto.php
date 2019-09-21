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

    public function __construct(
        string $name,
        string $surname,
        string $patronymic,
        string $email,
        string $password,
        string $scienceDegree,
        string $academicRank
    )
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
        $this->email = $email;
        $this->password = $password;
        $this->scienceDegree = $scienceDegree;
        $this->academicRank = $academicRank;
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
}
