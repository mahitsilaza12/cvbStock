<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <title>Responsive Side Navigation Bar</title>
  <link rel="stylesheet" href=" <?= base_url() ?>issets/fontawesome/fontawesome.css">

    <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>issets/fontawesome/css/all.css">
    <link rel="stylesheet" href=" <?= base_url() ?>issets/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href=" <?= base_url() ?>issets/css/sy.css">
  <link rel="stylesheet" href="<?= base_url()?>issets\DataTables\datatables.css"/>
  <script src="<?= base_url()?>issets/js/bootstrap.min.js"></script>
  
	<style>
  body{
    background-image: url('<?=base_url()?>issets/img/resize.jpg');
  }
  .wrapper .log:hover{ 
  font-size:30px;
 transition : 0.8s; 
 height:50px;
 margin-top:30px;
 margin-right: 5px;
 padding-top: 70px;
 padding-left: auto;
 padding-left: auto;
 padding-bottom: 40px;
    width:340px;
    border-radius:8px;
}

  </style>
</head>
<body>

<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <!-- style="margin-top:7px;text align:center;font-size:50px;" -->
    <div class="top_menu">
      <div class="logo"><h1 style="
   
		background-color: #2e4ead;
	    padding-left: 5px;
	    padding-right: 5px;
		padding-top: 3px;
		padding-bottom: 10px;
    margin-top:40px;
	    font-size: 2em;
	 
	    min-width: 1300px;
	    min-height:0px; 

	    max-width: 50000px;
	    margin: 0 auto; 
	    text-shadow:4px 4px 10px #000000,4px 4px 10px #000000;"
><span><i class="fas fa-plus"></i></span><strong><em> PHARMACIE CVB</em></strong></h1></div>
      <ul>
        <li><a href="#">
        <span><i class="fas fa-leaf"></i></span></a></li>
        <li><a href="#">
        <span><i class="fas fa-leaf"></i></span></a></li>
      </ul>
    </div>
  </div>
  
  <div class="sidebar">
      <ul>
        <li><a href=" <?=  base_url()?>index.php/home/" class="active">
          <span class="icon"><i ></i></span>
          <span class="title" style="font-size:29px;"><i class="fas fa-home"></i> Accueil</span></a></li>
        <li><a href=" <?=  base_url()?>index.php/client/">
          <span class="icon"><i class="fas fa-user"></i></span>
          <span class="title">client</span>
          </a></li>
          
        <li><a href=" <?= base_url()?>index.php/fournisseur/">
          <span class="icon"><i class="fas fa-user-plus"></i></span>
          <span class="title">fournisseur</span>
          </a></li>
          
        <li><a href=" <?= base_url()?>index.php/produit/">
        <span class="icon"><i class="fas fa-shopping-basket"></i></span>
          <span  class="title">produit</span>
          </a></li>
          <li><a href=" <?= base_url()?>index.php/commande_cli/insertcom">
          <span class="icon"><i class="fas fa-shopping-cart"></i></span>
          <span class="title">commande client</span>
          </a></li>
          <li><a href=" <?= base_url()?>index.php/commande_fou/insertcomfou" >
          <span class="icon"><i class="fas fa-users"></i></span>
          <span class="title">Approvisionnement</span>
          </a></li>
         
          <li><a href=" <?= base_url()?>index.php/commande_cli/journal">
          <span class="icon"><i class="fas fa-list"></i></span>
          <span class="title">Journal</span>
          </a></li>
          <?php if($this->session->pseudo == "administrateur") {?>
          <li><a href=" <?= base_url()?>index.php/commande_cli/stat">
          <span class="icon"><i class="fas fa-chart-bar"></i></span>
          <span class="title">statistique</span>
          <?php } ?>
          <li><a href=" <?= base_url()?>index.php/historique/historique">
          <span class="icon"><i class="fas fa-history"></i></span>
          <span class="title">historique</span>
          </a></li>
          <?php if($this->session->pseudo == "administrateur") {?><li><a href=" <?= base_url()?>index.php/user/index">
          <span class="icon"><i class="fas fa-dollar-sign"></i></span>
          <span class="title">Utilisateur</span>
          </a></li> 
          <?php } ?>
          <li><a href=" <?= base_url()?>index.php/depense/index">
          <span class="icon"><i class="fas fa-history"></i></span>
          <span class="title">depense</span>
          </a></li>
      
         
         
          
          
    </ul>
    </button>
<button class="btn btn-sm btn-light ml-4" style="margin-top:60px;color:grey;background:yellow;" id="notify"><span><i class="fas fa-bell"></i></span>Notification 
</button>
      <a class="log"  onclick="return confirm('vous ete sur pour deconnecter?');" href=" <?= base_url()?>index.php/welcome/logout"><span class="badge badge-danger" style="margin-left:40px;margin-top:15px;text-shadow:4px 4px 10px #000000,4px 4px 10px #000000;"> <span class="icon"><i class="fas fa-power-off">deconnection</i></span> <?= $this->session->nomUser?></span></a>
<!--   
    <span class="badge badge-info"  style="margin-left:40px;margin-top:0px;">Aide</span> -->
  </div>

</div>


  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>issets/DataTables/datatables.js"></script>
	
</body>
</html>