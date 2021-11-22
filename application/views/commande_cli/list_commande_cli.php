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
<div style="height:70x; margin-top:10px; ">
<h1 style="text-align:center;" class="p-3 mb-2 bg-info text-white"><button style="left:30px;" type="button" class="btn btn-light text-info float-left">
  Archive commande <span class="badge badge-primary"></span></button>Liste commande 
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">historique</li>
    <li class="breadcrumb-item active" aria-current="page">commande</li>
  </ol>
</nav>
  </h1>


</div>

<!-- <div style=";height:10px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded"> -->
<div style="margin-top:10px;">
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">

<div class="btn-group" role="group" aria-label="Basic example">
<!-- <button  type="button" id="aj" class="btn btn-info btn-xr" data-toggle="modal" data-target=".bd-example-modal-xl"><span><i class="fas fa-plus-circle"></i></span> commande</button> -->
<a href=" <?= base_url()?>index.php/historique/historique"><button type="button" class="btn btn-info"><span><i class="fas fa-chevron-circle-left"></i></span> Return </button></a>
<form method="post" action="<?php echo base_url().'index.php/commande_cli/exceles'; ?>">
<button type="submit"  name="export" class="btn btn-success"><span><i class="fas fa-download"></i></span> telecharger excel</button>
</form>
<a href=" <?= base_url()?>index.php/commande_cli/insertcom"><button type="button" class="btn btn-secondary"><span><i class="fas fa-plus-circle"></i></span> commande </button></a>

</div>



</div>

<div class="form-group col-md-4" style="left:280px;margin-top:10px;">
<!-- <form action="<?php echo base_url(). 'index.php/commande_cli/index'; ?>" method="GET">
    <input id="sery" type="search" value="<?php if($this->input->get('recherch')) echo $this->input->get('recherch'); ?>" class="form-control"  name="recherch" placeholder="recherch...">
    <div style="margin-top:20px;">
       
    </div>
    </div>
    
    <div class="form-group col-md-4" style="left:280px;margin-top:10px;margin-top:10px;">
   <button class="btn btn-info"><img style="widht:25px; height:25px;" src="<?=base_url()?>issets/img/Magnifying-Glass-Icon-PNG.png">Recherh</button>
    </div>
    </form> -->
