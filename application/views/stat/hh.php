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


 
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  
<div class="col-md-6 col-md-10"class="row" style="height:650px;margin-left:-13px;margin-right:200px; box-shadow: 0px 20px 30px; margin-top:60px; left:229px;position:fixed;"> 
                    <div style="height:30x; margin-top:10px; ">
                            <h1 style="text-align:center;" class="p-3 mb-2 bg-info text-white"><button style="left:250x;" type="button" class="btn btn-light text-info float-left">
                           <em> histogramme </em><span class="badge badge-primary"></span></button>statistique 
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">histogramme</li>
                            </ol>
                            </nav>
                            </h1>


                    </div>

                                <!-- <div style=";height:100px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:200%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded"> -->

                                <div class="alert alert-primary" role="alert">
                                <h1 style="text-aligne:center;"><em> histogramme de client et de fournisseur</em></h1>
                                </div>
                            

                                    <div class="alert alert-info" role="alert">
                                   cliquer ici si vous voulez voir le statistique en   <a href="<?php echo base_url().'index.php/commande_cli/pied'?>">pied</a>
                                  
                                    </div>
                                    <div class="alert alert-dark" role="alert">
                                    cliquer ici si vous voulez voir le statistique en  <a href="<?php echo base_url().'index.php/commande_cli/ligne'?>">ligne</a>
                                    </div>
                                    <div class="alert alert-success" role="alert">
                                   cliquer ici si vous voulez voir le statistique en bar  <a href="<?php echo base_url().'index.php/payement_cli/statistiquepayement'?>">tous payement des client</a>
                                  
                                    </div>
                                    <div class="alert alert-warning" role="alert">
                                    cliquer ici si vous voulez voir la <a href="<?php echo base_url().'index.php/payement_cli/statistiquepayfou'?>">depense</a>
                                    </div>
                                               







<!-- -->
                            </div>

  



  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>issets/js/chiffre.js"></script>
  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
 
</body>
<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>



