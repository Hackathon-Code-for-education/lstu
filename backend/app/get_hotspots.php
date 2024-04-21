<?php

// Параметры подключения к базе данных
$host = 'postgres-db';
$dbname = 'code-future-2024';
$user = 'user';
$password = 'user';

try {
    // Подключение к базе данных
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    
    // Установка атрибута PDO для вывода ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Получение значения id_panorama из post запроса
    $id_panorama = $_POST['id_panorama'] ?? null;
    
    if ($id_panorama !== null) {
        // Подготовка SQL запроса с плейсхолдером для id_panorama
        $stmt = $pdo->prepare("SELECT * FROM public.hotspots WHERE id_panorama = :id_panorama");
        
        // Выполнение SQL запроса с передачей значения id_panorama
        $stmt->execute(array(':id_panorama' => $id_panorama));
        
        // Получение результатов запроса в виде ассоциативного массива
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Вывод результатов в формате JSON
        header('Content-Type: application/json');
        echo json_encode($result);
    } else {
        // Если id_panorama не был передан в post запросе
        echo json_encode(array('error' => 'ID panorama is not provided'));
    }
    
    // Закрытие соединения с базой данных
    $pdo = null;
} catch (PDOException $e) {
    // Обработка ошибок
    echo json_encode(array('error' => $e->getMessage()));
}
?>
