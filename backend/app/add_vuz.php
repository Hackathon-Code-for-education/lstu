<?php
// Подключение к базе данных
$db_host = 'postgres-db';
$db_name = 'code-future-2024';
$db_user = 'user';
$db_password = 'user';

try {
    $pdo = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(array("error" => "Ошибка подключения к базе данных: " . $e->getMessage())));
}

// Обработка POST-запроса
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверяем, что все необходимые поля заполнены
    if (isset($_POST['name_vuz'], $_POST['info_vuz'], $_POST['mail_vuz'], $_POST['phone_vuz'], $_POST['adress_vuz'])) {
        // Значения полей из POST-запроса
        $name_vuz = $_POST['name_vuz'];
        $info_vuz = $_POST['info_vuz'];
        $mail_vuz = $_POST['mail_vuz'];
        $phone_vuz = $_POST['phone_vuz'];
        $adress_vuz = $_POST['adress_vuz'];
        
        // Обработка загрузки файла
        if (isset($_FILES['photo_vuz']) && $_FILES['photo_vuz']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = './'; // Директория для сохранения загруженных файлов
            $photo_name = $_FILES['photo_vuz']['name'];
            $photo_tmp_name = $_FILES['photo_vuz']['tmp_name'];
            $photo_path = $upload_dir . $photo_name;
            
            // Перемещение файла в указанную директорию
            if (move_uploaded_file($photo_tmp_name, $photo_path)) {
                // Запись в базу данных
                $stmt = $pdo->prepare("INSERT INTO public.vuz (name_vuz, info_vuz, site_vuz, mail_vuz, phone_vuz, adress_vuz, photo_vuz) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$name_vuz, $info_vuz, $_POST['site_vuz'], $mail_vuz, $phone_vuz, $adress_vuz, $photo_path]);
                
                echo json_encode(array("success" => "Данные успешно добавлены в базу данных."));
            } else {
                echo json_encode(array("error" => "Ошибка при перемещении файла."));
            }
        } else {
            echo json_encode(array("error" => "Ошибка загрузки файла."));
        }
    } else {
        echo json_encode(array("error" => "Не все обязательные поля заполнены."));
    }
}
?>
