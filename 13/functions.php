<?php

define('VALID_CATCHE', 30);

function request(string $from, string $to) : void {
  $source = 'Cache'; 
  $rez = fromCache($from, $to);
  if (empty($rez)) {
    $source = 'Server';
    $rez = fromServer($from, $to);
    addCache($rez);
  }
//  return [$distance, $images, $desc, $from, $to, time()];
$_SESSION['dist'] = $rez[0] / 1000;
$_SESSION['from'] = $rez[3];
$_SESSION['to'] = $rez[4];
$_SESSION['img'] = $rez[1];
$_SESSION['desc'] = $rez[2]; 
$_SESSION['src'] = $source;
}

function fromCache(string $from, string $to) : array {
  if (!file_exists(__DIR__.'/dis.json')) {
    $dis = [];
    $dis = json_encode($dis);
    file_put_contents(__DIR__.'/dis.json', $dis);
  }
  $dis = json_decode(file_get_contents(__DIR__.'/dis.json'), 1);

  foreach ($dis as $d) {
    if ($d[3] == $from && $d[4] == $to && $d[5] + VALID_CATCHE > time()) {
      return $d;
    }
  }
  return [];
}

function addCache(array $rez) : void {
  if (!file_exists(__DIR__.'/dis.json')) {
    $dis = [];
    $dis = json_encode($dis);
    file_put_contents(__DIR__.'/dis.json', $dis);
  }
  $dis = json_decode(file_get_contents(__DIR__.'/dis.json'), 1);
  $dis[] = $rez;
  $dis = json_encode($dis);
  file_put_contents(__DIR__.'/dis.json', $dis);
}

function clearCache() : void {
  if (!file_exists(__DIR__.'/dis.json')) {
    $dis = [];
    $dis = json_encode($dis);
    file_put_contents(__DIR__.'/dis.json', $dis);
  }
  $dis = json_decode(file_get_contents(__DIR__.'/dis.json'), 1);

  foreach ($dis as $k => $d) {
    if ($d[5] + VALID_CATCHE < time()) {
      unset($dis[$k]);
    }
  }
  $dis = json_encode($dis);
  file_put_contents(__DIR__.'/dis.json', $dis);
}

function fromServer(string $from, string $to) :array {
  // array of URLs
  $urls = ['https://api.geoapify.com/v1/routing?waypoints=54.23018865,24.07861886157142|54.6870458,25.2829111&mode=drive&apiKey=eeb39a5aa8484d288647f7d0bd0a776d', 'https://api.unsplash.com/search/photos?page=1&per_page=30&query='.$from.'&client_id=KLS9w5VlrBI1dRCTCDtj2zWJbF8Q3dDFg8W57RQo1Bk',
    'https://api.unsplash.com/search/photos?page=1&per_page=30&query='.$to.'&client_id=KLS9w5VlrBI1dRCTCDtj2zWJbF8Q3dDFg8W57RQo1Bk'];
  
  // init the curl Multi   
    $multCurl = curl_multi_init();
  
  // create an array for the curl handles
    $responses = [];
  // creaate an array of data to be returned
    $data = [];
  
  //add the handles for each url
  foreach ($urls as $k => $url) {
  // init curl, and then setup your options
    $responses[$k] = curl_init($url);
    curl_setopt($responses[$k], CURLOPT_URL, $url);
  // returns the result
    curl_setopt($responses[$k], CURLOPT_RETURNTRANSFER,1); 
    curl_multi_add_handle($multCurl, $responses[$k]);
  }
  
  $running = null;
  //execute the multi handle
  do {
    curl_multi_exec($multCurl, $running);
  } while ($running);
  
  // iterating through the handles get content and remove the handles
  foreach ($responses as $k =>$curl) {
  $data[$k] = curl_multi_getcontent($curl);
  $data[$k] = json_decode($data[$k]);
  curl_multi_remove_handle($multCurl, $curl);
  }
  // close the curl multi handler
  curl_multi_close($multCurl);
  
  $distance = $data[0]->features[0]->properties->distance;
  
  $rand = rand(0,9);
  $images = [$data[1]->results[$rand]->urls->regular, $data[2]->results[$rand]->urls->regular];

  $desc = [$data[1]->results [$rand]->alt_description, $data[2]->results [$rand]->alt_description];

  return [$distance, $images, $desc, $from, $to, time()];
}