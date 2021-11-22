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
  
   <button style="margin-top:20px;" class="btn btn-primary">Ajout</button>
  </div>
    <div class="form-group col-md-6">
      <input style="margin-top:20px;" placeholder="recherch..." type="text" name="" class="form-control" >
    </div>
    </div>

  <thead class="thead-dark"  >
    <tr>
        <th>numero facture</th> 
        <th>fournisseur</th>
        <th>intrants</th>
        <th>Produit</th> 
        <th>Montant</th> 
        <th>Qt</th>    
        <th>Date appro</th> 
        <th width="60">EDIT</th>
        <th width="60">SUPPRIMER</th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($fac_fou)){    foreach($fac_fou as $fac_fous){ ?>
      <tr>
        <td><?php echo $fac_fous['id_fac_fou'] ?></td>
        <td><?php echo $fac_fous['nom_fournisseur'] ?></td>
        <td><?php echo $fac_fous['intrants'] ?></td>
        <td><?php echo $fac_fous['nom_produit'] ?></td>
        <td>300</td>
        <td><?php echo $fac_fous['qt'] ?></td>
        <td><?php echo $fac_fous['dateappro'] ?></td>
        <td>
           <a  href="<?php echo base_url().'index.php/fac_fou/edit_fac_fou/'.$fac_fous['id_fac_fou'] ?> " class=" btn btn-info">Edit</a>
        </td>
        
        <td>
        <a href="<?php echo base_url().'index.php/fac_fou/delete_fac_fou/'.$fac_fous['id_fac_fou'] ?> " class=" btn btn-danger" ><span class="glyphicon glyphicon-remove"></span>Supprimer</a>
        </td>
      </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
 
</table>
</div>
</div>

  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>


















