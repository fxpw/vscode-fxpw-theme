#include <iostream>
#include <string>
#include <vector>
#include <memory>
#include <algorithm>

// Базовый класс
class Shape {
	public:
		virtual void draw() const = 0; // Чисто виртуальная функция
		virtual ~Shape() {}
};

// Производный класс
class Circle : public Shape {
public:
	void draw() const override {
		std::cout << "Рисуем круг" << std::endl;
	}
};

// Производный класс
class Rectangle : public Shape {
public:
	void draw() const override {
		std::cout << "Рисуем прямоугольник" << std::endl;
	}
};

// Функция, принимающая умный указатель на базовый класс
void drawShape(const std::shared_ptr<Shape>& shape) {
	shape->draw();
}

// Шаблонная функция
template<typename T>
T max(T a, T b) {
	return (a > b) ? a : b;
}

int main() {
	// Использование полиморфизма
	std::shared_ptr<Shape> circle = std::make_shared<Circle>();
	std::shared_ptr<Shape> rectangle = std::make_shared<Rectangle>();

	drawShape(circle);
	drawShape(rectangle);

	// Использование шаблонной функции
	std::cout << "Максимум из 4 и 7: " << max(4, 7) << std::endl;

	// Использование лямбда-выражений
	std::vector<int> vec = {1, 2, 3, 4, 5};
	std::for_each(vec.begin(), vec.end(), [](int n) {
		std::cout << n << " ";
	});
	std::cout << std::endl;

	return 0;
}
// #include <iostream>
// #include <vector>
#include <map>
// #include <string>
#include <exception>

// Определение глобальных переменных
const double PI = 3.14159;
int globalVariable = 100;

// Определение шаблонной функции
template <typename T>
T add(T a, T b) {
	return a + b;
}
// asdafas = 12312
// Определение класса
class Animal {
	private:
		std::string name;
		int age;

public:
	Animal(std::string name, int age) : name(name), age(age) {}
	~Animal(){}
	void speak() const {
		std::cout << "My name is " << name << " and I am " << age << " years old." << std::endl;
	}
};

// Использование шаблонов STL
std::vector<int> numbers = {1, 2, 3, 4, 5};
std::map<std::string, int> myMap = {{"one", 1}, {"two", 2}, {"three", 3}};

// Определение функции с обработкой исключений
double divide(double a, double b) {
	if (b == 0) {
		throw std::invalid_argument("Division by zero is not allowed.");
	}
	return a / b;
}

// Основная функция
int main2() {
	// Использование функций и классов
	std::cout << "Sum of 5 and 3: " << add(5, 3) << std::endl;

	Animal cat("Whiskers", 5);
	cat.speak();

	// Обработка исключений
	try {
		double result = divide(10, 0.1);
		std::cout << "Result of division: " << result << std::endl;
	} catch (const std::exception& e) {
		std::cerr << "Caught exception: " << e.what() << std::endl;
	}

	return 0;
}