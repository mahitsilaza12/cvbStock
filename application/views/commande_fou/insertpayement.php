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
<div style="height:70x; margin-top:10px; ">
<h1 style="text-align:center;" class="p-3 mb-2 bg-info text-white"><button style="left:30px;" type="button" class="btn btn-light text-info float-left">
  j <span class="badge badge-primary"></span></button>payement  
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">approvisionnement</li>
    <li class="breadcrumb-item active" aria-current="page">payement</li>
  </ol>
</nav>
  </h1>


</div>

<div style=";height:10px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded">
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">

    
  
    </form>
</div>
</div>

<div class="container col-md-6 clo-md-12 col-md-offset-3">
<h1> </h1>

<form method="post" name="payement_fou" action="<?php echo base_url(). 'index.php/payement_fou/payeer/'?>" > 
    
    <div class="form-group">
      <label >payement</label>
      <input type="text" class="form-control" value="<?php echo set_value('payee') ?>" name="payee">
      <?php //echo form_error('nom'); ?>
    </div>
    <div class="form-group">
      <label >type de payement:</label>
      <input type="text" class="form-control"  value="<?php echo set_value('type_d_payement') ?>"  name="type_d_payement" placeholder="espece,cheque,...">
      <?php //echo form_error('adresse'); ?>
    </div>
    <div class="form-group">
      <label >date de payement:</label>
      <input type="date" class="form-control" value="<?php echo set_value('date_payement') ?>" name="date_payement" >
      <?php //echo form_error('contact'); ?>
    </div>
    <div class="form-group">
      <label >date d'echeance:</label>
      <input type="date" class="form-control" value="<?php echo set_value('date_d_echeance') ?>"  name="date_d_echeance" >
      <?php //echo form_error('contact'); ?>
    </div>
    
    <button type="submit" class="btn btn-primary">Payement</button>
    <a href="<?php  echo base_url().'index.php/commande_fou/index';?>" class="btn btn-info">Annuler</a>
  </form>
</div>

</div>  



</div>
</div>
</div>
</div>












</body>
</html>