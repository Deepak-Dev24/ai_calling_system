<?php
require '../core/auth.php';   // ✅ session + login
require '../core/db.php';

$userId = $_SESSION['user_id'] ?? 1;

$stmt = $pdo->prepare("
  SELECT
    COUNT(*) AS total_calls,
    COALESCE(SUM(bill_minutes), 0) AS total_minutes,
    COALESCE(SUM(amount), 0) AS total_amount
  FROM call_records
  WHERE user_id = ? AND paid = 0
");

$stmt->execute([$userId]);

echo json_encode($stmt->fetch());
