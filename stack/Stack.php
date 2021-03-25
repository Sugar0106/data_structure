<?php
require_once "/root/data_struct/linkedList/SingleLinkedList.php";

class Stack{

    private $head;

    private $length;

    public function __construct() {
        $this->head = new SingleLinkedListNode();
        $this->length = 0; 
    }
    
    /**
     *出栈
     */
    public function pop() {
        if($this->length == 0) {
            return false;
        }
        $this->head->next = $this->head->next->next;
        $this->length--; 
        return true;
    }


    public function push($data) {
        
        $newNode = new SingleLinkedListNode($data);
        $newNode->next = $this->head->next;
        $this->head->next = $newNode;
        $this->length++;
        return true;
    }

    /**
     *四则远算
     */
    public function exparrsion($str) {
        $str = str_replace(" ", "", $str); 
        $arr = preg_split("/([\+\-\*\/\(\)])/", $str, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        $numStack = [];
        $operStack = [];
        for($i = 0; $i < count($arr); $i++) {
            if(ord($arr[$i]) >= 48 && ord($arr[$i]) <= 57) {
                array_push($numStack, $arr[$i]);
                continue;
            } 
            switch($arr[$i]) {
            case '+':
            case '-':
                $arrLen = count($operStack);
                while($operStack[$arrLen-1] === '*' || $operStack[$arrLen-1] === '/' || $operStack[$arrLen-1] === '-') {
                    $this->compute($numStack, $operStack);
                    $arrLen--;
                }
                array_push($operStack, $arr[$i]);
                break;
            case '*':
                $arrLen = count($operStack);
                while ($operStack[$arrLen-1] === '/'){
                    $this->compute($numStack, $operStack);
                    $arrLen--;
                }
                array_push($operStack, $arr[$i]);
                break;

            case '/':
            case '(':
                array_push($operStack, $arr[$i]);
                break;
            case ')':
                $arrLen = count($operStack);
                while ($operStack[$arrLen-1] !== '('){
                    $this->compute($numStack, $operStack);
                    $arrLen--;
                }
                array_pop($operStack);
                break;
            default:
                throw new \Exception("不支持的运算符", 1);
                break;
            }
        }

        $arrLen = count($operStack);
        while ($operStack[$arrLen-1] !== NULL){  
            $this->compute($numStack, $operStack);
            $arrLen--;
        }
        echo array_pop($numStack);
    }

    //数字栈长度减一，运算符栈长度减一
    function compute(&$numStack, &$operStack){
        $num = array_pop($numStack);
        switch (array_pop($operStack)) {
        case '*':
            array_push($numStack, array_pop($numStack) * $num);
            break;
        case '/':
            array_push($numStack, array_pop($numStack) / $num);
            break;
        case '+':
            array_push($numStack, array_pop($numStack) + $num);
            break;
        case '-':
            array_push($numStack, array_pop($numStack) - $num);
            break;
        case '(':
            throw new \Exception("不匹配的(", 2);
            break;
        }
    }

}

$stack = new Stack();
$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->pop();
//var_dump($stack);
$stack->exparrsion("1+2*3/(5-3)");

