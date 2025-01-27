// Структура
struct Point {
    x: f32,
    y: f32,
}

// Перечисление
enum Color {
    Red,
    Green,
    Blue,
}

// Функция, которая принимает структуру и возвращает значение
fn distance(point1: &Point, point2: &Point) -> f32 {
    let dx = point2.x - point1.x;
    let dy = point2.y - point1.y;
    (dx * dx + dy * dy).sqrt()
}

// Асинхронная функция
async fn async_function() -> i32 {
    42
}

// Основная функция
fn main() {
    // Переменные
    let p1 = Point { x: 0.0, y: 0.0 };
    let p2 = Point { x: 3.0, y: 4.0 };

    // Вызов функции
    let dist = distance(&p1, &p2);
    println!("Distance: {}", dist);

    // Использование перечисления
    let color = Color::Green;
    match color {
        Color::Red => println!("The color is red."),
        Color::Green => println!("The color is green."),
        Color::Blue => println!("The color is blue."),
    }

    // Запуск асинхронной функции
    let future = async_function();
    let result = futures::executor::block_on(future);
    println!("The answer is: {}", result);
}
