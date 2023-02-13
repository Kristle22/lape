<?php require __DIR__.'/top.php'; ?>
<?php $errors = $_SESSION['errors']; ?>
<?php unset($_SESSION['errors']); ?>

<h2 class="title">Naujos sąskaitos sukūrimas</h2>

<form action="<?= URL ?>new" method="post" class="new acc">
  <div>
    <label for="">Sąskaitos Nr.</label>
    <input type="text" name="nr" value="<?= 'LT'.rand(100000000000000000, 999999999999999999) ?>" readonly>
  </div>
  <div>
    <label for="">Vardas</label>

    <input type="text" name="name">
    <div class="errBox">
      <?php if (!empty($errors)) : ?>
      <?php foreach($errors as $error): ?>
        <p class="error"><?= in_array($error['type'], ['no_name', 'name_len']) ? $error['err'] : '' ?></p>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>

  </div>
  <div>
    <label for="">Pavardė</label>
    <input type="text" name="surname">

    <div class="errBox">
      <?php if (!empty($errors)) : ?>
      <?php foreach($errors as $error): ?>
        <p class="error"><?= in_array($error['type'], ['no_surname', 'surname_len']) ? $error['err'] : '' ?></p>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>

  </div>
  <div>
    <label for="">Asmens kodas</label>
    <input type="text" name="id">

    <div class="errBox">
      <?php if (!empty($errors)) : ?>
      <?php foreach($errors as $error): ?>
        <p class="error"><?= in_array($error['type'], ['no_id', 'id_len', 'id_nums', 'id_unique']) ? $error['err'] : '' ?></p>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>

  </div>
  <button type="submit" name="submit">Sukurti sąskaitą</button>
</form>

<?php require __DIR__.'/bottom.php'; ?>