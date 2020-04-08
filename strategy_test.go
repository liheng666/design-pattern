package designpattern

import "testing"

// TestTax 测试 税点计算
func TestTax(t *testing.T) {
	q := &Quotation{
		1000,
		ZTax{},
	}

	if 60.00 != q.Tax() {
		t.Error("增值税错误")
	}

	q.SetCalculate(STax{})
	if 30.00 != q.Tax() {
		t.Error("增值税错误")
	}
}
