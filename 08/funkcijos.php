<?php

// 1. Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;

function h1($text) {
  return "<h1>$text</h1>";
}

echo h1('Laba diena!');

// 2. Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, įterpiamas į h tagą, o antrasis tago numeris (1-6). Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;

function tagH($text, $num) {
  return "<h$num>$text</h$num>";
}

echo tagH('Su vistiena!', 5);

// 3. Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). Visus skaitmenis stringe įdėkite į h1 tagą. Raides palikite. Jegu iš eilės eina keli skaitmenys, juos į tagą reikią dėti kartu (h1 atsidaro prieš pirmą ir užsidaro po paskutinio) Keitimui naudokite pirmo patobulintą (jeigu reikia) uždavinio funkciją ir preg_replace_callback();

// Mano variantas
echo 'Kodas: ' .$md5 = md5(time());
$pattern = '/\d+/';
echo '<pre>Digits: ';

function boldNums($code) {
  print_r($code);
  return "<h1 style='display: inline-block; padding: 0 3px;'>$code[0]</h1>";
}

$result = preg_replace_callback($pattern, 'boldNums', $md5);

echo '<br>Result: ' .$result;

// Klases variantas
echo '<br>';
$hash = md5(time());
// function bold(string|array $data) : void php v.8
function bold($data) : string {
  // return '*';
  print_r($data);
  if (is_array($data)) {
    $data = $data[0];
  }
  return '<h1 style="display: inline-block;">'.$data.'</h1>';
}

$hash = preg_replace_callback('/(\d+)/', 'bold', $hash);
echo '<br>Class result: ' .$hash;

// Anonimine arrow funkcija
$hash1 = md5(time());

$rez = preg_replace_callback('/(\d)(\d+)/', fn($m) => '<h1 style="display: inline-block; color: red">'.$m[1].'</h1>'.'<h2 style="display: inline-block;">'.$m[2].'</h2>', $hash1);

echo '<br>';
print_r($rez);

// 4. Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos (išskyrus vienetą ir patį save) Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;

echo '<br>';

function countDivisors(int $num) {
  $count = 0;
  $divisors = [];
  if (is_int($num)) {
    for($i = 2; $i < $num; $i++) {
      if ($num % $i == 0) {
    $count++;
    $divisors[] = $i;
      }
    }
  } else {
    echo 'Please enter whole number.';
  }
  // print_r($divisors);
  // echo "Divisors of $num: " .$count .'<br>';
  return $count;
}

countDivisors(98);

// 5. Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.

echo '<br>';
$array = [];

foreach(range(1,100) as $el) {
  $array[] = rand(33,77);
}

// print_r($array);
usort($array, function($a, $b) {
  return countDivisors($b) <=> countDivisors($a);
});
echo 'Isrusiuotas masyvas:<br>';
print_r($array);

// 6. Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777. Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius.

$array2 = [];

foreach(range(1,100) as $key => $el) {
  $array2[] = rand(333, 777);
  if (countDivisors($array2[$key]) == 0) {
    echo "Primary: [$key] => $array2[$key]<br>";
    unset($array2[$key]);
  }
}
echo 'Masyvas be pirminiu skaiciu:<br>';
print_r($array2);
echo 'Masyvo reiksmes:<br>';
print_r(array_values($array2));

// 7. Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, išskyrus paskutinį, elementai yra atsitiktiniai skaičiai nuo 0 iki 10, o paskutinis masyvas, kuris generuojamas pagal tokią pat salygą kaip ir pirmasis masyvas. Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų. Paskutinio masyvo paskutinis elementas yra lygus 0;

// Variant with nested arrays of same size&values (only loop included);
// $multiArr = [];
// echo '<br>';
// $i = 0;
// $times = rand(10, 30);

// do {
//   foreach(range(1, rand(10, 20)) as $el) {
//     $multiArr[$el] = rand(0, 10);
//     $multiArr[count($multiArr)] = $multiArr;
//     if($i == $times-1) {
//       $multiArr[count($multiArr)] = 0;
//     }
//   }
// } while($i++ < $times);

