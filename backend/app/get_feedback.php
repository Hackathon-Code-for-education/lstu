<?php

$host = 'postgres-db';
$dbname = 'code-future-2024';
$user = 'user';
$password = 'user';


$id_vuz = $_POST['id_vuz'];

try {
    // Устанавливаем соединение с базой данных
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT f.id_feedback, u.full_name_user, f.rate_feedback, f.text_feedback, f.date_feedback, f.moderated
            FROM public.feedback AS f 
            INNER JOIN public.users AS u ON f.id_user = u.id_user 
            WHERE f.id_vuz = :id_vuz";


    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_vuz' => $id_vuz]);

 
    $feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($feedbacks);

} catch(PDOException $e) {

    echo "Ошибка соединения с базой данных: " . $e->getMessage();
}
?>
