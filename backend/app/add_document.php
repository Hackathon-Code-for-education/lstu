<?php
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

// Параметры подключения к базе данных PostgreSQL
$dbhost = 'postgres-db'; // Хост базы данных
$dbname = 'code-future-2024'; // Имя вашей базы данных
$dbuser = 'user'; // Ваше имя пользователя
$dbpass = 'user'; // Ваш пароль

try {
    // Устанавливаем соединение с базой данных
    $pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(array("error" => "Ошибка подключения к базе данных: " . $e->getMessage())));
}

// Обработка загрузки файла и сохранение данных в базу данных

    $id_vuz = $_POST['id_vuz']; // Получаем id_vuz из POST запроса
    $name_document = $_POST['name_document'];

    // Путь к директории, куда будут загружаться файлы
    $upload_directory = './'; // Укажите путь к вашей директории загрузок

    // Генерируем уникальное имя файла
    $file_name = uniqid() . "_" . basename($_FILES["file_document"]["name"]);
    $target_file = $upload_directory . $file_name;

    // Перемещаем загруженный файл в директорию загрузок
    if (move_uploaded_file($_FILES["file_document"]["tmp_name"], $target_file)) {
        // Сохраняем путь к файлу в базу данных
        try {
            // Подготавливаем запрос и связываем параметры
            $stmt = $pdo->prepare("INSERT INTO documents (id_vuz, name_documents, file_document) VALUES (:id_vuz, :name, :file_path)");
            $stmt->bindParam(':id_vuz', $id_vuz);
            $stmt->bindParam(':name', $name_document);
            $stmt->bindParam(':file_path', $target_file);
            $stmt->execute();

            // Выводим успешное сообщение и значение name_document в JSON
            echo json_encode(array("success" => "Документ успешно загружен и сохранен в базе данных.", "name_document" => $name_document));
        } catch (PDOException $e) {
            die(json_encode(array("error" => "Ошибка при сохранении документа: " . $e->getMessage())));
        }
    } else {
        die(json_encode(array("error" => "Ошибка при перемещении файла.")));
    }

?>
