<?php require __DIR__.'/top.php'; ?>
<?php echo '<body style=\'background: linear-gradient(rgba(27, 43, 91, 0.5), rgba(67, 101, 124, 0.5)), url("../img/banking_background.jpg") center/cover;\'></body>' ?>

<h2 class="title">Nuskaičiuoti lėšas</h2>

    <div>
      <h1 class="title"><?= $acc['Nr'] ?></h1>
    </div>
    
  <form action="<?= URL ?>charge/<?= $acc['ID'] ?>" method="post" class="new">
      
    <div>
      <label for="">Gavėjo vardas</label>
      <input type="text" name="name">
    </div>
    
    <div>
      <label for="">Gavėjo pavardė</label>
      <input type="text" name="surname">
    </div>
    
    <div>
      <label for="">Sąskaitos nr.</label>
      <input type="text" name="nr" value="<?= $extra ?>">
    </div>

  <div class="sum">
    <input type="text" name="minus" placeholder="Suma">
    <span>Sąskaitos likutis: <?= $acc['likutis'] ?> EUR</span>
  </div>
  
  <button class="transfer" type="submit">Pervesti</button>
</form>

<?php require __DIR__.'/bottom.php'; 
// Dropdown option list
?>
<!-- <select name="name">
  <option value="none"></option>
  <?php foreach($data as $acc) : ?>
    <?php if ($acc['ID'] != $_GET['id']) : ?>
      <option value="<?= $acc['vardas'] ?>"><?= $acc['vardas'] ?></option>
      <?php endif; ?>
      <?php endforeach; ?>
    </select> -->
    

