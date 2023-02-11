  <?php require __DIR__.'/virsus.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-12">
<ul class="list-group">
<?php foreach ($bebrai as $bebras): ?>
  <li class="list-group-item uztvanka">
    <h1>Užtvanka Nr. <?= $bebras['id'] ?></h1>
    <form class="m-2" action="<?= URL ?>?route=sugriauti&id=<?= $bebras['id'] ?>" method="post">
      <button type="submit" class="btn btn-danger">Sugriauti</button>
    </form>
  <h2>Juodieji: <?= $bebras['juodieji'] ?></h2>
  <h2>Rudieji: <?= $bebras['rudieji'] ?></h2>
  <form class="m-2" action="<?= URL ?>?route=prideti-juodus&id=<?= $bebras['id'] ?>" method="post">
    <div class="form-bebrai">
      <label>Prideti juodus: </label><input type="text" name="j_plus">
      <button type="submit" class="btn btn-info">+</button>
    </div>
  </form>
  <form class="m-2" action="<?= URL ?>?route=atimti-juodus&id=<?= $bebras['id'] ?>" method="post">
    <div class="form-bebrai">
      <label>Atimti juodus: </label><input type="text" name="j_minus">
      <button type="submit" class="btn btn-info">-</button>
    </div>
  </form>
  <form class="m-2" action="<?= URL ?>?route=prideti-rudus&id=<?= $bebras['id'] ?>" method="post">
    <div class="form-bebrai">
      <label>Prideti rudus: </label><input type="text" name="r_plus">
      <button type="submit" class="btn btn-info">+</button>
    </div>
  </form>
  <form class="m-2" action="<?= URL ?>?route=atimti-rudus&id=<?= $bebras['id'] ?>" method="post">
    <div class="form-bebrai">
      <label>Atimti rudus: </label><input type="text" name="r_minus">
      <button type="submit" class="btn btn-info">-</button>
    </div>
  </form>
</li>
<?php endforeach ?>
</ul>
    </div>
  </div>
</div>

<?php require __DIR__.'/apacia.php'; ?>