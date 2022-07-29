
<?php 
require_once __DIR__ . "/product.php";
require_once __DIR__ . "/cibopercani.php";
require_once __DIR__ . "/giochipercani.php";
require_once __DIR__ . "/utente.php";
require_once __DIR__ . "/anonimo.php";
require_once __DIR__ . '/CartaPrepagata.php';

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
$eukanuba->description = 'Woof';
$foodForDogs[] = $eukanuba;



// Array dove pusheremo i giochi per cani
$gameForDogs = [];

// Marca 1 Giocho per cane
$palla = new gamesForDogs('Palla super rotonda', 0.2, 3);
$palla->description = "Palla così rotonda che il tuo cane la amerà";
$gameForDogs[] = $palla;


// Marca 2 Gioco per cane
$osso = new gamesForDogs('Osso super resistente', 0.5, 5);
$osso->description = "Non importa cosa sta facendo il tuo cane, lui smetterà ciò che sta facendo per mordere quest'osso";
$gameForDogs[] = $osso;



// Definiamo un utente che avrà il 20% di sconto e la lista  di oggetti da comprare
$giancarlo_esposito = new Utente('Giancarlo Esposito', 'gian96@gmail.com');
$giancarlo_esposito->aggiungiProdotto($osso);
$giancarlo_esposito->aggiungiProdotto($eukanuba);


$cartaPrepagata = new CartaPrepagata('Giancarlo Esposito', '6868 2828 1313 4242', '05/22', '468');
$cartaPrepagata->saldo = 150; // Per Utente Giancarlo
$cartaPrepagata->saldo2 = 5; // Per Utente Anonimo

$anonymous = new Anonimo();
$anonymous->aggiungiProdotto($palla);
$anonymous->aggiungiProdotto($naturalTrainer);



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

<!-- Sezione Cibo -->

<h2>Sezione cibo per cani: </h2>
<?php foreach ($foodForDogs as $DogsFood){ ?>
    <div> Oggetto: <?php echo $DogsFood->object; ?></div>
    <div> Peso: <?php echo $DogsFood->weight; ?> kg</div>
    <div> Prezzo: <?php echo $DogsFood->price; ?>  euro</div>
    <div> Descrizione: <?php echo $DogsFood->description; ?> </div>
<?php } ?>

<!-- Sezione Giochi -->

<h2>Sezione giochi per cani: </h2>
<?php foreach ($gameForDogs as $Dogsgame){ ?>
    <div> Oggetto: <?php echo $Dogsgame->object; ?></div>
    <div> Peso: <?php echo $Dogsgame->weight; ?> gr</div>
    <div> Prezzo: <?php echo $Dogsgame->price; ?>  euro</div>
    <div> Descrizione: <?php echo $Dogsgame->description; ?> </div>
<?php } ?>

<?php 

    

try {
    if($giancarlo_esposito->effettuaPagamento($cartaPrepagata) === 'ok') {
        echo "<h2>Grazie per aver completato il tuo acquisto</h2>";
    }
} catch(Exception $e) {
    // Salvare nel log l'errore (serve al programmatore per tenere
    // traccia di ciò che succede nel sito)
    error_log($e->getMessage());

    // Stampare in pagina un messaggio per l'utente
    echo 'L\'operazione non è andata a buon fine, controlla il saldo sulla tua carta e riprova';
}




try {
    if($anonymous->effettuaPagamento($cartaPrepagata) === 'ok') {
        echo "<h2>Grazie per aver completato il tuo acquisto</h2>";
    }
} catch(Exception $e) {
    // Salvare nel log l'errore (serve al programmatore per tenere
    // traccia di ciò che succede nel sito)
    error_log($e->getMessage());

    // Stampare in pagina un messaggio per l'utente
    echo ' <h2> L\'operazione non è andata a buon fine, controlla il saldo sulla tua carta e riprova </h2>';
}
?>
<div></div>
</body>
</html>