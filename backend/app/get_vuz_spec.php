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

// Проверяем, передан ли id_vuz
if (isset($_POST['id_vuz'])) {
    $id_vuz = $_POST['id_vuz'];
} else {
    die("Не указан id_vuz");
}

// SQL запрос для выборки информации по конкретному вузу
$sql = "SELECT id_vuz, name_vuz, info_vuz, site_vuz, adress_vuz, phone_vuz, photo_vuz FROM public.vuz
WHERE id_vuz = :id_vuz";

try {

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_vuz', $id_vuz);
    $stmt->execute();

    $vuz_data = array();

    // Получаем данные о вузе
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $vuz_data[] = array(
            'name_vuz' => $row['name_vuz'],
            'info_vuz' => $row['info_vuz'],
            'site_vuz' => $row['site_vuz'],
            'adress_vuz' => $row['adress_vuz'],
            'phone_vuz' => $row['phone_vuz'],
            'photo_vuz' => $row['photo_vuz']
        );
    }

    // Передаем данные в формате JSON
    $json_output = json_encode($vuz_data);

    header('Content-Type: application/json');
    echo $json_output;
} catch (PDOException $e) {
    die("Ошибка выполнения запроса: " . $e->getMessage());
}
?>
