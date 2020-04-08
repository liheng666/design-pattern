package main

import "fmt"

// 观察者模式
// 定义了对象之间的一对多依赖，这样一来，当一个对象改变状态时，它的所有依赖者都会收到通知并自定更新。

// 实际的应用：orm组件中的事件监听

// 虚构一个小朋友考试成绩出来后，老师、家长、同学的不同反应 （：

// Subject 被观察接口
type Subject interface {
	RegisterObserver(Observer)
	RemoveObserver(Observer)
	NotifyObserver()
}

// Observer 观察者接口
type Observer interface {
	Update(float64)
}

// ChildrenSubject 被观察对象的结构
type ChildrenSubject struct {
	score     float64
	observers []Observer
}

// RegisterObserver 注册观察者
func (cs *ChildrenSubject) RegisterObserver(o Observer) {
	for _, v := range cs.observers {
		if v == o {
			return
		}
	}
	cs.observers = append(cs.observers, o)
}

// RemoveObserver 移除观察者
func (cs *ChildrenSubject) RemoveObserver(o Observer) {
	if len(cs.observers) > 0 {
		for i, v := range cs.observers {
			if v == o {
				cs.observers = append(cs.observers[:i], cs.observers[i+1:]...)
			}
		}
	}
}

// NotifyObserver 事件通知方法
func (cs *ChildrenSubject) NotifyObserver() {
	for _, o := range cs.observers {
		o.Update(cs.score)
	}
}

// SetScore 设置分数
func (cs *ChildrenSubject) SetScore(score float64) {
	cs.score = score
	cs.NotifyObserver()
}

// TeacherObserver 老师观察者结构
type TeacherObserver struct {
}

// Update 老师
func (t *TeacherObserver) Update(score float64) {
	if score > 90 {
		fmt.Printf("老师：真棒~ %f分,奖励一朵小红花\n", score)
		return
	}

	if score > 60 {
		fmt.Printf("老师：发挥不理想呀~ %f分,再接再厉\n", score)
		return
	}
	fmt.Printf("老师： %f分,把你家长叫来\n", score)
}

// ParentsObserver 家长观察者结构
type ParentsObserver struct {
}

// Update 家长
func (t *ParentsObserver) Update(score float64) {
	if score > 90 {
		fmt.Printf("家长：真棒~ %f分,这月带你出去旅游\n", score)
		return
	}

	if score > 60 {
		fmt.Printf("家长：发挥不理想呀~ %f分,以后要多多努力呀\n", score)
		return
	}
	fmt.Printf("家长： %f分,你老师是不是让我去学校呀\n", score)
}
