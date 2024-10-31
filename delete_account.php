<?php
session_start();

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$confirmPass = filter_var(trim($_POST['confirm_pass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недопустимая длина логина";
    exit();
} else if (mb_strlen($confirmPass) < 3 || mb_strlen($confirmPass) > 20) {
    echo "Недопустимая длина пароля";
    exit();
}

$confirmPass = md5($confirmPass . "qwertyuiop1234");

$mysql = new mysqli('localhost', 'root', '', 'CarViewer');

if ($mysql->connect_error) {
    echo 'Ошибка подключения (' . $mysql->connect_errno . ') ' . $mysql->connect_error;
    exit();
}

$stmt = $mysql->prepare("SELECT id FROM users WHERE login = ? AND pass = ?");
if ($stmt === false) {
    echo 'Ошибка подготовки запроса: ' . htmlspecialchars($mysql->error);
    exit();
}

$stmt->bind_param('ss', $login, $confirmPass);

if ($stmt->execute() === false) {
    echo 'Ошибка выполнения запроса: ' . htmlspecialchars($stmt->error);
    exit();
}

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    $userId = $user['id'];
    $deleteStmt = $mysql->prepare("DELETE FROM users WHERE id = ?");
    if ($deleteStmt === false) {
        echo 'Ошибка подготовки запроса: ' . htmlspecialchars($mysql->error);
        exit();
    }

    $deleteStmt->bind_param('i', $userId);

    if ($deleteStmt->execute() === false) {
        echo 'Ошибка выполнения запроса: ' . htmlspecialchars($deleteStmt->error);
    } else {
        session_destroy();
        echo "Аккаунт успешно удален!";
    }

    $deleteStmt->close();
} else {
    echo "Неправильный логин или пароль";
}

$stmt->close();
$mysql->close();
?>
