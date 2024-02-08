<?php

$data = [
    [
        'title' => 'Understanding EXPLAIN in MySQL',
        'published_at' => '2023-05-17 12:00:00',
        'authors' =>
            [
                [
                    'name' => 'John Doe',
                    'avatar_url' => 'https://example.com/img/john.doe',
                ],
                [
                    'name' => 'Jane Doe',
                    'avatar_url' => 'https://example.com/img/jane.doe',
                ],
            ],
    ],
];

header('Content-Type: application/json');
echo json_encode($data, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
