<?PHP

/**
 * Testing DataProvider
 * 
 * @author kapilsharma
 * @group all
 * @group data_provider
 */
class DataProviderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    function testSum($a, $b, $c)
    {
        $this->assertEquals($c, $a + $b);
    }

    public function dataProvider()
    {
        return array(
                    array(0, 0, 0),
                    array(1, 2, 3),
                    array(3, 5, 8),
                    array(2, 3, 6) //failing case
                );
    }
}