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

<form action="<?= URL ?>new" method="post" class="new acc">
  <div>
    <label for="">Sąskaitos Nr.</label>
    <input type="text" name="nr" value="<?= 'LT'.rand(100000000000000000, 999999999999999999) ?>" readonly>
  </div>
  <div>
    <label for="">Vardas</label>

    <input type="text" name="name">
    <div class="errBox">
    <?php if (isset($noName) || isset($nameLen)) : ?>
      <p class="error"><?= $noName ?></p>
      <p class="error"><?= $nameLen ?></p>
    <?php endif; ?>
    </div>

  </div>
  <div>
    <label for="">Pavardė</label>
    <input type="text" name="surname">

    <div class="errBox">
    <?php if (isset($noSurname) || isset($surnameLen)) : ?>
      <p class="error"><?= $noSurname ?></p>
      <p class="error"><?= $surnameLen ?></p>
    <?php endif; ?>
    </div>

  </div>
  <div>
    <label for="">Asmens kodas</label>
    <input type="text" name="id">

    <div class="errBox">
    <?php if (isset($idNums) || isset($idLen) || isset($noId) || isset($idUnique)) : ?>
      <p class="error"><?= $idNums ?></p>
      <p class="error"><?= $idLen ?></p>
      <p class="error"><?= $noId ?></p>
      <p class="error"><?= $idUnique ?></p>
    <?php endif; ?>
    </div>

  </div>
  <button type="submit" name="submit">Sukurti sąskaitą</button>
</form>

<?php require __DIR__.'/bottom.php'; ?>