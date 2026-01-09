<?php
// Renders an existing .php file and rewrites internal links to .php equivalents

function render_php_as_php(string $phpFilePath, array $replacements = []): void {
    if (!is_file($phpFilePath)) {
        http_response_code(404);
		echo "File not found: " . htmlspecialchars($phpFilePath);
        return;
    }

    $php = file_get_contents($phpFilePath);
    if ($php === false) {
        http_response_code(500);
		echo "Unable to read: " . htmlspecialchars($phpFilePath);
        return;
    }

    // Convert .php navigation links to .php
    $php = str_replace([
        'href="index.php"',
        'href="features.php"',
        'href="demo.php"',
        'href="dashboard.php"',
        'href="faq.php"',
        'href="about.php"',
        'href="itemized.php"'
    ], [
        'href="index.php"',
        'href="features.php"',
        'href="demo.php"',
        'href="dashboard.php"',
        'href="faq.php"',
        'href="about.php"',
        'href="itemized.php"'
    ], $php);

    // Also convert plain references to features/index in call-to-actions
    $php = str_replace([
        '"features.php"',
        '"index.php"',
        '"itemized.php"'
    ], [
        '"features.php"',
        '"index.php"',
        '"itemized.php"'
    ], $php);

    // Apply optional custom replacements (e.g., inject API URLs)
    foreach ($replacements as $search => $replace) {
        $php = str_replace($search, $replace, $php);
    }

	// Output as HTML
	header('Content-Type: text/html; charset=UTF-8');
    echo $php;
}
?>


