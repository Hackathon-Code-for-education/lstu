<?php

header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');
// Параметры подключения к базе данных
$host = "postgres-db"; // имя сервиса контейнера PostgreSQL в сети Docker Compose
$dbname = "code-future-2024"; // имя базы данных
$user = "user"; // имя пользователя
$password = "user"; // пароль пользователя

try {
    // Устанавливаем соединение с базой данных
    $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    
    // Устанавливаем режим ошибок для PDO на исключения
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ID вашего учебного заведения из frontend
    $id_vuz = $_POST['id_vuz']; // предположим, что вы получаете это значение из POST запроса
    
    // SQL запрос для получения чатов
    $sql = "SELECT m.id_user, m.text_message, m.date_message
            FROM chat c
            JOIN message m ON c.id_chat = m.id_chat
            WHERE c.id_vuz = :id_vuz
            AND m.id_user IS NOT NULL
            AND m.text_message IS NOT NULL
            AND m.date_message IS NOT NULL";
    
    // Подготавливаем запрос
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_vuz', $id_vuz);
    $stmt->execute();
    
    // Получаем результаты запроса в виде ассоциативного массива
    $chats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Преобразуем массив в JSON
    $json = json_encode($chats);
    
    // Отправляем JSON на frontend
    header('Content-Type: application/json');
    echo $json;
} catch(PDOException $e) {
    // Если произошла ошибка, выводим её
    echo "Ошибка: " . $e->getMessage();
}
?>
