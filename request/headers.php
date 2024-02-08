<?php

$headers = [];
foreach ($_SERVER as $key => $value)
{
    if (str_starts_with($key, 'HTTP_'))
    {
        $headerName = implode(
            '-',
            array_map(
                ucfirst(...),
                array_map(
                    strtolower(...),
                    explode(
                        '_',
                        substr($key, strlen('HTTP_'))),
                )
            )
        );
        $headers[$headerName] = $value;
    }
}
?>

<html lang="ru">
<head>
    <style>
        table, thead, tbody, tr, th, td {
            border: 1px solid gray;
            border-collapse: collapse;
        }
        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>
<h1>Заголовки запроса:</h1>
<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Значение</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($headers as $name => $value): ?>
        <tr>
            <td><?= htmlentities($name) ?></td>
            <td><?= htmlentities($value) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

