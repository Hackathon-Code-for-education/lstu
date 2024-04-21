<?php
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');
$dbhost = 'postgres-db'; // Хост базы данных
$dbname = 'code-future-2024'; // Имя вашей базы данных
$dbuser = 'user'; // Ваше имя пользователя
$dbpass = 'user'; // Ваш пароль

try {
    $conn = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}

// Функция для получения всех чатов пользователя, их собеседников, последнего сообщения и времени его отправки
function getUserChatsWithLastMessage($userId, $vuzId, $conn) {
    $query = "SELECT DISTINCT d1.id_chat, 
                      d2.id_user AS interlocutor_id,
                      (SELECT text_message 
                       FROM public.message 
                       WHERE id_chat = d1.id_chat 
                       ORDER BY date_message DESC, id_message DESC -- Сортировка по дате и id_message
                       LIMIT 1) AS last_message,
                      (SELECT TO_CHAR(date_message, 'YYYY-MM-DD HH24:MI') -- Форматирование времени до минуты
                       FROM public.message 
                       WHERE id_chat = d1.id_chat 
                       ORDER BY date_message DESC, id_message DESC -- Сортировка по дате и id_message
                       LIMIT 1) AS last_message_date
              FROM public.does d1
              INNER JOIN public.does d2 ON d1.id_chat = d2.id_chat
              WHERE d1.id_user = :userId
                AND d2.id_user != :userId
                AND d1.id_chat IN (SELECT id_chat
                                   FROM public.chat
                                   WHERE id_vuz = :vuzId)";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':vuzId', $vuzId);
    $stmt->execute();
    
    $chats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $chats;
}

// Проверяем, были ли переданы id_user и id_vuz через POST
if (isset($_POST['id_user']) && isset($_POST['id_vuz'])) {
    $userId = $_POST['id_user']; // Получаем id_user из POST данных
    $vuzId = $_POST['id_vuz']; // Получаем id_vuz из POST данных
    $chats = getUserChatsWithLastMessage($userId, $vuzId, $conn);
    
    // Вывод результатов в формате JSON
    header('Content-Type: application/json');
    echo json_encode($chats);
} else {
    // Если один или оба параметра не были переданы, выводим сообщение об ошибке
    echo json_encode(array('error' => 'id_user или id_vuz не были переданы через POST'));
}

?>
