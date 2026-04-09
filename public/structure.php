<?php

/*
 * Copyright (C) 2026 Katarzyna Krasińska
 * PHP.PSR-12.lab - https://github.com/katheroine/php.psr-12.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

use PHPLab\StandardPSR12\{
    HtmlDoc,
    HtmlDocAuthor
};
use PHPLab\StandardPSR12\Language\EngGBLangTrait;
use PHPLab\StandardPSR12\User;
use PHPLab\StandardPSR12\Person\Identifiable;
use PHPLab\StandardPSR12\Person\Presentable;

$user = new User();

$user->level = 3;

print('Level: ' . $user->getLevelVisualisation() . '<br>');
print('Upgrade: ' . $user->getLevelUpgradeVisualisation(5) . '<br><br>');

$user->addEducations('Automatic Controll', 'Economics');

foreach ($user->educations as $education) {
    print('Educated at ' . $education . '<br>');
}

print('<br>');

$user->skills = [
    'php' => [
        'name' => 'PHP',
        'level' => 5
    ],
    'sql' => [
        'name' => 'SQL',
        'level' => 4
    ],
    'git' => [
        'name' => 'Git',
        'level' => 2
    ]
];
print('Skills: ' . $user->getSkillsVisualisation() . '<br>');

$levelMarkChar = '#';

$skillPresentation = function ($skillCodename, $skill) use ($levelMarkChar) {
    print($skill['name'] . ': ' . $skill['level'] . '<br>');
};

print('<br>');

$user->makeSkillsPresentation($skillPresentation);

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

print('<br>');

print('Is virtual: ' . ($user->isVirtual() ? 'yes' : 'no') . '<br><br>');

print('Users count: ' . $user->getCount() . '<br><br>');

$human = new class implements
    Identifiable,
    Presentable
{
    protected function hasMiddleName(): bool
    {
        return false;
    }

    public function setName($firstName, $lastName, $middleName = '')
    {
    }

    public function getName(): string
    {
        return 'David Coder';
    }

    public function getPesel(): ?int
    {
        return '01234567890';
    }
};

print('Guest name: ' . $human->getName() . '<br><br>');
