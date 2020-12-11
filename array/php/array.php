<?php
/**
 *数组数据结构php实现
 */
class myarray{
    private $length;
    private $capacity;
    private $data;
    public function __construct($capacity) {
        if($capacity <=0 ) {
            return null;
        }
        $this->length = 0;
        $this->capacity = $capacity;
        $this->data = array();
    }

    /**
     *校验数组是否已满
     */
    private function checkIfFull() {
        if($this->length >= $this->capacity) {
            return true;
        }
        return false;
    }

    /**
     *校验索引是否超出数组范围
     */
     private function checkOutOfRange($index) {
        if($index>=$this->length) {
            return true;
        }
        return false;
     }

    /**
     *数组中插入元素 复杂度O(n)
     */
    function insertItem($index, $value) {
        $index = intval($index);
        $value = intval($value);
        if($index < 0) {
            return 1;
        }
        if($this->checkIfFull()) {
            return 2;
        }
        for($i=$this->length-1; $i>=$index; $i--) {
            $this->data[$i+1] = $this->data[$i];
        } 
        $this->data[$index] = $value;
        $this->length++;
        return [$this->data, $this->length, $this->capacity];
    }

    /**
     *数组中删除元素 复杂度O(n)
     */
    function deleteItem($index) {
        $index = intval($index);
        if($index < 0){
            return 1;
        }
        if($this->checkOutOfRange($index)) {
            return 2;
        }
        $value = $this->data[$index];
        for($i = $index; $i<$this->length-1; $i++) {
            $this->data[$i]  = $this->data[$i+1];
        }
        $this->data[$this->length-1] = null;
        $this->length--;
        return [$this->data, $this->length];
    }

    /**
     *数组中查询元素 复杂度O(1)
     */
    function searchItem($index) {
        $index = intval($index);
        if($index<0) {
            return 1;
        }
        if($index>$this->length-1) {
            return 2;
        }
        return $this->data[$index];
    }
}

$obj = new myarray(10);

//数组中插入数据
for($i=0; $i<=9; $i++) {
    list($data, $length, $capacity) = $obj->insertItem($i, $i);
}

//数组中删除数据
list($data, $length) = $obj->deleteItem(5);
var_dump($data, $length);exit;

//数组中查询数据
	

