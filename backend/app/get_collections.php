<?php

header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');
// Подключение к базе данных PostgreSQL с использованием PDO
try {
    $pdo = new PDO("pgsql:host=postgres-db; dbname=code-future-2024", "user", "user");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
    die();
}

// Получение id_vuz из POST-запроса
$id_vuz = $_POST['id_vuz'];

// Подготовка SQL-запроса
$query = "SELECT * FROM public.collection WHERE id_vuz = :id_vuz";

// Подготовка и выполнение запроса
try {
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_vuz', $id_vuz, PDO::PARAM_INT);
    $statement->execute();
    
    // Формирование результата в виде ассоциативного массива
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // Вывод результата в формате JSON
    echo json_encode($result);
} catch (PDOException $e) {
    echo "Ошибка выполнения запроса: " . $e->getMessage();
}

// Закрытие соединения с базой данных
$pdo = null;
?>
