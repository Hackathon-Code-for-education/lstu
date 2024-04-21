<?php
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');
// Подключение к базе данных
try {
    $pdo = new PDO("pgsql:host=postgres-db;port=5432;dbname=code-future-2024", "user", "user");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // В случае ошибки выводим сообщение об ошибке
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
    die();
}

// Проверяем, был ли отправлен POST запрос
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Ошибка: Этот скрипт поддерживает только POST запросы.";
    die();
}

// Проверяем, передан ли параметр id_chat
if (!isset($_POST['id_chat'])) {
    echo "Ошибка: Не передан обязательный параметр id_chat.";
    die();
}

$id_chat = $_POST['id_chat'];

// Подготавливаем SQL-запрос для выборки id_user, text_message и date_message для заданного id_chat
$query = "SELECT id_user, text_message, date_message FROM message WHERE id_chat = :id_chat AND id_user IS NOT NULL AND text_message IS NOT NULL";

try {
    $statement = $pdo->prepare($query);
    $statement->bindValue(':id_chat', $id_chat, PDO::PARAM_INT);
    $statement->execute();

    // Получаем все результаты в виде ассоциативного массива
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Проверяем, были ли найдены сообщения для данного id_chat
    if ($results) {
        // Отправляем результат в формате JSON
        header('Content-Type: application/json');
        echo json_encode($results);
    } else {
        echo "Сообщения не найдены для указанного id_chat.";
    }
} catch (PDOException $e) {
    echo "Ошибка выполнения запроса: " . $e->getMessage();
}
?>
