<?php
/**
 * Linked List Practices
 *
 * @author Timandes White
 */

/**
 * Single Linked List Item
 */
class SingleLinkedListItem
{
    public $data = null;
    public $next = null;
}

/**
 * Single Linked List
 */
class SingleLinkedList
{
    private $head = null;

    public function add($data)
    {
        $item = new SingleLinkedListItem();
        $item->data = $data;

        if ($this->head) {
            $tail = $this->findItem(-1);
            $tail->next = $item;
        } else
            $this->head = $item;
    }

    public function delete($idx)
    {
        if ($idx == 0) {
            if ($this->head)
                $this->head = $this->head->next;
        } else {
            $parent = $this->findItem($idx - 1);
            if ($parent) {
                $item = $parent->next;
                if ($item)
                    $parent->next = $item->next;
            }
        }
    }

    public function find($idx)
    {
        $item = $this->findItem($idx);
        return ($item?$item->data:null);
    }

    private function findItem($idx)
    {
        $p = $q = null;
        if ($idx >= 0) {// Positive index
            $p = $this->head;
            $i = 0;
            while ($p) {
                if ($i == $idx)
                    return $p;

                $p = $p->next;
                ++$i;
            }

            return null;
        } else {// Negative index
            $positiveIdx = abs($idx);
            $p = $this->head;
            $q = null;
            $i = 0;
            while ($p) {
                $p = $p->next;
                ++$i;
                if ($i == $positiveIdx)
                    $q = $this->head;
                else if($i > $positiveIdx)
                    $q = $q->next;
            }
            return $q;
        }
    }
}
