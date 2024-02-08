<?php

$imageBytes = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'fox.jpg');

header('Content-Type: image/jpeg');
echo $imageBytes;
