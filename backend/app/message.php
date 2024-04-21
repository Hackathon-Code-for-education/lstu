<?php
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');
// Параметры подключения к базе данных PostgreSQL
$host = "postgres-db"; // имя сервиса контейнера PostgreSQL в сети Docker Compose
$dbname = "code-future-2024"; // имя базы данных
$user = "user"; // имя пользователя
$password = "user"; // пароль пользователя

// Устанавливаем соединение с базой данных
try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Получаем данные из POST запроса
$id_user = $_POST['id_user'];
$id_chat = $_POST['id_chat'];
$text_message = $_POST['text_message'];

// Получаем текущее время
$date_message = date("Y-m-d H:i:s");

// Подготавливаем SQL запрос для вставки нового сообщения с датой
$sql = "INSERT INTO message (id_user, id_chat, text_message, date_message) VALUES (?, ?, ?, ?)";

// Подготавливаем запрос к выполнению
$stmt = $pdo->prepare($sql);

// Выполняем запрос
if ($stmt->execute([$id_user, $id_chat, $text_message, $date_message])) {
    // Если запрос выполнен успешно, возвращаем дату отправки сообщения в формате JSON
    echo json_encode(array("date_message" => $date_message));
} else {
    echo json_encode(array("error" => "Ошибка при выполнении запроса"));
}

// Закрываем соединение с базой данных
$pdo = null;
?>
