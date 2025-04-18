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
