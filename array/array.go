package _5_array

import (
    "errors"
    "fmt"
)

type Array struct {
    data []int
    length uint
}

func NewArray(capacity uint) *Array {
    if capacity == 0 {
        return nil;
    }
    return &Array{
        data:make([]int, capacity, capacity),
        length:0,
    }
}

func (this *Array) Len() uint{
    return this.length
}

func (this *Array) isIndexOutOfRange(index uint) bool {
    if index >= uint(cap(this.data)) {
        return true
    }
    return false
}

//查找
func (this *Array) Find(index uint) (int, error) {
    if this.isIndexOutOfRange(index) {
        return 0, errors.New("out of index range")
    }
    return this.data[index], nil
}

//插入
func (this *Array) Insert(index uint, v int) error {
    if this.Len() == uint(cap(this.data)) {
        return errors.New("full array")
    }
    if index != this.length && this.isIndexOutOfRange(index) {
        return errors.New("out of index range")
    }
    for i := this.length; i>index;i-- {
        this.data[i] = this.data[i-1]
    }
    this.data[index] = v
    this.length++
    return nil
}

//删除一个元素
func (this *Array) delete(index uint) (int, error) {
    if this.isIndexOutOfRange(index) {
        return 0, errors.New("out of index range")
    }
    v := this.data[index]
    for i:=index;i<this.Len()-1;i++ {
        this.data[i] = this.data[i+1]
    }
    this.length--
    return v, nil
}
