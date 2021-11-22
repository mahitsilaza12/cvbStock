<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.min.css">

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



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
                       <div class="modal-header">
        
                        </div>
                          <div class="modal-body">
       
                              <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
                                 <h2>Ajout</h2>
                                        <form method="post" role="form" name="insertion" action="<?php echo base_url(). 'index.php/user/add'; ?>" > 
                                          <div class="form-group">
                                            <label >NOM</label>
                                            <input type="nom" class="form-control" required value="<?php echo set_value('pseudo') ?>" name="pseudo" placeholder="Enter nom">
                                            <?php echo form_error('pseudo'); ?>
                                          </div>
                                          <div class="form-group">
                                            <label >MOT DE PASSE:</label>
                                            <input type="password" class="form-control" required value="<?php echo set_value('mdp') ?>" name="mdp" placeholder="Enter mdp">
                                            <?php echo form_error('mdp'); ?>
                                          </div>
                                          <div class="form-group">
                                          <label >Privilège </label>
                                          <select class="form-control" name="type" value="<?php echo set_value('type')?>" name="type">
                                            <option value="administrateur">Administrateur</option>
                                            <option value="simple">Simple utilisateur</option>
                                          </select>
                                        </div>
                                          
                                          <button type="submit" class="btn btn-primary">Ajouter</button>
                                          <a href="<?php  echo base_url().'index.php/user/index';?>" class="btn btn-info">Annuler</a>
                                        </form>
                              </div>



                           </div>

      </div>
      
    </div>
  </div>








<div class="container">
<div>

 
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  
<div class="col-md-6 col-md-10"class="row" style="height:650px;margin-left:-13px;margin-right:200px; box-shadow: 0px 20px 30px; margin-top:60px; left:229px;position:fixed;"> 
<div style="height:70x; margin-top:10px; ">
<h1 style="text-align:center;" class="p-3 mb-2 bg-info text-white"><button style="left:30px;" type="button" class="btn btn-light text-info float-left">
  utilisateur enregistrer <span class="badge badge-primary"></span></button>Liste utilisateur 
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Liste utilisateur</li>
  </ol>
</nav>
  </h1>


</div>

<!-- <div style=";height:px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded"> -->
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">

<div class="btn-group" role="group" aria-label="Basic example">
<button  type="button" style="margin-left:0px;" id="ajou" class="btn btn-info btn-xr" data-toggle="modal" data-target="#myModal"><span><i class="fas fa-plus-circle"></i></span> Ajout utilisateur </button>

  <button type="button" > </button>
  <button id="reload" class="btn btn-secondary"><span><i class="fas fa-sync"></i></span></button>
</div>



</div>

<div class="form-group col-md-4" style="left:300px;margin-top:10px;">
    
   
    
</div>
<!-- </div> -->

 <div style="margin-top:10px;box-shadow: 0px 20px 30px;widht:560px;height:565px;margin-right: 100px;">
  <table class="table" >
    <thead class="thead bg-info text-white">
      <tr>
        <th>CODEUTIL</th>
        <th>NOM</th>
        <th>TYPE</th>
 
        
        <th width="60">EDIT</th>
        <th width="60">SUPPRIMER</th>
      </tr>
    </thead>
    <tbody id="result" class=" table table-dark">
    <?php if(!empty($utilisateur)){ foreach($utilisateur as $utilisateurs){ ?>
      <tr>
        <td><?php echo $utilisateurs['id'] ?></td>
        <td><?php echo $utilisateurs['pseudo'] ?></td>
        <td><?php echo $utilisateurs['type'] ?></td>
        <td>
       <a href="<?php echo base_url().'index.php/user/update/' .$utilisateurs['id'] ?>"> <button  type="button"   style="margin-left:0px;" id="ajou" class="btn btn-info btn-xr"
         data-toggle="modal" data-target="#modi"><i class="fas fa-edit"></i></button></a>
           <!-- <a  href="<?php //echo base_url().'index.php/client/edit_cli/' .$utilisateurs['idclient'] ?> 
            " class="  btn btn-info btn-xr"></a> -->
        </td>
        
        <td>
        <a onclick="return confirm('ete vous sur pour supprimer cette utilisateur?');" href="<?php echo base_url().'index.php/user/delete/' .$utilisateurs['id'] ?> "  class="btn btn-danger btn-xr" class=" btn btn-danger"><i class="fas fa-trash-alt"></i></a>
        </td>
      </tr>
<?php } } else { ?>
<td colspan= "S">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
  </table>
</div>
</div>



  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  






  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>issets/js/client.js"></script>
  <script type="text/javascript"> 
         $(document).ready(function () {
          $('#reload').click(function() { 
             location.reload();    
          }); 
         }); 

</script> 
</body>

<!-- Mirrored   from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>
