<?php require __DIR__.'/top.php'; ?>

<h2 class="title">Naujos sąskaitos sukūrimas</h2>
<form action="<?= URL ?>?route=new" method="post" class="new">
  <div>
    <label for="">Sąskaitos Nr.</label>
    <input type="text" name="nr" value="<?= 'LT'.rand(100000000000000000, 999999999999999999) ?>" readonly>
  </div>
  <div>
    <label for="">Vardas</label>
    <input type="text" name="name">
  </div>
  <div>
    <label for="">Pavardė</label>
    <input type="text" name="surname">
  </div>
  <div>
    <label for="">Asmens kodas</label>
    <input type="text" name="id">
  </div>
  <button type="submit">Sukurti sąskaitą</button>
</form>

<?php require __DIR__.'/bottom.php'; ?>