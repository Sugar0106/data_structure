package _5_array
import (
    "testing"
)
func testInsert(t *testing.T) {
    acpacity :=10
    arr := NewArray(uint(capacity))
    for i:=0;i<capacity-2;i++{
        err := arr.Insert(uint(i), i+1)
        if nil != err {
            t.Fatal(err.Error())
        }
    }
    arr.Insert(uint(6), 999)
}
