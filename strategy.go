package designpattern

// 策略模式：
// 定义了算法族，分别封装起来，让他们之间可以互相替换，此模式让算法的变化独立于使用算法的客户。

// 业务中使用的思考：
// 	1. 多种扣税计算方式可以使用
// 	2. 不同格式的合同

// Tax 扣税计算的接口
type Tax interface {
	Calculate(float64) float64
}

// Quotation 报价单结构
type Quotation struct {
	sum float64
	tax Tax
}

// Tax 获取交税金额
func (q *Quotation) Tax() float64 {
	tax := q.tax.Calculate(q.sum)
	return tax
}

// SetCalculate 设置计算方式
func (q *Quotation) SetCalculate(tax Tax) {
	q.tax = tax
}

// ZTax 增值税结构
type ZTax struct {
}

// Calculate 增值税计算
func (zt ZTax) Calculate(sum float64) float64 {
	return sum * 0.06
}

// STax 小额纳税结构
type STax struct {
}

// Calculate 小额纳税计算方法
func (st STax) Calculate(sum float64) float64 {
	return sum * 0.03
}
