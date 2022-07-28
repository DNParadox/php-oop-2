
<?php

class Utente {
    public $name;

    public $email;

    public $discount = 20;

    public $saldo = 0;

    protected $prodottiScelti = [];

    public function __construct($_name, $_email) {
        $this->name = $_name;
        $this->email = $_email;
    }

    public function aggiungiProdotto($prodotto) {
        $this->prodottiScelti[] = $prodotto;
    }

    public function getProdottiScelti() {
        return $this->prodottiScelti;
    }

    public function calcolaPrezzoTotale() {
        // Facciamo la somma dei prezzi dei prodotti scelti
        $sommaTotale = 0;
        foreach($this->prodottiScelti as $prodotto) {
            $sommaTotale += $prodotto->price;
        }

        return $sommaTotale;
    }

    public function effettuaPagamento() {
        $totaleDaPagare = $this->calcolaPrezzoTotale();

        if($this->saldo < $totaleDaPagare) {
            die('Saldo non disponibile');
        } else {
            return 'ok';
        }
    }
}

?>