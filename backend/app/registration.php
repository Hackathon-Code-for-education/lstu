<?php

header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');


$pdo = new PDO("pgsql:host=postgres-db; dbname=code_future", "user", "user");

if (isset($_POST["register"])) {

    $email = $_POST["email"];
    $full_name = $_POST["full_name"];
    $password = $_POST["password"];
    $role_user = ($_POST["role"] == "student") ? "abiturient" : "representative"; // Определение роли пользователя


    if (empty($email) ||  empty($password) || empty($full_name)) {
        // Возвращаем ошибку, если не все поля заполнены
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'error', 'message' => 'Заполните все поля и подтвердите согласие на обработку персональных данных.'));
        exit();
    } 
     else {

        $stmtemail = $pdo->prepare("SELECT * FROM users WHERE email_user = ?");
        $stmtemail->execute([$email]);
        $useremail = $stmtemail->fetch();

        if ($useremail) {

            header('Content-Type: application/json');
            echo json_encode(array('status' => 'error', 'message' => 'Пользователь с таким логином уже существует.'));
            exit();
        } else {
            // Хеширование пароля
            $hashedPassword = hash('sha256', $password);


            $data = [
                'email' => $email,
                'hashedPassword' => $hashedPassword,
                'full_name_user' => $full_name,
                'role_user' => $role_user,
            ];


            $stmtInsert = $pdo->prepare("INSERT INTO users (email_user, password_user, role, full_name_user) VALUES (:email, :hashedPassword, :role_user, :full_name_user)");
            $stmtInsert->execute($data);


            $id_user = $pdo->lastInsertId();

            // Добавление id_user к данным
            $data['id_user'] = $id_user;


            $userDataString = json_encode(array('status' => 'success', 'user' => $data));
            file_put_contents('dataa.txt', $userDataString . PHP_EOL, FILE_APPEND);


            header('Content-Type: application/json');
            echo $userDataString;
            exit();
        }
    }
}

?>


