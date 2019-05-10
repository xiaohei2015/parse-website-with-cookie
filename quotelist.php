<?php
//Init
CONST ROOT_DIR = __DIR__;

//Include
require_once ROOT_DIR.'/lib/functions.php';
require_once ROOT_DIR.'/vendor/autoload.php';

//Import
use \GuzzleHttp\Client;

//App
$cookie_path = ROOT_DIR.'/runtime/cookie/';
if(!file_exists($cookie_path)){
	mkdir($cookie_path, 0755, true);
}
$cookie_file = $cookie_path.'application.cookie';

$jar = new \GuzzleHttp\Cookie\CookieJar();
$domain = 'chuanbo.weiboyi.com';
$cookies = [
    'PHPSESSID' => 'web2~ri5m4tjbi6gk6eeu72ghg27l61',
    //
];
$cookieJar = $jar->fromArray($cookies, $domain);

$client = new Client();

//quotelist
$quotelist_url = 'http://chuanbo.weiboyi.com/hwquote/index/quotelist?track_from=layout_header_info';
$r = $client->request('GET', $quotelist_url, ['cookies' => $cookieJar]);
echo $r->getBody();