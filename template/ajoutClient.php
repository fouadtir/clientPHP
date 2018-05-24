<?php
   require 'header.php';
   require '../class/Client.php';
 ?>
<div class="container">
   <div class="row">
      <div class="col s9 offset-s2">
         <h3>Ajouter Client</h3>
         <div class="container">
            <div class="row">
               <div class="col s10">
                  <div class="row">
                     <form class="col s12" method="post">
                        <div class="row">
                           <div class="input-field col s12">
                              <input name="numeroClient" type="text" class="validate">
                              <label for="numeroClient">Numero client</label>Numero client
                           </div>
                           <div class="input-field col s12">
                              <input name="nom" type="text" class="validate">
                              <label for="nom"> Nom</label>Nom
                           </div>
                        </div>
                        <div class="row">
                           <div class="input-field col s12">
                              <input name="prenom" type="text" class="validate">
                              <label for="prenom">Prenom</label>Prenom
                           </div>
                        </div>
                        <div class="row">
                           <div class="input-field col s12">
                              <input name="email" type="email" class="validate">
                              <label for="email">Email</label>Email
                           </div>
                        </div>
                        <div class="row">
                           <div class="input-field col s12">
                              <input name="dateNaissance" type="date" class="validate">
                              <label for="dateNaissance"></label>Date de naissance
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
<?php
   if(isset ($_POST['submit'])){
     if(isset($_POST['numeroClient']) && !empty($_POST['numeroClient'])
     && isset($_POST['nom']) && !empty($_POST['nom'])
     && isset($_POST['prenom']) && !empty($_POST['prenom'])
     && isset($_POST['email']) && !empty($_POST['email'])
     && isset($_POST['dateNaissance']) && !empty($_POST['dateNaissance'])) {
       $numeroClient=$_POST['numeroClient'];
       $nom=$_POST['nom'];
       $prenom=$_POST['prenom'];
       $email=$_POST['email'];
       $dateNaissance=$_POST['dateNaissance'];
       $data = new Client($numeroClient,$nom,$prenom,$email,$dateNaissance,$nombreCommande,$montantTotal,$dateDernierAchat);
       $data->addClient();
     echo '<div class="row">
             <div class="input-field col s12">
                 <p>Client enregistré</p>
             </div>
           </div>';
           header('Location: ../index.php');
             exit();

     } else {
     echo 'les champs ne sont pas remplis';
     }
   }
?>
