<?PHP

/**
 * A simple dummy test.
 *
 * @author Kapil Sharma
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