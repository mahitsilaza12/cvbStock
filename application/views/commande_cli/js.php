

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
<div>
</div>

  

                <div class="container">
                <div>

 
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  
                    <div class="col-md-6 col-md-10"class="row" style="height:650px;margin-left:-13px;margin-right:200px; box-shadow: 0px 20px 30px; margin-top:60px; left:229px;position:fixed;"> 


                        <!-- <div style=";height:10px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded"> -->
                                <div class="form-row">
                                <div class="form-group col-md-12" style="left:5px;margin-top:px;">
                                <h1 style="text-align:center;height:70px; margin-top:8px; " class="p-3 mb-2 bg-info text-white">
                                <button style="margin-left:270px;" type="button" class="btn btn-light text-info float-left">
                                </button>
                                <nav aria-label="breadcrumb" style="margin-top:45px;">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">commande client</li>
    <li class="breadcrumb-item active" aria-current="page">commande produit</li>
  </ol>
</nav> 
                                </h1>


                                </div>

<!-- eto misy kozy -->
                                </div>

                                    <div style="margin-top:px;box-shadow: 0px 20px 30px;height:520px;margin-right: 0px;" >
                                                                                                
                                                <div class="card-group">
                                                    <div class="card">
                                                        <div class="card-body">
                                                        <div class="alert alert-primary" role="alert">
                                                        <h5 class="card-title"><em> commander des produits </em></h5>
                                                       <form method="post"   action="<?php echo base_url(). 'index.php/commande_cli/enregistrer/'; ?>">
                                                       <div class="form-group">
                                                      <label style="left:20px;">Nom produit</label>
                                                                <div class="input-group-prepend">           
                                                                   
                                                                        <select name="produit" class="form-control">
                                                                        <option value="">Selectionner un produit</option>
                                                                            <?php foreach($produit as $produits): ?>
                                                                            <option value="<?php echo $produits['idproduit']; ?>"><?php echo $produits['nom_produit']; ?></option>
                                                                            <?php endforeach; ?>
                                                                            </select>
                                                                    </div> 
                                                                </div>  
                                                            
                                                                <div style="left:-15px;" class="form-group col-md-12">
                                                                        <label >quantite </label>
                                                                        <input value="<?php echo set_value('qt') ?>" required  type="text" name="qt" class="form-control" >
                                                                        <?php echo form_error('qt'); ?>
                                                                        </div>
                                                      
                                                                        <div class="custom-control custom-radio custom-control-inline" style="margin-top:0px; left:40px;">
                                                                    <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline1" name="type">
                                                                    <label class="custom-control-label" for="defaultInline1">en detail</label>
                                                                    </div>

                                                                    
                                                                    <div class="custom-control custom-radio custom-control-inline" style="margin-top:px; left:40px;">
                                                                    <input type="radio"  class="custom-control-input" value="gros" id="defaultInline2"  name="type">
                                                                    <label class="custom-control-label" for="defaultInline2">en gros</label>
                                                                    </div>
                                                                    <div class="form-group" style="margin-top:40px;">
                                                                    <button type="submit"  class="btn btn-primary containair-fluid" style="left:50px;"><span><i class="fas fa-angle-double-right"></i></span> Suivant</button>
                                                                    </div> 
                                                                
                                                       </form>
                                                        </div>
                                                        <?php if(isset($commande_cli)){?>
                                                        <form action="<?php  echo base_url().'index.php/payement_cli/information/'.$commande_cli?>" method="POST">
                                                                <label >Remise</label>
                                                                <input type="text" class="form-control" placeholder="%" name="remise">
                                                                <button type="submit" class="btn btn-success"><span><i class="fas fa-stop"></i></span> terminer</button>
                                                                   </form> 
                                                        <?php } ?>
                                                    </div>
                                                    </div>
                                                    <div class="card">
                                                  
                                                        <div class="card-body">
                                                        <div style="overflow:scroll;margin-top:10px;box-shadow: 0px 20px 30px;height:465px;margin-right: 0px;">
                                                        <table class="table  " >
                                                            <thead class="thead bg-info text-white">
                                                            <tr>
                                                            <th scope="col">CODECOMCLI</th>
                                                            <th scope="col">Client</th>
                                                            <th scope="col">nom_produit</th>
                                                            <th scope="col">qt</th> 
                                                            <th scope="col">tva</th> 
                                                            <th scope="col">PU_(par_conditionnement)</th>
                                                            <th scope="col" style="width:20%">Total</th>
                                                            <th scope="col">condition</th>   
                                                            <th scope="col">date_commande</th>
                                                            <th scope="col">Action</th>
                                                            
                                                            </tr>
                                                        </thead>
                                                       
                                                        
                                                        <tbody class="table table-dark">
                                                         <?php if(isset($listes) AND !empty($listes)){ 
                                                             $montant = 0;
                                                             foreach($listes as $commande_clis){
                                                            //   $montant = $commande_clis->montantD;
                                                              if($commande_clis->conditio == 'gros')
                                                                {$pu_d_V = $commande_clis->pu_d_G;
                                                                    // $montant = $commande_clis->montantG;
                                                                }
                                                              else
                                                                $pu_d_V = $commande_clis->pu_d_V
                                                                

                                                            
                                                            
                                                             ?>
                                                            <tr>
                                                                <td><?php echo $commande_clis->idcommande_cli ?></td>
                                                                <td>  <a href="#"> <button type="button" class="btn btn-outline-info"><?php echo $commande_clis->nom_client ?></button></a></td>
                                                         
                                                                <td><?php echo $commande_clis->nom_produit ?></td>
                                                             
                                                                <td><?php echo $commande_clis->qt ?></td>
                                                                <td><?php echo $commande_clis->tva ?>%</td>
                                                                <td><?= $pu_d_V ?></td>
                                                                <td><?= ($pu_d_V * $commande_clis->qt) + ((($pu_d_V * $commande_clis->qt) * ($commande_clis->tva)) / 100) ?>Ar</td>


                                                                <td><?php echo $commande_clis->conditio ?></td>
                                                                <td><?php echo $commande_clis->date_commande ?></td>
                                                              

                                                            
                                                                <td>
                                                                <a onclick="return confirm('ete vous sur pour annuler cette commande?');" href="<?php echo base_url().'index.php/commande_cli/delete/'.$commande_clis->idcommande_cli."/".$commande_clis->idproduit ?>" ><span><i class="fas fa-angle-double-left btn-btn-info" style="color:white">Annuler</i></span></a>
                                                                </td>
                                                            </tr>


                                                        <?php 
                                                    $montant += ($pu_d_V * $commande_clis->qt) + ((($pu_d_V * $commande_clis->qt) * ($commande_clis->tva)) / 100);
                                                     } 
                                                     
?>

<tr>
                                                                
                                                                <td colspan="6" style="text-align:right">Montant total</td>
                                                                <td><?=$montant?>Ar</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>

<?php


                                                     } else { ?> 
                                                        <td colspan= "5">Element non trouvee</td>
                                                        <?php    }  ?>  

                                                            </tbody>
                                                            
                                                        </table>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                    </div>

                                    </div>
  
                        </div>
                    </div>

                </div>









  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>

 




