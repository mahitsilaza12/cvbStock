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

<div class="row">
<div class="col-md-12">

<?php   
$success =$this->session->userdata("success");
if($success !=''){?>
<div class="alert alert-success"><?php echo $success; ?></div>
<?php
}
?>

<?php   
$failure =$this->session->userdata("failure");
if($failure !=''){?>
<div class="alert alert-success"><?php echo $failure; ?></div>
<?php
}
?>

</div>

</div>


<div id="dd" style="height:480px;margin-top:130px;margin-right:10px; box-shadow: 0px 20px 30px; width:100%; overflow:scroll;" class="container col-md-7 col-md-10">
<div class="panel panel-heading">  

</div>
<table class="table" >
<div class="form-row">
  <div class="form-group col-md-6">
  
  <button  type="button" id="aj" class="btn btn-info btn-xr" data-toggle="modal" data-target=".bd-example-modal-xl"><img style="widht:20px; height:20px;" src="<?=base_url()?>issets/img/add.png">Ajout</button>
  </div>
    <div class="form-group col-md-6">
      <input style="margin-top:20px;" placeholder="recherch..." type="text" name="" class="form-control" >
    </div>
    </div>

  <thead class="thead-dark"  >
    <tr>
        <th>numero facture</th> 
        <th>Client</th>
        <th>intrants</th>
        <th>Produit</th> 
        <th>Montant</th> 
        <th>Qt</th> 
        <th>Date</th> 
        <th width="60">EDIT</th>
        <th width="60">SUPPRIMER</th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($fac_cli)){    foreach($fac_cli as $fac_clis){ ?>
      <tr>
        <td><?php echo $fac_clis['id_fac_cli'] ?></td>
        <td><?php echo $fac_clis['nom_client'] ?></td>
        <td><?php echo $fac_clis['intrants'] ?></td>
        <td><?php echo $fac_clis['nom_produit'] ?></td>
        <td>0000</td>
        <td><?php echo $fac_clis['qt'] ?></td>
        <td><?php echo $fac_clis['date_p'] ?></td>
        <td>
           <a  href="<?php echo base_url().'index.php/fac_cli/edit_fac_cli/'.$fac_clis['id_fac_cli'] ?>">Edit</a>
        </td>
        
        <td>
        <a href="<?php echo base_url().'index.php/fac_cli/delete_fac_cli/'.$fac_clis['id_fac_cli'] ?> " class=" btn btn-danger" ><span class="glyphicon glyphicon-remove"></span>Supprimer</a>
        </td>
      </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
 
</table>
</div>
</div>


<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
         <h1> facture sorti</h1>
        </div>
        <div class="modal-body">
       
        <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
      
    <form method="post"  action="<?php echo base_url(). 'index.php/fac_cli/insert_fac_cli/'; ?>" >
  <div class="form-row">
    <div class="form-group col-md-6">
    <label>client</label>
    <select class="form-control" id="idclient" name="client">
      <option value="13">lefitra</option>
      <option value="30">Alimentation</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
    <?php echo form_error('client'); ?>
    </div>
    <div class="form-group col-md-6">
      <label >intrants</label>
     <input value="<?php echo set_value('famille') ?>" type='text' id="pro" name="famille" class="form-control">
     <?php echo form_error('intrants'); ?>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label>Produit</label>
   <input  value="<?php echo set_value('nom_produit') ?>"  type="text" name="nom_produit" class="form-control">
   <?php echo form_error('nom_produit'); ?>
  </div>
    <div class="form-group col-md-6">
      <label >qt </label>
      <input value="<?php echo set_value('qt') ?>"  type="number" name="qt" class="form-control" >
      <?php echo form_error('qt'); ?>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label >date </label>
      <input value="<?php echo set_value('date_p') ?>"  type="date" name="date_p" class="form-control">
      <?php echo form_error('date_p'); ?>
    </div> 
    </div>
  <div style="">
  <div class="modal-footer">
  <button type="submit"  class="btn btn-primary containair-fluid">Ajouter</button>
  <a href="<?php  echo base_url().'index.php/fac_cli/index';?>" class="btn btn-info">Annuler</a>
      </div>

</form>

     </div>

</div>


</div>
      </div>
      
    </div>
  </div>

  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>


















