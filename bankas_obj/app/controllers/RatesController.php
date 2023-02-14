<?php
namespace Bank\Controllers;

use Bank\App;

class RatesController {

public function convert() {
    return App::view('convert');
  }

  private $settings = 'Json';
  // private $settings = 'Maria';

  private function get() {
  $db = 'Bank\\Rates\\'.$this->settings;
  return $db::get();
  }

  public function request(string $from, string $to, $amount) : void {
    $source = 'Cache'; 
    $rez = $this->fromCache($from, $to, $amount);
    if (empty($rez)) {
      $source = 'Server';
      $rez = $this->fromServer($from, $to, $amount);
      $this->get()->addCache($rez);
    }
    // [$from, $to, $amount, $result, $date, $rate, time()];
    $_SESSION['from'] = $rez[0];
    $_SESSION['to'] = $rez[1];
    $_SESSION['amount'] = $rez[2];
    $_SESSION['result'] = $rez[3];
    $_SESSION['date'] = $rez[4];
    $_SESSION['rate'] = $rez[5];
    $_SESSION['src'] = $source;
    
    App::redirect('convert');
  }

  public function fromCache(string $from, string $to, string $amount) : array {
    if (!file_exists(DIR.'data/rates.json')) {
      file_put_contents(DIR.'data/rates.json', json_encode([]));
    }
    $rates = json_decode(file_get_contents(DIR.'data/rates.json'), 1);
  
    foreach ($rates as $r) {
      if ($r[0] == $from && $r[1] == $to && $r[6] + VALID_CATCHE > time()) {
        return $r;
      }
    }
    return [];
  }

  public function fromServer(string $from, string $to, $amount) : array
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL,'https://api.exchangerate.host/convert?from='.$from.'&to='.$to.'&amount='.$amount);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $answer = curl_exec($curl);

    curl_close($curl);

    $data = json_decode($answer);
    
    $result = $data->result;
    $date = $data->date;
    $rate = $data->info->rate;

    return [$from, $to, $amount, $result, $date, $rate, time()];
  }
}