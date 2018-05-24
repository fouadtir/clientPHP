<?php
   require 'header.php';
   require '../class/Client.php';
   $data = new Client($numeroClient,$nom,$prenom,$email,$dateNaissance,$nombreCommande,$montantTotal,$dateDernierAchat,$numeroClient);
   $dataClient = $data->getClient($_GET['id']);
   echo '
     <div class="container">
         <div class="row">
             <div class="col s9 offset-s2">
                 <h3>Modification Client</h3>
                 <div class="container">
                     <div class="row">
                         <div class="col s10">
                             <div class="row">
                                 <form class="col s12" method="post">
                                     <div class="row">
                                         <div class="input-field col s12">
                                             <input name="numeroClient" type="text" class="validate" value = "'.$dataClient[0]->Numero_client.'">
                                             <label for="numeroClient"></label>Numero client
                                         </div>
                                         <div class="input-field col s12">
                                             <input name="nom" type="text" class="validate" value="'.$dataClient[0]->Nom.'">
                                             <label for="nom"></label>Nom
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="input-field col s12">
                                             <input name="prenom" type="text" class="validate" value="'.$dataClient[0]->Prenom.'">
                                             <label for="prenom"></label>Prenom
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="input-field col s12">
                                             <input name="email" type="email" class="validate" value= "'.$dataClient[0]->Email.'">
                                             <label for="email"></label>Email
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="input-field col s12">
                                             <input name="dateNaissance" type="text" class="validate" value="'.substr($dataClient[0]->Date_naissance, 0, -9).'">
                                             <label for="email"></label>Date de naissance
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="input-field col s12">
                                             <button class="btn waves-effect waves-light" type="submit" name="submit">Valider
                                                 <i class="fa fa-pencil-square-o material-icons right" aria-hidden="true"></i>
                                             </button>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     ';

   $datas = new Client($_POST['numeroClient'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['dateNaissance'],$nombreCommande,$montantTotal,$dateDernierAchat);
   var_dump($_POST['numeroClient']);
   if (isset($_POST['submit'])){
       $datas->updateClient($_GET["id"]);
       header('Location: ../index.php');
       exit();
       echo 'Modification enregistré';
   }

?>
