package main

import "fmt"

func main() {
	// 观察者模式测试
	observerTest()
}

// 观察者模式测试
func observerTest() {
	cs := &ChildrenSubject{}
	to := &TeacherObserver{}
	po := &ParentsObserver{}
	cs.RegisterObserver(to)
	cs.RegisterObserver(po)
	fmt.Println("第一次考试")
	cs.SetScore(99.5)
	fmt.Println("第二次考试")
	cs.SetScore(80)
	fmt.Println("第三次考试")
	cs.SetScore(55)

	cs.RemoveObserver(to)
	fmt.Println("期末考试")
	cs.SetScore(99.5)
}
