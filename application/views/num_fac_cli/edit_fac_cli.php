<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.min.css">
  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>
<body>
<div class="container col-md-6 clo-md-12 col-md-offset-3">
<h1>MODIFICATION facture</h1>

<form method="post" name="edit_fac" action="<?php echo base_url(). 'index.php/facture_client/edit_fac/'.$fac_clis['id_fac_cli']; ?>" > 
    
    <div class="form-group">
      <label >Client:</label>
      <input type="text" class="form-control" value="<?php echo set_value('nom_client',$fac_clis['nom_client']); ?>" name="nom_client">
      <?php //echo form_error('nom_client'); ?>
    </div>
    <div class="form-group">
      <label >Famille:</label>
      <input type="text" class="form-control" value="<?php echo set_value('famille',$fac_clis['famille']); ?>" name="famille" >
      <?php //echo form_error('adresse'); ?>
    </div>
    <div class="form-group">
      <label >Produit:</label>
      <input type="text" class="form-control" value="<?php echo set_value('nom_produit',$fac_clis['nom_produit']); ?>" name="nom_produit" >
      <?php //echo form_error('adresse'); ?>
    </div>
    <div class="form-group">
      <label >Montant:</label>
      <input type="number" class="form-control" value="<?php echo set_value('pu_d_V',$fac_clis['pu_d_V']); ?>" name="pu_d_V" >
      <?php //echo form_error('contact'); ?>
    </div>

    <div class="form-group">
      <label >QT:</label>
      <input type="number" class="form-control" value="<?php echo set_value('qtstock',$fac_clis['qtstock']); ?>"  name="qtstock">
      <?php //echo form_error('contact'); ?>
    </div>
    <div class="form-group">
      <label >Date:</label>
      <input type="date" class="form-control" value="<?php echo set_value('date_v',$fac_clis['date_v']); ?>"  name="date_v">
      <?php //echo form_error('contact'); ?>
    </div>
    
    <button type="submit" class="btn btn-primary">Modifier</button>
    <a href="<?php  echo base_url().'index.php/facture_client/index';?>" class="btn btn-info">Annuler</a>
  </form>
</div>

</div>  




</body>
</html>