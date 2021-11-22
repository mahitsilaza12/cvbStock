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
  s <span class="badge badge-primary"></span></button> facturation client 
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">facturation</li>
  </ol>
</nav>
  </h1>


</div>

<div style=";height:10px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded">
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">

<div class="btn-group" role="group" aria-label="Basic example">
<button  type="button" id="aj" class="btn btn-info btn-xr" data-toggle="modal" data-target=".bd-example-modal-xl"><span><i class="fas fa-plus-circle"></i></span>Payement</button>
<a style="margin-left:0px;" id="tel" class="btn btn-success btn-xr" href="<?php echo base_url(). 'index.php/pdf/pdf_client'; ?>"><span><i class="fas fa-download"></i></span>Telecharger</a>
<button type="button" class="btn btn-secondary"><span><i class="fas fa-sync"></i></span> </button>
</div>



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

 <div style="overflow:scroll;margin-top:10px;height:300px;margin-right: 0px;">
  <table class="table table-hover" >
    <thead class="thead bg-info text-white">
    <tr>
    <td scope="col" style="padding-bottom: 10px" colspan="12"> information </td>
  
    </tr>
    <tr>
    <th scope="col">CODECLI</th>
      <th scope="col">Client</th>
      <th scope="col">date_d_commande</th>
      <th scope="col">montant</th>
      <th scope="col">date_de_livraison</th>
      <th scope="col">type_de_payement</th>       
      <th scope="col">montant</th>    
      <th scope="col">RAP</th>
      <th scope="col">date_d_echeance</th>
      <th>ver</th>
    </tr>
  </thead>
  <tbody>
   <?php if(isset($payement_cli) AND !empty($payement_cli)){    foreach($payement_cli as $payement_clis){ ?>
      <tr>
        <td><?php echo $payement_clis['idpay_cli'] ?></td>
        <td>  <a href="#"> <button type="button" class="btn btn-outline-info"><?php echo $payement_clis['nom_client'] ?></button></a></td>
        <td><?php echo $payement_clis->date_commande ?></td>
        <td><?php echo $payement_clis->montant ?>Ar</td>
        <td><?php echo $payement_clis->idcommande_cli ?></td>
        <td><?php echo $payement_clis['date_payement'] ?></td>
        <td><?php echo $payement_clis['rap'] ?></td>
        <td><?php echo $payement_clis['date_d_echeance'] ?></td>
    
        <td>
        <a href="<?php echo base_url().'index.php/commande_fou/facturefournisser/'.$payement_clis['idcommande_cli'] ?> "></span>Afficher</a>
        </td>
      </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
    
   
    
</table>
</div>

<div style="overflow:scroll;margin-top:10px;box-shadow: 0px 20px 30px;height:100px;margin-right: 0px;">
<form>
  <div class="form-row">
    <div class="col-2">
    <label for="">payement</label>
      <input type="text" class="form-control" name="payee" placeholder="payee">
    </div>
    <div class="col-2">
    <label for="">date de payement</label>
      <input type="date" class="form-control" name="date_d_payement" placeholder="date de payement">
     
    </div>
    <div class="col-2">
    <label for="">type de payement</label>
      <input type="text" class="form-control" name="type_payement" placeholder="espece,cheque,...">
    
    </div>
    <div class="col-2">
    <label for="">date d'echeance</label>
      <input type="date" class="form-control" name="date_d_echeance">
      
    </div>
    <div class="col-2" style="margin-top:35px;">
    <button type="submit"  class="btn btn-primary containair-fluid">Regler</button>
 
  </div>
  </div>
</form>

</div>
</div>





  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>

</html>











