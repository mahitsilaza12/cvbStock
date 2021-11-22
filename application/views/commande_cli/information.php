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
  Payement <span class="badge badge-primary"></span></button> . 
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">client commander</li>
    <li class="breadcrumb-item active" aria-current="page">commande produit</li>
    <li class="breadcrumb-item active" aria-current="page">payement est facturation de client</li>
  </ol>
</nav>
  </h1>


</div>

<!-- <div style=";height:10px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded"> -->
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">

<div class="btn-group" role="group" aria-label="Basic example">
<a style="margin-left:0px;" id="tel" class="btn btn-info btn-xr" href="<?php echo base_url(). 'index.php/payement_fou/payer'; ?>"><span><i class="fas fa-plus-circle"></i></span>payement</a>
<a style="margin-left:0px;" id="tel" class="btn btn-success btn-xr" href="<?php echo base_url(). 'index.php/excel/excel_fou'; ?>"><span><i class="fas fa-download"></i></span>Telecharger</a>
<button type="button" class="btn btn-secondary"><span><i class="fas fa-sync"></i></span> </button>
</div>



</div>
</div>

 <div class="alert alert-primary" role="alert">
 <h1 style="text-aligne:center;"> Produit payee par le client</h1>
</div>


 <div style="overflow:scroll;margin-top:10px;height:370px;margin-right: 0px;">
  
<table class="table table-hover"style=";height:40px;margin-top:px;margin-right:80px;margin-left:px;  width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded">
                                    <thead class="thead bg-info text-white">
                                      <tr>
                                        <th scope="col">CODEREF</th>
                                        <th scope="col">nom_client</th>
                                        <th scope="col">nom_produit</th>
                                        <th scope="col">prix</th>
                                        <th scope="col">qt</th>
                                        <th scope="col">tva</th>
                                        <th scope="col">conditio</th>
                                        <th scope="col">montant</th>
                                        <th scope="col">action</th>
          
                                        
                                      </tr>
                                    </thead>
                                    <tbody class="table table-dark">
                                                         <?php if(isset($payement_cli) AND !empty($payement_cli)){$mon = 0; $net=0; foreach($payement_cli as $payement_clis){
                                                           $montant = $payement_clis->montantD;
                                                            
                                                           if($payement_clis->conditio == 'gros')
                                                             {$pu_d_V = $payement_clis->pu_d_G;
                                                                 $montant = $payement_clis->montantG;}
                                                           else

                                                             $pu_d_V = $payement_clis->pu_d_V
                                                           
                                                           
                                                           ?>
                                                            <tr>
                                                                <td><?php echo $payement_clis->idcommande_cli?></td>
                                                                <td><?php echo $payement_clis->nom_client?></button></a></td>
                                                                <td><?php echo $payement_clis->nom_produit?></td>
                                                                <td><?php echo $pu_d_V ?>Ar</td>
                                                                <td><?php echo $payement_clis->qt ?></td>
                                                                <td><?php echo $payement_clis->tva ?>%</td>
                                                                <td><?php echo $payement_clis->conditio?></td>
                                                                <td><?php echo $montant?> Ar</td>
                                                                <td>
                                                     
                                                     <a  href="<?php echo base_url().'index.php/payement_cli/annuler/'.$payement_clis->idcommande_cli.'/'.$payement_clis->idproduit; ?>"  style="color:white"><span><i class="fas fa-angle-double-left" style="color:white"></i></span> Annuler</a>
                                                                         
                                                    </td>
                                                                
                                                               
                                                            
                                                              
                                                            </tr>


                                                        <?php 
                                                      $mon += $montant;
                                                      $net = $mon;
                                                      } } else { ?>   
                                                        <td colspan= "5">Element non trouvee</td>
                                                        <?php    }  ?>  

                                                            </tbody>

                                  <tfoot class="table table-dark">
                                 
                                  

                                      <?php
                                      if($remise!=0){
                                        $net =  $mon - (($remise * $mon)/100) ; 
                                        ?>
                                        <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">remise:</th>
                                        <th scope="col"><?php echo $remise ?> %</th>
                                        <th scope="col"></th>

                                        
                                      </tr>
                                      <?php }
                                      ?>
                                     
                                      <tfoot class="table table-dark">
                                      <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">Montant:</th>
                                        <th scope="col"><?php echo $mon ?> Ar</th>
                                        <th scope="col"></th>
                                      </tr>
                                      <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">Net a payer:</th>
                                        <th scope="col"><?php echo $net ?> Ar</th>
                                        <th scope="col"></th>

                                       
                                        
                                      </tr>
                                      
                                  </tfoot>

                                  
                                  </table>     

      </div>
                               <div style="overflow:scroll;margin-top:10px;height:100px;margin-right: 0px;">    
                               <div class="alert alert-primary" role="alert">                                 
                                  <form method="post"  action="<?php echo base_url(). 'index.php/payement_cli/payement'; ?>" >
                                  <input type="hidden" value="<?= $net ?>" name="net">
                                  <input type="hidden" value="<?= $remise ?>" name="remise">
                                  <div class="row">
                                  <div class="col-md-2">
                                  <label >Payement</label>
                                    <input type="text" class="form-control" placeholder="payement" required name="payee" value="<?php echo set_value('payee') ?>">
                                  </div>
                                  <div class="col-md-2">
                                  <label >type_de_payement</label>
                                    <input type="text" class="form-control" name="type_d_payement" value="<?php echo set_value('type_d_payement') ?>" placeholder="cheque,espece...">
                                  </div>
                                  <div class="col-md-2">
                                  <label >date_de_payement</label>
                                    <input type="date" class="form-control" value="<?php echo set_value('date_payement') ?>" name="date_payement">
                                  </div>
                                  <div class="col-md-2">
                                  <label >date_d_echeance</label>
                                    <input type="date" class="form-control" value="<?php echo set_value('date_d_echeance') ?>"  name="date_d_echeance">
                                  </div>
                                 
                                  <div class="col-md-2" style="margin-top:25px;">
                                  
                                  <button type="submit" class="btn btn-info"><span><i class="fas fa-dollar-sign"></i></span> Regler</button>
                                  </div>
                                </div>
                                
                                                          
                                   </form>
                                   </div>
                                  </div>
    </div>
  </div>


  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>

</html>









