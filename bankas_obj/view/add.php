<?php require __DIR__.'/top.php'; ?>
<?php echo '<body style=\'background: linear-gradient(rgba(27, 43, 91, 0.5), rgba(67, 101, 124, 0.5)), url("../img/banking_background.jpg") center/cover;\'></body>' ?>

<h2 class="title">Pridėti lėšų</h2>

  <div>
    <h1 class="title"><?= $acc['Nr'] ?></h1>
  </div>
  
<form action="<?= URL ?>add/<?= $acc['ID'] ?>" method="post" class="new">
  <div>
    <label for="">Gavėjo vardas</label>
    <input type="text" name="name" value="<?= $acc['vardas'] ?>">
  </div>
  <div>
    <label for="">Gavėjo pavardė</label>
    <input type="text" name="name" value="<?= $acc['pavarde'] ?>">
  </div>
  <div>
    <label for="">Sąskaitos nr.</label>
    <input type="text" name="nr" value="<?= $acc['Nr'] ?>">
  </div>
  <div class="sum">
    <input type="text" name="plus" placeholder="Suma">
    <span>Sąskaitos likutis: <?= $acc['likutis'] ?> EUR</span>
  </div>
    <button class="transfer" type="submit">Pervesti</button>
</form>

<?php require __DIR__.'/bottom.php'; ?>