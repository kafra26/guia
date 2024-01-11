<?php
error_reporting(0);
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

function GetBetween($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}

$ts2 = microtime(true);
 clearstatcache();
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://tvlistings.gracenote.com/api/grid?lineupId=&timespan=1&headendId=1008175&country=MEX&timezone=&device=-&postalCode=52763&isOverride=true&time='.$ts2.'&pref=16%2C128&userId=-&aid=dishmex&languagecode=es-mx');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'authority: tvlistings.gracenote.com',
    'accept: */*',
    'accept-language: es-419,es;q=0.9',
    'referer: https://tvlistings.gracenote.com/grid-affiliates.html?aid=dishmex',
    'sec-ch-ua: "Not_A Brand";v="8", "Chromium";v="120", "Google Chrome";v="120"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
    'x-requested-with: XMLHttpRequest',
]);
curl_setopt($ch, CURLOPT_COOKIE, '_ga_K1JQ1EGMN2=GS1.1.1702669485.1.0.1702669485.0.0.0; _ga=GA1.2.1321763249.1702669486; _gid=GA1.2.994704698.1702669501; _gat_gtag_UA_34133884_39=1');
$response = curl_exec($ch);
$exp = explode("events", $response);
$e = array_shift($exp);
curl_close($ch);
print_r($exp);
?>
