<?php
require '../core/auth.php';   // ✅ session + login
require '../core/db.php';

$userId = $_SESSION['user_id'] ?? 1;

$stmt = $pdo->prepare("
  UPDATE call_records
  SET paid = 1
  WHERE user_id = ? AND paid = 0
");

$stmt->execute([$userId]);

echo json_encode([
  "status" => "success",
  "message" => "Bill cleared"
]);
