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
  2019-12-19 12:30:30s <span class="badge badge-primary"></span></button>Information produit 
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb  text-info float-right" style="left:30px; margin-top:-50px;font-size:20px;">
    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">produit</li>
    <li class="breadcrumb-item active" aria-current="page">information</li>
  </ol>
</nav> 
</h1>



</div>

<div style=";height:10px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded">
<div class="form-row">
<div class="form-group col-md-4" style="left:5px;margin-top:10px;">

<div class="btn-group" role="group" aria-label="Basic example">
<button  type="button" id="aj" class="btn btn-info btn-xr" data-toggle="modal" data-target=".bd-example-modal-xl"><span><i class="fas fa-plus-circle"></i></span> Ajout produit</button>
<a style="margin-left:0px;" id="tel" class="btn btn-success btn-xr" href="<?php echo base_url(). 'index.php/pdf/pdf_client'; ?>"><span><i class="fas fa-download"></i></span> Telecharger</a>
<button type="button" class="btn btn-secondary"><span><i class="fas fa-sync"></i></span> </button>
</div>



</div>

<div class="form-group col-md-4" style="left:280px;margin-top:10px;">
    <form action="<?php echo base_url(). 'index.php/fournisseur/index'; ?>" method="GET">
    <input type="search" value="<?php if($this->input->get('recherch')) echo $this->input->get('recherch'); ?>" class="form-control"  name="recherch" placeholder="recherch...">
    <div style="margin-top:20px;">
        <div id="result"></div>
    </div>
    </div>
    
    <div class="form-group col-md-4" style="left:280px;margin-top:10px;margin-top:10px;">
   <button class="btn btn-info"><img style="widht:25px; height:25px;" src="<?=base_url()?>issets/img/Magnifying-Glass-Icon-PNG.png">Recherh</button>
    </div>
    </form>
</div>
</div>

 <div style="overflow:scroll;margin-top:10px;box-shadow: 0px 20px 30px;height:465px;margin-right: 0px;">
  <table class="table table-hover" >
    <thead class="thead bg-info text-white">
    <tr>
      <th scope="col">codepro</th>
      <th scope="col">intrants</th>
      <th scope="col">nom</th>
      <th scope="col">stock</th>
      <th scope="col">presentation</th>
      <th scope="col">parpresentation</th>
      <th scope="col" >stock_gros</th>
      <th scope="col">pu_Detail</th>  
      <th scope="col">pu_Gros</th> 
      <th scope="col">pu_Achat</th> 
      <th scope="col">unite</th>
      <th scope="col">description</th>    
      <th scope="col">date(per)</th>
      <th scope="col">action</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(!empty($produit)){    foreach($produit as $produits){
      
    
      $produits['par2presentation']=  (int)($produits['stock']/$produits['parpresentation'] );
      
   
      
      ?>
      <tr>
        <td><?php echo $produits['idproduit'] ?></td>
        <td><a href="infopro"> <button type="button" class="btn btn-outline-info"><?php echo $produits['intrants'] ?></button></a></td>
        <td><?php echo $produits['nom_produit'] ?></td>
        <td><?php echo $produits['stock'] ?></td>
        <td><?php echo $produits['presentation'] ?></td>
        <td><?php echo $produits['parpresentation']." ".$produits['unite'] ?></td>
        <td><?php echo $produits['par2presentation']."  ".$produits['presentation']." est ".$produits['stock']%$produits['parpresentation']." ".$produits['unite'] ?></td>
        <td><?php echo $produits['pu_d_V']." Ar" ?></td>  
        <td><?php echo $produits['pu_d_G']." Ar" ?></td>
        <td><?php echo $produits['pu_d_A']." Ar" ?></td>
        <td><?php echo $produits['unite'] ?></td>
        <td><?php echo $produits['description'] ?></td>
        <td><?php echo $produits['datePEr'] ?></td>
        <td>
           <!-- <a  href="<?php echo base_url().'index.php/produit/edit_pro/'.$produits['idproduit'] ?> "class="  btn btn-info btn-xr" ><i class="fas fa-edit"></i></a> -->
           <button  type="button" id="aj" class="btn btn-info btn-xr" data-toggle="modal" 
           data-target=".bd-example-modal-xl"><i class="fas fa-edit"></i></button>
        </td>
        
        <td>
        <a onclick="return confirm('ete vous sur pour supprimer cette produit?');" href="<?php echo base_url().'index.php/produit/delete_prod/'.$produits['idproduit']  ?>"class="btn btn-danger btn-xr" ><i class="fas fa-trash-alt"></i></a>
        </td>
      </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

    </tbody>
 
</table>
</div>
</div>

  </div>
  





              
  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>




