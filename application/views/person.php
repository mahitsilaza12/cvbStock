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
  Etat en stock <span class="badge badge-primary"></span></button>Liste produit 
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">produit</li>
  </ol>
</nav> 
</h1>



</div>

<!-- <div style=";height:10px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded"> -->
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">

<div class="btn-group" role="group" aria-label="Basic example">
<button  type="button" id="aj" class="btn btn-info btn-xr" data-toggle="modal" data-target=".bd-example-modal-xl"><span><i class="fas fa-plus-circle"></i></span> Ajout produit</button>
<form method="post" action="<?php echo base_url().'index.php/produit/exceles'; ?>">
<button type="submit"  name="export" class="btn btn-success"><span><i class="fas fa-download"></i></span> telecharger excel</button>
</form>
<button id="reload" class="btn btn-secondary"><span><i class="fas fa-sync"></i></span></button>
</div>



</div>

<div class="form-group col-md-4" style="left:280px;margin-top:10px;">
  
    <input id="sery" type="search" value="<?php if($this->input->get('recherch')) echo $this->input->get('recherch'); ?>" class="form-control"  name="recherch" placeholder="recherch...">
    
    
    
    </div>
 

    <div class="form-group col-md-4" style="left:280px;margin-top:10px;margin-top:10px;">
   <button class="btn btn-info"><img style="widht:25px; height:25px;" src="<?=base_url()?>issets/img/Magnifying-Glass-Icon-PNG.png">Recherh</button>
    </div>
  
</div>
<!-- </div> -->

 <div style="overflow:scroll;margin-top:10px;box-shadow: 0px 20px 30px;height:565px;margin-right: 0px;">
  <table class="table " >
    <thead class="thead bg-info text-white">
    <tr>
      <th scope="col">codepro</th>
      <th scope="col">intrants</th>
      <th scope="col">nom</th>
      <th scope="col">stock</th>
      <th scope="col">presentation</th>
      <th scope="col">parpresentation</th>
      <th scope="col">stock_gros</th>
      <th scope="col">pu_Detail</th>  
      <th scope="col">pu_Gros</th>
      <th scope="col">pu_Achat</th> 
      <th scope="col">unite</th>
      <th scope="col">tva</th>
      <th scope="col">description</th>
      <th scope="col">date(per)</th>
      <th scope="col">action</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody id="result" class=" table table-dark">
    <?php
    if(!empty($produit)){    foreach($produit as $produits){
      
    
      $produits['par2presentation']=  (int)($produits['stock']/$produits['parpresentation']);
       
       if($produits['stock']>=0) 
       {
         if($produits['stock']<=40)
         {
              $class='btn btn-danger';
         }
         elseif($produits['stock']<=40) {
              $class='btn btn-warning';
         }
         else {
           $class='bitn btn-primary';
         }
         
       }
      
   
      
      ?>
      <tr>
        <td><?php echo $produits['idproduit'] ?></td>
        <td><?php echo $produits['intrants'] ?></button></a></td>
        <td><?php echo $produits['nom_produit'] ?></td>
        <td class="<?= $class ?>"><?php  echo $produits['stock'] ?></td>
        <td><?php echo $produits['presentation'] ?></td>
        <td><?php echo $produits['parpresentation']." ".$produits['unite'] ?></td>
        <td><?php echo $produits['par2presentation']."  ".$produits['presentation']." est ".$produits['stock']%$produits['parpresentation']." ".$produits['unite'] ?></td>
        <td><?php echo $produits['pu_d_V']." Ar" ?></td>  
        <td><?php echo $produits['pu_d_G']." Ar" ?></td>
        <td><?php echo $produits['pu_d_A']." Ar" ?></td>
        <td><?php echo $produits['unite'] ?></td>
        <td><?php echo $produits['tva']."%" ?></td>
        <td><?php echo $produits['description'] ?></td>
        <td id="peremption"><?php echo $produits['datePEr'] ?></td>
        <td>
          <a  href="<?php echo base_url().'index.php/produit/edit_pro/'.$produits['idproduit'] ?> "class="  btn btn-info btn-xr" ><i class="fas fa-edit"></i></a>
           
        </td>
        
      
        <?php if($this->session->pseudo == "administrateur") {?> 
          <td>
        <a onclick="return confirm('ete vous sur pour supprimer cette produit?');" href="<?php echo base_url().'index.php/produit/delete_prod/'.$produits['idproduit']  ?>"class="btn btn-danger btn-xr" ><i class="fas fa-trash-alt"></i></a>
          </td> 
          <?php } ?>
       
       
      </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
 
</table>
</div>
</div>

  </div>
  








<!-- ajout prouduit -->


<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-xl">
                           <div class="modal-content">
                                <div class="modal-header">
                                
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accuiel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
    <li class="breadcrumb-item active" aria-current="page">Ajout produit</li>
  </ol>
</nav>
                                </div>
                                <div class="alert alert-primary" role="alert">  
                                   <div class="modal-body">
       
                                        <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
                                                 <h1 style="text-align:center;">Ajout produit</h1>
      
                                                 <form method="post"  action="<?php echo base_url(). 'index.php/produit/insert_prod/'; ?>" >
                                                
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
                                                    <button type="submit"  class="btn btn-success containair-fluid"><span><i class="fas fa-save"></i></span> Enregistrer</button>
                                                    <a href="<?php  echo base_url().'index.php/produit/index';?>" class="btn btn-info"><span><i class="fas fa-share"></i> </span>  Annuler</a>
                                                        </div>
                                                 

                                                  </form>

                                         </div>

                                   </div>
                              </div>

                           </div>
                     </div>
      
              </div>













              <!-- modifier produit -->





              <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-xl">
                           <div class="modal-content">
                                <div class="modal-header">
                                
                                </div>
                                   <div class="modal-body">
       
                                        <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
                                                 <h1 style="text-align:center;">modification produit</h1>
      
                                                 <form method="post"  action="<?php echo base_url(). 'index.php/produit/insert_prod/'; ?>" >
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
                                                    <input  value="<?php echo set_value('pu_d_V') ?>"required placeholder="Prix detail"  type="number" name="pu_d_V" class="form-control">
                                                    <?php echo form_error('pu_d_V'); ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label>Pu en gros</label>
                                                    <input  value="<?php echo set_value('pu_d_G') ?>"required placeholder="prix en Gros"  type="number" name="pu_d_G" class="form-control">
                                                    <?php echo form_error('pu_d_G'); ?>
                                                    </div>
                                                      <div class="form-group col-md-6">
                                                        <label >UNITE </label>
                                                        <input value="<?php echo set_value('unite') ?>"required placeholder="Kg,cc..."  type="text" name="unite" class="form-control" >
                                                        <?php echo form_error('unite'); ?>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                        <label >DESCRIPTION </label>
                                                        <input value="<?php echo set_value('description') ?>"required placeholder="description"  type="text" name="description" class="form-control">
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
                                                    <div style="">
                                                    <div class="modal-footer">
                                                    <button type="submit"  class="btn btn-primary containair-fluid"><span><i class="fas fa-save"></i></span> Enregistrer</button>
                                                    <a href="<?php  echo base_url().'index.php/produit/index';?>" class="btn btn-info"><span><i class="fas fa-share"></i> </span> Annuler</a>
                                                        </div>

                                                  </form>

                                         </div>

                                   </div>


                           </div>
                     </div>
      
              </div>


  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>issets/js/produit.js"></script>

  <script type="text/javascript"> 
         $(document).ready(function () {
          $('#reload').click(function() { 
             location.reload();    
          }); 
         }); 

</script> 
</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>




