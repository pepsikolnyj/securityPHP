<?php
include 'includes/db.php';

$stmt = $pdo->query("SELECT id, password FROM user");
$users = $stmt->fetchAll();

foreach ($users as $u) {
    $newHash = password_hash($u['password'], PASSWORD_DEFAULT);

    $update = $pdo->prepare("UPDATE user SET password = ? WHERE id = ?");
    $update->execute([$newHash, $u['id']]);
}

echo "Done!";