</body>

<!--    me=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>














<!-- 

<div style="margin-top:px;box-shadow: 0px 20px 30px;height:450px;margin-right: 800px;margin-left:10px;">
                                                        <div class="container col-md-6  clo-md-12 col-md-offset-3" style="margin-left:70px;">
                                                                <form method="post"   action="<?php echo base_url(). 'index.php/commande_fou/enregistrer/'; ?>" >
                                                                        
                                                                    <div class="form-row">
                                                                    <div class="form-group col-md-12" style="margin-top:40px;">
                                                                    
                                                                        <div class="form-group">
                                                                        <label >Nom produit</label>
                                                                    <div class="input-group-prepend">
                                                                    
                                                                    <span class="input-group-text" style="height:40px;" id="inputGroupPrepend"
                                                                    type="button" style="margin-left:0px;" id="ajou" class="btn btn-info btn-xr"
                                                                        data-toggle="modal" data-target="#myModal">+</span>
                                                                        <select name="idfournisseur" class="form-control">
                                                                        <option value="">Selection un produit</option>
                                                                            <?php foreach($produit as $produits): ?>
                                                                            <option value="<?php echo $produits['idproduit']; ?>"><?php echo $produits['nom_produit']; ?></option>
                                                                            <?php endforeach; ?>
                                                                            </select>
                                                                    </div>   
                                                                    </div>

                                                                    <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label >quantite </label>
                                                                        <input value="<?php echo set_value('qt') ?>" required  type="number" name="qt" class="form-control" >
                                                                        <?php echo form_error('qt'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline" style="margin-top:0px; left:10px;">
                                                                    <input type="radio"  value="detail" class="custom-control-input" id="defaultInline1" name="type">
                                                                    <label class="custom-control-label" for="defaultInline1">en detail</label>
                                                                    </div>

                                                                    <!-- Default inline 2
                                                                    <div class="custom-control custom-radio custom-control-inline" style="margin-top:px; left:10px;">
                                                                    <input type="radio" checked="" class="custom-control-input" value="gros" id="defaultInline2"  name="type">
                                                                    <label class="custom-control-label" for="defaultInline2">en gros</label>
                                                                    </div>
                                                                    </div>
                                                                    
                                                                <div style="">
                                                                <div class="modal-footer">
                                                                <button type="submit"  class="btn btn-primary containair-fluid">Suivant</button>
                                                                <a href="<?php  echo base_url().'index.php/commande_cli/enregistrer';?>" class="btn btn-success">terminer</a>
                                                                    </div>
                                                                    
                                                                    
                                                                </form>

                                                        </div>
                                                        </div> -->