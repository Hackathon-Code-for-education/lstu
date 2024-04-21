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

    // Получаем данные из POST запроса
    $id_user_creator = $_POST['id_user_creator'];
    $id_user_with = $_POST['id_user_with'];
    $id_vuz = $_POST['id_vuz'];

    // Проверяем существование чата между указанными пользователями с учетом id_vuz
    $sql_check_chat = "SELECT id_chat FROM chat WHERE id_chat IN (SELECT id_chat FROM does WHERE id_user IN (:id_user_creator, :id_user_with) GROUP BY id_chat HAVING COUNT(DISTINCT id_user) = 2) AND id_vuz = :id_vuz";
    $stmt_check_chat = $db->prepare($sql_check_chat);
    $stmt_check_chat->bindParam(':id_user_creator', $id_user_creator);
    $stmt_check_chat->bindParam(':id_user_with', $id_user_with);
    $stmt_check_chat->bindParam(':id_vuz', $id_vuz);
    $stmt_check_chat->execute();
    $existing_chat = $stmt_check_chat->fetchColumn();

    // Если чат уже существует, возвращаем его id_chat и сообщение
    if ($existing_chat) {
        echo json_encode(array("id_chat" => $existing_chat, "message" => "Чат уже существует"));
    } else {
        // Создаем новый чат
        $sql_create_chat = "INSERT INTO chat (id_vuz) VALUES (:id_vuz) RETURNING id_chat";
        $stmt_create_chat = $db->prepare($sql_create_chat);
        $stmt_create_chat->bindParam(':id_vuz', $id_vuz);
        $stmt_create_chat->execute();
        $new_chat_id = $stmt_create_chat->fetchColumn();

        // Добавляем записи о создании чата в таблицу does
        $sql_insert_does_creator = "INSERT INTO does (id_chat, id_user) VALUES (:new_chat_id, :id_user_creator)";
        $stmt_insert_does_creator = $db->prepare($sql_insert_does_creator);
        $stmt_insert_does_creator->bindParam(':new_chat_id', $new_chat_id);
        $stmt_insert_does_creator->bindParam(':id_user_creator', $id_user_creator);
        $stmt_insert_does_creator->execute();

        $sql_insert_does_with = "INSERT INTO does (id_chat, id_user) VALUES (:new_chat_id, :id_user_with)";
        $stmt_insert_does_with = $db->prepare($sql_insert_does_with);
        $stmt_insert_does_with->bindParam(':new_chat_id', $new_chat_id);
        $stmt_insert_does_with->bindParam(':id_user_with', $id_user_with);
        $stmt_insert_does_with->execute();

        // Отправляем id_chat нового чата и сообщение об успешном создании на frontend
        echo json_encode(array("id_chat" => $new_chat_id, "message" => "Новый чат успешно создан"));
    }
} catch(PDOException $e) {
    // Если произошла ошибка, выводим её
    echo json_encode(array("error" => "Ошибка: " . $e->getMessage()));
}
?>
