<?php

//$htmlFile = 'tengri_news.html';
//if (!file_exists($htmlFile)) {
//    die("Файл с новостями не найден. sdfgfhgjkhgfds");
//}
//
//$htmlContent = file_get_contents($htmlFile);

// https://tengrinews.kz/news/

$ch = curl_init("https://tengrinews.kz/news/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$htmlContent = curl_exec($ch);

// 2. Регулярное выражение для поиска заголовков новостей
$pattern = '/<span class="content_main_item_title">\s*<a[^>]*>([^<]*)<\/a>/';

// 3. Ищем все заголовки
preg_match_all($pattern, $htmlContent, $matches);

// Проверяем, есть ли найденные заголовки
if (empty($matches[1])) {
    die("Заголовки не найдены.");
}

$newsTitles = $matches[1];

$fileNews = fopen('news.csv', 'a');

foreach ($newsTitles as $key => $title) {
    fwrite($fileNews, $key+1 . ". " . $title . "\n");
}

fclose($fileNews);

$botToken = "7842755494:AAHlOq8mCReuZfcqlLu26jI3N8klxFshDmE";
$chatId = "-1002244979107"; // ID чата или пользователя, которому нужно отправить сообщение
$filePath = __DIR__ . "/news.txt";

$url = "https://api.telegram.org/bot$botToken/sendDocument";

$postFields = [
    'chat_id' => $chatId,
    'document' => new CURLFile(realpath($filePath)), // Получаем полный путь к файлу 456
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
$result = curl_exec($ch);

if ($result === FALSE) {
    // Обработка ошибок
    die('Error sending file');
}

curl_close($ch);

echo $result;

echo "Жаңалықтар сәтті парсить етілді, сен молодецсің !";








