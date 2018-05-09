<?php
/**
 * Linked List Practices
 *
 * @author Timandes White
 */

/**
 * Single Linked List Test
 */
class SingleLinkedListTest extends PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $list = new SingleLinkedList();

        $expected = 1;
        $list->add($expected);
        $actual = $list->find(0);
        $this->assertEquals($expected, $actual);

        $expected = 2;
        $list->add($expected);
        $actual = $list->find(1);
        $this->assertEquals($expected, $actual);

        $expected = 3;
        $list->add($expected);
        $actual = $list->find(2);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete()
    {
        $list = new SingleLinkedList();
        foreach ([1, 2, 3] as $v)
            $list->add($v);
        $list->delete(1);
        $expected = 3;
        $actual = $list->find(1);
        $this->assertEquals($expected, $actual);

        $list = new SingleLinkedList();
        foreach ([1, 2, 3] as $v)
            $list->add($v);
        $list->delete(0);
        $expected = 2;
        $actual = $list->find(0);
        $this->assertEquals($expected, $actual);

        $list = new SingleLinkedList();
        foreach ([1, 2, 3] as $v)
            $list->add($v);
        $list->delete(2);
        $expected = null;
        $actual = $list->find(2);
        $this->assertEquals($expected, $actual);
    }

    public function testFind()
    {
        $list = new SingleLinkedList();
        foreach ([1, 2, 3] as $v)
            $list->add($v);
        $expected = 1;
        $actual = $list->find(0);
        $this->assertEquals($expected, $actual);

        $list = new SingleLinkedList();
        foreach ([1, 2, 3] as $v)
            $list->add($v);
        $expected = 2;
        $actual = $list->find(1);
        $this->assertEquals($expected, $actual);

        $list = new SingleLinkedList();
        foreach ([1, 2, 3] as $v)
            $list->add($v);
        $expected = 3;
        $actual = $list->find(-1);
        $this->assertEquals($expected, $actual);
    }
}