<?php

header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

try {
    $pdo = new PDO("pgsql:host=postgres-db; dbname=code-future-2024", "user", "user");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST["id_user"];
    $id_vuz = $_POST["id_vuz"];
    $text_feedback = $_POST["text_feedback"];
    $rate_feedback = $_POST["rate_feedback"];
    
    $date_feedback = date("Y-m-d");
    
    // Проверяем, существует ли уже отзыв от данного пользователя на этот вуз
    $stmt_check = $pdo->prepare("SELECT COUNT(*) FROM public.feedback WHERE id_user = ? AND id_vuz = ?");
    $stmt_check->execute([$id_user, $id_vuz]);
    $existing_feedback_count = $stmt_check->fetchColumn();
    
    if ($existing_feedback_count > 0) {
        $response["success"] = false;
        $response["message"] = "Вы уже оставляли отзыв на этот вуз.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO public.feedback (id_user, id_vuz, text_feedback, rate_feedback, date_feedback, moderated) 
                                   VALUES (?, ?, ?, ?, ?, false)");
            
            $stmt->execute([$id_user, $id_vuz, $text_feedback, $rate_feedback, $date_feedback]);
            
            $response["success"] = true;
            $response["message"] = "Отзыв успешно добавлен.";
        } catch (PDOException $e) {
            $response["success"] = false;
            $response["message"] = "Произошла ошибка при добавлении отзыва: " . $e->getMessage();
        }
    }
}

$pdo = null;

header('Content-Type: application/json');
echo json_encode($response);

?>
