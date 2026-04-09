<?php

/*
 * Copyright (C) 2026 Katarzyna Krasińska
 * PHP.PSR-12.lab - https://github.com/katheroine/php.psr-12.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

declare(strict_types=1);

namespace PHPLab\StandardPSR12;

class HtmlDocAuthor
{
    public const EMAIL_DOMAIN = 'php.lab';

    public $name = 'Some Author';
    public $email = 'author@' . self::EMAIL_DOMAIN;
}
