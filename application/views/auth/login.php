<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
    
    <link rel="stylesheet" href=" <?= base_url() ?>issets/fontawesome/fontawesome.css">
    
    <link rel="stylesheet" href=" <?= base_url() ?>issets/fontawesome/fontawesome.min.css">
  
    <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>issets/css/login.css">
    <link rel="stylesheet" href=" <?= base_url()?>issets/css/bootstrap.min.css"> 
    <link rel="stylesheet" href=" <?= base_url() ?>issets/css/login.css">
	  <script src="<?= base_url()?>issets/js/bootstrap.min.js"></script>
      

<style>
 body{
    background-image: url('<?=base_url()?>issets/img/resize.jpg');
  }
</style>

</head>
<body>



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
                       <div class="modal-header">
         <h1>Ajout nouveaux compte</h1>
                        </div>
                          <div class="modal-body">
       
                              <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
                                 <h2>insert utilisateur</h2>
                                        <form method="post" role="form" name="insertion" action="<?php echo base_url(). 'index.php/user/addi'; ?>" > 
                                          <div class="form-group">
                                            <label >NOM</label>
                                            <input type="nom" class="form-control" required value="<?php echo set_value('pseudo') ?>" name="pseudo" placeholder="Enter nom">
                                            <?php echo form_error('pseudo'); ?>
                                          </div>
                                          <div class="form-group">
                                            <label >MOT DE PASSE:</label>
                                            <input type="password" class="form-control" required value="<?php echo set_value('mdp') ?>" name="mdp" placeholder="Enter mdp">
                                            <?php echo form_error('mdp'); ?>
                                          </div>
                                          <div class="form-group">
                                          <label >Privilège </label>
                                          <select class="form-control" name="type" value="<?php echo set_value('type')?>" name="type">
                                            <option value="administrateur">Administrateur</option>
                                            <option value="simple">Simple utilisateur</option>
                                          </select>
                                        </div>
                                          
                                          <button type="submit" class="btn btn-primary col-md-10">Enregistrer</button>
                                        
                                        </form>
                              </div>



                           </div>

      </div>
      
    </div>
  </div>





<div style="margin-top:400px;" class=" alert-primary" role="alert">
<div class="signin"  style="box-shadow: 0px 20px 30px;">
<form method="post"  action="<?php echo base_url(). 'index.php/Welcome/log_in/'; ?>" >
<h2>Pharmacie</h2>
<label style="color: #fff">Nom d'utilisateur</label>
        <input type="text"  required class="form-control col-md-12" name="nomUser" id="pseudo" placeholder="Entree votre nom">
        <label style="color: #fff">votre mot de passe</label>
        <input type="password"  required class="form-control" name="mdp" id="mdp" placeholder="mot de pasee">
       
        <button class="btn btn-primary" tybe="submit" style="margin-top:10px;">Connecter</button><br>
       
</form>




<span class="btn btn-success" style="margin-left:0px;margin-top:10px;width:40px;height:40px" id="ajou" data-toggle="modal" data-target="#myModal">+</span>
<a href="<?php  echo base_url().'index.php/page/';?>"><button class="btn btn-info col-md-10" style="margin-top:10px;">Return</button></a>
  
</div>
</div>
    <div>
    
    <!-- <label style="text-align: center; margin-top: 15px;left:10px;color: #fff;">Copyright 2019.By oskar davis</label>
    </div> -->
<script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>issets/js/jQuery.js"></script>
<script src="<?= base_url() ?>issets/js/jQuery.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.js"></script>

</body>
</html>

  
 