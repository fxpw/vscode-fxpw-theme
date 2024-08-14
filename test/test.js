// Импорт модулей
import express from 'express';
import * as math from 'mathjs';

const app = express();
const PORT = process.env.PORT || 3000;

// Глобальные переменные
const PI = Math.PI;
let variableOne = 42;
const stringVariable = 'Hello, World!';
let booleanVariable = true;
const nullVariable = null;
const undefinedVariable = undefined;
const objectVariable = {
	key: 'value',
	number: 123,
	number1: nullVariable
};
let a = objectVariable.key;
const arrayVariable = [1, 2, 3, 'four', { a: 5 }];

// Определение функции
function addNumbers(a, b) {
	return a + b;
}

// Стрелочная функция
const multiplyNumbers = (a, b) => a * b;

// Асинхронная функция
async function fetchData(url) {
	try {
		const response = await fetch(url);
		return await response.json();
	} catch (error) {
		console.error('Error fetching data:', error);
	}
}

// Определение класса
class Person {
	constructor(name, age) {
		this.name = name;
		this.age = age;
	}

	greet() {
		return `Hello, my name is ${this.name} and I am ${this.age} years old.`;
	}
}

// Использование условного оператора
if (variableOne > 20) {
	console.log('Variable is greater than 20');
} else {
	console.log('Variable is less than or equal to 20');
}

// Обработка исключений
try {
	let result = divideNumbers(10, 0);
} catch (error) {
	console.error('Caught an error:', error.message);
}

// Выражения шаблонных строк
const templateString = `This is a template string with a variable: ${variableOne}`;
let adasfas = 3 / 2
// Объект Promise
const myPromise = new Promise((resolve, reject) => {
	setTimeout(() => {
		resolve('Promise resolved');
	}, 1);
});
asdasfsa = new Person()
// Экспорт модулей
export { addNumbers, multiplyNumbers, Person, fetchData };

// Запуск сервера
app.listen(PORT, () => {
	console.log(`Server is running on port ${PORT}`);
});
