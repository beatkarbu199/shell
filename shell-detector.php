<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (php_sapi_name() !== 'cli') {
    echo "<html><head><title>Backdoor Detector</title>";
    echo "<style>
            body { background: black; color: white; font-family: Arial, sans-serif; }
            table { width: 80%; margin: auto; border-collapse: collapse; background: #222; color: white; }
            th, td { border: 1px solid white; padding: 10px; text-align: left; }
            th { background: darkred; }
            h2 { text-align: center; color: red; }
        </style></head><body>";
    echo "<h2>Backdoor Detector - Scan Results</h2>";
    echo "<table><tr><th>File</th><th>Detected Patterns</th></tr>";
}

function scanFiles($directory) {
    $patterns = ['/base64_decode/', '/eval\(/', '/gzinflate\(/', '/str_rot13\(/', '/shell_exec/', '/system/', '/exec/', '/popen/', '/proc_open/'];
    $iterator = new DirectoryIterator($directory);
    foreach ($iterator as $file) {
        if ($file->isFile() && is_readable($file->getPathname())) {
            $content = file_get_contents($file->getPathname());
            $matches = [];
            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $content)) {
                    $matches[] = trim($pattern, '/');
                }
            }
            if (!empty($matches)) {
                echo "<tr><td>{$file->getPathname()}</td><td>" . implode(", ", $matches) . "</td></tr>";
            }
        }
    }
}

$scanDir = isset($_GET['dir']) ? realpath($_GET['dir']) : $_SERVER['DOCUMENT_ROOT'];
if ($scanDir === false || !is_dir($scanDir)) {
    $scanDir = $_SERVER['DOCUMENT_ROOT'];
}

echo "<h3>Scanning Directory: $scanDir</h3>";
scanFiles($scanDir);

echo "</table>";
echo "<h2>Scan Complete!</h2>";
echo "</body></html>";
?>
