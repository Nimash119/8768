<?php
$reviewsFile = 'reviews.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $review = [
        'name' => htmlspecialchars($_POST['name']),
        'phone' => htmlspecialchars($_POST['phone']),
        'message' => htmlspecialchars($_POST['message']),
        'timestamp' => time()
    ];

    $reviews = file_exists($reviewsFile) ? json_decode(file_get_contents($reviewsFile), true) : [];
    $reviews[] = $review;

    file_put_contents($reviewsFile, json_encode($reviews, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo json_encode(['success' => true]);
    exit;
}
?>
