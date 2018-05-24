<?php
   require 'BDDconnect.php';

   class Commande {
     private $numeroCommande;
     private $dateCommande;
     private $nombreArticle;
     private $montantHT;
     private $montantTTC;

     public function getNumeroCommande (){
       return $this->numeroCommande;
     }
     public function getDateCommande (){
       return $this->dateCommande;
     }
     public function getNombreArticle (){
       return $this->nombreArticle;
     }
     public function getMontantHT (){
       return $this->montantHT;
     }
     public function getMontantTTC (){
       return $this->montantTTC;
     }
     public function getCommande($key){
       $data = new BDDconnect('GestionClient');
       $dataCommande = $data->query(
         'SELECT * FROM commandes
         INNER JOIN clients
         ON clients.id = commandes.id_client
          WHERE commandes.id_client="'. $key .'"');
       return $dataCommande;
     }
   
   }

?>
