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
        $nextNode = $curNode->next; 
        $curNode->next = $preNode;
        $preNode = $curNode;
        $curNode = $nextNode;
    }
    $headNode->next = $preNode;
    return true;
}

/**
 *判断是否有环
 */
function checkCircle($list) {
    if($list == null || $list->head == null || $list->head->next == null) {
        return false;
    }
    $slow = $list->head->next;
    $fast = $list->head->next;
    while($fast != null && $fast->next != null) {
        $fast = $fast->next->next;
        $slow = $slow->next;
        if($fast == $slow) {
            return true;
        }
    }
    return false;
}

/**
 *判断回文
 */
function checkHuiwen($list) {
    if($list->length <= 1) {
        return true;
    }

}

//======================TEST================================
$list = new SingleLinkedList();
$list->insertFoot(1);
$list->insertFoot(2);
$list->insertFoot(3);
$list->insertFoot(4);
$list->insertFoot(5);
//反转链表
reverse($list);
//制造一个有环链表
$curNode = $list->head->next;
while($curNode->next != null) {
    $curNode = $curNode->next;
}
$curNode->next = $list->head->next;
//判断链表是否有环
var_dump(checkCircle($list));
