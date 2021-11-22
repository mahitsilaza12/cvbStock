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
  Archive facturation<span class="badge badge-primary"></span></button> Payement 
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">historique</li>
    <li class="breadcrumb-item active" aria-current="page">facturation</li>
  </ol>
</nav>
  </h1>


</div>

<!-- <div style=";height:10px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded"> -->
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">

<div class="btn-group" role="group" aria-label="Basic example">

<form method="post" action="<?php echo base_url().'index.php/payement_cli/exceles'; ?>">
<button type="submit"  name="export" class="btn btn-success"><span><i class="fas fa-download"></i></span> telecharger excel</button>
</form>
<button type="button" class="btn btn-secondary"><span><i class="fas fa-sync"></i></span> </button>
<a href="<?php echo base_url().'index.php/historique/historique'?>"><button type="button" class="btn btn-info"><span><i class="fas fa-chevron-circle-left"></i></span> Retour</button></a>
</div>



</div>
</div>

 <div class="alert alert-primary" role="alert">
 <h1 style="text-aligne:center;">payement de la client</h1>
</div>


 <div style="overflow:scroll;margin-top:10px;height:470px;margin-right: 0px;">
  
<table class="table table-dark"style=";height:40px;margin-top:px;margin-right:80px;margin-left:px;  width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded">
                                    <thead class="thead bg-info text-white">
                                      <tr>
                                      
                                        <th scope="col">nom_client</th>
                                        <th scope="col">numero_facture</th>
                                        <th scope="col">date_commande</th>
                                
                                        <th scope="col">somme_a_payeee</th>
                                        <th scope="col">type_de_payement</th>
                                        <th scope="col">payee</th>
                                        <th scope="col">date_de_payement</th>
                                        <th scope="col">rest_a_payee</th>
                                        <th scope="col">date_d_echeance</th>
                                        <th scope="col">Verification</th>
                                        <th scope="col">payement</th>
                                        <th scope="col">facturation</th>
                                        <th scope="col">suppression</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                                         <?php  $total = 0; if(isset($payement_cli) AND !empty($payement_cli)){ 
                                                            $last = 0;
                                                            // $total +=$payement_clis['payee'];

                                                           foreach($payement_cli as $payement_clis){
                                                          

                                                            $payement_clis['ver']= 'incomplet';
                                                            
                                                            $payement_clis['rest'] =  ($payement_clis['net'] - $payement_clis['payee'] );

                                                      
                                                          if($payement_clis['payee']==$payement_clis['net'] )
                                                           {
                                                              $payement_clis['ver']= 'complet';
                                                           }
                                                          


                                                           if($payement_clis['numfact'] == $last)
                                                               {
                                                                 $last = $payement_clis['numfact'];
                                                              }
                                                            
                                                               else {
                                                                 $last = $payement_clis['numfact'];
                                                                 $total += $payement_clis['payee'];
                                                  
                                                           ?>
                                                            <tr>
                                                               
                                                                <td><?php echo $payement_clis['nom_client'] ?></td>
                                                                <td><?php echo $payement_clis['numfact'] ?></button></a></td>   
                                                                <td><?php echo $payement_clis['date_commande'] ?></td>
                                                                <td><?php echo $payement_clis['net']?>Ar</td>
                                                                <td><?php echo $payement_clis['type_d_payement'] ?></td>
                                                                <td><?php echo $payement_clis['payee']?>Ar</td>
                                                                <td><?php echo $payement_clis['date_payement'] ?> </td>
                                                                <td><?php echo $payement_clis['rest'] ?>Ar</td>
                                                                <td><?php echo $payement_clis['date_d_echeance'] ?></td>
                                                                <td><?php echo $payement_clis['ver'] ?></td>
                                                               
                                                                <td>
                                                                
                                                                <?php if($payement_clis['rest'] != 0){?>
                                                                  <a  href="<?php echo base_url().'index.php/payement_cli/edit_pay/'.$payement_clis['numfact']; ?> " ><i class="fas fa-phone"></i></a>
                                                                <?php } ?>
                                                                </td>
                                                                <td>
                                           
                                                                <a  href="<?php echo base_url().'index.php/commande_cli/facturepersonnel/'.$payement_clis['numfact']; ?> " ><i class="fas fa-download"></i></a>
                                                                  
                                                                </td>
                                                               
                                                                <?php if($this->session->pseudo == "administrateur") {?>
                                                                <td>
                                                
                                                                <a onclick="return confirm('ete vous sur pour supprimer cette commande?');" href="<?php echo base_url().'index.php/commande_cli/deletese/'.$payement_clis['numfact'] ?>" ><i class="fas fa-trash-alt"></i></a>
                                                 
                                                                </td>
                                                                <?php } ?>
                                                                
                                                              
                                                            </tr>


                                                        <?php 
                                                        }
                                                       } 
                                                       
                                                       } else { ?>   
                                                        <td colspan= "5">Element non trouvee</td>
                                                        <?php    }  ?>  

                                                            </tbody>
                                                            <tfoot>
                                  <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                              
                                        <th scope="col">Total :</th>
                                        <th scope="col"><?php 
                                        if(isset($total) ) echo $total."Ar";
                                         ?></th>

                                        
                                      </tr>
                                  </tfoot>

                                  
                                  </table>     

             </div>


             
                             
    </div>
  </div>


  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>

</html>









