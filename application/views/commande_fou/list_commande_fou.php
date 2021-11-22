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
 Liste archive appro<span class="badge badge-primary"></span></button>_
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">historique</li>
    <li class="breadcrumb-item active" aria-current="page">Approvionnement</li>
  </ol>
</nav>
  </h1>


</div>

<!-- <div style="height:5px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded"> -->
<div style="margin-top:10px;">
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">

<div class="btn-group" role="group" aria-label="Basic example">
<!-- <button  type="button" id="aj" class="btn btn-info btn-xr" data-toggle="modal" data-target=".bd-example-modal-xl"><span><i class="fas fa-plus-circle"></i></span>Ajout produit</button> -->
<a href=" <?= base_url()?>index.php/historique/historique"><button type="button" class="btn btn-info"><span><i class="fas fa-chevron-circle-left"></i></span> Return </button></a>
<form method="post" action="<?php echo base_url().'index.php/commande_fou/exceles'; ?>">
<button type="submit"  name="export" class="btn btn-success"><span><i class="fas fa-download"></i></span> telecharger excel</button>
</form>
<a href=" <?= base_url()?>index.php/commande_fou/insertcomfou"><button type="button" class="btn btn-secondary"><span><i class="fas fa-plus-circle"></i></span> approvision </button></a>

</div>



</div>

<div class="form-group col-md-4" style="left:280px;margin-top:10px;">
    <!-- <form action="<?php echo base_url(). 'index.php/fournisseur/index'; ?>" method="GET">
    <input type="search" value="<?php if($this->input->get('recherch')) echo $this->input->get('recherch'); ?>" class="form-control"  name="recherch" placeholder="recherch...">
    <div style="margin-top:20px;">
        <div id="result"></div>
    </div>
    </div>
    
    <div class="form-group col-md-4" style="left:280px;margin-top:10px;margin-top:10px;">
   <button class="btn btn-info"><img style="widht:25px; height:25px;" src="<?=base_url()?>issets/img/Magnifying-Glass-Icon-PNG.png">Recherh</button>
    </div>
    </form> -->
