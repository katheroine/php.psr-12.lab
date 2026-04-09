<?php

/*
 * Copyright (C) 2026 Katarzyna Krasińska
 * PHP.PSR-12.lab - https://github.com/katheroine/php.psr-12.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

declare(strict_types=1);

namespace PHPLab\StandardPSR12\Person;

use PHPLab\StandardPSR12\Person\Presentable;
use PHPLab\StandardPSR12\Person\Identifiable;

abstract class Person implements Presentable, Identifiable
{
    protected string $firstName;
    protected string $middleName;
    protected string $lastName;

    protected ?int $pesel;

    abstract protected function hasMiddleName(): bool;

    public function setName($firstName, $lastName, $middleName = '')
    {
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
    }

    public function getName(): string
    {
        $name = $firstName
            . $this->hasMiddleName() ? $this->middleName : ' '
            . $lastName;

        return $name;
    }

    public function getPesel(): ?int
    {
        return $this->pesel;
    }
}
