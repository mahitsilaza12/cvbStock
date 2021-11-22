<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() ?>issets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url()?>issets\DataTables\datatables.css"/>
  
</head>
<body>
<div >
<table style="left:40px;" id="crou" class="table table-striped table-bordered">
    <thead>
        <tr>
          <td>nom</td>
          <td>prenom</td>
          <td>nom</td>
          <td>nom</td> 
          <td>nom</td>
          <td>nom</td>  
          <td>nom</td>
          <td>nom</td>  
          <td>nom</td>  
          <td>nom</td>   
          <td>nom</td>
          <td>nom</td>  
          <td>nom</td> 
          <td>nom</td>  
          <td>nom</td>            
          
        </tr>
    </thead>
    <?php if(!empty($image)){ foreach($image as $images)
    {
   
    echo '
    <tr>
        <td>' .$images["nom"].'</td>
        <td>' .$images["prenom"].'</td>  
        <td>' .$images["prenom"].'</td>  
        <td>' .$images["prenom"].'</td> 
        <td>' .$images["prenom"].'</td>  
        <td>' .$images["prenom"].'</td>  
        <td>' .$images["prenom"].'</td>  
        <td>' .$images["prenom"].'</td>  
        <td>' .$images["prenom"].'</td>  
        <td>' .$images["prenom"].'</td>
        <td>' .$images["prenom"].'</td>  
        <td>' .$images["prenom"].'</td>  
        <td>' .$images["prenom"].'</td>
        <td>' .$images["prenom"].'</td>  
        <td>' .$images["prenom"].'</td>  


    </tr>';

     }
    ?>
    <?php } ?>
</table>
</div>

  <script src="<?= base_url() ?>issets/js/jQuery.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.js"></script>
  <script type="text/javascript" src="<?= base_url()?>issets/DataTables/datatables.js"></script>
  <script>
      $(document).ready(function(){
          $("#crou").DataTable();
      });
  </script>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_navbar_right&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:07 GMT -->
</html>