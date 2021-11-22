
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.min.css">


  <style>
  </style>
</head>
<body>
<div style="height:500px; overflow:scroll; box-shadow: 0px 20px 30px; margin-top:90px; left:40px;" class="container col-md-8 col-md-8 col-md-offset-3">
	<h1 style="font-size:50pt; text-align: center; font-family: Algerian">List famille</h1>
		
		<form method="post" name="famille" action="<?php echo base_url(). 'index.php/famille/insert_fam'; ?>" > 
			
			<div class="form-group">
			  <label>Entree la nouveaux famille</label>
			  <input type="nom" class="form-control" required value="" name="famille" >
			</div>
		   <button type="submit" class="btn btn-primary">Enregistree</button>
		
		  </form>
		
		<table class="table table-hover">
			<thead  class="thead-dark">
			  <tr>
				<th>IDFAMILLE</th>
				<th>FAMILLE</th>
				<th>EDIT</th>
				<th>SUPPRIMER</th>
			 </tr>
			</thead>
			<tbody>
			<?php if(!empty($famille)){ foreach($famille as $familles){ ?>
			  <tr>
				<td scope="col"><?php echo $familles['idfamille'] ?></td>
				<td><?php echo $familles['famille'] ?></td>
				
				<td>
				   <a  href="<?php echo base_url().'index.php/famille/edit_fam/' .$familles['idfamille'] ?> 
					" class=" btn btn-info ">Edit</a>
				</td>
				
				<td>
				<a href="<?php echo base_url().'index.php/famille/delete/' .$familles['idfamille'] ?> "  class="btn  btn-danger" class=" btn btn-danger">Supprimer</a>
				</td>
			  </tr>
		<?php } } else { ?>
		<td colspan= "S">Element non trouvee</td>
		<?php    }  ?>  
			</tbody>
		</div>
		</div>  
		   


  <script src="<?= base_url() ?>issets/js/jQuery.js"></script>
<!-- <script src="<?= base_url() ?>issets/js/fam.js"></script>-->
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
</body>
</html>




