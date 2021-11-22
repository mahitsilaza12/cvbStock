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


<div style=";height:10px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded">
<div class="form-row">
<div class="form-group col-md-12" style="left:5px;margin-top:px;">
<h1 style="text-align:center;height:70px; margin-top:8px; " class="p-3 mb-2 bg-info text-white"><button style="margin-left:270px;" type="button" class="btn btn-light text-info float-left">
<h3>commande des produit en gros par une seul client </h3> </button></h1>
<div class="btn-group" role="group" aria-label="Basic example">
<a href=" <?= base_url()?>index.php/commande_cli"><button class="btn btn-info">retour</button></a>

</div>



</div>

<!-- eto misy kozy -->
</div>

 <div style="overflow:scroll;margin-top:px;box-shadow: 0px 20px 30px;height:465px;margin-right: 0px;">
  
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
  <input type="radio"  value="detail" class="custom-control-input" id="defaultInline1" name="type">
  <label class="custom-control-label" for="defaultInline1">detail</label>
  <div class="custom-control custom-radio custom-control-inline">
  <input style="left:10px;" checked="" type="radio" class="custom-control-input" value="gros" id="defaultInline2"  name="type">
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
  <input type="radio" value="detail" class="custom-control-input" id="defaultInline3" name="type1">
  <label class="custom-control-label" for="defaultInline3">detail</label>
  <div class="custom-control custom-radio custom-control-inline">
  <input style="left:10px;" checked="" type="radio" class="custom-control-input" value="gros" id="defaultInline4"  name="type1">
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
  <input type="radio" value="detail" class="custom-control-input" id="defaultInline5" name="type2">
  <label class="custom-control-label" for="defaultInline5">detail</label>
  <div class="custom-control custom-radio custom-control-inline">
  <input style="left:10px;" checked="" type="radio" class="custom-control-input" value="gros" id="defaultInline6"  name="type2">
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
  <input type="radio"  value="detail" class="custom-control-input" id="defaultInline7" name="type3">
  <label class="custom-control-label"  for="defaultInline7">detail</label>
  <div class="custom-control custom-radio custom-control-inline">
  <input style="left:10px;" checked="" type="radio" class="custom-control-input" value="gros" id="defaultInline8"  name="type3">
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
  <input type="radio"  value="detail" class="custom-control-input" id="defaultInline9" name="type4">
  <label class="custom-control-label" for="defaultInline9">detail</label>
  <div class="custom-control custom-radio custom-control-inline">
  <input style="left:10px;" checked="" type="radio" class="custom-control-input" value="gros" id="defaultInline10"  name="type4">
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
  <input type="radio"  value="detail" class="custom-control-input" id="defaultInline11" name="type5">
  <label class="custom-control-label" for="defaultInline11">detail</label>
  <div class="custom-control custom-radio custom-control-inline">
  <input style="left:10px;" checked="" type="radio" class="custom-control-input" value="gros" id="defaultInline12"  name="type5">
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
  <input type="radio"  value="detail" class="custom-control-input" id="defaultInline13" name="type6">
  <label class="custom-control-label" for="defaultInline13">detail</label>
  <div class="custom-control custom-radio custom-control-inline">
  <input style="left:10px;" checked="" type="radio" class="custom-control-input" value="gros" id="defaultInline14"  name="type6">
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
  <input type="radio"  value="detail" class="custom-control-input" id="defaultInline15" name="type7">
  <label class="custom-control-label" for="defaultInline15">detail</label>
  <div class="custom-control custom-radio custom-control-inline">
  <input style="left:10px;" checked="" type="radio" class="custom-control-input" value="gros" id="defaultInline16"  name="type7">
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
  <input type="radio"  value="detail" class="custom-control-input" id="defaultInline17" name="type8">
  <label class="custom-control-label" for="defaultInline17">detail</label>
  <div class="custom-control custom-radio custom-control-inline">
  <input style="left:10px;" checked="" type="radio" class="custom-control-input" value="gros" id="defaultInline18"  name="type8">
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
  <input type="radio"  value="detail" class="custom-control-input" id="defaultInline19" name="type9">
  <label class="custom-control-label" for="defaultInline19">detail</label>
  <div class="custom-control custom-radio custom-control-inline">
  <input style="left:10px;" checked="" type="radio" class="custom-control-input" value="gros" id="defaultInline20"  name="type9">
  <label  style="margin-left:40px;"class="custom-control-label" for="defaultInline20">gros</label>
</div>
</div>
</div>






</div>
  
</form>

</div>
</div>


      
 


  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>

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







