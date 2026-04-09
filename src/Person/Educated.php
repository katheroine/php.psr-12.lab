<?php

/*
 * Copyright (C) 2026 Katarzyna Krasińska
 * PHP.PSR-12.lab - https://github.com/katheroine/php.psr-12.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

declare(strict_types=1);

namespace PHPLab\StandardPSR12\Person;

trait Educated
{
    public array $educations = [];

    public function isVirtual(): bool
    {
        return ! empty($this->educations);
    }

    public function addEducations(...$educations)
    {
        foreach ($educations as $education) {
            $this->educations[] = $education;
        }
    }
}
