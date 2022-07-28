<!-- 
Oggi pomeriggio provate ad immaginare quali sono le classi necessarie per creare uno shop online con le seguenti caratteristiche.
L'e-commerce vende prodotti per gli animali.
I prodotti saranno oltre al cibo, anche giochi, cucce, etc.
L'utente potrà sia comprare i prodotti senza registrarsi, oppure iscriversi e ricevere il 20% di sconto su tutti i prodotti.
BONUS:
Il pagamento avviene con la carta prepagata che deve contenere un saldo sufficiente all'acquisto.
Buon pomeriggio :ascoli1898: -->

<?php 
require_once __DIR__ . "/product.php";
require_once __DIR__ . "/cibopercani.php";

// Array dove pusheremo cibo per cani
$foodForDogs = [];

// Marca 1 cibo cani
$purina = new foodDogs('Purina', 1.5, 12);
$purina->description = 'Il mio pincher nano non li ha apprezzati';
$foodForDogs[] = $purina;

// Marca 2 cibo cani
$naturalTrainer = new foodDogs('Natural Trainer', 2 , 15);
$naturalTrainer->description = 'Cibo così buono che il tuo cane non smetterà di mangiarlo';
$foodForDogs[] = $naturalTrainer;

// Marca 3 cibo cani
$eukanuba = new foodDogs('Eukanuba', 5, 35);
$eukanuba->description = 'Pesa più la busta che il cane';
$foodForDogs[] = $eukanuba;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php OOP 2</title>
</head>
<body>
    <?php foreach ($foodForDogs as $DogsFood){ ?>
<h1> 
    
    <?php echo $DogsFood->object; ?>
    <?php echo $DogsFood->weight; ?> 
    <?php echo $DogsFood->price; ?> 
    <?php echo $DogsFood->description; ?>

</h1>

<?php } ?>
</body>
</html>