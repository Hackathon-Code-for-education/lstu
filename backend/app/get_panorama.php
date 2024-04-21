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

    // Подключение к базе данных
    $pdo = new PDO($dsn, $username, $password);

    // Устанавливаем режим обработки ошибок PDO на исключения
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Подготавливаем SQL запрос
    $sql = "SELECT id_panorama, name_panorama, photo_panorama FROM panorama WHERE id_collection = :id_collection";

    // Подготавливаем запрос к выполнению
    $stmt = $pdo->prepare($sql);

    // Устанавливаем значение параметра :id_collection
    $stmt->bindParam(':id_collection', $id_collection, PDO::PARAM_INT);

    // Выполняем запрос
    $stmt->execute();

    // Создаем пустой массив для хранения результатов
    $results = array();

    // Получаем результат запроса
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Добавляем данные о панораме в массив результатов
        $result = array(
            'id_panorama' => $row['id_panorama'],
            'name_panorama' => $row['name_panorama'],
            'photo_panorama' => $row['photo_panorama'],
        );
        $results[] = $result;
    }

    // Выводим результаты в формате JSON
    echo json_encode($results);
} catch (PDOException $e) {
    // В случае ошибки выводим сообщение об ошибке
    echo json_encode(array('error' => 'Ошибка PDO: ' . $e->getMessage()));
} catch (Exception $e) {
    // В случае ошибки выводим сообщение об ошибке
    echo json_encode(array('error' => 'Ошибка: ' . $e->getMessage()));
}


// $dsn = "pgsql:host=postgres-db;dbname=code-future-2024";
// $username = "user";
// $password = "user";

// try {
//     // Подключение к базе данных
//     $pdo = new PDO($dsn, $username, $password);

//     // Устанавливаем режим обработки ошибок PDO на исключения
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // Подготавливаем SQL запрос
//     $sql = "SELECT photo_panorama FROM panorama WHERE id_panorama = :id";

//     // Подготавливаем запрос к выполнению
//     $stmt = $pdo->prepare($sql);

//     // Указываем значение параметра :id
//     $id = 1; // Укажите нужное вам значение ID
//     $stmt->bindParam(':id', $id, PDO::PARAM_INT);

//     // Выполняем запрос
//     $stmt->execute();

//     // Получаем результат запроса
//     $row = $stmt->fetch(PDO::FETCH_ASSOC);

//     // Определяем MIME-тип изображения
//     $imageType = 'jpeg'; // Предположим, что изображение в формате JPEG

//     // Получаем данные изображения
//     $imageData = base64_encode(stream_get_contents($row['photo_panorama']));

//     // Выводим изображение в теге <img>
//     echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" alt="Панорамное изображение">';
// } catch (PDOException $e) {
//     // В случае ошибки выводим сообщение об ошибке
//     echo "Ошибка: " . $e->getMessage();
// }


?>




