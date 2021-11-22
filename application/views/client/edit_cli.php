
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
                                <h3> </h3>Modification de client </button></h1>


                                </div>

<!-- eto misy kozy -->
                                </div>

                                    <div style="margin-top:px;box-shadow: 0px 20px 30px;height:465px;margin-right: 0px;">
                                        <div class="container col-md-6 clo-md-12 col-md-offset-3">
                                        <form method="post" name="edit_cli" action="<?php echo base_url(). 'index.php/client/edit_cli/'.$client['idclient']; ?>" > 
                                        <div class="alert alert-primary" role="alert">
    
    <div class="form-group">
      <label >NOM</label>
      <input type="nom" class="form-control" value="<?php echo set_value('nom_client',$client['nom_client']); ?>" name="nom_client" placeholder="Enter nom">
      <?php //echo form_error('nom'); ?>
    </div>
    <div class="form-group">
      <label >ADRESSE:</label>
      <input type="adresse" class="form-control" value="<?php echo set_value('adresse',$client['adresse']); ?>" name="adresse" placeholder="Enter adresse">
      <?php //echo form_error('adresse'); ?>
    </div>
    <div class="form-group">
      <label >CONTACT:</label>
      <input type="contact" class="form-control" value="<?php echo set_value('contact',$client['contact']); ?>" name="contact" placeholder="Enter contact">
      <?php //echo form_error('contact'); ?>
    </div>
    
    <button type="submit" class="btn btn-primary">Modifier</button>
    <a href="<?php  echo base_url().'index.php/client/index';?>" class="btn btn-info">Annuler</a>
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

<!--    me=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>







