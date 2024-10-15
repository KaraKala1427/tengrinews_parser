<?php

// mode : r (read), w (write), a (append), r+, w+, a+

$tempFile = fopen("../week4/example4.txt", "r+");

if ($tempFile === false) {
    die("Не удалось открыть временный файл.");
}

$resultFile = fopen('example.txt', 'a'); // 30

while(!feof($tempFile)) {
    $line = fgets($tempFile); // Читаем строку из временного файла
    if ($line !== false) {
        fwrite($resultFile, $line); // Записываем строку в результирующий файл
    }
}

fclose($tempFile);
fclose($resultFile);

if (!unlink('../week4/example4.txt')) {
    die("Не удалось удалить временный файл.");
}


echo "Операция успешно завершена!";




//while(!feof($file))
//    echo fgets($file);    // строканы оқиды
//}
