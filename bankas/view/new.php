<?php require __DIR__.'/top.php'; ?>

<h2 class="title">Naujos sąskaitos sukūrimas</h2>

<?php
if (isset($_SESSION['errors'])) {
  $idNums = $_SESSION['errors']['id_nums'] ?? '';
  $idLen = $_SESSION['errors']['id_len'] ?? '';
  $noId = $_SESSION['errors']['no_id'] ?? '';
  $noName = $_SESSION['errors']['no_name'] ?? '';
  $noSurname = $_SESSION['errors']['no_surname'] ?? '';
  $nameLen = $_SESSION['errors']['name_len'] ?? '';
  $surnameLen = $_SESSION['errors']['surname_len'] ?? '';
  $idUnique = $_SESSION['errors']['id_unique'] ?? '';
  unset($_SESSION['errors']);
}
?>

<form action="<?= URL ?>?route=new" method="post" class="new acc">
  <div>
    <label for="">Sąskaitos Nr.</label>
    <input type="text" name="nr" value="<?= 'LT'.rand(100000000000000000, 999999999999999999) ?>" readonly>
  </div>
  <div>
    <label for="">Vardas</label>

    <input type="text" name="name">
    <div class="errBox">
    <?php if (isset($noName)) : ?>
      <p class="error"><?= $noName ?></p>
    <?php endif; ?>
    <?php unset($noName); ?>
    <?php if (isset($nameLen)) : ?>
      <p class="error"><?= $nameLen ?></p>
      <?php unset($nameLen); ?>
    <?php endif; ?>
    </div>

  </div>
  <div>
    <label for="">Pavardė</label>
    <input type="text" name="surname">

    <div class="errBox">
    <?php if (isset($noSurname)) : ?>
      <p class="error"><?= $noSurname ?></p>
      <?php unset($noSurname); ?>
    <?php endif; ?>
    <?php if (isset($surnameLen)) : ?>
      <p class="error"><?= $surnameLen ?></p>
      <?php unset($surnameLen); ?>
    <?php endif; ?>
    </div>

  </div>
  <div>
    <label for="">Asmens kodas</label>
    <input type="text" name="id">

    <div class="errBox">
    <?php if (isset($idNums)) : ?>
      <p class="error"><?= $idNums ?></p>
      <?php unset($idNums); ?>
    <?php endif; ?>
    <?php if (isset($idLen)) : ?>
      <p class="error"><?= $idLen ?></p>
      <?php unset($idLen); ?>
    <?php endif; ?>
    <?php if (isset($noId)) : ?>
      <p class="error"><?= $noId ?></p>
      <?php unset($noId); ?>
    <?php endif; ?>
    <?php if (isset($idUnique)) : ?>
      <p class="error"><?= $idUnique ?></p>
      <?php unset($idUnique); ?>
    <?php endif; ?>
    </div>

  </div>
  <button type="submit" name="submit">Sukurti sąskaitą</button>
</form>

<?php require __DIR__.'/bottom.php'; ?>