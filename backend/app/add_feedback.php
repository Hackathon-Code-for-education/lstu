<?php



// Создание подключения к базе данных через PDO
try {
    $pdo = new PDO("pgsql:host=postgres-db; dbname=code-future-2024", "user", "user");
    // Установка режима обработки ошибок PDO на исключения
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

$response = array();

// Обработка POST запроса
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из POST запроса
    $id_user = $_POST["id_user"];
    $id_vuz = $_POST["id_vuz"];
    $text_feedback = $_POST["text_feedback"];
    $rate_feedback = $_POST["rate_feedback"];
    
    // Получение текущей даты
    $date_feedback = date("Y-m-d");
    
    try {
        // Подготовка SQL запроса с использованием параметров
        $stmt = $pdo->prepare("INSERT INTO public.feedback (id_user, id_vuz, text_feedback, rate_feedback, date_feedback, moderated) 
                               VALUES (?, ?, ?, ?, ?, false)");
        
        // Выполнение запроса с передачей параметров
        $stmt->execute([$id_user, $id_vuz, $text_feedback, $rate_feedback, $date_feedback]);
        
        $response["success"] = true;
        $response["message"] = "Отзыв успешно добавлен.";
    } catch (PDOException $e) {
        $response["success"] = false;
        $response["message"] = "Произошла ошибка при добавлении отзыва: " . $e->getMessage();
    }
}

// Закрытие соединения с базой данных
$pdo = null;

// Вывод ответа в формате JSON
header('Content-Type: application/json');
echo json_encode($response);

?>
