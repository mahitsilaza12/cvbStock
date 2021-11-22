

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
                                <h1 style="text-align:center;height:70px; margin-top:8px; " class="p-3 mb-2 bg-info text-white"><button style="margin-left:270px;" type="button" class="btn btn-light text-info float-left">
                                <h3> </h3> </button>
                                <nav aria-label="breadcrumb" style="margin-top:45px;">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">fournisseur approv</li>
    <li class="breadcrumb-item active" aria-current="page">produit commander</li>
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
                                                        <h5 class="card-title"><em> Approvisionnement </em></h5>
                                                       <form method="post"   action="<?php echo base_url(). 'index.php/commande_fou/enregistrer/'; ?>">
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
                                                                    <input type="radio"  value="detail" class="custom-control-input" id="defaultInline1" name="type">
                                                                    <label class="custom-control-label" for="defaultInline1">en detail</label>
                                                                    </div>

                                                                    
                                                                    <div class="custom-control custom-radio custom-control-inline" style="margin-top:px; left:40px;">
                                                                    <input type="radio" checked="" class="custom-control-input" value="gros" id="defaultInline2"  name="type">
                                                                    <label class="custom-control-label" for="defaultInline2">en gros</label>
                                                                    </div>
                                                                    <div class="form-group" style="margin-top:40px;">
                                                                    <button type="submit"  class="btn btn-primary containair-fluid" style="left:50px;"><span><i class="fas fa-angle-double-right"></i></span> Suivant</button>
                                                                <a href="<?php  echo base_url().'index.php/payement_fou/information/'.$commande_fou ;?>" class="btn btn-success"><span><i class="fas fa-stop"></i></span> terminer</a>
                                                                    </div>  
                                                       </form>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="card">
                                                  
                                                        <div class="card-body">
                                                        <div style="overflow:scroll;margin-top:10px;box-shadow: 0px 20px 30px;height:465px;margin-right: 0px;">
                                                        <table class="table" >
                                                            <thead class="thead bg-info text-white">
                                                            <tr>
                                                            <th scope="col">CODECOMFOU</th>
                                                            <th scope="col">fournisseur</th>
                                                            <th scope="col">nom_produit</th>
                                                            <th scope="col">qt</th>
                                                            <th scope="col">prix_d_achat</th>
                                                            <th scope="col">total</th>
                                                            <th scope="col">condition</th>
                                                            <th scope="col">date_appro</th>
                                                            <th scope="col">Action</th>
                                                            
                                                            </tr>
                                                        </thead>
                                                       
                                                        
                                                        <tbody class="table table-dark">
                                                         <?php if(isset($liste) AND !empty($liste)){ $montant=0; foreach($liste as $commande_fous){
                                                            if($commande_fous->conditio == 'gros')
                                                            {$pu_d_A = $commande_fous->pu_d_A;
                                                                // $montant = $commande_clis->montantG;
                                                            }
                                                          else
                                                            $pu_d_A = $commande_fous->pu_d_A
                                                            
                                                           
                                                           ?>
                                                            <tr>
                                                                <td><?php echo $commande_fous->idcommande_fou ?></td>
                                                                <td><?php echo $commande_fous->nom_fournisseur ?></button></a></td>
                                                                <td><?php echo $commande_fous->nom_produit ?></td>
                                                                <td><?php echo $commande_fous->qt ?></td>
                                                                <td><?php echo $pu_d_A ?> </td>
                                                                <td><?= ($pu_d_A * $commande_fous->qt) ?>Ar</td>
                                                                <td><?php echo $commande_fous->conditio ?> </td>
                                                                <td><?php echo $commande_fous->date_appro ?></td>
                                                            
                                                                <td>
                                                                <a onclick="return confirm('ete vous sur pour annuler cette approvisionnement?');" href="<?php echo base_url().'index.php/commande_fou/delete/'.$commande_fous->idcommande_fou."/".$commande_fous->idproduit ?> " ><span><i class="fas fa-angle-double-left btn btn-info" style="color:white">Annuler</i></span></a>
                                                                </td>
                                                            </tr>
                                                            <?php 
                                                    $montant += ($pu_d_A * $commande_fous->qt);
                                                     } 
                                                     
                                                              ?>

                                                              <tr>
                                                                
                                                                <td colspan="5" style="text-align:right">Montant total</td>
                                                                <td><?=$montant?>Ar</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>

                                                        <?php } else { ?> 
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

 

<!-- ajout prouduit -->


<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-xl">
                           <div class="modal-content">
                                <div class="modal-header">
                                
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Accuiel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
    <li class="breadcrumb-item active" aria-current="page">Ajout produit</li>
  </ol>
</nav>
                                </div>
                                   <div class="modal-body">
       
                                        <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
                                                 <h1 style="text-align:center;">Ajout produit</h1>
      
                                                 <form method="post"  action="<?php echo base_url(). 'index.php/commande_fou/insert_prod/'; ?>" >
                                                    <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                      <label>intrants</label>
                                                      <input value="<?php echo set_value('intrants') ?>" required type='text' id="pro" placeholder="intrants" name="intrants" class="form-control">
                                                      <?php echo form_error('intrants'); ?>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                        <label >PRODUIT</label>
                                                      <input value="<?php echo set_value('nom_produit') ?>"required placeholder="nom produit" type='text' id="pro" name="nom_produit" class="form-control">
                                                      <?php echo form_error('nom_produit'); ?>
                                                      </div>
                                                    </div>
                                                    <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                      <label>Pu en detail</label>
                                                    <input  value="<?php echo set_value('pu_d_V') ?>"required placeholder="Prix detail"  type="text" name="pu_d_V" class="form-control">
                                                    <?php echo form_error('pu_d_V'); ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label>Pu en gros</label>
                                                    <input  value="<?php echo set_value('pu_d_G') ?>"required placeholder="prix en Gros"  type="text" name="pu_d_G" class="form-control">
                                                    <?php echo form_error('pu_d_G'); ?>
                                                    </div>
                                                      <div class="form-group col-md-6">
                                                        <label >UNITE </label>
                                                        <input value="<?php echo set_value('unite') ?>"required placeholder="Kg,cc..."  type="text" name="unite" class="form-control" >
                                                        <?php echo form_error('unite'); ?>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                        <label >DESCRIPTION </label>
                                                        <input value="<?php echo set_value('description') ?>" placeholder="description"  type="text" name="description" class="form-control">
                                                        <?php echo form_error('description'); ?>
                                                      </div>
                                                      </div>
                                                      <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                        <label >PRESENTATION </label>
                                                        <input value="<?php echo set_value('presentation') ?>"required placeholder="presentation" type="text" name="presentation" class="form-control" >
                                                        <?php echo form_error('presentation'); ?>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                        <label >PAR PRESENTATION </label>
                                                        <input value="<?php echo set_value('parpresentation') ?>"required placeholder="par presentation"  type="text" name="parpresentation" class="form-control">
                                                        <?php echo form_error('parpresentation'); ?>
                                                      </div> 
                                                      </div>
                                                      <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                        <label >Tva </label>
                                                        <input value="<?php echo set_value('tva') ?>" placeholder=" tva en %"  type="text" name="tva" class="form-control">
                                                        <?php echo form_error('tva'); ?>
                                                      </div> 
                                                      <div class="form-group col-md-6">
                                                        <label >date de peremption </label>
                                                        <input value="<?php echo set_value('datePEr') ?>"   type="date" name="datePEr" class="form-control">
                                                        <?php echo form_error('datePEr'); ?>
                                                      </div> 
                                                      </div>
                                                      <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                        <label >pu d'achat </label>
                                                        <input value="<?php echo set_value('pu_d_A') ?>" placeholder="prix d'achat"  type="text" name="pu_d_A" class="form-control">
                                                        <?php echo form_error('pu_d_A'); ?>
                                                      </div> 
                                                      </div>
                                                    <div style="">
                                                    <div class="modal-footer">
                                                    <button type="submit"  class="btn btn-primary containair-fluid">Ajouter</button>
                                                    <a href="<?php  echo base_url().'index.php/commande_fou/insertcomfou/';?>" class="btn btn-info">Annuler</a>
                                                        </div>

                                                  </form>

                                         </div>

                                   </div>


                           </div>
                     </div>
      
              </div>







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