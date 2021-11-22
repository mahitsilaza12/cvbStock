<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.min.css">
  <link rel="stylesheet" href=" <?= base_url() ?>issets/fonts/glyphicons-halflings-regular.svg">
  <link rel="stylesheet" href=" <?= base_url() ?>issets/fonts/glyphicons-halflings-regular.ttf">
    <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.css">
    <link rel="stylesheet" href=" <?= base_url()?>issets/css/bootstrap.min.css"> 
	  <script src="<?= base_url()?>issets/js/bootstrap.min.js"></script>

  <style>
  


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
  Fournisseur enregistrer <span class="badge badge-primary"></span></button>Liste fournisseur 
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Liste fournisseur</li>
  </ol>
</nav>
  </h1>


</div>



<!-- <div style=";height:10px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded"> -->
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">

<div class="btn-group" role="group" aria-label="Basic example">
<button style="box-shadow: 0px 20px 30px;" type="button" id="aj" class="btn btn-info btn-xr" data-toggle="modal" data-target="#myModal"><span><i class="fas fa-plus-circle"></i></span> Ajout fournisseur</button>
<form method="post" action="<?php echo base_url().'index.php/fournisseur/exceles'; ?>">
<button type="submit"  name="export" class="btn btn-success"><span><i class="fas fa-download"></i></span> telecharger excel</button>
</form>
<button id="reload" class="btn btn-secondary"><span><i class="fas fa-sync"></i></span></button>
</div>



</div>

<div class="form-group col-md-4" style="left:280px;margin-top:10px;">
    <form action="<?php echo base_url(). 'index.php/fournisseur/index'; ?>" method="GET">
    <input id="sery" type="search" value="<?php if($this->input->get('recherch')) echo $this->input->get('recherch'); ?>" class="form-control"  name="recherch" placeholder="recherch...">
   
    </div>
    
    <div class="form-group col-md-4" style="left:280px;margin-top:10px;margin-top:10px;">
   <button class="btn btn-info"><img style="widht:25px; height:25px;" src="<?=base_url()?>issets/img/Magnifying-Glass-Icon-PNG.png">Recherh</button>
    </div>
    </form>
</div>
<!-- </div> -->

 <div style="overflow:scroll;margin-top:10px;box-shadow: 0px 20px 30px;height:565px;margin-right: 0px;">
  <table class="table " >
    <thead class="thead bg-info text-white">
      <tr>
        <th>CODEFOU</th>
        <th>NOM</th>
        <th>ADRESSE</th>
        <th>CONTACT</th> 
        <th>RESPONSABLE</th> 
        
        <th width="60">EDIT</th>
        <th width="60">SUPPRIMER</th>
      </tr>
    </thead>
    <tbody id="result" class="table table-dark">
    <?php if(!empty($fournisseur)){ foreach($fournisseur as $fournisseurs){ ?>
      <tr>
        <td><?php echo $fournisseurs['idfournisseur'] ?></td>
        <td><?php echo $fournisseurs['nom_fournisseur'] ?></td>
        <td><?php echo $fournisseurs['adresse'] ?></td>
        <td><?php echo $fournisseurs['contact'] ?></td>
        <td><?php echo $fournisseurs['responsable'] ?></td>
        <td>
           <a  href="<?php echo base_url().'index.php/fournisseur/edit_fou/' .$fournisseurs['idfournisseur'] ?> 
            " class="  btn btn-info"><i class="fas fa-edit"></i></a> 
           

        </td>

        <td>
        <a onclick="return confirm('ete vous sur pour supprimer cette fournisseur?');" href="<?php echo base_url().'index.php/fournisseur/delete/' .$fournisseurs['idfournisseur'] ?> "  class="btn btn-danger" class=" btn btn-danger"><i class="fas fa-trash-alt"></i></a>
        </td>

      </tr>
<?php } } else { ?>
<td colspan= "S">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
    
  </table>
  </div>
  </div>

  
     
  
</div>
</div>

</div>



<div class="modal fade bd-example-modal-xl"  tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-header">
      produit entree

    </div>
    <div class="modal-content"style="box-shadow: 0px 20px 30px;" >
    
    </div>
  </div>
</div>
</div>

  
<!-- <script>
$(document).ready(function(){
  $('#cherh').keyup(function(){
      $('#result').html('');

    var utilisateur =$(this).val();
    if(utilisateur!=""){
     #.ajax({
       type:'POST',
       url:,
       data:'recherch' + encodeURIComponent(utilisateur),
       success:function(data){
         if(data!=""){
           $('#result').append(data);
         }
         else{
           codument.getElementById('cherh').innerHTML ="<div style='font-size:20px; text-align:center'>Aucun resultat</div>"
         }
       }
       });
     });
    }
    
  });

});
</script> -->

  


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
                                      <a href="<?php  echo base_url().'index.php/fournisseur/index';?>" class="btn btn-info">Annuler</a>
                                    </form>
                                  </div>



                              </div>
                        <div class="modal-footer">

                          </div>
               </div>
      
            </div>
    </div>







<!-- modifiction fournisseur -->

<div class="modal fade" id="modifou" role="dialog">
          <div class="modal-dialog">
    
             <!-- Modal content-->
               <div class="modal-content">
                      <div class="modal-header">

                        <h4 class="modal-title"></h4>
                      </div>
                            <div class="modal-body">
       
                                <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
                                  <h2>modification</h2>
                                  <form method="post" name="edit_fou" action="<?php echo base_url(). 'index.php/fournisseur/edit_fou/' ?>" > 
    
                                    <div class="form-group">
                                      <label >NOM</label>
                                      <input type="nom" class="form-control" name="nom_fournisseur" placeholder="Enter nom">
                                      <?php //echo form_error('nom_fournisseur'); ?>
                                    </div>
                                    <div class="form-group">
                                      <label >ADRESSE:</label>
                                      <input type="adresse" class="form-control"  name="adresse" placeholder="Enter adresse">
                                      <?php //echo form_error('adresse'); ?>
                                    </div>
                                    <div class="form-group">
                                      <label >CONTACT:</label>
                                      <input type="contact" class="form-control"  name="contact" placeholder="Enter contact">
                                      <?php //echo form_error('contact'); ?>
                                    </div>

                                    <div class="form-group">
                                      <label >RESPONSABLE:</label>
                                      <input type="text" class="form-control"   name="responsable" placeholder="Enter responsable">
                                      <?php //echo form_error('contact'); ?>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                    <a href="<?php  echo base_url().'index.php/fournisseur/index';?>" class="btn btn-info">Annuler</a>
                                  </form>
                                  </div>



                              </div>
                        <div class="modal-footer">

                          </div>
               </div>
      
            </div>
    </div>


    <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>issets/js/fournisseur.js"></script>
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








