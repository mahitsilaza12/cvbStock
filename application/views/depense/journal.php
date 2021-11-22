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


 
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  
<div class="col-md-6 col-md-10"class="row" style="height:650px;margin-left:-13px;margin-right:200px; box-shadow: 0px 20px 30px; margin-top:60px; left:229px;position:fixed;"> 
                    <div style="height:30x; margin-top:10px; ">
                            <h1 style="text-align:center;" class="p-3 mb-2 bg-info text-white"><button style="left:250x;" type="button" class="btn btn-light text-info float-left">
                            Somme perte <span class="badge badge-primary"></span></button>Journal 
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
                                <li class="breadcrumb-item"><a href="http://localhost/cybb/index.php/home/">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Journal</li>
                                <li class="breadcrumb-item active" aria-current="page">depense </li>
                                
                            </ol>
                            </nav>
                            </h1>


                    </div>

                                <!-- <div style="height:100px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:200%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded"> -->

                                <div class="alert alert-primary" role="alert">
                                <h1 style="text-aligne:center;">Journal pour les depenses</h1>
                                </div>
                            
                                <div class="alert alert-info col-md-12" role="alert">
                                <form class="needs-validation"  method="POST" action="<?php echo base_url(). 'index.php/depense/journal'; ?>">
                                <div class="row">
                                    <div class="col col-md-2">
                                    <label for="">date de debut</label>
                                    <input type="date" class="form-control" name="date1" value="<?php echo set_value('date_depense') ?>"  required>
                                    </div>
                                    <div class="col col-md-2">
                                    <label for="">date fin</label>
                                    <input type="date" class="form-control" name="date2" value="<?php echo set_value('date_depense') ?>"  required>
                                    </div>
                                    <div class="col" style="margin-top:30px;">
                                    <label for=""></label>
                                    <button type="submit" class="btn btn-primary"><span><i class="fas fa-history"></i></span> Affiche</button>
                                    <a href="<?php echo base_url().'index.php/commande_cli/journal'?>"><button type="button" class="btn btn-info"><span><i class="fas fa-chevron-circle-left"></i></span> Retour</button></a>
                                  
                                    <?php if($date1){ 
                                      ?>
                                      
                                    <a style="margin-left:0px;" id="tel" class="btn btn-success btn-xr" href="<?=  base_url()?>index.php/depense/excel/<?= $date1.'/'.$date2?>"><span><i class="fas fa-download"></i></span> Telecharger</a> 
                                    <?php }else{
                                     ?>

                                    <a style="margin-left:0px;" id="tel" class="btn btn-success btn-xr" href="<?php echo base_url(). 'index.php/depense/excel'; ?>"><span><i class="fas fa-download"></i></span> Telecharger</a> 
                                    <?php } ?>

                                     </div>
                                </div>
                                </form>
                                </div>
                                <div style="overflow:scroll;margin-top:10px;box-shadow: 0px 20px 30px;height:440px;margin-right: 0px;">
                               
                                <table class="table table-dark">
                                    <thead class="thead bg-info text-white">
                                      <tr>
                                      <th scope="col">id</th>
                                        <th scope="col">nom</th>
                                        <th scope="col">motif</th>
                                
                                        <th scope="col">montant</th>
                                        <th scope="col">date_depense</th>
                                        <th scope="col">Action</th>
    
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php  $total=0;    if(isset($depense) AND !empty($depense)){ 
                                                        

                                                           foreach($depense as $depenses){
                                                          $total +=$depenses['montant'];
                                                          ?>
                                                            <tr>
                                                               
                                                                <td><?php echo $depenses['iddepense'] ?></td>
                                                                <td><?php echo $depenses['nom'] ?></button></a></td>   
                                                                <td><?php echo $depenses['motif'] ?></td>
                                                                <td><?php echo $depenses['montant']?>Ar</td>
                                                                <td><?php echo $depenses['date_depense'] ?></td>
                                                               


                                                        <?php 
                                                           }
                                                       
                                                       } else { ?>   
                                                        <td colspan= "5">Element non trouvee</td>
                                                        <?php    }  ?>  

                                                            </tbody>
                                                            <tfoot>
                                  <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                      
                              
                                        <th scope="col">Total :</th>
                                        <th scope="col"><?php echo $total ?> Ar</th>

                                        
                                      </tr>
                                  </tfoot>


                                  </table>                                          

                            </div>
                            
                            
                            
                            
                              </div>


                            </div>

  



  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>issets/js/chiffre.js"></script>
  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
 
</body>
<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>