// print_r($multiArr);

// Improved solution with function
$randSizeArr = function($size) {
  $arr = [];
  foreach(range(1, $size) as $el) {
  $arr[] = rand(0, 10);
  }
  return $arr;
};

$multiArr = [];
$nestedArr = [];
$size = rand(10, 30);

for($i = 0; $i < $size; $i++) {
  $nestedArr = $randSizeArr(rand(10, 20));
  
  if (!$size) {
    $nestedArr[count($nestedArr)-1] = 0;
  } else {
    $nestedArr[count($nestedArr)-1] = $multiArr;
  }
  $multiArr = $nestedArr;
}

print_r($multiArr);

// 8. Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą. Skaičiuoti reikia visuose masyvuose ir submasyvuose.

$arrSum = function($arr) use(&$arrSum) {
  $sum = 0;
  foreach($arr as $el) {
  if (!is_array($el)) {
    $sum += $el;
  } else {
    $sum += $arrSum($el);
  }
}
  return $sum;
};

echo '<br>Visu elementu suma: ' .$arrSum($multiArr);

// 9. Sugeneruokite masyvą iš trijų elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 33. Jeigu tarp trijų paskutinių elementų yra nors vienas ne pirminis skaičius, prie masyvo pridėkite dar vieną elementą- atsitiktinį skaičių nuo 1 iki 33. Vėl patikrinkite pradinę sąlygą ir jeigu reikia pridėkite dar vieną elementą. Kartokite, kol sąlyga nereikalaus pridėti elemento. 

$prime = function($num) {
  $count = 0;
  for ($i = 2; $i <= $num/2; $i++) {
    if ($num % $i == 0) {
      $count++;
    }
  }
  return $count;
};

$randArr = function($size = 3) {
  $arr = [];
  foreach(range(1, $size) as $el) {
    $arr[] = rand(1, 33);
  }
  return $arr;
};

echo '<br>';
$randArr = $randArr();

$checkPrimes = function($arr, $lastNum = 3) use(&$prime) {
  for ($i = 0; $i < $lastNum; $i++) {
    if ($prime(array_slice($arr, -$lastNum)[$i])) {
      return true;
    }
  }
  return false;
};

while($checkPrimes($randArr)) {
  $randArr[] = rand(1, 33);
}

print_r($randArr);
print_r(array_slice($randArr, -3));

// 10. Sugeneruokite masyvą iš 10 elementų, kurie yra masyvai iš 10 elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 100. Jeigu tokio didelio masyvo (ne atskirai mažesnių) pirminių skaičių vidurkis mažesnis už 70, suraskite masyve mažiausią skaičių (nebūtinai pirminį) ir prie jo pridėkite 3. Vėl paskaičiuokite masyvo pirminių skaičių vidurkį ir jeigu mažesnis nei 70 viską kartokite. 

$masyvas = [];

foreach(range(1, 10) as $el) {
  foreach(range(1, 10) as $num) {
    $masyvas[$el][$num] = rand(1, 100);
  }
}
print_r($masyvas);

$averageOfPrimes = function($arr) {
  $count = 0;
  $sum = 0;
  
  foreach($arr as $el) {
    foreach($el as $num) {
      if (!countDivisors($num)) {
        $count++;
        $sum += $num;
      }
    }
  }
  echo $sum/$count .'<br>';
  return $count ? $sum/$count : 0;
};

$minNum = function($arr) {
  $min = PHP_INT_MAX;
  $ind = [0, 0];
  foreach($arr as $i => $elm) {
    foreach($elm as $l => $num) {
      if($num < $min) {
        $min = $num;
        $ind = [$i, $l];
      }
    }
  } 
  return $ind;
};

while ($averageOfPrimes($masyvas) < 70) {
  [$i, $l] = $minNum($masyvas);
  $masyvas[$i][$l] +=3;
}

echo $averageOfPrimes($masyvas) .'<br>';
print_r($minNum($masyvas));
