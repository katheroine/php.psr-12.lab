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
