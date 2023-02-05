<?php
echo '<----------------[1] Kibiras1---------------->';

require __DIR__.'/Kibiras1.php';

$kibirelis = new Kibiras1;

echo '<pre>';
_dc($kibirelis);

$kibirelis->prideti1Akmeni();
_d($kibirelis->akmenuKiekis, 'Pridetas 1 akmuo--->');

$kibirelis->pridetiDaugAkmenu(9);
_d($kibirelis->akmenuKiekis, 'Prideti 9 akmenys--->');

$kibirelis->pridetiDaugAkmenu(4);
_d($kibirelis->akmenuKiekis, 'Prideti 4 akmenys--->');

$kibirelis->prideti1Akmeni();
_d($kibirelis->akmenuKiekis, 'Pridetas dar 1 akmeni--->');

_dc($kibirelis);

echo '<---------------[2][8] Pinigine-------------->';

require __DIR__.'/Pinigine.php';

$kashiliokas = new Pinigine;

echo '<pre>';
_dc($kashiliokas);

_d($kashiliokas->popieriniaiPinigai, 'Kiek piniginej popieriniu pinigu?');
_d($kashiliokas->metaliniaiPinigai, 'Kiek piniginej metaliniu pinigu?');

$kashiliokas->ideti(200);
_d($kashiliokas->popieriniaiPinigai, 'Buvo ideta 200 pinigu');
_d($kashiliokas->metaliniaiPinigai, 'Kiek piniginej metaliniu pinigu?');

$kashiliokas->ideti(2);

_d($kashiliokas->skaiciuoti(), 'Kiek viso piniginej yra pinigu?');
_d($kashiliokas->banknotai(), 'Banknotu yra:');
_d($kashiliokas->monetos(), 'Monetu yra:');

echo '<------------[3] (STATIC) Kibiras2----------->';

require __DIR__.'/Kibiras2.php';

$kibiras1 = new Kibiras2;
$kibiras2 = new Kibiras2;
$kibiras3 = new Kibiras2;

echo '<pre>';
// _d($kibiras1, 'Kibiras1');
// _d($kibiras2, 'Kibiras2');
// _d($kibiras3, 'Kibiras3');

// _d($kibiras1->pridetiDaugAkmenu(10), 'I Kibiras3 pririnkta akmenu:');
// _d($kibiras2->prideti1Akmeni(), 'I Kibiras3 idetas 1 akmuo:');
// _d($kibiras3->pridetiDaugAkmenu(9), 'I Kibiras3 pririnkta akmenu:');

// _d($kibiras3->akmenuKiekisVisuoseKibiruose, 'Visuose kibiruose yra:');

echo '<-----------[4] (EXTENDS) Kibiras3----------->';

require __DIR__.'/Kibiras3.php';

$kibir = new Kibiras3;
$kibirVibir = new KibirasNePo1;

echo '<pre>';
_dc($kibirVibir);

_d($kibir->prideti1Akmeni(), 'Prides i Pirma tik 1 akmeni:');
_d($kibir->kiekPririnktaAkmenu(), 'Pirmam kibire tik 1 akmuo:');

_d($kibirVibir->prideti1Akmeni(), 'Kiek akmenu prides vietoj 1?');
_d($kibirVibir->pridetiDaugAkmenu(10), 'Pridedam dar 10 akmeneliu:');
_d($kibirVibir->kiekPririnktaAkmenu(), 'Kiek akmenu antram kibire?');

echo '<----------------[6] Stikline---------------->';

require __DIR__.'/Stikline.php';

$stikline100 = new Stikline(100);
$stikline150 = new Stikline(150);
$stikline200 = new Stikline(200);

echo '<pre>';
_dc($stikline200);
_dc($stikline150);
_dc($stikline100);

_d($stikline200->ipilti(200), 'Pripildom 200ml stikline-->');
// _d($stikline200->kiekis, '200 ml stiklineje yra ml:');

_d($stikline150->ipilti($stikline200->ispilti()), '200 ml ispilam i 150 ml stikline:');
// _d($stikline150->kiekis, '150 ml stiklineje yra ml:');

_d($stikline100->ipilti($stikline150->ispilti()), '150 ml ispilam i 100 ml stikline:');
// _d($stikline100->kiekis, '100 ml stiklineje yra ml:');

echo '<h2>Stikliniu turiai po perpilstymu:</h2>';
_dc($stikline200);
_dc($stikline150);
_dc($stikline100);

echo '<-----------------[7] Grybas----------------->';

require __DIR__.'/Grybas.php';
require __DIR__.'/Krepsys.php';

$kashikas = new Krepsys;

do {
  $grybas = new Grybas;
  $kashikas->arDetiIKrepsi($grybas); 
 }
  while ($kashikas->bendrasSvoris < $kashikas::DYDIS);

  _dc('Is viso pririnkta '.count($kashikas->visiGrybai).' geru grybu.');
