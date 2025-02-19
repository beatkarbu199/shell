<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (php_sapi_name() !== 'cli') {
    echo "<html><head><title>Backdoor Detector</title>";
    echo "<style>
            body { background: url('https://c4.wallpaperflare.com/wallpaper/898/294/539/call-of-duty-call-of-duty-modern-warfare-2-illustration-digital-art-4k-hd-wallpaper-preview.jpg') no-repeat center center fixed; background-size: cover; color: white; font-family: Arial, sans-serif; }
            table { width: 80%; margin: auto; border-collapse: collapse; background: rgba(0, 0, 0, 0.8); color: white; }
            th, td { border: 1px solid white; padding: 10px; text-align: left; }
            th { background: darkred; }
            h2 { text-align: center; color: red; }
        </style></head><body>";
    echo "<h2>Backdoor Detector - Scan Results</h2>";
    echo "<table><tr><th>Category</th><th>Details</th></tr>";
}

function addTableRow($category, $details) {
    echo "<tr><td>$category</td><td><pre>$details</pre></td></tr>";
}

function scanFiles($directory) {
    if (!is_dir($directory)) {
        addTableRow("Suspicious Files", "Invalid directory: $directory");
        return;
    }
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS));
    $suspicious_files = "";
    foreach ($iterator as $file) {
        if ($file->isFile() && is_readable($file->getPathname())) {
            $content = file_get_contents($file->getPathname());
            if (preg_match('/(base64_decode|eval\(|shell_exec|system|passthru|exec|popen|proc_open|curl_exec|file_get_contents|fsockopen|socket_create)/i', $content)) {
                $suspicious_files .= $file->getPathname() . "\n";
            }
        }
    }
    addTableRow("Suspicious Files", empty($suspicious_files) ? "No suspicious files found." : nl2br($suspicious_files));
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
