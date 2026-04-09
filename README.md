# PHP.PSR-12.lab

Laboratory of PSR-12: Extended Coding Style.

> This repository is a standalone part of a larger project: **[PHP.lab](https://github.com/katheroine/php.lab)** — a curated knowledge base and laboratory for PHP engineering.

**Usage**

To run the example application with *Docker* use command:

```console
docker compose up -d
```

After creating the *Docker container* the *Composer dependencies* have to be defined and installed:

```console
docker compose exec application composer require --dev squizlabs/php_codesniffer \
&& docker compose application composer install
```

Tom make *PHP Code Sniffer commands* easily accessible run:

```console
docker compose exec application ln -s /var/www/vendor/bin/phpcs /usr/local/bin/phpcs \
&& docker compose exec application ln -s /var/www/vendor/bin/phpcbf /usr/local/bin/phpcbf
```

To run *PHP Code Sniffer* use command:

```console
docker compose exec application /var/www/vendor/bin/phpcs
```

or, if the shortcut has been created:

```console
docker compose exec application phpcs
```

To update `Composer dependencies` use command (should be done before the command below):

```console
docker compose exec application composer update
```

To login into the *Docker container* use command:

```console
docker exec -it psr-1-example-app /bin/bash
```

**License**

This project is licensed under the GPL-3.0 - see [LICENSE.md](LICENSE.md).

**Official documentation**

[PHP-FIG PRS-12 Official documentation](https://www.php-fig.org/psr/psr-12/)

**What are PSRs**

**PSR** stands for *PHP Standard Recommendation*.

## Overview

This specification extends, expands and replaces [PSR-2](https://www.php-fig.org/psr/psr-2/), the coding style guide and requires adherence to [PSR-1](https://www.php-fig.org/psr/psr-1/), the basic coding standard.

Like [PSR-2](https://www.php-fig.org/psr/psr-2/), the intent of this specification is to **reduce cognitive friction when scanning code from different authors**. It does so by enumerating a shared set of rules and expectations about how to format PHP code. This PSR seeks to provide a set way that coding style tools can implement, projects can declare adherence to and developers can easily relate to between different projects. When various authors collaborate across multiple projects, it helps to have one set of guidelines to be used among all those projects. Thus, the benefit of this guide is not in the rules themselves but the sharing of those rules.

[PSR-2](https://www.php-fig.org/psr/psr-2/) was accepted in 2012 and since then a number of changes have been made to PHP which has implications for coding style guidelines. Whilst [PSR-2](https://www.php-fig.org/psr/psr-2/) is very comprehensive of PHP functionality that existed at the time of writing, new functionality is very open to interpretation. This PSR, therefore, seeks to clarify the content of [PSR-2](https://www.php-fig.org/psr/psr-2/) in a more modern context with new functionality available, and make the errata to [PSR-2](https://www.php-fig.org/psr/psr-2/) binding.

### Previous language versions

Throughout this document, any instructions MAY be ignored if they do not exist in versions of PHP supported by your project.

**Example**

This example encompasses some of the rules below as a quick overview:

```php
<?php

declare(strict_types=1);

namespace Vendor\Package;

use Vendor\Package\{ClassA as A, ClassB, ClassC as C};
use Vendor\Package\SomeNamespace\ClassD as D;

use function Vendor\Package\{functionA, functionB, functionC};

use const Vendor\Package\{ConstantA, ConstantB, ConstantC};

class Foo extends Bar implements FooInterface
{
    public function sampleFunction(int $a, int $b = null): array
    {
        if ($a === $b) {
            bar();
        } elseif ($a > $b) {
            $foo->bar($arg1);
        } else {
            BazClass::bar($arg2, $arg3);
        }
    }

    final public static function bar()
    {
        // method body
    }
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#overview)

The **PSR-1** documentation within the **PHP.lab** project is [here](https://github.com/katheroine/php.psr-1.lab)

## General

**Code MUST follow all rules outlined in [PSR-1](https://www.php-fig.org/psr/psr-1/).**
[🔗](https://www.php-fig.org/psr/psr-12/#21-basic-coding-standard)

**The term `StudlyCaps` in [PSR-1](https://www.php-fig.org/psr/psr-1/) MUST be interpreted as `PascalCase` where the first letter of each word is capitalized including the very first letter.**
[🔗](https://www.php-fig.org/psr/psr-12/#21-basic-coding-standard)

## Files

##### ✤ File ending character

**All PHP files MUST use the `Unix LF (linefeed)` line ending only.**
[🔗](https://www.php-fig.org/psr/psr-12/#22-files)

A [newline](https://en.wikipedia.org/wiki/Newline) (frequently called **line ending**, **end of line (`EOL`)**, **next line (`NEL`)** or **line break**) is a control character or sequence of control characters in character encoding specifications such as `ASCII`, `EBCDIC`, `Unicode`, etc. This character, or a sequence of characters, is used to *signify the end of a line of text and the start of a new one*.

The Unicode standard defines a number of characters that conforming applications should recognize as line terminators:

* `LF` - Line Feed, U+000A
* `VT` - Vertical Tab, U+000B
* `FF` - Form Feed, U+000C
* `CR` - Carriage Return, U+000D
* `CR+LF` - CR (U+000D) followed by LF (U+000A)
* `NEL` - Next Line, U+0085
* `LS` - Line Separator, U+2028
* `PS` - Paragraph Separator, U+2029

**`LF`** is recognized by *POSIX* standard oriented systems: `Unix` and Unix-like systems (`Linux`, `macOS`, `*BSD`, `AIX`, `Xenix`, etc.), `QNX 4+`, `Multics`, `BeOS`, `Amiga`, `RISC OS`, and others.

**`CR+LF`** is recognized by `Windows`, `MS-DOS` compatibles, `Atari TOS`, `DEC TOPS-10`, `RT-11`, `CP/M`, `MP/M`, `OS/2`, `Symbian OS`, `Palm OS`, `Amstrad CPC`, and most other early non-Unix and non-IBM operating systems

The *line ending character* can be set in the code editor or IDE settings (usually it is `LF` by default).

##### ✤ File ending line

**All PHP files MUST end with a non-blank line, terminated with a single `LF`.**
[🔗](https://www.php-fig.org/psr/psr-12/#22-files)

**`index.php`**

```php
<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use PHPLab\StandardPSR12\HtmlDoc;
use PHPLab\StandardPSR12\HtmlDocAuthor;

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

require_once('view.php');

```

##### ✤ Omitting of the ending PHP tag `?>`

**The closing `?>` tag MUST be omitted from files containing only PHP.**
[🔗](https://www.php-fig.org/psr/psr-12/#22-files)

**`HtmlDocAuthor.php`**

```php
<?php

namespace PHPLab\StandardPSR1;

class HtmlDocAuthor
{
    const EMAIL_DOMAIN = 'php.lab';

    public $name = 'Some Author';
    public $email = 'author@' . self::EMAIL_DOMAIN;
}

```

### Lines

##### ✤ Line length hard limit

**There MUST NOT be a hard limit on line length.**
[🔗](https://www.php-fig.org/psr/psr-12/#23-lines)

##### ✤ Line lenght soft limit

**The soft limit on line length MUST be `120` characters.**
[🔗](https://www.php-fig.org/psr/psr-12/#23-lines)

##### ✤ Line length recomended limit

**Lines SHOULD NOT be longer than `80` characters.**
[🔗](https://www.php-fig.org/psr/psr-12/#23-lines)

**Lines longer than that SHOULD be split into multiple subsequent lines of no more than `80` characters each.**
[🔗](https://www.php-fig.org/psr/psr-12/#23-lines)

##### ✤ Trailing whitespaces at the end of lines

**There MUST NOT be trailing whitespace at the end of lines**
[🔗](https://www.php-fig.org/psr/psr-12/#23-lines)

##### ✤ Blank lines for redability

**Blank lines MAY be added to improve readability and to indicate related blocks of code except where explicitly forbidden.**
[🔗](https://www.php-fig.org/psr/psr-12/#23-lines)

**`index.php`**

```php
<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use PHPLab\StandardPSR12\HtmlDoc;
use PHPLab\StandardPSR12\HtmlDocAuthor;

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

require_once('view.php');

```

**`HtmlDocAuthor.php`**

```php
<?php

namespace PHPLab\StandardPSR1;

class HtmlDocAuthor
{
    const EMAIL_DOMAIN = 'php.lab';

    public $name = 'Some Author';
    public $email = 'author@' . self::EMAIL_DOMAIN;
}

```

##### ✤ Allowed number of statements per line

**There MUST NOT be more than `1` statement per line.**
[🔗](https://www.php-fig.org/psr/psr-12/#23-lines)

**`index.php`**

```php
<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use PHPLab\StandardPSR12\HtmlDoc;
use PHPLab\StandardPSR12\HtmlDocAuthor;

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

require_once('view.php');

```

## Indenting

##### ✤ Indenting character

**Code MUST use `spaces` for indenting and MUST NOT use tabs for indenting.**
[🔗](https://www.php-fig.org/psr/psr-12/#24-indenting)

**MUST NOT use tabs for indenting.**

##### ✤ Indenting length

**Code MUST use an indent of `4` spaces for each indent level.**
[🔗](https://www.php-fig.org/psr/psr-12/#24-indenting)

**`HtmlDoc.php`**

```php
<?php

namespace PHPLab\StandardPSR1;

class HtmlDoc
{
    public $languageCode = 'en-GB';
    public $charset = 'utf-8';
    public $language = 'english';
    public $description = 'PSR-1 example document';
    public $keywords = 'php,psr,psr-1';
    public $author;
    public $title = 'Some PSR-1 example page';
    public $header = 'PSR-1 example';
    public $footer = 'Copyright PHP.lab 2024';
    public $content = 'Hi, there!';

    public function setAuthor($htmlDocAuthor)
    {
        $this->author = [
            'name' => $htmlDocAuthor->name,
            'email' => $htmlDocAuthor->email,
        ];
    }
}

```

## Header of a PHP file

##### ✤ Header of a PHP file contents

**The header of a PHP file may consist of a number of different blocks.**
[🔗](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

##### ✤ Blank line separators of the blocks in a header of a PHP file

**If present, each of the blocks MUST be separated by a single blank line and MUST not contain a blank line.**
[🔗](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

##### ✤ Order of the blocks in a header of a PHP file

**Each block MUST be in the order listed below, although blocks that are not relevant may be omitted:**
* **opening `<?php` tag**
* **file-level docblock**
* **one or more declare statements**
* **the namespace declaration of the file**
* **one or more class-based…**
* **…function-based…**
* **…constant-based `use` import statements**
* **the remainder of the code in the file**
[🔗](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

**`HtmlDoc.php`**

```php
<?php

/*
 * This file is part of the PHP.lab package.
 *
 * (c) 2026 Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PHPLab\StandardPSR12;

use PHPLab\StandardPSR12\HtmlDocAuthor;

class HtmlDoc
{
}

```

##### ✤ Header of the files with mix of HTML and PHP

**When a file contains a mix of HTML and PHP, any of the above sections may still be used.**
[🔗](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

**If so, they MUST be present at the top of the file, even if the remainder of the code consists of a closing PHP tag and then a mixture of HTML and PHP.**
[🔗](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

**`view.php`**

```php
<?php

/*
 * This file is part of the PHP.lab package.
 *
 * (c) 2026 Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PHPLab\StandardPSR12;

use PHPLab\StandardPSR12\HtmlDocAuthor;

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

?>
<!doctype html>
<html lang="<?= $htmlDoc->languageCode ?>">
  <head>
    <meta charset="<?= $htmlDoc->charset ?>">
    <meta name="language" content="<?= $htmlDoc->language ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $htmlDoc->description ?>">
    <meta name="keywords" content="<?= $htmlDoc->keywords ?>">
    <meta name="author" content="<?= $htmlDoc->author['name'] ?> <<?= $htmlDoc->author['email'] ?>>">
    <title><?= $htmlDoc->title ?></title>
  </head>
  <body>
    <?php if (isset($htmlDoc->header)): ?>
    <header>
        <?= $htmlDoc->header ?>
    </header>
    <?php endif; ?>
    <?php if (isset($htmlDoc->content)): ?>
    <div id="content">
        <?= $htmlDoc->content ?>
    </div>
    <?php endif; ?>
    <?php if (isset($htmlDoc->footer)): ?>
    <footer>
        <?= $htmlDoc->footer ?>
    </footer>
    <?php endif; ?>
  </body>
</html>

```

##### ✤ Opening `<?php` tag

**When the opening `<?php` tag is on the first line of the file, it MUST be on its own line with no other statements unless it is a file containing markup outside of PHP opening and closing tags.**
[🔗](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

## Directives

##### ✤ Declare statements formatting

**Declare statements MUST contain no spaces and MUST be exactly `declare(strict_types=1)` (with an optional semi-colon terminator).**
[🔗](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

**`HtmlDocAuthor.php`**

```php
<?php

declare(strict_types=1);

namespace PHPLab\StandardPSR12;

class HtmlDocAuthor
{
    const EMAIL_DOMAIN = 'php.lab';

    public $name = 'Some Author';
    public $email = 'author@' . self::EMAIL_DOMAIN;
}

```

##### ✤ Block declare statements formatting

**Block declare statements are allowed and MUST be formatted as below. Note position of braces and spacing:**
```php
declare(ticks=1) {

    // some code

}
```
[🔗](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

##### ✤ Strict types declaration formatting in files containing markup outside PHP opening and closing tags

**When wishing to declare strict types in files containing markup outside PHP opening and closing tags, the declaration MUST be on the first line of the file and include an opening PHP tag, the strict types declaration and closing tag.**
[🔗](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

For example:

```php
<?php declare(strict_types=1) ?>
<html>
<body>
    <?php
        // ... additional PHP code ...
    ?>
</body>
</html>
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

**`view.php`**

```php
<?php declare(strict_types=1) ?>
<!doctype html>
<html lang="<?= $htmlDoc->languageCode ?>">
  <head>
    <meta charset="<?= $htmlDoc->charset ?>">
    <meta name="language" content="<?= $htmlDoc->language ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $htmlDoc->description ?>">
    <meta name="keywords" content="<?= $htmlDoc->keywords ?>">
    <meta name="author" content="<?= $htmlDoc->author['name'] ?> <<?= $htmlDoc->author['email'] ?>>">
    <title><?= $htmlDoc->title ?></title>
  </head>
  <body>
    <?php if (isset($htmlDoc->header)): ?>
    <header>
        <?= $htmlDoc->header ?>
    </header>
    <?php endif; ?>
    <?php if (isset($htmlDoc->content)): ?>
    <div id="content">
        <?= $htmlDoc->content ?>
    </div>
    <?php endif; ?>
    <?php if (isset($htmlDoc->footer)): ?>
    <footer>
        <?= $htmlDoc->footer ?>
    </footer>
    <?php endif; ?>
  </body>
</html>

```

## Imports

The following example illustrates a complete list of all blocks:

```php
<?php

/**
 * This file contains an example of coding styles.
 */

declare(strict_types=1);

namespace Vendor\Package;

use Vendor\Package\{ClassA as A, ClassB, ClassC as C};
use Vendor\Package\SomeNamespace\ClassD as D;
use Vendor\Package\AnotherNamespace\ClassE as E;

use function Vendor\Package\{functionA, functionB, functionC};
use function Another\Vendor\functionD;

use const Vendor\Package\{CONSTANT_A, CONSTANT_B, CONSTANT_C};
use const Another\Vendor\CONSTANT_D;

/**
 * FooBar is an example class.
 */
class FooBar
{
    // ... additional PHP code ...
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

##### ✤ Use declarations placement

**Import statements MUST never begin with a leading backslash.**
[🔗](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

* Wrong:

```php
use \PHPLab\StandardPSR12\HtmlDoc;
use \PHPLab\StandardPSR12\HtmlDocAuthor;
```

* Right:

```php
use PHPLab\StandardPSR12\HtmlDoc;
use PHPLab\StandardPSR12\HtmlDocAuthor;
```

##### ✤ Fully qualified import statements

**Import statements MUST always be fully qualified.**
[🔗](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

* Wrong:

```php
use StandardPSR12\HtmlDoc;
use HtmlDocAuthor;
```

* Right:

```php
use PHPLab\StandardPSR12\HtmlDoc;
use PHPLab\StandardPSR12\HtmlDocAuthor;
```

##### ✤ Import with compound namespaces

**Compound namespaces with a depth of more than two MUST NOT be used.**
[🔗](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

Therefore the following is the maximum compounding depth allowed:

```php
<?php

use Vendor\Package\SomeNamespace\{
    SubnamespaceOne\ClassA,
    SubnamespaceOne\ClassB,
    SubnamespaceTwo\ClassY,
    ClassZ,
};
```

And the following would not be allowed:

```php
<?php

use Vendor\Package\SomeNamespace\{
    SubnamespaceOne\AnotherNamespace\ClassA,
    SubnamespaceOne\ClassB,
    ClassZ,
};
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#3-declare-statements-namespace-and-import-statements)

* Right:

```php
use PHPLab\StandardPSR12\{
    HtmlDoc,
    HtmlDocAuthor,
    Language\EngGBLangTrait
};
```

```php
use PHPLab\{
    StandardPSR12\HtmlDoc,
    StandardPSR12\HtmlDocAuthor
};

use PHPLab\StandardPSR12\Language\EngGBLangTrait;
```

* Wrong:

```php
use PHPLab\{
    StandardPSR12\HtmlDoc,
    StandardPSR12\HtmlDocAuthor,
    StandardPSR12\Language\EngGBLangTrait
};
```

## Keywords, types & predefined constants

##### ✤ Keywords case

**All PHP reserved keywords MUST be in `lower case`.**
[🔗](https://www.php-fig.org/psr/psr-12/#25-keywords-and-types)

**Any new keywords added to future PHP versions MUST be in lower case.**
[🔗](https://www.php-fig.org/psr/psr-12/#25-keywords-and-types)

The PHP constants `true`, `false`, and `null` should be in `lower case` too.

##### ✤ Types case

**All PHP reserved types MUST be in lower case.**
[🔗](https://www.php-fig.org/psr/psr-12/#25-keywords-and-types)

**Any new types added to future PHP versions MUST be in lower case.**
[🔗](https://www.php-fig.org/psr/psr-12/#25-keywords-and-types)

##### ✤ Types short/log forms

**Short form of type keywords MUST be used i.e. `bool` instead of `boolean`, `int` instead of `integer` etc.**
[🔗](https://www.php-fig.org/psr/psr-12/#25-keywords-and-types)

**`User.php`**

```php
class User
{
    public bool $registered = true;
    public int $level = 10;
}
```

## Operators

##### ✤ Multiple spaces around an operator

**When space is permitted around an operator, multiple spaces MAY be used for readability purposes.**
[🔗](https://www.php-fig.org/psr/psr-12/#6-operators)

```php
$this->email = 'author@'
    . self::EMAIL_DOMAIN;
```

### Unary operators

##### ✤ Space between the operator and operand in the increment & decrement operators

**The increment/decrement operators MUST NOT have any space between the operator and operand.**
[🔗](https://www.php-fig.org/psr/psr-12/#61-unary-operators)

```php
$this->level++;
```

##### ✤ Space within the parentheses in type casting operators

**Type casting operators MUST NOT have any space within the parentheses.**
[🔗](https://www.php-fig.org/psr/psr-12/#6-operators)

```php
$isWorking = (bool) $this->level;
```

### Binary operators

##### ✤ Spaces around the binary arithmetic, comparison, assignment, bitwise, logical, string, and type operators

**All binary arithmetic, comparison, assignment, bitwise, logical, string, and type operators MUST be preceded and followed by at least one space.**
[🔗](https://www.php-fig.org/psr/psr-12/#62-binary-operators)

```php
$this->email = 'author@' . self::EMAIL_DOMAIN;
```

### Ternary operators

##### ✤ Spaces around the characters of the conditional operator

**The conditional operator, also known simply as the ternary operator, MUST be preceded and followed by at least one space around both the `?` and `:` characters.**
[🔗](https://www.php-fig.org/psr/psr-12/#63-ternary-operators)

```php
$label = empty($this->nickname) ? $this->firstName : $this->nickname;
```

##### ✤ Spaces around the characters of the conditional operator when the middle operand is omitted

**When the middle operand of the conditional operator is omitted, the operator MUST follow the same style rules as other binary comparison operators.**
[🔗](https://www.php-fig.org/psr/psr-12/#63-ternary-operators)

```php
$isActive = $this->isRegistered ?: (bool) $this->level;
```

## Control structures

##### ✤ Space after control structure keyword

**There MUST be one space after the control structure keyword.**
[🔗](https://www.php-fig.org/psr/psr-12/#5-control-structures)

##### ✤ Space after opening parethensis in control structure

**There MUST NOT be a space after the opening parenthesis.**
[🔗](https://www.php-fig.org/psr/psr-12/#5-control-structures)

##### ✤ Space before closing parethensis in control structure

**There MUST NOT be a space before the closing parenthesis.**
[🔗](https://www.php-fig.org/psr/psr-12/#5-control-structures)

##### ✤ Space between closing parethensis and opening brace

**There MUST be one space between the closing parenthesis and the opening brace.**
[🔗](https://www.php-fig.org/psr/psr-12/#5-control-structures)

##### ✤ Closing brace placement in control structure

**The closing brace MUST be on the next line after the body.**
[🔗](https://www.php-fig.org/psr/psr-12/#5-control-structures)

##### ✤ Control structure body indention

**The structure body MUST be indented once.**
[🔗](https://www.php-fig.org/psr/psr-12/#5-control-structures)

##### ✤ Control structure body placement

**The body MUST be on the next line after the opening brace.**
[🔗](https://www.php-fig.org/psr/psr-12/#5-control-structures)

##### ✤ Control structure body enclosed by braces to indicate control structure body regardless of the number of statements it contains

**The body of each structure MUST be enclosed by braces.**
[🔗](https://www.php-fig.org/psr/psr-12/#5-control-structures)

*This standardizes how the structures look and reduces the likelihood of introducing errors as new lines get added to the body.*
[🔗](https://www.php-fig.org/psr/psr-12/#5-control-structures)

```php
if (! $this->isRegistered) {
    $status = self::STATUS_HALTING;
} elseif ($this->level > 10) {
    $status = self::STATUS_INVOLVED;
} else {
    $status = self::STATUS_CERTAIN;
}
```

### Control structure `if` - `elseif` - `else`

An if structure looks like the following. Note the placement of parentheses, spaces, and braces; and that else and elseif are on the same line as the closing brace from the earlier body.

```php
<?php

if ($expr1) {
    // if body
} elseif ($expr2) {
    // elseif body
} else {
    // else body;
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#51-if-elseif-else)

```php
if (! $this->isRegistered) {
    $status = self::STATUS_HALTING;
} elseif ($this->level > 10) {
    $status = self::STATUS_INVOLVED;
} else {
    $status = self::STATUS_CERTAIN;
}
```

##### ✤ Keywords `else if` or keyword `elseif`

**The keyword `elseif` SHOULD be used instead of `else if` so that all control keywords look like single words.**
[🔗](https://www.php-fig.org/psr/psr-12/#51-if-elseif-else)

* Wrong:

```php
if (! $this->isRegistered) {
    $status = self::STATUS_HALTING;
} else if ($this->level > 10) {
    $status = self::STATUS_INVOLVED;
} else {
    $status = self::STATUS_CERTAIN;
}
```

* Right:

```php
if (! $this->isRegistered) {
    $status = self::STATUS_HALTING;
} elseif ($this->level > 10) {
    $status = self::STATUS_INVOLVED;
} else {
    $status = self::STATUS_CERTAIN;
}
```

##### ✤ Splitting expression in parentheses across multiple lines

**Expressions in parentheses MAY be split across multiple lines, where each subsequent line is indented at least once.**
[🔗](https://www.php-fig.org/psr/psr-12/#51-if-elseif-else)

##### ✤ First condition placement when expression is split across multiple lines

**When doing so, the first condition MUST be on the next line.**
[🔗](https://www.php-fig.org/psr/psr-12/#51-if-elseif-else)

##### ✤ Closing parenthesis and opening brace placement when expression is split across multiple lines

**The closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**
[🔗](https://www.php-fig.org/psr/psr-12/#51-if-elseif-else)

##### ✤ Boolean operators between conditions placement when expression is split across multiple lines

**Boolean operators between conditions MUST always be at the beginning or at the end of the line, not a mix of both.**
[🔗](https://www.php-fig.org/psr/psr-12/#51-if-elseif-else)

```php
<?php

if (
    $expr1
    && $expr2
) {
    // if body
} elseif (
    $expr3
    && $expr4
) {
    // elseif body
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#51-if-elseif-else)

```php
if (
    $this->isRegistered
    && $this->level > 10
) {
    $status = self::STATUS_INVOLVED;
}
```

### Control structure `switch` - `case`

```php
switch ($status) {
    case self::STATUS_HALTING:
        $description = "Started to use the application.";
        break;
    case self::STATUS_CERTAIN:
        $description = "Using the application.";
        break;
    case self::STATUS_INVOLVED:
        $description = "Engeged in using the application";
        break;
    default:
        $description = "";
        break;
}
```

##### ✤ Statement case indention

A switch structure looks like the following. Note the placement of parentheses, spaces, and braces.

```php
<?php

switch ($expr) {
    case 0:
        echo 'First case, with a break';
        break;
    case 1:
        echo 'Second case, which falls through';
        // no break
    case 2:
    case 3:
    case 4:
        echo 'Third case, return instead of break';
        return;
    default:
        echo 'Default case';
        break;
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#52-switch-case)

**The `case` statement MUST be indented once from `switch`.**
[🔗](https://www.php-fig.org/psr/psr-12/#52-switch-case)

##### ✤ Keyword break indention

**The `break` keyword (or other terminating keywords) MUST be indented at the same level as the `case` body.**
[🔗](https://www.php-fig.org/psr/psr-12/#52-switch-case)

##### ✤ Comment when fall-through is intentional in a non-empty case body

```php
switch ($status) {
    case self::STATUS_HALTING:
        $description = "Started to use the application.";
        break;
}
```

**There MUST be a comment such as `// no break` when fall-through is intentional in a non-empty case body.**
[🔗](https://www.php-fig.org/psr/psr-12/#52-switch-case)

```php
switch ($status) {
    case self::STATUS_HALTING:
        // the same as following;
    case self::STATUS_CERTAIN:
        $description = "Using the application.";
        break;
}
```

##### ✤ Splitting expression in parentheses across multiple lines

**Expressions in parentheses MAY be split across multiple lines, where each subsequent line is indented at least once.**
[🔗](https://www.php-fig.org/psr/psr-12/#52-switch-case)

##### ✤ First condition placement when expression is split across multiple lines

**When doing so, the first condition MUST be on the next line.**
[🔗](https://www.php-fig.org/psr/psr-12/#52-switch-case)

##### ✤ Closing parenthesis and opening brace placement when expression is split across multiple lines

**The closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**
[🔗](https://www.php-fig.org/psr/psr-12/#52-switch-case)

##### ✤ Boolean operators between conditions placement when expression is split across multiple lines

**Boolean operators between conditions MUST always be at the beginning or at the end of the line, not a mix of both.**
[🔗](https://www.php-fig.org/psr/psr-12/#52-switch-case)

```php
<?php

switch (
    $expr1
    && $expr2
) {
    // structure body
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#52-switch-case)

```php
switch (
    (bool) $status
    && $this->isRegistered
) {
}
```

### Control structure `while`, `do` - `while`

A while statement looks like the following. Note the placement of parentheses, spaces, and braces.

```php
<?php

while ($expr) {
    // structure body
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#53-while-do-while)

#### Control structure `while`

```php
while ($quantity > 0) {
    $visualisation .= '*';

    $quantity--;
}
```

##### ✤ Splitting expression in parentheses across multiple lines

**Expressions in parentheses MAY be split across multiple lines, where each subsequent line is indented at least once.**
[🔗](https://www.php-fig.org/psr/psr-12/#53-while-do-while)

##### ✤ First condition placement when expression is split across multiple lines

**When doing so, the first condition MUST be on the next line.**
[🔗](https://www.php-fig.org/psr/psr-12/#53-while-do-while)

##### ✤ Closing parenthesis and opening brace placement when expression is split across multiple lines

**The closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**
[🔗](https://www.php-fig.org/psr/psr-12/#53-while-do-while)

##### ✤ Boolean operators between conditions placement when expression is split across multiple lines

**Boolean operators between conditions MUST always be at the beginning or at the end of the line, not a mix of both.**
[🔗](https://www.php-fig.org/psr/psr-12/#53-while-do-while)

```php
<?php

while (
    $expr1
    && $expr2
) {
    // structure body
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#53-while-do-while)

```php
while (
    $quantity > 0
    && $this->isRegistered
) {
}
```

#### Control structure `do` - `while`

```php
do {
    $visualisation .= '#';

    $upgrade--;
} while ($upgrade > 0);

```

##### ✤ Splitting expression in parentheses across multiple lines

**Expressions in parentheses MAY be split across multiple lines, where each subsequent line is indented at least once.**
[🔗](https://www.php-fig.org/psr/psr-12/#53-while-do-while)

##### ✤ First condition placement when expression is split across multiple lines

**When doing so, the first expression MUST be on the next line.**
[🔗](https://www.php-fig.org/psr/psr-12/#53-while-do-while)

##### ✤ Closing parenthesis and opening brace placement when expression is split across multiple lines

**The closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**
[🔗](https://www.php-fig.org/psr/psr-12/#53-while-do-while)

```php
<?php

do {
    // structure body;
} while ($expr);
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#53-while-do-while)

```php
do {
} while (
    $upgrade > 0
    && $this->isRegistered
);

```

### Control structure `for`

A for statement looks like the following. Note the placement of parentheses, spaces, and braces.

```php
<?php

for ($i = 0; $i < 10; $i++) {
    // for body
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#54-for)

```php
for ($i = 1; $i <= $skillsCount; $i++) {
    $visualisation .= $i . '. ' . $skills[$i - 1] . ', ';
}
```

##### ✤ Splitting expression in parentheses across multiple lines

**Expressions in parentheses MAY be split across multiple lines, where each subsequent line is indented at least once.**
[🔗](https://www.php-fig.org/psr/psr-12/#54-for)

##### ✤ First expression placement when expression is split across multiple lines

**When doing so, the first expression MUST be on the next line.**
[🔗](https://www.php-fig.org/psr/psr-12/#54-for)

##### ✤ Closing parenthesis and opening brace placement when expression is split across multiple lines

**The closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**
[🔗](https://www.php-fig.org/psr/psr-12/#54-for)

```php
<?php

for (
    $i = 0;
    $i < 10;
    $i++
) {
    // for body
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#54-for)

```php
for (
    $i = 1;
    $i <= $skillsCount;
    $i++) {
}
```

### Control structure `foreach`

A foreach statement looks like the following. Note the placement of parentheses, spaces, and braces.

```php
<?php

foreach ($iterable as $key => $value) {
    // foreach body
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#55-foreach)

```php
foreach ($this->skills as $skillCodename => $skill) {
    $skillPresentation($skillCodename, $skill);
}
```

## Closures & Functions

A function declaration looks like the following. Note the placement of parentheses, commas, spaces, and braces:

```php
<?php

function fooBarBaz($arg1, &$arg2, $arg3 = [])
{
    // function body
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#44-methods-and-functions)

```php
$skillPresentation = function ($skillCodename, $skill) use ($levelMarkChar, $newLineSeq) {
    print($skill['name'] . ': ' . $skill['level'] . $newLineSeq);
};
```

##### ✤ Space after `function` keyword in closure definition

**Closures MUST be declared with a space after the `function` keyword.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Space after function name in function definition

**Function names MUST NOT be declared with space after the method name.**
[🔗](https://www.php-fig.org/psr/psr-12/#44-methods-and-functions)

```php
function separate()
{
    print('<br>');
}
```

### Argument list

```php
<?php

namespace Vendor\Package;

class ClassName
{
    public function foo(int $arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

The following are examples of closures with and without argument lists and variable lists split across multiple lines.

```php
<?php

$longArgs_noVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) {
   // body
};

$noArgs_longVars = function () use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
   // body
};

$longArgs_longVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
   // body
};

$longArgs_shortVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) use ($var1) {
   // body
};

$shortArgs_longVars = function ($arg) use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
   // body
};
```

Note that the formatting rules also apply when the closure is used directly in a function or method call as an argument.

```php
<?php

$foo->bar(
    $arg1,
    function ($arg2) use ($var1) {
        // body
    },
    $arg3
);
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Space after opening parethensis of argument list in closure definition/call

**There MUST NOT be a space after the opening parenthesis of the argument list.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Space before closing parethensis of argument list in closure definition/call

**There MUST NOT be a space before the closing parenthesis of the argument.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Space before coma on argument list in closure definition/call

**In the argument list, there MUST NOT be a space before each comma.**
[🔗](https://www.php-fig.org/psr/psr-12/#44-methods-and-functions)

##### ✤ Space after coma on argument list in closure definition/call

**In the argument list, there MUST be one space after each comma.**
[🔗](https://www.php-fig.org/psr/psr-12/#44-methods-and-functions)

```php
<?php

bar();
$foo->bar($arg1);
Foo::bar($arg2, $arg3);
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#44-methods-and-functions)

`function ($skillCodename, $skill)`

##### ✤ Closure arguments with default values placement in closure definition/call

**Closure arguments with default values MUST go at the end of the argument list.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

`function ($skillCodename = 'programming', $skill = ['name' => 'Programming', 'level' => 3])`

##### ✤ List of function/closure arguments split acros multi lines in closure definition/call

**Argument lists MAY be split across multiple lines, where each subsequent line is indented once.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)
[🔗](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

##### ✤ Arguments placement on list of function/closure arguments split acros multi lines in closure definition/call

**When doing so, the first item in the list MUST be on the next line.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)
[🔗](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

```php
<?php

$foo->bar(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);
<?php

somefunction($foo, $bar, [
  // ...
], $baz);

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello ' . $app->escape($name);
});
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

##### ✤ Number of arguments per line on list of function/closure arguments split acros multi lines in closure definition/call

**There MUST be only one argument per line.**
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)
[🔗](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

##### ✤ Closing parenthesis and opening brace in closure with list of closure arguments split acros multi lines in closure definition/call

**When the argument list is split across multiple lines, the closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

```php
<?php

namespace Vendor\Package;

class ClassName
{
    public function aVeryLongMethodName(
        ClassTypeHint $arg1,
        &$arg2,
        array $arg3 = []
    ) {
        // method body
    }
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

```php
function (
    $skillCodename,
    $skill
) {
}
```

### Keyword `use`

##### ✤ Space before `use` keyword in closure definition

**Closures MUST be declared with a space before the `use` keyword.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Space after `use` keyword in closure definition

**Closures MUST be declared with a space after the `use` keyword.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Keyword `use` in closure declaration

**If the `use` keyword is present, the colon MUST follow the use list closing parentheses with no spaces between the two characters.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

### Variable list

The following are examples of closures with and without argument lists and variable lists split across multiple lines.

```php
<?php

$longArgs_noVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) {
   // body
};

$noArgs_longVars = function () use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
   // body
};

$longArgs_longVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
   // body
};

$longArgs_shortVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) use ($var1) {
   // body
};

$shortArgs_longVars = function ($arg) use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
   // body
};
```

Note that the formatting rules also apply when the closure is used directly in a function or method call as an argument.

```php
<?php

$foo->bar(
    $arg1,
    function ($arg2) use ($var1) {
        // body
    },
    $arg3
);
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Space after opening parethensis of variable list in closure definition/call

**There MUST NOT be a space after the opening parenthesis of the variable list.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Space before closing parethensis of variable list in closure definition/call

**There MUST NOT be a space before the closing parenthesis of the variable list.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Space before coma on variable list in closure definition/call

**In the variable list, there MUST NOT be a space before each comma.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Space after coma on variable list in closure definition/call

**In the variable list, there MUST be one space after each comma.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

`function ($skillCodename, $skill) use ($levelMarkChar, $newLineSeq)`

##### ✤ List of closure variables split acros multi lines in closure definition/call

**Variable lists MAY be split across multiple lines, where each subsequent line is indented once.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Variables placement in list of closure variables split acros multi lines in closure definition/call

**When doing so, the first item in the list MUST be on the next line.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Number of variables per line on list of closure variables split acros multi lines in closure definition/call

**There MUST be only one variable per line.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Closing parenthesis and opening brace in closure with list of closure variables split acros multi lines in closure definition/call

**When the ending list of variables is split across multiple lines, the closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

```php
function ($skillCodename, $skill) use (
    $levelMarkChar,
    $newLineSeq
) {
}
```

##### ✤ Space between method name and opening parenthesis in function call

**When making a function call, there MUST NOT be a space between the method or function name and the opening parenthesis.**
[🔗](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

```php
$skillPresentation($skillCodename, $skill);
```

### Braces

##### ✤ Opening brace placement in closure definition/call

**The opening brace MUST go on the same line.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

##### ✤ Closing brace placement in closure definition/call

**Closing brace MUST go on the next line following the body.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

```php
function ($skillCodename, $skill) use (
    $levelMarkChar,
    $newLineSeq
) {
}
```

### Keyword `return`

##### ✤ Return type declaration in closure definition

**If a return type is present, it MUST follow the same rules as with normal functions and methods.**
[🔗](https://www.php-fig.org/psr/psr-12/#7-closures)

`function ($skillCodename, $skill) use ($levelMarkChar, $newLineSeq): void`

## Classes

### Extending classes

##### ✤ Keyword `extends` placement in class definition

**The `extends` keyword MUST be declared on the same line as the class name.**
[🔗](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

```php
<?php

namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements \ArrayAccess, \Countable
{
    // constants, properties, methods
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

```php
class User extends Technician
{
}
```

##### ✤ List of extends split acros multi lines in class definition

**Lists of extends (in the case of interfaces) MAY be split across multiple lines, where each subsequent line is indented once.**
[🔗](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

**When doing so, the first item in the list MUST be on the next line, and there MUST be only one interface per line.**
[🔗](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

```php
<?php

namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements
    \ArrayAccess,
    \Countable,
    \Serializable
{
    // constants, properties, methods
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

```php
interface Evidentiable extends
    Presentable,
    Identifiable
{
}
```

### Implementing interfaces

```php
<?php

namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements \ArrayAccess, \Countable
{
    // constants, properties, methods
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

##### ✤ Keyword `implements` placement in class definition

**The `implements` keyword MUST be declared on the same line as the class name.**
[🔗](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

```php
<?php

namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements \ArrayAccess, \Countable
{
    // constants, properties, methods
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

```php
class Person implements Presentable
{
}
```

##### ✤ List of `implements` split acros multi lines in class definition

**Lists of implements MAY be split across multiple lines, where each subsequent line is indented once.**
[🔗](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

**When doing so, the first item in the list MUST be on the next line, and there MUST be only one interface per line.**
[🔗](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

```php
<?php

namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements
    \ArrayAccess,
    \Countable,
    \Serializable
{
    // constants, properties, methods
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

```php
class Person implements
    Presentable,
    Identifiable
{
}
```

##### ✤ Opening brace placement in class definition

**The opening brace for the class MUST go on its own line.**
[🔗](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

**Opening braces MUST be on their own line and MUST NOT be preceded or followed by a blank line.**
[🔗](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

##### ✤ Closing brace placement in class definition

**The closing brace for the class MUST go on the next line after the body.**
[🔗](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

**Closing braces MUST be on their own line and MUST NOT be preceded by a blank line.**
[🔗](https://www.php-fig.org/psr/psr-12/#41-extends-and-implements)

**Any closing brace MUST NOT be followed by any comment or statement on the same line.**
[🔗](https://www.php-fig.org/psr/psr-12/#4-classes-properties-and-methods)

```php
class Person
{
}
```

### Using traits

##### ✤ Keyword `use` placement in class definition

**The `use` keyword used inside the classes to implement traits MUST be declared on the next line after the opening brace.**
[🔗](https://www.php-fig.org/psr/psr-12/#42-using-traits)

```php
<?php

namespace Vendor\Package;

use Vendor\Package\FirstTrait;

class ClassName
{
    use FirstTrait;
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#42-using-traits)

```php
class Technician
{
    use Skilled;
}
```

##### ✤ Number of trait including per line in class definition

**Each individual trait that is imported into a class MUST be included one-per-line and each inclusion MUST have its own use import statement.**
[🔗](https://www.php-fig.org/psr/psr-12/#42-using-traits)

```php
<?php

namespace Vendor\Package;

use Vendor\Package\FirstTrait;
use Vendor\Package\SecondTrait;
use Vendor\Package\ThirdTrait;

class ClassName
{
    use FirstTrait;
    use SecondTrait;
    use ThirdTrait;
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#42-using-traits)

```php
class Technician extends Person
{
    use Educated;
    use Skilled;
}
```

##### ✤ Closing brace after the use import placement in class definition

**When the class has nothing after the use import statement, the class closing brace MUST be on the next line after the use import statement.**
[🔗](https://www.php-fig.org/psr/psr-12/#42-using-traits)

```php
<?php

namespace Vendor\Package;

use Vendor\Package\FirstTrait;

class ClassName
{
    use FirstTrait;
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#42-using-traits)

##### ✤ Blank line after the use import placement in class definition

**Otherwise, it MUST have a blank line after the use import statement.**
[🔗](https://www.php-fig.org/psr/psr-12/#42-using-traits)

```php
<?php

namespace Vendor\Package;

use Vendor\Package\FirstTrait;

class ClassName
{
    use FirstTrait;

    private $property;
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#42-using-traits)

```php
class Technician extends Person
{
    use Educated;
    use Skilled;

    public function isVirtual(): bool
    {
        $isVirtual = ! empty($this->educations) && ! empty($this->skills);

        return $isVirtual;
    }
}
```

##### ✤ Keywords `insteadof` and `as`

**When using the `insteadof` and `as` operators they must be in separated lines with indentations.**
[🔗](https://www.php-fig.org/psr/psr-12/#42-using-traits)

```php
<?php

class Talker
{
    use A;
    use B {
        A::smallTalk insteadof B;
    }
    use C {
        B::bigTalk insteadof C;
        C::mediumTalk as FooBar;
    }
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#42-using-traits)

```php
class Technician extends Person
{
    use Educated {
        Educated::isVirtual insteadof Skilled;
    }

    use Skilled {
        Skilled::isVirtual as isSkilled;
    }
}
```

### Keywords `abstract`, `final` & `static`

```php
<?php

namespace Vendor\Package;

abstract class ClassName
{
    protected static $foo;

    abstract protected function zim();

    final public static function bar()
    {
        // method body
    }
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#46-abstract-final-and-static)

##### ✤ Keyword `abstract` placement

**When present, the `abstract` declarations MUST precede the visibility declaration.**
[🔗](https://www.php-fig.org/psr/psr-12/#46-abstract-final-and-static)

`abstract protected function hasMiddleName(): bool;`

##### ✤ Keyword `final` placement

**When present, the `final` declarations MUST precede the visibility declaration.**
[🔗](https://www.php-fig.org/psr/psr-12/#46-abstract-final-and-static)

`final public function isVirtual(): bool`

##### ✤ Keyword `static` placement

**When present, the `static` declaration MUST come after the visibility declaration.**
[🔗](https://www.php-fig.org/psr/psr-12/#46-abstract-final-and-static)

`public static function getCount(): int`

### Class constants

##### ✤ Class constant visiblity declaration

**Visibility MUST be declared on all constants if your project PHP minimum version supports constant visibilities (PHP 7.1 or later).**
[🔗](https://www.php-fig.org/psr/psr-12/#43-properties-and-constants)

```php
public const STATUS_HALTING = 'halting';
public const STATUS_CERTAIN = 'certain';
public const STATUS_INVOLVED = 'involved';
```

### Class properties

##### ✤ Property visiblity declaration

A property declaration looks like the following:

```php
<?php

namespace Vendor\Package;

class ClassName
{
    public $foo = null;
    public static int $bar = 0;
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#43-properties-and-constants)

**Visibility MUST be declared on all properties.**
[🔗](https://www.php-fig.org/psr/psr-12/#43-properties-and-constants)

```php
private static $count;
protected $isRegistered = false;
public $level = 0;
```

##### ✤ Single underscore prefix in property names for indication of non-public visibility

**Property names MUST NOT be prefixed with a single underscore to indicate protected or private visibility.**
[🔗](https://www.php-fig.org/psr/psr-12/#43-properties-and-constants)

**That is, an underscore prefix explicitly has no meaning.**
[🔗](https://www.php-fig.org/psr/psr-12/#43-properties-and-constants)

* Wrong:

```php
private static $_count = 0;
protected $_isRegistered = false;
public $level = 0;
```

* Right:

```php
private static $count = 0;
protected $isRegistered = false;
public $level = 0;
```

##### ✤ Keyword `var` (used to declare property)

**The `var` keyword MUST NOT be used to declare a property.**
[🔗](https://www.php-fig.org/psr/psr-12/#43-properties-and-constants)

* Wrong:

```php
var static $count = 0;
var $isRegistered = false;
var $level = 0;
```

* Right:

```php
private static $count;
protected $isRegistered = false;
public $level = 0;
```

##### ✤ Property type declaration

**There MUST be a space between type declaration and property name.**
[🔗](https://www.php-fig.org/psr/psr-12/#43-properties-and-constants)

```php
private static int $count = 0;
protected bool $isRegistered = false;
public int $level = 0;
```

##### ✤ Property declarations per statement

**There MUST NOT be more than one property declared per statement.**
[🔗](https://www.php-fig.org/psr/psr-12/#43-properties-and-constants)

* Wrong:

```php
public int $level = 0, $score = 5;
```

* Right:

```php
public int $level = 0;
public int $score = 5;
```

### Class methods

A method declaration looks like the following. Note the placement of parentheses, commas, spaces, and braces:

```php
<?php

namespace Vendor\Package;

class ClassName
{
    public function fooBarBaz($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#44-methods-and-functions)

##### ✤ Single underscore prefix in method names for indication of non-public visibility

**Method names MUST NOT be prefixed with a single underscore to indicate protected or private visibility.**
[🔗](https://www.php-fig.org/psr/psr-12/#44-methods-and-functions)

**That is, an underscore prefix explicitly has no meaning.**
[🔗](https://www.php-fig.org/psr/psr-12/#44-methods-and-functions)

* Wrong:

```php
protected function _hasMiddleName()
{
    return false;
}
```

* Right:

```php
protected function hasMiddleName()
{
    return false;
}
```

##### ✤ Method visiblity declaration

**Visibility MUST be declared on all methods.**
[🔗](https://www.php-fig.org/psr/psr-12/#44-methods-and-functions)

```php
abstract protected function hasMiddleName();

public function getName()
{
    $name = $firstName
        . $this->hasMiddleName() ? $this->middleName : ' '
        . $lastName;

    return $name;
}

public function getPesel()
{
    return $this->pesel;
}
```

##### ✤ Space after method name in method definition

**Method names MUST NOT be declared with space after the method name.**
[🔗](https://www.php-fig.org/psr/psr-12/#44-methods-and-functions)

`public function getPesel()`

##### ✤ Space after opening parethensis of argument list in method definition/call

**There MUST NOT be a space after the opening parenthesis.**
[🔗](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

##### ✤ Space before closing parethensis of argument list in method definition/call

**There MUST NOT be a space before the closing parenthesis.**
[🔗](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

##### ✤ Space before coma on argument list in method definition/call

**In the argument list, there MUST NOT be a space before each comma.**
[🔗](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

##### ✤ Space after coma on argument list in method definition/call

**In the argument list, there MUST be one space after each comma.**
[🔗](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

```php
<?php

bar();
$foo->bar($arg1);
Foo::bar($arg2, $arg3);
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

`public function setName($firstName, $middleName, $lastName)`

##### ✤ List of method arguments with reference operator

**When using the reference operator & before an argument, there MUST NOT be a space after it.**
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

`public function setAuthor(HTMLDocAuthor &$htmlDocAuthor)`

##### ✤ List of method arguments with variadic three dot operator

**There MUST NOT be a space between the variadic three dot operator and the argument name.**
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

```php
public function process(string $algorithm, ...$parts)
{
    // processing
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

`public function addEducations(...$educations)`

##### ✤ List of method arguments with reference and variadic three dot operators

**When combining both the reference operator and the variadic three dot operator, there MUST NOT be any space between the two of them.**
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

```php
public function process(string $algorithm, &...$parts)
{
    // processing
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

##### ✤ Method arguments with default values placement

**Method and function arguments with default values MUST go at the end of the argument list.**
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

```php
<?php

namespace Vendor\Package;

class ClassName
{
    public function foo(int $arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

`public function setName($firstName, $lastName, $middleName = '')`

##### ✤ List of method arguments split acros multi lines in method definition/call

**Argument lists MAY be split across multiple lines, where each subsequent line is indented once.**
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

##### ✤ Arguments placement on list of method arguments split acros multi lines in method definition/call

**When doing so, the first item in the list MUST be on the next line, and there MUST be only one argument per line.**
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

##### ✤ Number of arguments per line on list of method arguments split acros multi lines in method definition/call

**There MUST be only one argument per line.**
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

##### ✤ Closing parenthesis and opening brace in method with list of method arguments split acros multi lines in method definition

**When the argument list is split across multiple lines, the closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

```php
<?php

namespace Vendor\Package;

class ClassName
{
    public function aVeryLongMethodName(
        ClassTypeHint $arg1,
        &$arg2,
        array $arg3 = []
    ) {
        // method body
    }
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

```php
public function setName(
    $firstName,
    $lastName,
    $middleName = '') {
}
```

##### ✤ Single argument being split across multiple lines in method call

**A single argument being split across multiple lines (as might be the case with an anonymous function or array) does not constitute splitting the argument list itself.**
[🔗](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

```php
<?php

$foo->bar(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);
```

```php
<?php

somefunction($foo, $bar, [
  // ...
], $baz);

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello ' . $app->escape($name);
});
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

```php
<?php

$foo->bar(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);
```

```php
<?php

somefunction($foo, $bar, [
  // ...
], $baz);

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello ' . $app->escape($name);
});
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

##### ✤ Return type declaration in method definition

**When you have a return type declaration present, there MUST be one space after the colon followed by the type declaration. The colon and declaration MUST be on the same line as the argument list closing parenthesis with no spaces between the two characters.**
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

```php
<?php

declare(strict_types=1);

namespace Vendor\Package;

class ReturnTypeVariations
{
    public function functionName(int $arg1, $arg2): string
    {
        return 'foo';
    }

    public function anotherFunction(
        string $foo,
        string $bar,
        int $baz
    ): string {
        return 'foo';
    }
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

`public function getName(): string`

##### ✤ Return type declaration with nullable type in method definition

**In nullable type declarations, there MUST NOT be a space between the question mark and the type.**
[🔗](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

```php
<?php

declare(strict_types=1);

namespace Vendor\Package;

class ReturnTypeVariations
{
    public function functionName(?string $arg1, ?int &$arg2): ?string
    {
        return 'foo';
    }
}
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#45-method-and-function-arguments)

`public function getPesel(): ?int`

##### ✤ Opening brace placement in method definition

**The opening brace MUST go on its own line.**
[🔗](https://www.php-fig.org/psr/psr-12/#44-methods-and-functions)

##### ✤ Closing brace placement in method definition

**The closing brace MUST go on the next line following the body.**
[🔗](https://www.php-fig.org/psr/psr-12/#44-methods-and-functions)

##### ✤ Comments or statements following closing brace in method definition

**Any closing brace MUST NOT be followed by any comment or statement on the same line.**
[🔗](https://www.php-fig.org/psr/psr-12/#4-classes-properties-and-methods)

```php
public function getName(): string
{
}
```

##### ✤ Space between method name and opening parenthesis in method call

**When making a method call, there MUST NOT be a space between the method or function name and the opening parenthesis.**
[🔗](https://www.php-fig.org/psr/psr-12/#47-method-and-function-calls)

```php
$htmlDoc->setAuthor($htmlDocAuthor);
```

### Class instantiating

##### ✤ Parentheses in class instantiating

**When instantiating a new class, parentheses MUST always be present even when there are no arguments passed to the constructor.**
[🔗](https://www.php-fig.org/psr/psr-12/#4-classes-properties-and-methods)

```php
new Foo();
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#4-classes-properties-and-methods)

```php
$user = new User();
```

### Anonymous classes

Anonymous Classes MUST follow the same guidelines and principles as closures in the above section.

```php
<?php

$instance = new class {};
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#8-anonymous-classes)

##### ✤ Opening brace, class keyword and list of implements placement

**The opening brace MAY be on the same line as the class keyword so long as the list of implements interfaces does not wrap. If the list of interfaces wraps, the brace MUST be placed on the line immediately following the last interface.**
[🔗](https://www.php-fig.org/psr/psr-12/#8-anonymous-classes)

```php
<?php

// Brace on the same line
$instance = new class extends \Foo implements \HandleableInterface {
    // Class content
};

// Brace on the next line
$instance = new class extends \Foo implements
    \ArrayAccess,
    \Countable,
    \Serializable
{
    // Class content
};
```

-- [PSR Documentation](https://www.php-fig.org/psr/psr-12/#8-anonymous-classes)

```php
$human = new class {};
```

```php
$human = new class implements
    Identifiable,
    Presentable
{
};
```
