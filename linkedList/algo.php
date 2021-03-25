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
    $preNode = $nextNode = null;
    $fast = $slow = $list->head->next;//快慢指针
    while($fast != null && $fast->next != null) {
        $fast = $fast->next->next;
        //对慢的进行翻转
        $nextNode = $slow->next;
        $slow->next = $preNode;
        $preNode = $slow;
        $slow = $nextNode;
    }
    if($fast != null) {
        $slow = $slow->next;
    }
    while($slow != null) {
        if($slow->data !== $preNode->data) {
            return false;
        }
        $slow = $slow->next;
        $preNode = $preNode->next;
    }
    return true;
}

/**
 *合并两个有序链表
 */
function mergeSortedList($listA, $listB) {
    if($listA == null && $listB == null) {
        return false;
    }
    $pListA = $listA->head->next;//listA 第一个节点
    $pListB = $listB->head->next;//listB 第一个节点
    $newList = new SingleLinkedList();
    $newHead = $newList->head;
    while($pListA != null && $pListB != null) {
        if($pListA->data <= $pListB->data) {
            $newRootNode->next = $pListA;
            $pListA = $pListA->next;
        } else {
            $newRootNode->next = $pListB;
            $pListB = $pListB->next;
        }
        $newRootNode = $newRootNode->next;
        $newList->length++;
    }
    if($pListA != null) {
        $newRootNode->next = $pListA;
        $newList->length++;
    }
    if($pListB != null) {
        $newRootNode->next = $pListB;
        $newList->length++;
    }
    return $newList;
}

/**
 *寻找中间节点
 */
function findMiddle($list) {
    if($list == null || $list->head == null || $list->head->next == null) {
        return false;
    }
    $slow = $fast = $list->head->next;
    while($fast != null && $fast->next != null) {
        $fast = $fast->next->next;
        $slow = $slow->next;
    }
    return $slow;
}

/**
 *反转部分
 */
function reverseBetween($head, $m, $n) {
    $du = new SingleLinkedListNode(0);
    $du->next = $head;
    $pre = $du;
    for($i = 0; $i < $m-1; $i++) {
        $pre = $pre->next;
    }
    //反转区第一个节点
    $start = $pre->next;
    $tail = $start->next;
    for($i = 0; $i < $n-$m; $i++) {
        $next = $start->next;
        $start->next = $next->next;
        $tail->next = $pre->next;
        $pre->next = $tail;
        $tail = $start->next;
    }
    var_dump($du->next);exit;
    return $du->next;
}

//======================TEST================================
$list = new SingleLinkedList();
$list1 = new SingleLinkedList();
$list->insertFoot(1);
$list->insertFoot(2);
$list->insertFoot(3);
$list->insertFoot(4);
$list->insertFoot(5);
$list->insertFoot(6);
reverseBetween($list->head->next, 3, 5);exit;
var_dump(findMiddle($list));exit;
$newList = mergeSortedList($list, $list1);
var_dump($newList);exit;
$check = checkHuiwen($list);
var_dump($check);exit;
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
