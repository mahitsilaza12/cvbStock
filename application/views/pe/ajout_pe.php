<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.min.css">

  <style>

  </style>
</head>
<body>

<div class="col-sm-6 "  style="background-color:grey;">
     <div class="panel panel-info ">
     	<div class="panel-heading" style=""><h1 style="text-align:center;">ajout commenande entree</h1> </div>
     	<div class="panel-body"> contenus</div>
    
  
    <form method="post" action="<?php echo base_url(). 'index.php/pe/insert_pe/'; ?>" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>idfournisseur</label>
      <input type="text" value="<?php echo set_value('idfournisseur') ?>" id="fournisseur" name="idfournisseur" class="form-control">
      <?php echo form_error('idfournisseur'); ?>
    </div>
    <div class="form-group col-md-6">
      <label >idfamille</label>
     <input value="<?php echo set_value('idfamille') ?>"  id="famille" name="idfamille" class="form-control">
    </div>
  </div>



  <div class="form-row">
  <div class="form-group col-md-6">
    <label>idproduit</label>
   <input  value="<?php echo set_value('idproduit') ?>"  type="text" name="idproduit" class="form-control">
  </div>
  <div class="form-group col-md-6">
      <label>id_fac_fou</label>
      <input value="<?php echo set_value('id_fac_fou') ?>" name="id_fac_fou"  type="text" class="form-control" id="id_fac_fou">
    </div>
  </div>


  <div class="form-row">

  <div class="form-group col-md-6">
    <label>pu(A)</label>
    <input value="<?php echo set_value('pu_d_A') ?>"  type="number" name="pu_d_A" class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label>qt</label>
      <input value="<?php echo set_value('qtstock') ?>"  type="number" name="qtstock" class="form-control" >
    </div>
    </div>



    <div class="form-row">
    <div class="form-group col-md-6">
      <label>tva </label>
      <input value="<?php echo set_value('tva') ?>"  type="number" name="tva" class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label>unite</label>
      <input value="<?php echo set_value('unite') ?>" name="unite"  type="text" class="form-control" id="unite">
    </div>
   
  </div>



  <div class="form-row">
  <div class="form-group col-md-6">
      <label>design</label>
      <input value="<?php echo set_value('design') ?>" name="design"  type="text" class="form-control" id="design">
    </div>
  <div class="form-group col-md-6">
      <label>dateappro</label>
      <input value="<?php echo set_value('dateappro') ?>" name="dateappro" type="date" class="form-control" id="dateappro">
    </div>
    
    </div>




  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        cochez si avoir une reste
      </label>
    </div>
  </div>
  <div style="">
  <button type="submit"  class="btn btn-primary">Ajouter</button>
  <a href="<?php  echo base_url().'index.php/proe/index';?>" class="btn btn-info">Annuler</a>
  </div>
</form>

     </div>

</div>
  

  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>

<!--                 odal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>


  

    