</div>
</div>

 <div style="overflow:scroll;margin-top:0px;box-shadow: 0px 20px 30px;height:565px;margin-right: 0px;">
  <table class="table " >
    <thead class="thead bg-info text-white">
    <tr>
    <th scope="col">CODECOMFOU</th>
      <th scope="col">fournisseur</th>
      <th scope="col">intrants</th>
      <th scope="col">nom_produit</th>
      <th scope="col">qt</th>
      <th scope="col">pu_d_A</th>
      <th scope="col">montant</th>
      <th scope="col">unite</th>       
      <th scope="col">description</th>    
      <th scope="col">date</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <tbody class="table table-dark">
   <?php if(isset($commande_fou) AND !empty($commande_fou)){    foreach($commande_fou as $commande_fous){ ?>
      <tr>
        <td><?php echo $commande_fous['idcommande_fou'] ?></td>
        <td><?php echo $commande_fous['nom_fournisseur'] ?></td>
        <td><?php echo $commande_fous['intrants'] ?></td>
        <td><?php echo $commande_fous['nom_produit'] ?></td>
        <td><?php echo $commande_fous['qt'] ?></td>
        <td><?php echo $commande_fous['pu_d_A'] ?> Ar</td>
        <td><?php echo $commande_fous['montant'] ?> Ar</td>
        <td><?php echo $commande_fous['unite'] ?></td>
        <td><?php echo $commande_fous['description'] ?></td>
        <td><?php echo $commande_fous['date_appro'] ?></td>

        <td>
        <a onclick="return confirm('ete vous sur pour supprimer cette produit?');" href="<?php echo base_url().'index.php/commande_fou/delete_commande_fou/'.$commande_fous['idcommande_fou']  ?>"class="btn btn-danger btn-xr" ><i class="fas fa-trash-alt"></i></a>
          </td> 
   
        <!-- <td>
        <a href="<?php echo base_url().'index.php/commande_fou/facturefournisser/'.$commande_fous['idcommande_fou'] ?> "></span>Afficher</a>
        </td> -->
        <!-- <td>
        <a href="<?php echo base_url().'index.php/payement_fou/payeer/'.$commande_fous['idcommande_fou'] ?> "></span>payee</a>
        </td> -->
      </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
    
</table>
</div>
</div>

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
         <h1>Ajout commande fournisseur</h1>
        </div>
        <div class="modal-body">
       
        <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
      
    <form method="post"  action="<?php echo base_url(). 'index.php/commande_fou/insert_commande_fou/'; ?>" >
    <div class="form-row">
         <div class="form-group col-md-6">
           <label>fournisseur</label>
            <div class="input-group-prepend">
            <span class="input-group-text" style="height:40px;" id="inputGroupPrepend"  type="button" style="margin-left:0px;" 
            id="ajou" class="btn btn-info btn-xr" data-toggle="modal" data-target="#myModal">+</span>                       
           <input value="<?php echo set_value('nom_fournisseur') ?>" required placeholder="nom_fournisseur" type='text' id="nom_fournisseur" name="nom_fournisseur" class="form-control">
            <?php echo form_error('nom_fournisseur'); ?>
            </div>
           </div>
            <div class="form-group col-md-6">
         <label >PRODUIT</label>
         <input value="<?php echo set_value('nom_produit') ?>" required placeholder="nom produit" name="nom_produit"  type='text' id="pro" class="form-control">
        <?php echo form_error('nom_produit'); ?>
           </div>
          </div>
    <div class="form-row">
    <div class="form-group col-md-6 " style="width:400px;">
      <label >prix d'achat </label>
      <input value="<?php echo set_value('pu_d_A') ?>" required  type="text" name="pu_d_A" class="form-control" >
      <?php echo form_error('pu_d_A'); ?>
    </div> 
    <div class="form-group col-md-6">
      <label >date appro </label>
      <input value="<?php echo set_value('date_appro') ?>" required  type="date" name="date_appro" class="form-control" >
      <?php echo form_error('date_appro'); ?>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6"style="width:400px;">
      <label >qt </label>
      <input value="<?php echo set_value('qt') ?>" required placeholder="0"  type="text" name="qt" class="form-control" >
      <?php echo form_error('qt'); ?>
    </div>
   
   

     <!-- Default inline 1-->
<div class="custom-control custom-radio custom-control-inline" style="margin-top:50px;">
  <input type="radio"  value="detail" class="custom-control-input" id="defaultInline1" name="type">
  <label class="custom-control-label" for="defaultInline1">en detail</label>
</div>

<!-- Default inline 2-->
<div class="custom-control custom-radio custom-control-inline" style="margin-top:50px;">
  <input type="radio" checked="" class="custom-control-input" value="gros" id="defaultInline2"  name="type">
  <label class="custom-control-label" for="defaultInline2">en gros</label>
</div>
</div>
  <div style="">
  <div class="modal-footer">
  <button type="submit"  class="btn btn-primary containair-fluid">Ajouter</button>
  <a href="<?php  echo base_url().'index.php/commande_fou/index';?>" class="btn btn-info">Annuler</a>
      </div>
      
     
</form>

     </div>

</div>


</div>
      </div>
      
    </div>















<!-- ajout fournisseur n'exist pas dans la liste de client fournissseur -->
<div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
    
             <!-- Modal content-->
               <div class="modal-content">
                      <div class="modal-header">

                        <h4 class="modal-title"></h4>
                      </div>
                            <div class="modal-body">
       
                                <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
                                  <h2>Ajout</h2>
                                    <form method="post" role="form" name="insertion" action="<?php echo base_url(). 'index.php/fournisseur/insert_fou'; ?>" > 
                                      <div class="form-group">
                                        <label >NOM</label>
                                        <input type="text" class="form-control" required value="<?php echo set_value('nom_fournisseur') ?>" name="nom_fournisseur" placeholder="Enter nom">
                                        <?php echo form_error('nom_fournisseur'); ?>
                                      </div>
                                      <div class="form-group">
                                        <label >ADRESSE:</label>
                                        <input type="text" class="form-control" required value="<?php echo set_value('adresse') ?>" name="adresse" placeholder="Enter adresse">
                                        <?php echo form_error('adresse'); ?>
                                      </div>
                                      <div class="form-group">
                                        <label >CONTACT:</label>
                                        <input type="number" class="form-control" required value="<?php echo set_value('contact') ?>" name="contact" placeholder="Enter contact">
                                        <?php echo form_error('contact'); ?>
                                      </div>

                                      <div class="form-group">
                                        <label >RESPONSABLE:</label>
                                        <input type="text" class="form-control" required value="<?php echo set_value('responsable') ?>" name="responsable" placeholder="Enter responsable">
                                        <?php echo form_error('responsable'); ?>
                                      </div>
                                      
                                      <button type="submit" class="btn btn-primary">Ajouter</button>
                                      <a href="<?php  echo base_url().'index.php/commande_fou/index';?>" class="btn btn-info">Annuler</a>
                                    </form>
                                  </div>



                              </div>
                        <div class="modal-footer">

                          </div>
               </div>
      
            </div>
    </div>
























<!-- 
ajout plusieur produit -->


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
                       <div class="modal-header">
        
                        </div>
                          <div class="modal-body">
       
                                            <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
                                                     <h1>Ajout commande</h1>
                                                     <form class="needs-validation" method="post"  action="<?php echo base_url(). 'index.php/commande_cli/plusieucom/'; ?>" >
                                                        <div class="row">
                                                        <div class=" form-group col-md-2"style="margin-left:350px;margin-top:10px;">
                                                        <label >nom client</label>
                                                        <input type="text" value="<?php echo set_value('nom_client') ?>" name="nom_client"class=form-control placeholder="Nom client" required>
                                                        </div>

                                                        <div class=" form-group col-md-2"style="margin-left:;margin-top:10px;" required>
                                                        <label >Date</label>
                                                        <input type="date" value="<?php echo set_value('date_commande') ?>" name="date_commande"  class=form-control >
                                                        </div>
                                                        <div>
                                                        <button type="submit"class="btn btn-primary containair-fluid" style="margin-left:;margin-top:40px;">Ajouter commande</button>
                                                        </div>
                                                        </div>
                                                          <div class="form-row" style="margin-left:200px;margin-top:px;">
                                                            <div class="col-md-2">
                                                              <label for="validationCustom01">Produit</label>
                                                              <input type="text" value="<?php echo set_value('nom_produit') ?>" name="nom_produit"  class="form-control" placeholder="nom produit"  >
                                                              
                                                            </div>
                                                            
                                                            <div class="col-md-2 ">
                                                              <label for="validationCustom02">Qt</label>
                                                              <input type="number" class="form-control"value="<?php echo set_value('qt') ?>" name="qt" placeholder="0"required>
                                                              <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline1" name="type">
                                                          <label class="custom-control-label" for="defaultInline1">detail</label>
                                                          <div class="custom-control custom-radio custom-control-inline">
                                                          <input style="left:10px;" type="radio" class="custom-control-input" value="gros" id="defaultInline2"  name="type">
                                                          <label  style="margin-left:40px;"class="custom-control-label" for="defaultInline2">gros</label>
                                                        </div>
                                                        </div>




                                                            </div>

                                                            <div class="col-md-2"style="margin-left:90px;">
                                                              <label for="validationCustom01">Produit</label>
                                                              <input type="text" class="form-control" value="<?php echo set_value('nom_produit') ?>" name="nom_produit"  placeholder="nom produit"  >
                                                              
                                                            </div>
                                                            
                                                            <div class="col-md-2 ">
                                                              <label for="validationCustom02">Qt</label>
                                                              <input type="number" class="form-control" value="<?php echo set_value('qt') ?>" name="qt" placeholder="0">
                                                              <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline3" name="type1">
                                                          <label class="custom-control-label" for="defaultInline3">detail</label>
                                                          <div class="custom-control custom-radio custom-control-inline">
                                                          <input style="left:10px;" type="radio" class="custom-control-input" value="gros" id="defaultInline4"  name="type1">
                                                          <label  style="margin-left:40px;"class="custom-control-label" for="defaultInline4">gros</label>
                                                        </div>
                                                        </div>
                                                        </div>


















                                                        <div class="form-row" style="margin-left:0px;margin-top:px;">
                                                            <div class="col-md-2">
                                                              
                                                              <input type="text" class="form-control" value="<?php echo set_value('nom_produit') ?>" name="nom_produit"  placeholder="nom produit"  >
                                                              
                                                            </div>
                                                            
                                                            <div class="col-md-2 "style="margin-left:px;margin-top:px;">
                                                          
                                                              <input type="number" class="form-control" value="<?php echo set_value('qt') ?>" name="qt" placeholder="0">
                                                              <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline5" name="type2">
                                                          <label class="custom-control-label" for="defaultInline5">detail</label>
                                                          <div class="custom-control custom-radio custom-control-inline">
                                                          <input style="left:10px;" type="radio" class="custom-control-input" value="gros" id="defaultInline6"  name="type2">
                                                          <label  style="margin-left:40px;"class="custom-control-label" for="defaultInline6">gros</label>
                                                        </div>
                                                        </div>




                                                            </div>

                                                            <div class="col-md-2"style="margin-left:85px;">
                                                            
                                                              <input type="text" class="form-control" value="<?php echo set_value('nom_produit') ?>" name="nom_produit"  placeholder="nom produit"  >
                                                              
                                                            </div>
                                                            
                                                            <div class="col-md-2 "style="margin-left:px;margin-top:px;">
                                                            
                                                              <input type="number" class="form-control" value="<?php echo set_value('qt') ?>" name="qt" placeholder="0">
                                                              <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline7" name="type3">
                                                          <label class="custom-control-label"  for="defaultInline7">detail</label>
                                                          <div class="custom-control custom-radio custom-control-inline">
                                                          <input style="left:10px;" type="radio" class="custom-control-input" value="gros" id="defaultInline8"  name="type3">
                                                          <label  style="margin-left:40px;"class="custom-control-label" for="defaultInline8">gros</label>
                                                        </div>
                                                        </div>
                                                        </div>
















                                                        <div class="form-row" style="margin-left:0px;margin-top:px;">
                                                            <div class="col-md-2">
                                                              
                                                              <input type="text" class="form-control" value="<?php echo set_value('nom_produit') ?>" name="nom_produit"  placeholder="nom produit"  >
                                                              
                                                            </div>
                                                            
                                                            <div class="col-md-2 "style="margin-left:px;margin-top:px;">
                                                          
                                                              <input type="number" class="form-control" value="<?php echo set_value('qt') ?>" name="qt" placeholder="0">
                                                              <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline9" name="type4">
                                                          <label class="custom-control-label" for="defaultInline9">detail</label>
                                                          <div class="custom-control custom-radio custom-control-inline">
                                                          <input style="left:10px;" type="radio" class="custom-control-input" value="gros" id="defaultInline10"  name="type4">
                                                          <label  style="margin-left:40px;"class="custom-control-label" for="defaultInline10">gros</label>
                                                        </div>
                                                        </div>




                                                            </div>

                                                            <div class="col-md-2"style="margin-left:85px;">
                                                            
                                                              <input type="text" class="form-control" value="<?php echo set_value('nom_produit') ?>" name="nom_produit"  placeholder="nom produit"  >
                                                              
                                                            </div>
                                                            
                                                            <div class="col-md-2 "style="margin-left:px;margin-top:px;">
                                                            
                                                              <input type="number" class="form-control" value="<?php echo set_value('qt') ?>" name="qt" placeholder="0">
                                                              <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline11" name="type5">
                                                          <label class="custom-control-label" for="defaultInline11">detail</label>
                                                          <div class="custom-control custom-radio custom-control-inline">
                                                          <input style="left:10px;" type="radio" class="custom-control-input" value="gros" id="defaultInline12"  name="type5">
                                                          <label  style="margin-left:40px;"class="custom-control-label" for="defaultInline12">gros</label>
                                                        </div>
                                                        </div>
                                                        </div>










                                                        <div class="form-row" style="margin-left:0px;margin-top:px;">
                                                            <div class="col-md-2">
                                                              
                                                              <input type="text" class="form-control" value="<?php echo set_value('nom_produit') ?>" name="nom_produit"  placeholder="nom produit"  >
                                                              
                                                            </div>
                                                            
                                                            <div class="col-md-2 "style="margin-left:px;margin-top:px;">
                                                          
                                                              <input type="number" class="form-control" value="<?php echo set_value('qt') ?>" name="qt" placeholder="0">
                                                              <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline13" name="type6">
                                                          <label class="custom-control-label" for="defaultInline13">detail</label>
                                                          <div class="custom-control custom-radio custom-control-inline">
                                                          <input style="left:10px;" type="radio" class="custom-control-input" value="gros" id="defaultInline14"  name="type6">
                                                          <label  style="margin-left:40px;"class="custom-control-label" for="defaultInline14">gros</label>
                                                        </div>
                                                        </div>




                                                            </div>

                                                            <div class="col-md-2"style="margin-left:85px;">
                                                            
                                                              <input type="text" class="form-control" value="<?php echo set_value('nom_produit') ?>" name="nom_produit"  placeholder="nom produit"  >
                                                              
                                                            </div>
                                                            
                                                            <div class="col-md-2 "style="margin-left:px;margin-top:px;">
                                                            
                                                              <input type="number" class="form-control" value="<?php echo set_value('qt') ?>" name="qt" placeholder="0">
                                                              <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline15" name="type7">
                                                          <label class="custom-control-label" for="defaultInline15">detail</label>
                                                          <div class="custom-control custom-radio custom-control-inline">
                                                          <input style="left:10px;" type="radio" class="custom-control-input" value="gros" id="defaultInline16"  name="type7">
                                                          <label  style="margin-left:40px;"class="custom-control-label" for="defaultInline16">gros</label>
                                                        </div>
                                                        </div>
                                                        </div>












                                                        <div class="form-row" style="margin-left:0px;margin-top:px;">
                                                            <div class="col-md-2">
                                                              
                                                              <input type="text" class="form-control" placeholder="nom produit"  >
                                                              
                                                            </div>
                                                            
                                                            <div class="col-md-2 "style="margin-left:15px;margin-top:px;">
                                                          
                                                              <input type="number" class="form-control" value="<?php echo set_value('qt') ?>" name="qt" placeholder="0">
                                                              <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline17" name="type8">
                                                          <label class="custom-control-label" for="defaultInline17">detail</label>
                                                          <div class="custom-control custom-radio custom-control-inline">
                                                          <input style="left:10px;" type="radio" class="custom-control-input" value="gros" id="defaultInline18"  name="type8">
                                                          <label  style="margin-left:40px;"class="custom-control-label" for="defaultInline18">gros</label>
                                                        </div>
                                                        </div>




                                                            </div>

                                                            <div class="col-md-2"style="margin-left:92px;">
                                                            
                                                              <input type="text" class="form-control" placeholder="nom produit"  >
                                                              
                                                            </div>
                                                            
                                                            <div class="col-md-2 "style="margin-left:10px;margin-top:px;">
                                                            
                                                              <input type="number" class="form-control" value="<?php echo set_value('qt') ?>" name="qt" placeholder="0">
                                                              <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline19" name="type9">
                                                          <label class="custom-control-label" for="defaultInline19">detail</label>
                                                          <div class="custom-control custom-radio custom-control-inline">
                                                          <input style="left:10px;" type="radio" class="custom-control-input" value="gros" id="defaultInline20"  name="type9">
                                                          <label  style="margin-left:40px;"class="custom-control-label" for="defaultInline20">gros</label>
                                                        </div>
                                                        </div>
                                                        </div>






                                                        </div>
                                                          
                                                      </form>

                                           </div>

                                     </div>


                             </div>
                     </div>
      
         </div>









  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>

<!-- fanilofiderana1@gmail.com 29aout1999 fanilo    me=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>











