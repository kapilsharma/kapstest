<?PHP

/**
 * A simple dummy test.
 */
class test1 extends PHPUnit_Framework_TestCase
{
    /**
     * First test
     * @group all
     * @group dummy
     */
    function testDummy1()
    {
        $this->assertEquals(3,3);
    }
}