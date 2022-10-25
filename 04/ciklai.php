<?php
//  4. Nupieškite kvadratą iš “*”, kurio kraštines sudaro 100 “*”. Panaudokite css stilių, kad kvadratas ekrane atrodytų kvadratinis.
//  5. Prieš tai nupieštam kvadratui nupieškite raudonas istrižaines.

for ($y = 0; $y < 100; $y++) {
  for ($x = 0; $x < 100; $x++) {
    if ($x == $y || $y == 99 - $x) {
        echo "<span style='color: red; font-weight: bold; padding: 0 5px'>$x</span>";
      } else {
        echo '<span style="padding: 0 5px">*</span>';
      }
    }
    echo "\n";
 
}
//  6. Metam monetą. Monetos kritimo rezultatą imituojam rand() funkcija, kur 0 yra herbas, o 1 - skaičius. Monetos metimo rezultatus išvedame į ekraną atskiroje eilutėje: “S” jeigu iškrito skaičius ir “H” jeigu herbas. Suprogramuokite tris skirtingus scenarijus kai monetos metimą stabdome:
// a) Iškritus herbui;
// b) Tris kartus iškritus herbui;
// c) Tris kartus iš eilės iškritus herbui;