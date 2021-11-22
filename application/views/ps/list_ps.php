<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.min.css">
  

  <style>
  
#dd{
  margin-top:60px;
  margin-right:30px;
}

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
<h1><a href="<?php echo base_url().'index.php/ps/ajout_ps/' ;?> " class="btn btn-primary">Ajout</a></h1>
</div>

<table class="table">
  <thead class="thead-dark ">
    <tr>
    <th scope="col">numero facture</th>
      <th scope="col">client</th>
      <th scope="col">intrants</th>
      <th scope="col">produit</th>
      <th scope="col">PU vente</th>
      <th scope="col">qt</th>
      <th scope="col">unite</th>       
      <th scope="col">description</th>
      <th scope="col">presentation</th>
      <th scope="col">1er degre</th>
      <th scope="col">2em degre</th>       
      <th scope="col">date</th>
      <th scope="col">action</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  <?php if(!empty($ps)){    foreach($ps as $pss){ ?>
      <tr>
        <td><?php echo $pss['idps'] ?></td>
        <td><?php echo $pss['nom_client'] ?></td>
        <td><?php echo $pss['intrants'] ?></td>
        <td><?php echo $pss['nom_produit'] ?></td>
        <td><?php echo $pss['pu_d_V'] ?></td>
        <td><?php echo $pss['qt'] ?></td>
        <td><?php echo $pss['unite'] ?></td>
        <td><?php echo $pss['description'] ?></td>
        <td><?php echo $pss['presentation'] ?></td>
        <td><?php echo $pss['parpresentation'] ?></td>
        <td><?php echo $pss['par2presentation'] ?></td>
        <td><?php echo $pss['date_p'] ?></td>
        <td>
           <a  href="<?php echo base_url().'index.php/ps/edit_ps/'.$pss['idps'] ?> " class=" btn btn-info">Edit</a>
        </td>
        
        <td>
        <a href="<?php echo base_url().'index.php/ps/delete_ps/'.$pss['idps'] ?> " class=" btn btn-danger" ><span class="glyphicon glyphicon-remove"></span>Supprimer</a>
        </td>
      </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
   
</table>

</div>

<div class="modal fade bd-example-modal-xl"  tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-header">
      produit sorti

    </div>
    <div class="modal-content"style="box-shadow: 0px 20px 30px;" >
    <form method="post"  action="<?php echo base_url(). 'index.php/ps/insert_ps/'; ?>" >
  <div class="form-row align-items-cente">
    <div class="form-group col-md-4 " style="left:90px;">
    <label >client</label>
    <input value="<?php echo set_value('nom_client') ?>" type='text' id="nom_client" name="nom_client" class="form-control">
     <?php echo form_error('nom_client'); ?>
    </div>
    <div class="form-group col-md-4" style="left:160px;">
    <label >intrants</label>
    <input value="<?php echo set_value('intrants') ?>" type='text' id="intrants" name="intrants" class="form-control">
     <?php echo form_error('intrants'); ?>
   
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-4" style="left:90px;">
  <label >produit</label>
  <input value="<?php echo set_value('nom_produit') ?>" type='text' id="pro" name="nom_produit" class="form-control">
     <?php echo form_error('nom_produit'); ?>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4" style="left:90px;">
    <label >pu de Vente</label>
    <input type="number" class="form-control" name="pu_d_A">
    <?php echo form_error('pu_d_A'); ?>
    </div>
    <div class="form-group col-md-4" style="left:160px;">
    <label >qt</label>
    <input type="number" class="form-control" name="qt">
    <?php echo form_error('qt'); ?>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4" style="left:90px;">
    <label >unite</label>
    <input type="text" class="form-control" name="unite">
    <?php echo form_error('unite'); ?>
    </div>
    <div class="form-group col-md-4" style="left:160px;">
    <label >description</label>
    <input type="text" class="form-control" name="description">
    <?php echo form_error('description'); ?>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4" style="left:90px;">
    <label >presentation</label>
    <input type="text" class="form-control" name="presentation">
    <?php echo form_error('presentation'); ?>
    </div>
    <div class="form-group col-md-4" style="left:160px;">
    <label >1erdegre</label>
    <input type="text" class="form-control" name="parpresentation">
    <?php echo form_error('parpresentation'); ?>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4" style="left:160px;">
    <label >2em degre </label>
    <input type="text" class="form-control" name="par2presentation">
    <?php echo form_error('par2presentation'); ?>
    </div>
    <div class="form-group col-md-4" style="left:160px;">
    <label >date </label>
    <input type="date_p" class="form-control" name="date_p">
    <?php echo form_error('date_p'); ?>
    </div>
   </div>
    <button type="submit" class="btn btn-primary btn-xr">Ajouter</button>
    
  <a href="<?php  echo base_url().'index.php/ps/index';?>" class="btn btn-info">Annuler</a>
</form>
    </div>
  </div>
</div>
</div>
</div>
  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>

<!-- fanilofiderana1@gmail.com 29aout1999 fanilo    me=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>
