
<?php

class Anonimo {
    public $name;

    public $email;

    public $discount = 0;

    public $saldo = 0;

    protected $prodottiScelti = [];


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

    public function effettuaPagamento($cartaPrepagata) {
        $totaleDaPagare = $this->calcolaPrezzoTotale();

        if($cartaPrepagata->saldo2 < $totaleDaPagare) {
            throw new Exception("Utente: $this->nome: Saldo insufficiente sulla carta");
        } else {
            return 'ok';
        }
    
    }
}

?>