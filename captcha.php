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

//captcha
$captcha_url = 'http://chuanbo.weiboyi.com/hwauth/index/captcha?web_csrf_token=undefined';
$r = $client->request('GET', $captcha_url, ['cookies' => $cookieJar]);
$result = json_decode($r->getBody());
$captcha_file = ROOT_DIR.'/captcha.png';
file_put_contents($captcha_file,file_get_contents($result->url));

?>
<img src="captcha.png"/>