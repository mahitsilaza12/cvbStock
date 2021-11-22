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
                            Archive <span class="badge badge-primary"></span></button>Historique
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
                                <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">historique</li>
                            </ol>
                            </nav>
                            </h1>


                    </div>

                                <!-- <div style=";height:100px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:200%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded"> -->

                                <div class="alert alert-primary" role="alert">
                                <h1 style="text-aligne:center;"><em> historique de commande et approvisionnement</em></h1>
                                </div>
                            

                                    <div class="alert alert-info" role="alert">
                                   clique ici si vous voules voir le historique des commande de   <a href="<?php echo base_url().'index.php/historique/client'?>">Client</a>
                                  
                                    </div>
                                    <div class="alert alert-dark" role="alert">
                                    clique ici si vous vouler voir le historique des approvisionnement de  <a href="<?php echo base_url().'index.php/historique/fournisseur'?>">Fournisseur</a>
                                    </div>

                                    <div class="alert alert-success" role="alert">
                                   clique ici si vous voules voir le payement   <a href="<?php echo base_url().'index.php/payement_cli/payer'?>">Client</a>
                                  
                                    </div>
                                    <div class="alert alert-primary" role="alert">
                                    clique ici si vous vouler voir le historique de payement de <a href="<?php echo base_url().'index.php/payement_fou/payer'?>">Fournisseur</a>
                                    </div>
                                               







<!-- -->
                            </div>

  



  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>issets/js/chiffre.js"></script>
  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
 
</body>
<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>



