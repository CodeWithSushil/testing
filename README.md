# Testing

![Tests](https://github.com/CodeWithSushil/testing/actions/workflows/tests.yml/badge.svg)
![Issues](https://img.shields.io/github/issues/CodeWithSushil/testing)
![License](https://img.shields.io/github/license/CodeWithSushil/testing)
![License](https://img.shields.io/github/license/Ashishkumbhar01/supabase-php?style=for-the-badge)

this is a phpunit testing tutorial

## Example:
* ./src/Calculator.php

```php
<?php declare(strict_types=1);
namespace App;

class Calculator
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }
    
    public function divide(int $a, int $b): float
    {
        if ($b === 0) {
            throw new \InvalidArgumentException("Division by zero.");
        }
        
        return $a / $b;
    }
}
```

* ./tests/CalculatorTest.php

```php
<?php declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Calculator;

#[CoversClass(Calculator::class)]
class CalculatorTest extends TestCase
{
    private Calculator $calc;
    protected function setUp(): void
    {
        $this->calc = new Calculator();
    }
    
    #[Test]
    public function it_adds_two_numbers(): void
    {
        $this->assertSame(4, $this->calc->add(2, 2));
    }
    
    #[Test]
    public function it_divides_two_numbers(): void
    {
        $this->assertSame(2.0, $this->calc->divide(4, 2));
    }
    
    #[Test]
    public function it_throws_exception_on_division_by_zero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calc->divide(4, 0);
    }
}
```

* ./phpunit.xml

```xml
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="vendor/phpunit/phpunit/phpunit.xsd"
         bootstrap="vendor/autoload.php"
         cacheDirectory=".phpunit.cache"
         executionOrder="depends,defects"
         requireCoverageMetadata="true"
         beStrictAboutCoverageMetadata="true"
         beStrictAboutOutputDuringTests="true"
         displayDetailsOnPhpunitDeprecations="true"
         failOnPhpunitDeprecation="true"
         failOnRisky="true"
         failOnWarning="true"
         colors="true">
    <testsuites>
        <testsuite name="default">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
    
    <source ignoreIndirectDeprecations="true"
            restrictNotices="true"
            restrictWarnings="true">
        <include>
            <directory>src</directory>
        </include>
    </source>
</phpunit>
```

### Run Test
```bash
./vendor/bin/phpunit
```
or run `composer test` command

* ./composer.json config

```json
{
    "require-dev": {
        "phpunit/phpunit": "^12.1"
    },    
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/"
        }
    },    
    "scripts": {
        "test": "phpunit"
    }
}
```
