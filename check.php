<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недопустимая длина логина";
    exit();
} else if (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
    echo "Недопустимая длина имени";
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

$stmt = $mysql->prepare("INSERT INTO users (login, pass, name) VALUES (?, ?, ?)");
if ($stmt === false) {
    echo 'Ошибка подготовки запроса: ' . htmlspecialchars($mysql->error);
    exit();
}

$stmt->bind_param('sss', $login, $pass, $name);

if ($stmt->execute() === false) {
    echo 'Ошибка выполнения запроса: ' . htmlspecialchars($stmt->error);
} else {
    echo "Регистрация прошла успешно!";
}

$stmt->close();
$mysql->close();
?>
