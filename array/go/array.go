package _5_array
import (
    "errors"
    "fmt"
)

/**
 *1）数组的插入、删除、按照下标随机访问操作
 *2）数组中的数据是int类型；
 */
 type Array struct {
    data []int
    length uint
 }

 //为数组初始化内存
 func NewArray(capacity uint) *Array{
    if capacity == 0 {
        return nil
    }
    return &Array{
        data:make([]int, capacity, capacity),
        length:0,
    }
 }

 func (this *Array) Len() uint{
    return this.length
 }

 func (this *Array) isIndexOutOfRange(index uint) bool{
    if index>=uint(cap(this.data)) {
        return true
    }
    return false
 }