</div>
</div>

 <div style="overflow:scroll;margin-top:px;box-shadow: 0px 20px 30px;height:565px;margin-right: 0px;">
  <table class="table " >
    <thead class="thead bg-info text-white">
    <tr>
    <th scope="col">CODECOMCLI</th>
      <th scope="col">client</th>
      <th scope="col">intrants</th>
      <th scope="col">nom produit</th>
      <th scope="col">qt</th>
      <th scope="col">unite</th>       
      <th scope="col">description</th>    
      <th scope="col">date</th>
     <th scope="col">action</th>
       <!-- <th scope="col">action</th> -->
    </tr>
  </thead>
  <tbody id="result" class="table table-dark">
   <?php if(!empty($commande_cli)){    foreach($commande_cli as $commande_clis){ 
     ?>
      <tr>
        <td><?php echo $commande_clis['idcommande_cli'] ?></td>
        <td><?php echo $commande_clis['nom_client'] ?></button></td>
        <td><?php echo $commande_clis['intrants'] ?></td>
        <td><?php echo $commande_clis['nom_produit'] ?></td>
        <td><?php echo $commande_clis['qt'] ?></td>
        <td><?php echo $commande_clis['unite'] ?></td>
        <td><?php echo $commande_clis['description'] ?></td>
        <td><?php echo $commande_clis['date_commande'] ?></td>
   
          <td>
        <a onclick="return confirm('ete vous sur pour supprimer cette produit?');" href="<?php echo base_url().'index.php/commande_cli/delete_commande_cli/'.$commande_clis['idcommande_cli']  ?>"class="btn btn-danger btn-xr" ><i class="fas fa-trash-alt"></i></a>
          </td> 

        <!-- <td>
        <button type="button" class="btn btn-outline-primary"><a href="<?php echo base_url().'index.php/commande_cli/facturepersonnel/'.$commande_clis['idcommande_cli'] ?> "></span>Afficher</a>
        </td></button> -->
      </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
    
</table>
</div>
</div>

        





        <!-- ajout commande client en mode simple -->


        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-xl">
                             <div class="modal-content">
                                    <div class="modal-header">
                                    
                                    </div>
                                     <div class="modal-body">
       
                                            <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
                                                     <h1>Ajout commande</h1>
                                                      <form method="post"  action="<?php echo base_url(). 'index.php/commande_cli/insert_commande_cli/'; ?>" >
                                                      <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                      <label>client</label>
                                                      <div class="input-group-prepend">
                                                      <span class="input-group-text" style="height:40px;" id="inputGroupPrepend"  type="button" style="margin-left:0px;" id="ajou" class="btn btn-info btn-xr" data-toggle="modal" data-target="#myModal">+</span>
                                                      
                                                      <input value="<?php echo set_value('nom_client') ?>" required placeholder="nom client" type='text' id="nom_client" name="nom_client" class="form-control">
                                                      <?php echo form_error('nom_client'); ?>
                                                      </div>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                        <label >PRODUIT</label>
                                                      <input value="<?php echo set_value('nom_produit') ?>" required placeholder="nom produit" name="nom_produit"  type='text' id="pro" class="form-control">
                                                      <?php echo form_error('nom_produit'); ?>
                                                      </div>
                                                      </div>
                                                      <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                        <label >qt </label>
                                                        <input value="<?php echo set_value('qt') ?>" name="qt"required placeholder="0"  type="text" name="qt" class="form-control" >
                                                        <?php echo form_error('qt'); ?>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                        <label >date commande </label>
                                                        <input value="<?php echo set_value('date_commande') ?>" required type="date" name="date_commande" class="form-control" >
                                                        <?php echo form_error('date_commande'); ?>
                                                      </div>
                                                      </div>
                                                      <!-- Default inline 1-->
                                                     <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline1" name="type">
                                                      <label class="custom-control-label" for="defaultInline1">en detail</label>
                                                     </div>

                                                  <!-- Default inline 2-->
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" class="custom-control-input" value="gros" id="defaultInline2"  name="type">
                                                      <label class="custom-control-label" for="defaultInline2">en gros</label>
                                                    </div>

                                                    <div style="">
                                                    <div class="modal-footer">
                                                    <button type="submit"  class="btn btn-primary containair-fluid">Ajouter</button>
                                                    <a href="<?php  echo base_url().'index.php/commande_cli/index';?>" class="btn btn-info">Annuler</a>
                                                        </div>

                                                  </form>

                                           </div>

                                     </div>


                             </div>
                     </div>
      
         </div>


















<!-- ajout client -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
                       <div class="modal-header">
        
                        </div>
                          <div class="modal-body">
       
                              <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
                                 <h2>insert client</h2>
                                        <form method="post" role="form" name="insertion" action="<?php echo base_url(). 'index.php/client/insert_cli'; ?>" > 
                                          <div class="form-group">
                                            <label >NOM</label>
                                            <input type="nom" class="form-control" required value="<?php echo set_value('nom_client') ?>" name="nom_client" placeholder="Enter nom">
                                            <?php echo form_error('nom_client'); ?>
                                          </div>
                                          <div class="form-group">
                                            <label >ADRESSE:</label>
                                            <input type="adresse" class="form-control" required value="<?php echo set_value('adresse') ?>" name="adresse" placeholder="Enter adresse">
                                            <?php echo form_error('adresse'); ?>
                                          </div>
                                          <div class="form-group">
                                            <label >CONTACT:</label>
                                            <input type="contact" class="form-control"  value="<?php echo set_value('contact') ?>" name="contact" placeholder="Enter contact">
                                            <?php echo form_error('contact'); ?>
                                          </div>
                                          
                                          <button type="submit" class="btn btn-primary">Ajouter</button>
                                          <a href="<?php  echo base_url().'index.php/commande_cli/index';?>" class="btn btn-info">Annuler</a>
                                        </form>
                              </div>



                           </div>

      </div>
      
    </div>
  </div>























  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>issets/js/commande_cli.js"></script>

  <script>
$(document).ready(function(){
    $("button").click(function(){
        $("p").toggle();
    });
});
</script>
</body>

<!--    me=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>







