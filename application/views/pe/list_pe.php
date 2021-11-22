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
<div style="position:fixed" class="container col-md-8 col-md-12 ">
<div style=";height:10px;margin-top:80px;margin-right:10px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-10 ">
<h1 style="margin-left:300px;">commande fournisseur</h1>
</div>
<div style=";height:60px;margin-top:40px;margin-right:10px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-10 ">
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Ajout
</button>
</div>
<div class="form-group col-md-4" style="left:250px;margin-top:10px;">
    <input type="text" class="form-control" name="recherch" placeholder="recherch...">
    </div>
    <div class="form-group col-md-4" style="left:250px;margin-top:10px;margin-top:10px;">
   <button class="btn btn-info"><img style="widht:25px; height:25px;" src="<?=base_url()?>issets/img/Magnifying-Glass-Icon-PNG.png">Recherh</button>
    </div>
</div>
</div>
<div id="dd" style=";height:455px;margin-top:10px;margin-right:40px;left:30px; box-shadow: 0px 20px 30px; width:100%; overflow:scroll;" class="container col-md-7 col-md-10">
<div class="panel panel-heading">  

</div>
<table class="table">
  <thead class="thead-dark ">
    <tr>
      <th scope="col">id</th>
      <th scope="col">fournisseur</th>
      <th scope="col">intrants</th>
      <th scope="col">produit</th>
      <th scope="col">PU Achat</th>
      <th scope="col">qt</th>
      <th scope="col">TVA</th>
      <th scope="col">dateappro</th>
      <th scope="col">numero facture</th>       
      <th scope="col">action</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  <?php if(!empty($pe)){    foreach($pe as $pes){ ?>
      <tr>
        <td><?php echo $pes['idpe'] ?></td>
        <td><?php echo $pes['nom_fournisseur'] ?></td>
        <td><?php echo $pes['intrants'] ?></td>
        <td><?php echo $pes['nom_produit'] ?></td>
        <td><?php echo $pes['pu_d_A'] ?></td>
        <td><?php echo $pes['qt'] ?></td>
        <td><?php echo $pes['tva'] ?></td>
        <td><?php echo $pes['dateappro'] ?></td>
        <td><?php echo $pes['id_fac_fou'] ?></td>
        <td>
           <a  href="<?php echo base_url().'index.php/pe/edit_pe/'.$pes['idpe'] ?> " class=" btn btn-info"><img style="widht:25px; height:25px;" src="<?=base_url()?>issets/img/Tools_Hammer.png"></a>
        </td>
        
        <td>
        <a href="<?php echo base_url().'index.php/pe/delete_pe/'.$pes['idpe'] ?> " class=" btn btn-danger" ><img style="widht:25px; height:25px;" src="<?=base_url()?>issets/img/remove_256.png"></a>
        </td>
      </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
 
  </tbody>
</table>
</div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post"  action="<?php echo base_url(). 'index.php/pe/insert_pe/'; ?>" >
  <div class="row">
    <div class="col">
    <label >fournisseur</label>
    <input value="<?php echo set_value('nom_fournisseur') ?>" type='text' id="fournisseur" name="nom_fournisseur" class="form-control">
     <?php echo form_error('nom_fournisseur'); ?>
    </div>
    <div class="col">
    <label >intrants</label>
    <input value="<?php echo set_value('intrants') ?>" type='text' id="intrants" name="intrants" class="form-control">
     <?php echo form_error('intrants'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label >produit</label>
  <input value="<?php echo set_value('nom_produit') ?>" type='text' id="pro" name="nom_produit" class="form-control">
     <?php echo form_error('nom_produit'); ?>
    </div>
    <div class="col">
    <label >pu d'achat</label>
    <input type="number" class="form-control" name="pu_d_A">
    <?php echo form_error('pu_d_A'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label >qt</label>
    <input type="number" class="form-control" name="qt">
    <?php echo form_error('qt'); ?>
    </div>
    <div class="col">
    <label >TVA</label>
    <input type="number" class="form-control" name="tva">
    <?php echo form_error('tva'); ?>
    </div>
  </div><div class="row">
    <div class="col">
    <label >date appro</label>
    <input type="date" class="form-control" name="dateappro">
    <?php echo form_error('dateappro'); ?>
    </div>
    <div class="col">
    <label >numero facture</label>
    <input type="number" class="form-control" name="id_fac_fou">
    </div>
  </div>
  

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-xr"><img style="widht:25px; height:25px;" src="<?=base_url()?>issets/img/ok-icon.png"></button>
    
    <a href="<?php  echo base_url().'index.php/pe/index';?>" class="btn btn-info"><img style="widht:25px; height:25px;" src="<?=base_url()?>issets/img/retour.png"></a>
      </div>
    </div>
    </form>
  </div>
</div>



  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>

<!-- fanilofiderana1@gmail.com 29aout1999 fanilo    me=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>

