<?php

echo "<html><head><title>Backdoor Detector</title>";
echo "<style>
        body { background: url('https://1.bp.blogspot.com/-txnCag9Z9jM/UuKj2FcKOSI/AAAAAAAAAuY/ExDFUIUMyk0/s1600/caveirapirataprataimagek.png') no-repeat center center fixed; background-size: cover; color: white; font-family: Arial, sans-serif; }
        table { width: 80%; margin: auto; border-collapse: collapse; background: rgba(0, 0, 0, 0.8); color: white; }
        th, td { border: 1px solid white; padding: 10px; text-align: left; }
        th { background: darkred; }
        h2 { text-align: center; color: red; }
    </style></head><body>";

echo "<h2>Backdoor Detector - Scan Results</h2>";

echo "<table><tr><th>Category</th><th>Details</th></tr>";

function addTableRow($category, $details) {
    echo "<tr><td>$category</td><td><pre>$details</pre></td></tr>";
}

function scanProcesses() {
    $output = shell_exec("ps aux");
    $suspicious_processes = [];
    if (preg_match_all('/\b(nc|perl|python|bash|socat|ncat)\b/', $output, $matches)) {
        $suspicious_processes = implode(", ", $matches[0]);
    }
    addTableRow("Running Processes", empty($suspicious_processes) ? "No suspicious processes detected." : $suspicious_processes);
}

function scanNetwork() {
    $output = shell_exec("netstat -antp");
    $suspicious_connections = [];
    if (preg_match_all('/\b(ESTABLISHED|LISTEN)\b/', $output, $matches)) {
        $suspicious_connections = implode(", ", $matches[0]);
    }
    addTableRow("Network Connections", empty($suspicious_connections) ? "No suspicious activity detected." : $suspicious_connections);
}

function scanFiles($directory = '/') {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    $suspicious_files = "";
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $content = file_get_contents($file->getPathname());
            if (preg_match('/(base64_decode|eval\(|xor|ROT13|crypt|AES|Blowfish)/', $content)) {
                $suspicious_files .= $file->getPathname() . "\n";
            }
        }
    }
    addTableRow("Suspicious Files", empty($suspicious_files) ? "No suspicious files found." : nl2br($suspicious_files));
}

function scanCrontab() {
    $output = shell_exec("crontab -l 2>/dev/null");
    $suspicious_cron = preg_match('/(nc|bash|perl|python|php|sh)\s.*\s(>/dev/null|&>/dev/null)/', $output) ? $output : "No suspicious entries found.";
    addTableRow("Crontab Entries", nl2br($suspicious_cron));
}

function scanHiddenFiles($directory = '/') {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    $hidden_files = "";
    foreach ($iterator as $file) {
        if ($file->isFile() && preg_match('/\/\./', $file->getFilename())) {
            $hidden_files .= $file->getPathname() . "\n";
        }
    }
    addTableRow("Hidden Files", empty($hidden_files) ? "No hidden files found." : nl2br($hidden_files));
}

echo "</table>";

echo "<h2>Scan Complete!</h2>";

scanProcesses();
scanNetwork();
scanFiles();
scanCrontab();
scanHiddenFiles();

echo "</body></html>";
?>
