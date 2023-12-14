-- Определение глобальных переменных
local numberVariable = 10
local stringVariable = "Hello, Lua!"
local booleanVariable = true
local nilVariable = nil
local tableVariable = {key1 = "value1", key2 = 2}

-- Определен	ие функции
--[[

dasfas
]]
function greet(name)
    return "Hello, " .. name .. "!"
end

-- Функция с переменным числом аргументов
function sum(...)
    local args = {...}
    local total = 0
    for _, v in ipairs(args) do
        total = total + v
    end
    return total
end

-- Работа с таблицами
local fruits = {"apple", "banana", "cherry"}
table.insert(fruits, "orange")

-- Использование условного оператора
if numberVariable > 5 then
    print("numberVariable is greater than 5")
else
    print("numberVariable is less than or equal to 5")
end

-- Циклы
for i = 1, #fruits do
    print(fruits[i])
end

-- Обработка исключений (с использованием pcall)
local success, result = pcall(function()
    error("This is an error message")
end)

if not success then
    print("Caught an error:", result)
end

-- Анонимные функции и замыкания
local function counter()
    local count = 0
    return function()
        count = count + 1
        return count
    end
end

local myCounter = counter()
print(myCounter()) -- выводит 1
print(myCounter()) -- выводит 2

-- Возвращение
-- return greet("World")

-- Определение класса с использованием таблиц
Person = {}
Person.__index = Person

-- Конструктор
function Person.new(name, age)
    local self = setmetatable({}, Person)
    self.name = name
    self.age = age
    return self
end

-- Метод экземпляра
function Person:speak()
    return "My name is " .. self.name .. " and I am " .. self.age .. " years old."
end

-- Создание экземпляра класса Person
local person1 = Person.new("Alice", 30)
print(person1:speak())

-- Демонстрация метаметода __tostring
Person.__tostring = function(self)
    return "Person(" .. self.name .. ", " .. self.age .. ")"
end

print(person1)

-- Пример метатаблицы и метаметода __add
Vector = {}
Vector.__index = Vector

function Vector.new(x, y)
    local self = setmetatable({}, Vector)
    self.x = x or 0
    self.y = y or 0
    return self
end

function Vector:__add(other)
    return Vector.new(self.x + other.x, self.y + other.y)
end

function Vector:__tostring()
    return "(" .. self.x .. ", " .. self.y .. ")"
end

-- Использование метаметода __add
local v1 = Vector.new(1, 2)
local v2 = Vector.new(3, 4)
local v3 = v1 + v2

print("v1 + v2 = " .. tostring(v3))

-- Пример метафункции
local function readOnly(t)
    local proxy = {}
    local mt = {
        __index = t,
        __newindex = function(t, k, v)
            error("attempt to update a read-only table", 2)
        end
    }
    setmetatable(proxy, mt)
    return proxy
end

-- Создание read-only таблицы
local days = readOnly{"Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"}

-- Попытка изменения read-only таблицы приведет к ошибке
days[1] = "Sun"  -- Вызовет ошибку
asfsaf = fasas