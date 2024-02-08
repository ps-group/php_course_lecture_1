<html lang="ru">
<body>
<h2>Статус</h2>
<ul>
    <li>Интерпретатор PHP работает!</li>
    <li>Сегодня: <?= date('Y-m-d') ?></li>
    <li>Время сервера: <?= date('H:i:s') ?></li>
</ul>

<h2>Другие страницы</h2>

<?php
function listOtherPhpScripts(): array
{
    $results = [];
    /** @var SplFileInfo $entry */
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__)) as $entry)
    {
        if ($entry->getType() === 'file' && $entry->getExtension() === 'php')
        {
            $filePath = $entry->getPathname();
            $baseDirPrefix = __DIR__ . DIRECTORY_SEPARATOR;
            if (str_starts_with($filePath, $baseDirPrefix))
            {
                $filePath = substr($filePath, strlen($baseDirPrefix));
            }
            if ($filePath === 'index.php')
            {
                continue;
            }
            $filePath = str_replace(DIRECTORY_SEPARATOR, '/', $filePath);
            $results[] = $filePath;
        }
    }
    return $results;
}

?>
<ol>
    <?php foreach (array_map(htmlentities(...), listOtherPhpScripts()) as $phpFilePath): ?>
        <li><a href="<?= '/' . $phpFilePath ?>"><?= $phpFilePath ?></a></li>
    <?php endforeach; ?>
</ol>
</body>
</html>