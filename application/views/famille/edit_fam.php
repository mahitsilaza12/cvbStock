<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.min.css">
  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>
<body>
<div class="container col-md-6 clo-md-12 col-md-offset-3">
<h1>MODIFICATION </h1>

<form method="post" name="edit_fam" action="<?php echo base_url(). 'index.php/famille/edit_fam/'.$famille['idfamille']; ?>" > 
    
    <div class="form-group">
      <label >FAMILLE</label>
      <input type="text" class="form-control" value="<?php echo set_value('famille',$famille['famille']); ?>" name="famille" placeholder="Enter famille">
      <?php //echo form_error('famille'); ?>
    </div>

    
    <button type="submit" class="btn btn-primary">Modifier</button>
    <a href="<?php  echo base_url().'index.php/famille/index';?>" class="btn btn-info">Annuler</a>
  </form>
</div>

</div>  




</body>
</html>