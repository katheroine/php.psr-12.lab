<?php

/*
 * Copyright (C) 2026 Katarzyna Krasińska
 * PHP.PSR-12.lab - https://github.com/katheroine/php.psr-12.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

declare(strict_types=1);

namespace PHPLab\StandardPSR12\Person;

use PHPLab\StandardPSR12\Person\Person;
use PHPLab\StandardPSR12\Person\Skilled;
use PHPLab\StandardPSR12\Person\Educated;

class Technician extends Person
{
    use Educated {
        Educated::isVirtual as isEducated;
    }

    use Skilled {
        Skilled::isVirtual as isSkilled;
    }

    protected function hasMiddleName(): bool
    {
        return false;
    }

    final public function isVirtual(): bool
    {
        $isVirtual = $this->isEducated() && $this->isSkilled();

        return $isVirtual;
    }
}
