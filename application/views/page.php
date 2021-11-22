<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <title>Responsive Side Navigation Bar</title>
  <link rel="stylesheet" href=" <?= base_url() ?>issets/fontawesome/fontawesome.css">

    <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>issets/fontawesome/css/all.css">
    <link rel="stylesheet" href=" <?= base_url() ?>issets/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href=" <?= base_url() ?>issets/css/page.css">
  <script src="<?= base_url()?>issets/js/bootstrap.min.js"></script>
	<style>
  body{
    background-image: url('<?=base_url()?>issets/img/resize.jpg');
    background-size:100 % 100%;
    background-repeat: repeat;
    background-attachment: fixed;
  }
 div {
    border: 3px solid #787878;

}

.clearfix {
    overflow: auto;
    height:730px;
    border-radius: 20px;
}
.clearfix .cli {
    
    overflow: auto;
    height:170px;
    left:30px;
    width:300px;
    border-width: 5px;
    margin-right:10px;
    padding-top: 60px;
    padding-right: auto;
    padding-bottom: 50px;
    padding-left: auto;
    border-radius: 20px;
    font-size:30px;
    background-color: #336699;
    background-image: url('<?=base_url()?>issets/img/resize.jpg');
    text-align: center;
    transition : 0.4s; 
}
.clearfix .cli:hover {
 font-size:60px;
 transition : 0.8s; 
 height:250px;
 margin-top:130px;
 margin-right: 5px;
 padding-top: 70px;
 padding-left: auto;
 padding-left: auto;
 padding-bottom: 40px;
    width:340px;
}


.clearfix .pha {
    /* overflow: auto; */
    background-image: url('<?=base_url()?>issets/img/resize.jpg');
    height:170px;
    left:30px;
    width:300px;
    border-width: 5px;
margin-left:100px;
    padding-top: 60px;
    padding-right: auto;
    padding-bottom: 50px;
    padding-left: auto;
    border-radius: 20px;
    font-size:30px;
    background-color: #336699;
    color: #bdb8d7;
  display: block;
  text-decoration: none;
  transform: translate(15px);
  text-align: center;
}

.clearfix .pha:hover{ 
  font-size:60px;
 transition : 0.8s; 
 height:250px;
 margin-top:130px;
 margin-right: 5px;
 padding-top: 70px;
 padding-left: auto;
 padding-left: auto;
 padding-bottom: 40px;
    width:340px;
}

nav {
  
  list-style-type: none;
    margin-top: 175px;
    margin-left:475px;


    float: left;
    width: 200px;
    border: 3px solid #000000;

}

.div {
    width: 60px;
    height: 10px;
    background: #787878;
    border-radius: 20px;
    position: relative;
    -webkit-animation: mymove 5s infinite; /* Chrome, Safari, Opera */
    animation: mymove 5s infinite;
}

/* Chrome, Safari, Opera */
@-webkit-keyframes mymove {
    from {left: 0px;}
    to {left: 1600px;}
}

@keyframes mymove {
    from {left: 0px;}
    to {left: 1600px;}
}

</style>
</head>
<body>




<div class="clearfix" style="height:800px;">
<div style="text-align:center;height:100px;font-family: 'Josefin Sans', sans-serif;
    color: white;font-size:50px; text-shadow: 20px 20px 5px #000000;background-color:#003399;">
    <span>PHARMACIE ET CLINIQUE CVB</span>
</div>

<nav class="cli" style="">
<a href="http://localhost/clinique/welcome/login" style="color:white;text-decoration:none;text-shadow:4px 4px 10px #000000,4px 4px 10px #000000;">CLINIQUE</a> 
   
  </nav>
  <nav class="pha"style="left:30px;">
<a href="http://localhost/cybb/index.php/welcome/login" style="color:white; text-decoration:none;text-shadow:4px 4px 10px #000000,4px 4px 10px #000000;">PHARMACIE</a>
   
  </nav>

  
 
  <div class="div">  </div>



  <footer>
<div style="margin-top:660px;text-align:center;font-family: 'Josefin Sans', sans-serif;color: white;background-color:#003399;">
    <span>Copy right @clairmont and oskar davis 2019</span>
</div>
</footer>
  
</div>




  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
	
</body>
</html>