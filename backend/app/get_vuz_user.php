<?php
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');
// Параметры подключения к базе данных
$host = 'postgres-db';
$dbname = 'code-future-2024';
$user = 'user';
$password = 'user';

try {
    // Устанавливаем соединение с базой данных
    $dbh = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    
    // Получаем значение id_vuz из POST запроса
    $id_vuz = $_POST['id_vuz']; // Проверьте, что id_vuz действительно передается через POST запрос
    
    // SQL запрос
    $sql = "SELECT id_user, full_name_user FROM public.users WHERE id_vuz = :id_vuz";
    
    // Подготавливаем запрос
    $stmt = $dbh->prepare($sql);
    
    // Привязываем значение параметра :id_vuz
    $stmt->bindParam(':id_vuz', $id_vuz);
    
    // Выполняем запрос
    $stmt->execute();
    
    // Получаем результат в виде ассоциативного массива
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Выводим результат в формате JSON
    echo json_encode($result);
} catch (PDOException $e) {
    // В случае ошибки выводим сообщение об ошибке
    echo json_encode(array("error" => $e->getMessage()));
}
?>
