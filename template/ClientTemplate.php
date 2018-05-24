<?php
   require './class/Client.php';

   $data = new Client($nom,$prenom,$email,$dateNaissance,$nombreCommande,$montantTotal,$dateDernierAchat,$numeroClient);
   $dataClient = $data->getAllClient();
   echo'<link rel="stylesheet" href="css/style.css">
         <table>

         <caption>Liste des clients</caption>

           <tr>
             <th>Numero client</th>
             <th>Nom</th>
             <th>prenom</th>
             <th>Email</th>
             <th>Date naissance</th>
             <th>Nombre commande</th>
             <th>Montant total</th>
             <th>Date dernier achat</th>
             <th> Action </th>

           </tr>

         ';
    foreach ($dataClient as $value) {
   echo '


       <tr>
           <td>'.$value->Numero_client.'</td>
           <td>'.$value->Nom.'</td>
           <td>'.$value->Prenom.'</td>
           <td>'.$value->Email.'</td>
           <td>'.substr($value->Date_naissance,0,-9).'</td>
           <td><a href="/Clients/template/CommandeTemplate.php?id='.$value->id.'"> '.$value->Nombre_commande.'</a></td>
           <td>'.$value->Montant_total.'</td>
           <td>'.substr($value->Date_dernier_achat,0,-9).'</td>
           <td><form method="post">
               <button class="btn waves-effect waves-light" type="submit" name="delete" value="' . $value->id . '">Supprimer
                   <i class="fa fa-trash material-icons right" aria-hidden="true"></i>
               </button>
           </form>
           <a href="./template/ModifClientTemplate.php?id='.$value->id.'">
               <button class="btn waves-effect waves-light" type="submit" name="action">Modifier
                   <i class="fa fa-pencil-square-o material-icons right" aria-hidden="true"></i>
               </button>
           </a>
       </tr>
  ';
      }
      echo '  </table>';
      if (isset($_POST['delete'])){
          $data->deleteCommande($_POST['delete']);
          $data->deleteClient($_POST['delete']);
          echo 'Client supprimer';
          header('Location: index.php');
            exit();
          ;
      }

 ?>
