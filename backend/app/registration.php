<?php

header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

$pdo = new PDO("pgsql:host=postgres-db; dbname=code-future-2024", "user", "user");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $full_name = $_POST["full_name"];
    $password = $_POST["password"];
    $role_user = $_POST["role"];
    $id_vuz = isset($_POST["id_vuz"]) ? $_POST["id_vuz"] : null; // Проверяем, есть ли id_vuz в POST-запросе, и присваиваем null, если его нет

    if (empty($email) ||  empty($password) || empty($full_name)) { // Убираем проверку на пустое значение id_vuz

        header('Content-Type: application/json');
        echo json_encode(array('status' => 'error', 'message' => 'Заполните все обязательные поля'));
        exit();
    } else {

        $stmtemail = $pdo->prepare("SELECT * FROM users WHERE email_user = ?");
        $stmtemail->execute([$email]);
        $useremail = $stmtemail->fetch();

        if ($useremail) {

            header('Content-Type: application/json');
            echo json_encode(array('status' => 'error', 'message' => 'Пользователь с такой почтой уже существует.'));
            exit();
        } else {
            // Хеширование пароля
            $hashedPassword = hash('sha256', $password);

            $data = [
                'email' => $email,
                'hashedPassword' => $hashedPassword,
                'full_name_user' => $full_name,
                'role_user' => $role_user,
                'id_vuz' => $id_vuz // Добавляем id_vuz в данные для вставки в базу данных
            ];

            $data_json = [
                'email' => $email,
                'full_name_user' => $full_name,
                'role_user' => $role_user,
            ];

            // Если id_vuz был передан, добавляем его в данные и в ответ JSON
            if ($id_vuz !== null) {
                $data['id_vuz'] = $id_vuz;
                $data_json['id_vuz'] = $id_vuz;
            }

            $stmtInsert = $pdo->prepare("INSERT INTO users (email_user, password_user, role, full_name_user, id_vuz) VALUES (:email, :hashedPassword, :role_user, :full_name_user, :id_vuz)");
            $stmtInsert->execute($data);

            $id_user = $pdo->lastInsertId();

            // Добавляем id_user к данным, которые будут отправлены в ответе JSON
            $data_json['id_user'] = $id_user;

            $userDataString = json_encode(array('status' => 'success', 'user' => $data_json));

            header('Content-Type: application/json');
            echo $userDataString;
            exit();
        }
    }
}
?>
