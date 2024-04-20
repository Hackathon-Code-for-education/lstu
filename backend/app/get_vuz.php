<?php




try {
    $pdo = new PDO("pgsql:host=postgres-db; dbname=code-future-2024", "user", "user");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// SQL запрос
$sql = "SELECT id_vuz, name_vuz, info_vuz, site_vuz, adress_vuz, rating_vuz, phone_vuz FROM public.vuz";

try {

    $stmt = $pdo->prepare($sql);
    $stmt->execute();


    $vuz_data = array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_vuz = $row['id_vuz'];
        $name_vuz = $row['name_vuz'];
        $info_vuz = $row['info_vuz'];
        $site_vuz = $row['site_vuz'];
        $adress_vuz = $row['adress_vuz'];
        $rating_vuz = $row['rating_vuz'];
        $phone_vuz = $row['phone_vuz'];


        $vuz_data[][] = array(
            'id_vuz' =>  $id_vuz,
            'name_vuz' => $name_vuz,
            'info_vuz' => $info_vuz,
            'site_vuz' => $site_vuz,
            'adress_vuz' => $adress_vuz,
            'rating_vuz' => $rating_vuz,
            'phone_vuz' => $phone_vuz
        );
    }


    $json_output = json_encode($vuz_data);


    header('Content-Type: application/json');
    echo $json_output;
} catch (PDOException $e) {
    die("Ошибка выполнения запроса: " . $e->getMessage());
}
?>