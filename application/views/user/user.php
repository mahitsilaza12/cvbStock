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
<div style="margin-top:400px;" class=" alert-primary" role="alert">
<div class="signin"  style="box-shadow: 0px 20px 30px;">
<form method="post"  action="<?php echo base_url(). 'index.php/user/insert/'; ?>" >
<h2>Pharmacie</h2>
<label style="color: #fff">Nom d'utilisateur</label>
        <input type="text" value="<?php echo set_value('nom') ?>" required class="form-control col-md-12" placeholder="Entree votre nom">
        <label style="color: #fff">votre mot de passe</label>
        <input type="password" value="<?php echo set_value('mdp') ?>" required class="form-control" placeholder="mot de pasee">
       
        <button class="btn btn-primary" tybe="submit" style="margin-top:10px;">connecter</button><br>
      
        <a href="<?php echo base_url().'index.php/user/index'?>"><button class="btn btn-info" style="margin-top:10px;">Enregistrer</button></a>
</form>

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

  
 