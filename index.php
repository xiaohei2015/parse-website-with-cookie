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

//Login
$login_url = 'http://chuanbo.weiboyi.com/';
$login_data = [
	'web_csrf_token' => 'undefined',
	'mode' => 1,
	'typelogin' => '1/',
	'piccode' => '76QE',
	'username' => 'user01',
	'password' => 'pass'
];
$r = $client->request('POST', $login_url, ['form_params'=>$login_data, 'cookies' => $cookieJar]);
echo $r->getBody();

echo 'Finished!';