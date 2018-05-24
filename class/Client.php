<?php
   require 'BDDconnect.php';

   class Client {

     private $nom;
     private $prenom;
     private $email;
     private $dateNaissance;
     private $nombreCommande;
     private $montantTotal;
     private $dateDernierAchat;
     private $numeroClient;

       public function __construct($numeroClient,$nom,$prenom,$email,$dateNaissance,$nombreCommande,$montantTotal,$dateDernierAchat){
         $this->numeroClient=$numeroClient;
         $this->nom = $nom;
         $this->prenom = $prenom;
         $this->email = $email;
         $this->dateNaissance=date($dateNaissance);
         $this->nombreCommande=$nombreCommande;
         $this->montantTotal=$montantTotal;
         $this->dateDernierAchat=date('Y-m-d');
       }
       public function getNom (){
         return $this->nom;
       }
       public function getPrenom (){
         return $this->prenom;
       }
       public function getEmail (){
         return $this->email;
       }
       public function getDateNaissance (){
         return $this->dateNaissance;
       }
       public function getNombreCommande (){
         return $this->nombreCommande;
       }
       public function getMontantTotal (){
         return $this->montantTotal;
       }
       public function getDateDernierAchat(){
         return $this->dateDernierAchat;
       }
       public function getNumeroClient(){
         return $this->numeroClient;
       }
       public function setNom($nom){
         $this->nom=$nom;
       }
       public function setPrenom($prenom){
         $this->prenom=$prenom;
       }
       public function setEmail($email){
         $this->email=$email;
       }
       public function setDateNaissance($dateNaissance){
         $this->dateNaissance=$dateNaissance;
       }
       public function setNombreCommande($nombreCommande){
         $this->nombreCommande=$nombreCommande;
       }
       public function setMontantTotal($montantTotal){
         $this->montantTotal=$montantTotal;
       }
       public function setDateDernierAchat($dateDernierAchat){
         $this->dateDernierAchat=$dateDernierAchat;
       }
       public function setNumeroClient($numeroClient){
         $this->numeroClient=$numeroClient;
       }
       public function getClient($id){
         $bdd = new BDDconnect('GestionClient');
         $data = $bdd->query('SELECT * FROM clients WHERE id = '.$id.'');
         return $data;
       }
       public function updateClient($key){
         $data = new BDDconnect('GestionClient');
         $updateData = $data->getPDO();
         $updateData->query(
           'UPDATE clients
            SET Numero_client="'. $this->getNumeroClient() .'",Nom="'. $this->getNom() . '", Prenom ="'. $this->getPrenom() .'",
            Email="'. $this->getEmail() .'", Date_naissance="'. $this->getDateNaissance() .'",
            Montant_total="'. $this->getMontantTotal() .'", Date_dernier_achat="'. $this->getDateDernierAchat().'"
            WHERE id="'.$key.'"
             ');
       }
       public function deleteClient($key){
         $data = new BDDconnect('GestionClient');
         $datas = $data->getPDO();
         $datas->exec('DELETE FROM clients WHERE id="'. $key . '"');
       }
       public function deleteCommande($key){
         $data = new BDDconnect('GestionClient');
         $datas = $data->getPDO();
         $datas->exec('DELETE FROM commandes WHERE id_client="'. $key . '"');
       }
       public function addClient(){
         $bdd = new BDDconnect('GestionClient');
         $conn = $bdd->getPDO();
         $conn->exec('INSERT INTO clients SET Numero_client="'. $this->getNumeroClient() .'",Nom="'. $this->getNom() . '", Prenom ="'. $this->getPrenom() .'",
         Email="'. $this->getEmail() .'", Date_naissance="'. $this->getDateNaissance() .'",
         Montant_total="'. $this->getMontantTotal() .'", Date_dernier_achat="'. $this->getDateDernierAchat().'"
          ');
       }
       public function getAllClient(){
         $bdd = new BDDconnect('GestionClient');
         $data = $bdd->query('SELECT clients.id ,clients.Numero_client, clients.Nom, clients.Prenom, clients.Email, clients.Date_naissance,
         COUNT(commandes.id_commande) as Nombre_commande,
         SUM(commandes.Montant_HT) as Montant_total,
         MAX(commandes.Date_commande) as Date_dernier_achat
         FROM clients
         LEFT JOIN commandes
         ON commandes.id_client = clients.id
         GROUP BY clients.id,clients.Numero_client, clients.Nom, clients.Prenom, clients.Email, clients.Date_naissance');
         return $data;
       }

   }

?>
