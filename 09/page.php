<?php
echo '<pre>';
print_r($_GET);
echo $_GET['pus'] ?? '';

?>

<?php if(1 == ($_GET['pus'] ?? '')): ?>
<h1>Pirmas puslapis</h1>
<?php elseif(2 == ($_GET['pus'] ?? '')): ?>
<h1>Antras puslapis</h1>
<?php else: ?>
<h1>Tokio puslapio nera..</h1>
<?php endif;