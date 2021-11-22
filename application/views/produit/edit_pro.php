
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
                                <h3> </h3>Modification de produit</button></h1>


                                </div>

<!-- eto misy kozy -->
                                </div>

                                    <div style="margin-top:px;box-shadow: 0px 20px 30px;height:520px;margin-right: 0px;">
                                        <div class="container col-md-6 clo-md-12 col-md-offset-3">
                                        <form method="post"  action="<?php echo base_url(). 'index.php/produit/edit_pro/'.$produit[0]['idproduit']; ?>" >
                                        <div class="alert alert-primary" role="alert">  
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label >intrants</label>
                                                  <input value="<?php echo set_value('intrants',$produit[0]['intrants']); ?>" type='text' id="pro" name="intrants" class="form-control">
                                           
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label >PRODUIT</label>
                                                <input value="<?php echo set_value('nom_produit',$produit[0]['nom_produit']); ?>" type='text' id="pro" name="nom_produit" class="form-control">
                                             
                                                </div>
                                              </div>
                                              <div class="form-row">
                                              <div class="form-group col-md-6">
                                                <label>PU_detail</label>
                                              <input  value="<?php echo set_value('pu_d_V',$produit[0]['pu_d_V']); ?>"  type="text" name="pu_d_V" class="form-control">
                                            
                                              </div>
                                              
                                              <div class="form-group col-md-6">
                                                <label>Pu_gros</label>
                                              <input  value="<?php echo set_value('pu_d_G',$produit[0]['pu_d_G']); ?>"  type="text" name="pu_d_G" class="form-control">
                                         
                                              </div>
                                              <div class="form-row">
                                              <div class="form-group col-md-6">
                                                <label>Date de peremption</label>
                                              <input  value="<?php echo set_value('datePEr',$produit[0]['datePEr']); ?>"  type="date" name="datePEr" class="form-control">
                                          
                                              </div>
                                                <div class="form-group col-md-6">
                                                  <label >UNITE </label>
                                                  <input value="<?php echo set_value('unite',$produit[0]['unite']); ?>"  type="text" name="unite" class="form-control" >
                                            
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label >DESCRIPTION </label>
                                                  <input value="<?php echo set_value('description',$produit[0]['description']); ?>"  type="text" name="description" class="form-control">
                                       
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label >PRESENTATION </label>
                                                  <input value="<?php echo set_value('presentation',$produit[0]['presentation']); ?>"  type="text" name="presentation" class="form-control" >
                                            
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label >PAR PRESENTATION </label>
                                                  <input value="<?php echo set_value('parpresentation',$produit[0]['parpresentation']); ?>"  type="text" name="parpresentation" class="form-control">
                                           
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label >Tva </label>
                                                  <input value="<?php echo set_value('tva',$produit[0]['tva']); ?>"  type="text" name="tva" class="form-control">
                                           
                                                </div> 
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label >Pu d'achat </label>
                                                  <input value="<?php echo set_value('pu_d_A',$produit[0]['pu_d_A']); ?>"  type="text" name="pu_d_A" class="form-control">
                                           
                                                </div>
                                                </div>
                                              <div style="">
                                              <div class="modal-footer">
                                              <button type="submit"  class="btn btn-primary containair-fluid"><span><i class="fas fa-save"></i></span> modifier</button>
                                              <a href="<?php  echo base_url().'index.php/produit/index';?>" class="btn btn-info"><span><i class="fas fa-share"></i></span> Annuler</a>
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

<!--    me=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>







