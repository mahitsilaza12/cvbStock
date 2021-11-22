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


<div class="container">
<div>

 
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  
<div class="col-md-6 col-md-10"class="row" style="height:650px;margin-left:-13px;margin-right:200px; box-shadow: 0px 20px 30px; margin-top:60px; left:229px;position:fixed;"> 
<div style="height:50px; box-shadow: 0px 20px 30px; margin-top:10px; ">
<h1 style="text-align:center;">Liste client</h1>
<button type="button" class="btn btn-secondary float-left">Example Button floated left</button>
  <button type="button" class="btn btn-secondary float-right">Example Button floated right</button>

</div>

<div style=";height:60px;margin-top:10px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 ">
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">
<button  type="button" style="margin-left:0px;" id="ajou" class="btn btn-info btn-xr" data-toggle="modal" data-target="#myModal">Ajout client</button>
<a style="margin-left:0px;" id="tel" class="btn btn-success btn-xr" href="<?php echo base_url(). 'index.php/pdf/pdf_client'; ?>">Telecharger</a>

</div>

<div class="form-group col-md-4" style="left:280px;margin-top:10px;">
    <form action="<?php echo base_url(). 'index.php/fournisseur/index'; ?>" method="GET">
    <input type="search" value="<?php if($this->input->get('recherch')) echo $this->input->get('recherch'); ?>" class="form-control"  name="recherch" placeholder="recherch...">
    <div style="margin-top:20px;">
        <div id="result"></div>
    </div>
    </div>
    
    <div class="form-group col-md-4" style="left:280px;margin-top:10px;margin-top:10px;">
   <button class="btn btn-info"><img style="widht:25px; height:25px;" src="<?=base_url()?>issets/img/Magnifying-Glass-Icon-PNG.png">Recherh</button>
    </div>
    </form>
</div>
</div>

 <div style="overflow:scroll;margin-top:10px;box-shadow: 0px 20px 30px;height:490px;margin-right: 0px;">
  <table class="table table-hover" >
    <thead class="thead-dark">
      <tr>
        <th>IDCLIENTt</th>
        <th>NOM</th>
        <th>ADRESSE</th>
        <th>CONTACT</th> 
        
        <th width="60">EDIT</th>
        <th width="60">SUPPRIMER</th>
      </tr>
    </thead>
    <tbody>
    <?php if(!empty($client)){ foreach($client as $clients){ ?>
      <tr>
        <td><?php echo $clients['idclient'] ?></td>
        <td><?php echo $clients['nom_client'] ?></td>
        <td><?php echo $clients['adresse'] ?></td>
        <td><?php echo $clients['contact'] ?></td>
        <td>
           <a  href="<?php echo base_url().'index.php/client/edit_cli/' .$clients['idclient'] ?> 
            " class="  btn btn-info btn-xr">Edit</a>
        </td>
        
        <td>
        <a href="<?php echo base_url().'index.php/client/delete/' .$clients['idclient'] ?> "  class="btn btn-danger btn-xr" class=" btn btn-danger">Supprimer</a>
        </td>
      </tr>
<?php } } else { ?>
<td colspan= "S">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
  </table>
</div>
</div>



  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        
        </div>
        <div class="modal-body">
       
        <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
  <h2>insert client</h2>
  <form method="post" role="form" name="insertion" action="<?php echo base_url(). 'index.php/client/insert_cli'; ?>" > 
    <div class="form-group">
      <label >NOM</label>
      <input type="nom" class="form-control" required value="<?php echo set_value('nom_client') ?>" name="nom_client" placeholder="Enter nom">
      <?php echo form_error('nom_client'); ?>
    </div>
    <div class="form-group">
      <label >ADRESSE:</label>
      <input type="adresse" class="form-control" required value="<?php echo set_value('adresse') ?>" name="adresse" placeholder="Enter adresse">
      <?php echo form_error('adresse'); ?>
    </div>
    <div class="form-group">
      <label >CONTACT:</label>
      <input type="contact" class="form-control" required value="<?php echo set_value('contact') ?>" name="contact" placeholder="Enter contact">
      <?php echo form_error('contact'); ?>
    </div>
    
    <button type="submit" class="btn btn-primary">Ajouter</button>
    <a href="<?php  echo base_url().'index.php/client/index';?>" class="btn btn-info">Annuler</a>
  </form>
</div>



        </div>
        <div class="modal-footer">
    
        </div>
      </div>
      
    </div>
  </div>
  
</div>

  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>

<!-- Mirrored   from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>
