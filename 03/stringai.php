<?php

// 5. Sukurti kintamąjį su stringu: “An American in Paris”. Jame visas “a” (didžiąsias ir mažąsias) pakeisti žvaigždutėm “*”.  Rezultatą atspausdinti.
//  6. Sukurti kintamąjį su stringu: “An American in Paris”. Suskaičiuoti visas “a” (didžiąsias ir mažąsias) raides. Rezultatą atspausdinti.

echo 'Filmo pavadinimas: ' .$filmoPav = 'An American in Paris';

$pavSuZv = str_ireplace('a', '*', $filmoPav, $atv);

echo'<br>Pavadinimas su *: ' . $pavSuZv;
echo'<br>Pakeitimai: ' . $atv;

//  7. Sukurti kintamąjį su stringu: “An American in Paris”. Jame ištrinti visas balses. Rezultatą atspausdinti. Kodą pakartoti su stringais: “Breakfast at Tiffany's”, “2001: A Space Odyssey” ir “It's a Wonderful Life”.

$sakinys1 = 'An American in Paris';
$sakinys2 = 'Breakfast at Tiffany\'s';
$sakinys3 = '2001: A Space Odyssey';
$sakinys4 = 'It\'s a Wonderful Life';

$sak1_beBalsiu = str_ireplace(['a', 'e', 'i', 'o', 'u', 'y'], '', $sakinys1);

$sak2_beBalsiu = str_ireplace(['a', 'e', 'i', 'o', 'u', 'y'], '', $sakinys2);

$sak3_beBalsiu = str_ireplace(['a', 'e', 'i', 'o', 'u', 'y'], '', $sakinys3);

$sak4_beBalsiu = str_ireplace(['a', 'e', 'i', 'o', 'u', 'y'], '', $sakinys4);

echo '<pre>Pirmas sakinys: ' .$sak1_beBalsiu;
echo '<br>Antras sakinys: ' .$sak2_beBalsiu;
echo '<br>Trecias sakinys: ' .$sak3_beBalsiu;
echo '<br>Ketvirtas sakinys: ' .$sak4_beBalsiu;

//  8. Stringe, kurį generuoja toks kodas: 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope'; Surasti ir atspausdinti epizodo numerį.

echo '<pre>Stringas: ' .$stringas = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';

preg_match('!\d+!', $stringas, $epNumeris);

echo'<pre>Epizodo Numeris: ' .$epNumeris[0];

//  9. Suskaičiuoti kiek stringe “Don't Be a Menace to South Central While Drinking Your Juice in the Hood” yra žodžių trumpesnių arba lygių nei 5 raidės. Pakartokite kodą su stringu “Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale”.

echo '<pre>Ilgas stringas 1: ' .$ilgasStringas1 = 'Don\'t Be a Menace to South Central While Drinking Your Juice in the Hood';

echo '<pre>Ilgas stringas 2: ' .$ilgasStringas2 = 'Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale';
echo '</pre>';

$strArray1 = str_word_count($ilgasStringas1, 1);

$wordCount1 = 0;

foreach ($strArray1 as $word) {
  if (strlen($word) <= 5) $wordCount1++;
  echo $word, ' => ', strlen($word), '<pre>';
}

echo "Pirmame sakinyje yra zodziu, kuriuose 5 ar maziau raidziu: <b>$wordCount1</b>.<pre>";

$strArray2 = explode(' ', $ilgasStringas2);

$wordCount2 = 0;

foreach ($strArray2 as $word) {
  if (mb_strlen($word) <= 5) $wordCount2++;
  echo $word, ' => ', mb_strlen($word), '<pre>';
}
echo "Antrame sakinyje yra zodziu, kuriuose 5 ar maziau raidziu: <b>$wordCount2</b>.<pre>";
echo 'Antrame sakinyje: ' .mb_strlen($ilgasStringas2) .' simb.</pre>';

//  10. Parašyti kodą, kuris generuotų atsitiktinį stringą iš lotyniškų mažųjų raidžių. Stringo ilgis 3 simboliai.
// 1 variantas
function generateRandString($len = 3) {
  $chars = 'abcdefghijklmnopqrstuvwxyz';
  $charsLen = strlen($chars);
  $randString = '';
  for ($i = 0; $i < $len; $i++) {
    $randString .= $chars[rand(0, $charsLen -1)];
  }
  return $randString;
}

echo generateRandString();

// 2 variantas
$chars = 'abcdefghijklmnopqrstuvwxyz';
$charsLen = strlen($chars);
echo $randChars = str_shuffle($chars);

echo '<pre>RandChars: ' .$randChars[rand(0, $charsLen-1)].$randChars[rand(0, $charsLen-1)].$randChars[rand(0, $charsLen-1)] .'</pre>';

// 3 variantas
 print_r($charsArr = str_split($randChars, 3));

 echo '<pre> CharsArr: ' .$charsArr[rand(0, 8)];

//  11. Parašykite kodą, kuris generuotų atsitiktinį stringą su 10 atsitiktine tvarka išdėliotų žodžių, o žodžius generavimui imtų iš 9-me uždavinyje pateiktų dviejų stringų. Žodžiai neturi kartotis. (reikės masyvo)

echo '<pre>' .$filmWords = $ilgasStringas1 . ' ' .$ilgasStringas2;

echo '<pre>' .$filmWords = str_replace(',', '', $filmWords);

print_r($wordsArr = explode(' ', $filmWords));

function generateRandWords($words, $len=10) {
  $arrLen = count($words);
  $randomWords = []; 

  while(count($randomWords) < $len) {
    array_push($randomWords, $words[rand(0, $arrLen-1)]);
    $randomWords = array_values(array_unique($randomWords));
  }
  return implode(' ', $randomWords);
}

echo generateRandWords($wordsArr);