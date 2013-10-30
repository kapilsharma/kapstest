<?PHP

require_once("../src/Calculator.php");

class CalculatorTest extends PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        $this->calculator = new Calculator();
    }

    public function addDataProvider()
    {
        return array(
                    array(2, 3, 5),
                    array(0, 1, 1),
                    array(2, 10, 12)
                );
    }

    public function subtractDataProvider()
    {
        return array(
                    array(5, 3, 2),
                    array(0, 1, -1),
                    array(2, 10, -8)
                );
    }

    public function multiplyDataProvider()
    {
        return array(
                    array(3, 3, 9),
                    array(0, 1, 0),
                    array(15, 3, 45)
                );
    }

    public function divisionDataProvider()
    {
        return array(
                    array(6, 3, 2),
                    array(0, 1, 0),
                    array(40, 10, 4)
                );
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testAdd($a, $b, $c)
    {
        $sum = $this->calculator->add($a, $b);

        $this->assertEquals($sum, $c);
    }

    /**
     * @dataProvider subtractDataProvider
     */
    public function testSubtract($a, $b, $c)
    {
        $diff = $this->calculator->subtract($a, $b);

        $this->assertEquals($diff, $c);
    }

    /**
     * @dataProvider multiplyDataProvider
     */
    public function testMultiply($a, $b, $c)
    {
        $product = $this->calculator->multiply($a, $b);

        $this->assertEquals($product, $c);
    }

    /**
     * @dataProvider divisionDataProvider
     */
    public function testDivid($a, $b, $c)
    {
        $division = $this->calculator->divid($a, $b);

        $this->assertEquals($division, $c);
    }

    /**
     * @expectedException Exception
     */
    public function testDividByZero()
    {
        $division = $this->calculator->divid(5, 0);
    }

}