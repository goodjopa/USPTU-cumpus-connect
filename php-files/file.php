<?php
require_once '../php-files/connect.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

$user_id = $_COOKIE['user_id'];
$select_stud = "SELECT *
                FROM events
                WHERE Student_id != '$user_id' and NOT EXISTS (
                    SELECT *
                    FROM events_come
                    WHERE events_come.Event_id = events.Event_id
                    AND events_come.Student_id = '$user_id')";
$stud_id = $connect->query($select_stud);

$phpWord = new PhpWord();
$section = $phpWord->addSection();

while($row = mysqli_fetch_row($stud_id)) {
    $text = "Название: {$row[1]}, Кол-во: {$row[3]}, Дата: {$row[5]}, Описание: {$row[2]}";
    $section->addText($text);
}

$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('events.docx'); // Сохраняем файл

header('Location: events.docx'); // Отправляем пользователя на скачивание файла
?>