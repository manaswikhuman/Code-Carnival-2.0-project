<?php
// Database configuration and PDO connection helper

// Use SQLite for easy setup - no server required
$DB_FILE = __DIR__ . '/billsplit.db';

function db(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    global $DB_FILE;
    $dsn = "sqlite:{$DB_FILE}";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    
    try {
        $pdo = new PDO($dsn, null, null, $options);
    } catch (PDOException $e) {
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Database connection failed', 'detail' => $e->getMessage()]);
        exit;
    }
    return $pdo;
}

// Ensure a minimal schema exists (idempotent)
function ensureSchema(): void {
    $pdo = db();
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS expenses (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            payer TEXT NOT NULL,
            amount REAL NOT NULL,
            participants TEXT NOT NULL,
            email TEXT,
            participant_emails TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );'
    );
    
    // Add email column if it doesn't exist (for existing databases)
    try {
        $pdo->exec('ALTER TABLE expenses ADD COLUMN email TEXT;');
    } catch (PDOException $e) {
        // Column already exists, ignore error
    }
    
    // Add participant_emails column if it doesn't exist
    try {
        $pdo->exec('ALTER TABLE expenses ADD COLUMN participant_emails TEXT;');
    } catch (PDOException $e) {
        // Column already exists, ignore error
    }

    // Groups: reusable participant sets owned by an email
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS groups (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            owner_email TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );'
    );

    // Group members: unique by (group_id, email)
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS group_members (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            group_id INTEGER NOT NULL,
            name TEXT NOT NULL,
            email TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            UNIQUE(group_id, email),
            FOREIGN KEY(group_id) REFERENCES groups(id) ON DELETE CASCADE
        );'
    );

    // Invite links for groups
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS group_invites (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            group_id INTEGER NOT NULL,
            token TEXT UNIQUE NOT NULL,
            expires_at DATETIME,
            max_uses INTEGER,
            uses INTEGER DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY(group_id) REFERENCES groups(id) ON DELETE CASCADE
        );'
    );

    // Reminders log
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS reminders (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            recipient_email TEXT NOT NULL,
            recipient_name TEXT,
            amount REAL,
            subject TEXT NOT NULL,
            message TEXT NOT NULL,
            status TEXT NOT NULL,
            error TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );'
    );

    // Activities feed
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS activities (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            type TEXT NOT NULL,
            detail TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );'
    );

    // Payments (record settlements)
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS payments (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            amount REAL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );'
    );
}

// Call ensureSchema lazily for API usage
if (!defined('SCHEMA_READY')) {
    define('SCHEMA_READY', true);
    ensureSchema();
}
?>


