<?php
session_start();

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недопустимая длина логина";
    exit();
} else if (mb_strlen($pass) < 3 || mb_strlen($pass) > 20) {
    echo "Недопустимая длина пароля (от 3 до 20 символов)";
    exit();
}

$pass = md5($pass."qwertyuiop1234");

$mysql = new mysqli('localhost', 'root', '', 'CarViewer');

if ($mysql->connect_error) {
    echo 'Ошибка подключения (' . $mysql->connect_errno . ') ' . $mysql->connect_error;
    exit();
}

$stmt = $mysql->prepare("SELECT id, name FROM users WHERE login = ? AND pass = ?");
if ($stmt === false) {
    echo 'Ошибка подготовки запроса: ' . htmlspecialchars($mysql->error);
    exit();
}

$stmt->bind_param('ss', $login, $pass);

if ($stmt->execute() === false) {
    echo 'Ошибка выполнения запроса: ' . htmlspecialchars($stmt->error);
    exit();
}

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    echo "Авторизация прошла успешно!";
} else {
    echo "Неправильный логин или пароль";
}

$stmt->close();
$mysql->close();
?>
