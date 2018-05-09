<?php
/**
 * Linked List Practices
 *
 * @author Timandes White
 */

class SingleLinkedListWrapper extends SingleLinkedList
{
    public function makeRing($idx)
    {
        $item = $this->findItem($idx);
        if (!$item)
            return;

        $lastItem = $this->findItem(-1);
        if (!$lastItem)
            return;

        $lastItem->next = $item;
    }
}

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

    public function testFindInRing()
    {
        $list = new SingleLinkedListWrapper();
        for ($i=0; $i<100; $i++)
            $list->add($i);
        $list->makeRing(80);
        $expected = 88;
        $actual = $list->find(88);
        $this->assertEquals($expected, $actual);
    }
}