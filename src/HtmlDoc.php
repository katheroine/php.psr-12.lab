<?php

/*
 * Copyright (C) 2026 Katarzyna Krasińska
 * PHP.PSR-12.lab - https://github.com/katheroine/php.psr-12.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

declare(strict_types=1);

namespace PHPLab\StandardPSR12;

use PHPLab\StandardPSR12\HtmlDocAuthor;

class HtmlDoc
{
    public $languageCode = 'en-GB';
    public $charset = 'utf-8';
    public $language = 'english';
    public $description = 'PSR-12 example document';
    public $keywords = 'php,psr,psr-12';
    public $author;
    public $title = 'Some PSR-12 example page';
    public $header = 'PSR-12 example';
    public $footer = 'Copyright PHP.PSR-12.lab 2026';
    public $content = 'Hi, there!';

    public function setAuthor(HTMLDocAuthor &$htmlDocAuthor)
    {
        $this->author = [
            'name' => $htmlDocAuthor->name,
            'email' => $htmlDocAuthor->email,
        ];
    }
}
