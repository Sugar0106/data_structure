<?php

class SingleLinkedListNode {
    public $data;
    public $next;
    /**
     *初始化一个节点
     */
    public function __construct($data = null) {
        $this->data = $data;
        $this->next = null;
    }
}

class SingleLinkedList {
    public $head;
    public $length;

    /**
     *初始化一个单向链表
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
     *链表尾添加节点
     */
    public function addNode($data) {
        $newNode = new SingleLinkedListNode($data);
        $current = $this->head;
        while($current->next != null) {
            $current = $current->next;
        }
        $current->next = $newNode;
        $this->length++;
        return true;
    }

    /**
     *在某个节点后添加节点
     */
    public function addNodeAfter($data, $new) {
        $newNode = new SingleLinkedListNode($new);
        $current = $this->head;
        while($current->data != $data) {
            $current = $current->next; 
        }
        $newNode->next = $current->next;
        $current->next = $newNode;
        $this->length++; 
    }

    /**
     *删除节点
     */
    public function deleteNode($data) {
        $current = $this->head; 
        while($current->next->data != $data && $current->next != null) {
            $current = $current->next;
        }
        if($current->next != null) {
            $current->next = $current->next->next; 
        }
        $this->length--;
    }

    /**
     *清空链表
     */
    public function clear() {
        $this->head = null;
    }

    /**
     *查找链表
     */
    public function find($data) {
        $current = $this->head;
        while($current->data != $data) {
            $current = $current->next;
        }
        return $current;
    }

    /**
     *展示链表节点
     */
    public function display() {
        $current = $this->head;
        if($current->next == null) {
            echo "链表为空";
            return;
        } 
        while($current->next != null) {
            echo $current->next->data."\n";
            $current = $current->next;
        }
    }


}

$list = new SingleLinkedList();
$list->addNode(1);
$list->addNode(2);
$list->addNode(3);
$list->addNode(4);
$list->addNodeAfter(2, 2.5);
$list->deleteNode(2);
$list->display();
