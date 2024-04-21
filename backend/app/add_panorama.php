<?php
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

$dsn = "pgsql:host=postgres-db;dbname=code-future-2024";
$username = "user";
$password = "user";

try {
    // Проверяем, были ли переданы данные из POST-запроса
    if (!isset($_POST['id_collection'])) {
        throw new Exception("Не передан идентификатор коллекции");
    }

    // Получаем идентификатор коллекции из POST-запроса
    $id_collection = $_POST['id_collection'];

    // Проверяем, был ли загружен файл
    if (!isset($_FILES['photo']['tmp_name'])) {
        throw new Exception("Файл не был загружен");
    }

    // Путь для сохранения загруженных файлов
    $uploadDirectory = './'; // Путь к папке, где находится скрипт PHP

    // Создаем уникальное имя для файла
    $fileName = uniqid('photo_') . '_' . $_FILES['photo']['name'];

    // Полный путь к файлу на сервере
    $filePath = $uploadDirectory . $fileName;

    // Перемещаем загруженный файл в папку на сервере
    if (!move_uploaded_file($_FILES['photo']['tmp_name'], $filePath)) {
        throw new Exception("Ошибка при перемещении файла");
    }

    // Подключение к базе данных
    $pdo = new PDO($dsn, $username, $password);

    // Устанавливаем режим обработки ошибок PDO на исключения
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Подготавливаем SQL запрос для вставки данных о панораме
    $sql = "INSERT INTO panorama (id_collection, name_panorama, photo_panorama) VALUES (:id_collection, :name_panorama, :photo_panorama)";

    // Подготавливаем запрос к выполнению
    $stmt = $pdo->prepare($sql);

    // Привязываем значения параметров
    $stmt->bindParam(':id_collection', $id_collection, PDO::PARAM_INT);
    $stmt->bindParam(':name_panorama', $_POST['name_panorama'], PDO::PARAM_STR);
    $stmt->bindParam(':photo_panorama', $filePath, PDO::PARAM_STR);

    // Выполняем запрос
    $stmt->execute();
    echo json_encode(array('succes' => 'Панорама успешно добавлена.'));

} catch (PDOException $e) {
    // В случае ошибки выводим сообщение об ошибке
    echo json_encode(array('error' => 'Ошибка PDO: ' . $e->getMessage()));
} catch (Exception $e) {
    // В случае ошибки выводим сообщение об ошибке
    echo json_encode(array('error' => 'Ошибка: ' . $e->getMessage()));
}
?>
