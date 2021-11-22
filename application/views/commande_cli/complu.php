

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
                                <h3> </h3> </button></h1>


                                </div>

<!-- eto misy kozy -->
                                </div>

                                    <div style="margin-top:px;box-shadow: 0px 20px 30px;height:465px;margin-right: 0px;">
                                        <div class="container col-md-6 clo-md-12 col-md-offset-3">
                                                <form method="post"   action="<?php echo base_url(). 'index.php/commande_fou/enregistrer/'; ?>" >
                                                            <div class="form-row" >
                                                            <h1 style="margin-top:10px; left:20px;">Approvision</h1>
                                                            </div>
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
                                                    <div class="custom-control custom-radio custom-control-inline" style="margin-top:40px; left:20px;">
                                                    <input type="radio"  value="detail" class="custom-control-input" id="defaultInline1" name="type">
                                                    <label class="custom-control-label" for="defaultInline1">en detail</label>
                                                    </div>

                                                    <!-- Default inline 2-->
                                                    <div class="custom-control custom-radio custom-control-inline" style="margin-top:40px; left:10px;">
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
                                    </div>
  
                        </div>
                    </div>

                </div>









  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>

 




</body>

<!--    me=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>







