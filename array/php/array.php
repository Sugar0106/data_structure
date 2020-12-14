<?php
    
/**
 *数据结构数组 php实现
 */
class myarray{

    private $length;
    private $capacity;
    private $data;


    /**
     *初始化一个数组 指定内存空间
     */
    public function __construct($capacity){
        if($capacity < 0) {
            return false;
        }
        $this->capacity = $capacity;
        $this->data = array();
        $this->length = 0;
    }

    /**
     *校验数组是否已满
     *@return bool
     */
    private function checkIfFull() {
        if($this->length == $this->capacity) {
            return true;
        }
        return false;
    }

    /**
     *判断数组是否越界
     *@param index 
     *@return bool
     */
    private function checkIfOut($index) {
        if($index>= $this->length) {
            return true;
        } 
        return false;
    }

    /**
     *向数组中插入一个元素
     *时间复杂度  O(n)
     *@param index
     *@param value
     */
    public function insertValue($index, $value) {
        $index = intval($index);
        $value = intval($value);
        if($index<0) {
            return 0;
        }
        if($this->checkIfFull())  {
            return 1;
        }
        //将index后的数据后移
        for($i = $this->length-1; $i>=$index; $i--) {
            $this->data[$i+1] = $this->data[$i]; 
        }
        $this->data[$index] = $value;
        $this->length++;
        return $this->data;
    }
    /**
     *删除数组元素
     *时间复杂度 O(n)
     *@param index
     */
    public function deleteItem($index) {
        if($index<0) {
            return 0;
        }
        if($this->checkIfOut($index)) {
            return 1;
        }
        for($i = $index; $i<$this->length-1; $i++) {
            $this->data[$i] = $this->data[$i+1];
        }
        $this->data[$this->length-1] = null;
        $this->length--;
        return $this->data;
    }

    /**
     *查找数组元素
     *@param index
     */
    public function findItem($index) {
        if($index<0) {
            return 0;
        }
        if($this->checkIfOut($index)) {
            return 1;
        } 
        $data = $this->data[$index];
        return $data;
    }

}

$arrObj = new myarray(10);
//测试插入数据
for($i=0; $i<11; $i++) {
    $arr = $arrObj->insertValue($i, $i);
}

//测试删除数据
$data = $arrObj->deleteItem(3);
var_dump($data);

//测试查找元素
$item = $arrObj->findItem(5);
var_dump($item);exit;

