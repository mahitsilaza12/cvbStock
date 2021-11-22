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

<div class="container">
<div>

 
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  
<div class="col-md-6 col-md-10"class="row" style="height:650px;margin-left:-13px;margin-right:200px; box-shadow: 0px 20px 30px; margin-top:60px; left:229px;position:fixed;"> 
<div style="height:70x; margin-top:10px; ">
<h1 style="text-align:center;" class="p-3 mb-2 bg-info text-white"><button style="left:30px;" type="button" class="btn btn-light text-info float-left">
  2019-12-19 12:30:30s <span class="badge badge-primary"></span></button> Information fournisseur 
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">facturation</li>
  </ol>
</nav>
  </h1>


</div>

<div style=";height:10px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded">
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">

<div class="btn-group" role="group" aria-label="Basic example">
<button  type="button" style="margin-left:0px;" id="ajou" class="btn btn-info btn-xr" data-toggle="modal" data-target="#myModal"><span><i class="fas fa-plus-circle"></i></span> Payement </button>
<a style="margin-left:0px;" id="tel" class="btn btn-success btn-xr" href="<?php echo base_url(). 'index.php/excel/excel_fou'; ?>"><span><i class="fas fa-download"></i></span>Telecharger</a>
<button type="button" class="btn btn-secondary"><span><i class="fas fa-sync"></i></span> </button>
</div>



</div>
</div>

 <div style="overflow:scroll;margin-top:10px;box-shadow: 0px 20px 30px;height:465px;margin-right: 0px;">
  <form method="post"  action="<?php echo base_url(). 'index.php/payement_fou/'; ?>" >
 <div class="alert alert-primary" role="alert">
 <h1 style="text-aligne:center;">Information de la fournisseur</h1>
</div>
 <!-- <div class="alert alert-info" role="alert">
  Nom de fournisseur  <?= $commande_fou[0]->nom_fournisseur?>
</div>
<div class="alert alert-info" role="alert">
  montant a payee  <?=$commande_fou[0]->montant?>
</div>
<div class="alert alert-info" role="alert">
  numero facture N: <?=$commande_fou[0]->numfact ?>
</div>
<div class="alert alert-info" role="alert">
 type de payement
</div>
<div class="alert alert-info" role="alert">
 date de payement
</div>
<div class="alert alert-info" role="alert">
 date d'echence
</div>
<div class="alert alert-info" role="alert">
 payement
</div>
<div class="alert alert-info" role="alert">
 reste a payee
</div>
</div> -->
</form>


<?php var_dump($payement_fou); ?>

      </div>
      
    </div>
  </div>


  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>

</html>











