<?php
   require 'header.php';
   require '../class/Commande.php';


   $data = new Commande($numeroCommande,$dateCommande,$nombreArticle,$montantHT,$montantTTC);
   $dataCommande = $data->getCommande($_GET['id']);
   echo '<link rel="stylesheet" href="../css/style2.css">
         <table>
         <caption>Liste des commandes de : '.$dataCommande[0]->Numero_client.'</caption>
         <tr>
             <th>Numero commande</th>
             <th>Date de commande</th>
             <th>Nombre d\'article</th>
             <th>Montant HT</th>
             <th>Montant TTC</th>
         </tr>
         ';
    foreach ($dataCommande as $value) {
   echo '

       <tr>
           <td>'.$value->Numero_commande.'</td>
           <td>'.substr($value->Date_commande,0,-9).'</td>
           <td>'.$value->Nombre_article.'</td>
           <td>'.$value->Montant_HT.'</td>
           <td>'.$value->Montant_TTC.'</td>
           <td>'.$value->Montant_total.'</td>

       </tr>
  ';

      }
      echo '</table>';

?>
