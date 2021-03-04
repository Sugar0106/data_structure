<?php

/**
 *节点对象
 */
class SingleLinkedListNode {

    public $data;

    public $next;

    public function __construct($data = null) {
        $this->data = $data;
        $this->next = null;
    }
}

/**
 *链表对象
 */
class SingleLinkedList {
    public $head;
    public $length;

    /**
     *初始化一个链表
     */
    public function __construct($head = null) {
        if($head == null) {
            $this->head = new SingleLinkedListNode();
        } else {
            $this->head = $head;
        }
        $this->length = 0;
    }



    /**
     * 头插法
     * @param  data  插入的新数据
     */
    public function insertHead($data) {
        if($this->head == null) {
            return false;
        }
        $curNode = $this->head; 
        $newNode = new SingleLinkedListNode($data);
        $nextNode = $curNode->next;
        $curNode->next = $newNode;
        $newNode->next = $nextNode;
        $this->length++;
        return true; 
    }

    /**
     *尾插法
     *@param  data 插入的新数据
     */
    public function insertFoot($data) {
        if($this->head == null) {
            return false;
        }
        $curNode = $this->head; 
        while($curNode->next != null) {
            $curNode = $curNode->next; 
        }
        $newNode = new SingleLinkedListNode($data);
        $curNode->next = $newNode;
        $this->length++;
        return true;
    }

    /**
     *在某个节点后插入数据
     */
    public function insertAfterData($item, $data) {
        //空链表判断
        if($this->head == null) {
            return false;
        } 
        //查找前一个节点
        $curNode = $this->head;
        while($curNode != null) {
            if($curNode->data == $item) {
                $flag = true;
                break;
            } 
            $curNode = $curNode->next;
        }
        if($flag) {
            $newNode = new SingleLinkedListNode($data);
            $nextNode = $curNode->next;
            $curNode->next = $newNode;
            $newNode->next = $nextNode; 
        } else {
            return false;
        }
        $this->length++;
        return true;
    }


    /**
     *删除某个节点
     */
    public function deleteData($data) {
        //空链表判断
        if($this->head == null) {
            return false;
        } 
        //找到该节点前置节点
        $curNode = $this->head;
        while($curNode->next != null) {
            if($curNode->next->data == $data) {
                $flag = true;
                break;
            }
            $curNode = $curNode->next;
        }
        if($flag) {
            $curNode->next = $curNode->next->next;
        } else {
            return false;
        }
        $this->length--;
        return true;
    }

    /**
     *查找某个节点
     */
    public function findData($data) {
        //空链表判断
        if($this->head == null) {
            return false;
        } 
        $curNode = $this->head;
        while($curNode != null) {
            if($curNode->data == $data) {
                return true;
            }
            $curNode = $curNode->next;
        }
        return false;
    }
}

// $list = new SingleLinkedList();
// $res1 = $list->insertHead(1);
// $res2 = $list->insertHead(2);
// $res3 = $list->insertHead(3);
// $res4 = $list->insertHead(4);
// $res5 = $list->insertFoot(5);
// $res6 = $list->insertFoot(6);
// $res7 = $list->insertFoot(7);
// $res8 = $list->insertAfterData(7,8);
// $res9 = $list->insertAfterData(7,7.5);
// $res10 = $list->findData(8);
// $res11 = $list->findData(7.5);
// $res12 = $list->findData(10);
// $res13 = $list->deleteData(7.5);
// $res14 = $list->deleteData(8);
// $res15 = $list->deleteData(10);
// var_dump($res1, $res2, $res3, $res4, $res5, $res6, $res7, $res8, $res9, $res10, $res11, $res12, $res13, $res14, $res15, $list);exit;
