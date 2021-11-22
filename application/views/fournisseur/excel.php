<?php
header('content-Type: application/vnd.ms-excel');
header('content-Disposition:attachement;filename="client.xls"');

?>



<table style="margin:50px auto 10px auto;height: 400px;border-collapse: collapse;border:1px solid black;text-align: center">
	<thead>
    <tr>
		<td  style="border-bottom:1px solid black;padding-bottom: 10px" colspan="5">fournisseur :</td>
	</tr>
	<tr>		
		<td style="width: 11%;border:1px solid black;color:blue">Codefou</td>		
        <td style="width: 11%;border:1px solid black;color:blue">nom client</td>
        <td style="width: 11%;border:1px solid black;color:blue">adresse</td>	
		<td style="width: 11%;border:1px solid black;color:blue">contact</td>
        <td style="width: 11%;border:1px solid black;color:blue">responsable</td>

	</tr>	
	</thead> 
<tbody>
<?php
if(!empty($excel)){    foreach($excel as $excels){
  
  
  ?>
  <tr>
            <td style="width: 11%;border:1px solid black"><?= $excels["idfournisseur"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["nom_fournisseur"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["adresse"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["contact"]?></td>
            <td style="width: 11%;border:1px solid black"><?= $excels["responsable"]?></td>
 

        
  </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

</tbody>

 </table>

   <tr> 
	
   
 </tr>



 