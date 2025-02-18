<?php

function scanProcesses() {
    echo "[+] Scanning running processes...\n";
    $output = shell_exec("ps aux");
    $suspicious_processes = [];
    
    if (preg_match_all('/\b(nc|perl|python|bash|socat|ncat)\b/', $output, $matches)) {
        $suspicious_processes = $matches[0];
    }
    
    if (!empty($suspicious_processes)) {
        echo "[!] Suspicious processes found:\n";
        print_r($suspicious_processes);
    } else {
        echo "[-] No suspicious processes detected.\n";
    }
}

function scanNetwork() {
    echo "[+] Scanning active network connections...\n";
    $output = shell_exec("netstat -antp");
    $suspicious_connections = [];
    
    if (preg_match_all('/\b(ESTABLISHED|LISTEN)\b/', $output, $matches)) {
        $suspicious_connections = $matches[0];
    }
    
    if (!empty($suspicious_connections)) {
        echo "[!] Suspicious network connections found:\n";
        print_r($suspicious_connections);
    } else {
        echo "[-] No suspicious network activity detected.\n";
    }
}

function scanFiles($directory = '/') {
    echo "[+] Scanning files for obfuscation/encryption...\n";
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $content = file_get_contents($file->getPathname());
            if (preg_match('/(base64_decode|eval\(|xor|ROT13|crypt|AES|Blowfish)/', $content)) {
                echo "[!] Suspicious file found: " . $file->getPathname() . "\n";
            }
        }
    }
}

function scanCrontab() {
    echo "[+] Checking crontab for anomalies...\n";
    $output = shell_exec("crontab -l 2>/dev/null");
    if (preg_match('/(nc|bash|perl|python|php|sh)\s.*\s(>/dev/null|&>/dev/null)/', $output)) {
        echo "[!] Suspicious crontab entry found:\n";
        echo $output . "\n";
    } else {
        echo "[-] No suspicious crontab entries detected.\n";
    }
}

function scanHiddenFiles($directory = '/') {
    echo "[+] Searching for hidden files and directories...\n";
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    
    foreach ($iterator as $file) {
        if ($file->isFile() && preg_match('/\/\./', $file->getFilename())) {
            echo "[!] Hidden file detected: " . $file->getPathname() . "\n";
        }
    }
}

function main() {
    scanProcesses();
    scanNetwork();
    scanFiles();
    scanCrontab();
    scanHiddenFiles();
    echo "[+] Scan complete!\n";
}

main();
?>
