<?php
// One-time setup script to create database and tables
require __DIR__ . '/config.php';

header('Content-Type: text/plain; charset=utf-8');

try {
    // db() will auto-create the database if missing and connect
    $pdo = db();
    ensureSchema();
    $dbName = getenv('DB_NAME') ?: 'billsplit';
    echo "Database and schema are ready.\n";
    echo "DB Name: {$dbName}\n";
    // Quick connectivity check and table count
    $stmt = $pdo->query("SHOW TABLES LIKE 'expenses'");
    if ($stmt->rowCount() === 0) {
        echo "WARN: 'expenses' table not found after ensureSchema().\n";
    } else {
        $cnt = (int)$pdo->query('SELECT COUNT(*) AS c FROM expenses')->fetch()['c'];
        echo "Table 'expenses' exists. Row count: {$cnt}\n";
    }

    // Optional seed: visit setup_db.php?seed=1 to insert sample data
    $seed = isset($_GET['seed']) && (string)$_GET['seed'] !== '0';
    if ($seed) {
        $samples = [
            ['payer' => 'Alice', 'amount' => 800.00, 'participants' => ['Bob', 'Charlie', 'Diana']],
            ['payer' => 'Bob',   'amount' => 300.00, 'participants' => ['Alice', 'Charlie']],
            ['payer' => 'Charlie','amount' => 450.00, 'participants' => ['Alice', 'Bob', 'Diana', 'Evan']],
        ];
        $ins = $pdo->prepare('INSERT INTO expenses (payer, amount, participants) VALUES (?, ?, ?)');
        foreach ($samples as $s) {
            $ins->execute([$s['payer'], $s['amount'], json_encode($s['participants'], JSON_UNESCAPED_UNICODE)]);
        }
        $cnt = (int)$pdo->query('SELECT COUNT(*) AS c FROM expenses')->fetch()['c'];
        echo "Seeded sample data. New row count: {$cnt}\n";
    }

    echo "Ready. You can now open dashboard1.php or demo1.php.\n";
} catch (Throwable $e) {
    http_response_code(500);
    echo "Setup failed: " . $e->getMessage() . "\n";
    if ($e instanceof PDOException) {
        echo "Tip: Verify MySQL is running, and credentials in config.php (DB_HOST/DB_USER/DB_PASS).\n";
    }
}
?>


