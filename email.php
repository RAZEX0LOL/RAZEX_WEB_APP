<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Некорректный email";
        exit;
    }

    // Validate name and message
    if (empty($name) || empty($message)) {
        echo "Имя и сообщение не могут быть пустыми";
        exit;
    }

    // Set email parameters
    $to = "khattayev00@mail.ru";
    $subject = "Новое сообщение с сайта";
    $body = "Имя: $name\nEmail: $email\nСообщение:\n$message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Сообщение отправлено успешно!";
    } else {
        echo "Произошла ошибка при отправке сообщения.";
    }
} else {
    echo "Неверный запрос";
}
?>