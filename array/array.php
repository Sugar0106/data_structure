<?php
class MyArray{
    
    private $data;//数组数据

    private $capacity;//数组容量

    private $length;//数组长度

    /**
     *初始化一个数组
     */
    public function __construct($capacity){
        $capacity = intval($capacity);
        if($capacity <= 0) {
            return null;
        } 
        $this->data = array();
        $this->capacity = $capacity;
        $this->length = 0;
    }

    /**
     *校验数组是否已满
     */
    public function checkFull() {
        if($this->length == $this->capacity) {
            return true;
        } 
        return false;
    }

    /**
     *校验是否超出范围
     */
    public function checkOutOfRange($index) {
        if($index >= $this->length) {
            return true; 
        }
        return false;
    }

    /**
     *插入数据O(n)
     */
    public function insert($index, $value) {
        $index = intval($index);
        $value = intval($value);
        if($index < 0) {
            return 1;
        }
        if($this->checkFull()) {
            return 2; 
        }
        for($i = $this->length-1; $i >= $index; $i--) {
            $this->data[$i+1] = $this->data[$i];
        }
        $this->data[$index] = $value;
        $this->length++;
        return 0;
    }

    /**
     *删除索引index上的值 O(n)
     */
    public function delete($index) {
        if($index < 0) {
            return 1;
        } 
        if($this->checkOutOfRange($index)) {
            return 2; 
        }
        for($i = $index; $i < $this->length-1; $i++) {
            $this->data[$i] = $this->data[$i+1];
        }         
        return 0;
    }

    /**
     *查找元素
     */
    public function find($index) {
        $index = intval($index);
        if($index < 0) {
            return 1;
        }
        if($this->checkOutOfRange($index)) {
            return 2;
        }
        return $this->data[$index];
    }
}
