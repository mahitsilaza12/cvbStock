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
<h1 style="text-align:center;" class="p-3 mb-2 bg-info text-white"><button style="left:250x;" type="button" class="btn btn-light text-info float-left">
  2019-12-19 12:30:30s <span class="badge badge-primary"></span></button>Chiffre affaire 
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">chiffre d'affaire</li>
  </ol>
</nav>
  </h1>


</div>

<div style=";height:200px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:200%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded">

<div class="form-group col-md-4" style="left:5px;margin-top:10px;">
<label >Affichage entree deux date</label>
<form class="needs-validation"  method="POST" action="<?php echo base_url(). 'index.php/client/chiffreAffaire'; ?>">
<div class="form-group">
     <label >Nom client</label>
      <div class="input-group-prepend">
                                                
  <select name="client" class="form-control" required>
  <option value="">Selection un client</option>
  <?php foreach($client as $clients): ?>
  <option value="<?php echo $clients['idclient']; ?>"><?php echo $clients['nom_client']; ?></option>
    <?php endforeach; ?>
      </select>
       </div>   
       </div>
    
     <div class="row">
    <div class="col">
    <label >date de debut</label>
    <input type="date" class="form-control" name="date1"  value="<?php echo set_value('date_payement') ?>"  required>
    </div>
    <div class="col">
    <label >date fin</label>
    <input type="date" class="form-control" name="date2" required value="<?php echo set_value('date_payement') ?>" >
    </div>
  </div>

        <span><button class="btn btn-primary" id="affiche" type="submit" >
    Afficher
  </button></span>
     
   
  
</form>
<?php

// if(isset($chiffreAffaire)){

// }
//var_dump($chiffreAffaire);
   
?>
  </div>
</div>
 <div style="overflow:scroll;margin-top:-0px;box-shadow: 0px 20px 30px;widht:100px;height:260px;margin-right: 0px;">
  <table class="table table-hover" >
    <thead class="thead bg-info text-white">
      <tr>
        <th>CODECLI</th>
        <th>Nom client</th>
        <th>Adresse</th>
        <th>date de commande</th>
        <th>Montant</th> 
        
        <th width="60">action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if(isset($chiffreAffaire)){ foreach($chiffreAffaire as $chiffreAffaires){ 
        $montant = $chiffreAffaires->montantD;
        if($chiffreAffaires->conditio == 'gros')
          {$pu_d_V = $chiffreAffaires->pu_d_G;
              $montant = $chiffreAffaires->montantG;}
        else
          $pu_d_V = $chiffreAffaires->pu_d_V
      ?>
      <tr>
        <td><?php echo $chiffreAffaires->idclient; ?></td>
        <td><?php echo $chiffreAffaires->nom_client ?></td>
        <td><?php echo $chiffreAffaires->adresse ?></td>
        <td><?php echo $pu_d_V ?></td>
        <td><?php echo $chiffreAffaires->qt ?></td>
        <td><?php echo $chiffreAffaires->conditio ?></td>
        <td><?php echo $chiffreAffaires->date_payement ?></td>
        <td><?php echo $montant." Ar"?></td>
        <td>
           <a  href="<?php echo base_url().'index.php/client/' .$chiffreAffaires->idclient ?> 
            " class="  btn btn-info btn-xr">afficher</a>
        </td>
        
        
      </tr>
<?php } } else { ?>
<td colspan= "S">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
  </table>
</div>

<div class="form-group">
        <button  class="btn btn-success"><span><i class="fas fa-download"></i></span>Telecharger</button>
</div>
  </div>
  
 


</div>


</div>


<!-- -->
</div>
</div>


      </div>
      
    </div>
    
  </div>
  




  <script src="<?= base_url() ?>issets/js/chiffre.js"></script>
  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>
<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>



