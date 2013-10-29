<?PHP
class test1 extends PHPUnit_Framework_TestCase
{
    /**
     * First test
     * @group all
     * @group test1
     */
    function testDummy1()
    {
        $this->assertEquals(3,3);
    }
}