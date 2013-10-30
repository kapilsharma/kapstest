<?PHP

/**
 * Dependency test
 *
 * @author kapilsharma
 * @group all
 * @group dependency
 * @group array
 */
class DependencyTest extends PHPUnit_Framework_TestCase
{

    /**
     * Simple method initiating array and testing array is empty
     * @group array_empty
     * $group array_push
     * @group array_pop
     */ 
    public function testArrayEmpty()
    {
        $stack = array();

        $this->assertTrue(empty($stack));

        return $stack;
    }

    /**
     * Test to push data in array.
     * @group array_push
     * @depends testArrayEmpty
     */
    public function testPush($array)
    {
        array_push($array, 'foo');

        $this->assertFalse(empty($array));

        return $array;
    }

    /**
     * Test to pop data
     * @group array_pop
     * @depends testPush
     */
    public function testPop($array)
    {
        $this->assertFalse(empty($array));

        $data = array_pop($array);

        $this->assertEquals('foo', $data);
        $this->assertTrue(empty($stack));
    }

    /**
     * Test to puch data in array.
     * @group array_push
     * @depends testArrayEmpty
     */
    public function testPush2($array)
    {
        array_push($array, 'foo');

        $this->assertFalse(empty($array));

        return $array;
    }

    /**
     * Test to pop data
     * @group array_pop
     * @depends testPush2
     */
    public function testPop2($array)
    {
        $this->assertFalse(empty($array));

        $data = array_pop($array);

        $this->assertEquals('foo', $data);
        $this->assertTrue(empty($stack));
    }

}