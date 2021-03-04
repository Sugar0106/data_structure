<?php
require_once("/root/data_struct/linkedList/SingleLinkedList.php");
/**
 *链表反转
 */
function reverse($list) {
    if($list == null || $list->head == null || $list->head->next == null) {
        return false;
    }
    $headNode = $list->head;//记录头节点
    $preNode = $nextNode = null;
    $curNode = $list->head->next;
    $list->head->next = null;//断开头节点
    while($curNode != null) {
        var_dump($curNode);
        $nextNode = $curNode->next; 
        $curNode->next = $preNode;
        $preNode = $curNode;
        $curNode = $nextNode;
    }
    $headNode->next = $preNode;
    return true;
}

$list = new SingleLinkedList();
$list->insertFoot(1);
$list->insertFoot(2);
$list->insertFoot(3);
$list->insertFoot(4);
$list->insertFoot(5);
var_dump($list);
reverse($list);
var_dump($list);
