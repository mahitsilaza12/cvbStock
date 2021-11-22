
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
                                <h3> </h3> </button></h1>


                                </div>

<!-- eto misy kozy -->
                                </div>

                                    <div style="margin-top:px;box-shadow: 0px 20px 30px;height:465px;margin-right: 0px;">
                                        
                                        <div class="container col-md-6 clo-md-12 col-md-offset-3">
                                        <form method="post"  action="<?php echo base_url(). 'index.php/payement_cli/edit_pay/'.$payement_cli[0]['idcommande_cli']; ?>" >
                                        <div class="alert alert-primary" role="alert">
                                        <div class="form-row">
                                        <h1></h1>
                                        <h2>payement de reste a payee</h2>
                                        </div>
                                              <div class="form-row" style="margin-top:50px;">
                                                <div class="form-group col-md-6">
                                                  <label >Payee</label>
                                                  <input class="form-control" type="text" name="payee">
                                           
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label >date de payement</label>
                                                  <input class="form-control" type="date" value="<?php echo set_value('date_payement',$payement_cli[0]['date_payement']); ?>" name="date_payement">
                                             
                                                </div>
                                              </div>
                                              <div class="form-row">
                                              <div class="form-group col-md-6">
                                                  <label >Type de payement </label>
                                                  <input class="form-control" type="text" value="<?php echo set_value('type_d_payement',$payement_cli[0]['type_d_payement']); ?>" name="type_d_payement">
                                                </div>
                                             
                                                <div class="form-group col-md-6">
                                                  <label >date d'echemace </label>
                                                <th scope="col"><input type="date" class="form-control" value="<?php echo set_value('date_d_echeance',$payement_cli[0]['date_d_echeance']); ?>" name="date_d_echeance"></th>
                                       
                                                </div>
                                                </div>
                                                
                                               
                                              <div style="">
                                              <div class="modal-footer">
                                              <button type="submit"  class="btn btn-primary containair-fluid">Regler</button>
                                              <a href="<?php  echo base_url().'index.php/payement_cli/payer';?>" class="btn btn-info">Annuler</a>
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







