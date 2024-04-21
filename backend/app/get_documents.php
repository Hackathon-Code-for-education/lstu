<?php
// Подключение к базе данных
$pdo = new PDO("pgsql:host=postgres-db;dbname=code-future-2024", "user", "user");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Идентификатор университета
$id_vuz = $_POST['id_vuz'];

try {
    // Подготовка запроса
    $statement = $pdo->prepare("SELECT name_documents, file_document FROM documents WHERE id_vuz = :id_vuz");

    // Выполнение запроса
    $statement->execute(array(':id_vuz' => $id_vuz));

    // Получение результатов
    $documents = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Формирование JSON-ответа
    header('Content-Type: application/json');
    echo json_encode($documents);

} catch(PDOException $e) {
    // В случае ошибки
    echo "Ошибка: " . $e->getMessage();
}
?>
