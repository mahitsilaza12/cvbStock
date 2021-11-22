<?php
header('content-Type: application/vnd.ms-excel');
header('content-Disposition:attachement;filename="client.xls"');

?>



<table style="margin:50px auto 10px auto;height: 400px;border-collapse: collapse;border:1px solid black;text-align: center">
	<thead>
    <tr>
		<td  style="border-bottom:1px solid black;padding-bottom: 10px" colspan="9">Historique des approvisionnement :</td>
	</tr>
	<tr>		
		<td style="width: 11%;border:1px solid black;color:blue">COODEREF</td>		
        <td style="width: 11%;border:1px solid black;color:blue">nom fournisseur</td>
        <td style="width: 11%;border:1px solid black;color:blue">intrants</td>	
		<td style="width: 11%;border:1px solid black;color:blue">nom produit</td>
		<td style="width: 11%;border:1px solid black;color:blue">qt</td>
        <td style="width: 11%;border:1px solid black;color:blue">prix d'achat</td>
		<td style="width: 11%;border:1px solid black;color:blue">montant</td>
        <td style="width: 11%;border:1px solid black;color:blue">unite</td>
		<td style="width: 11%;border:1px solid black;color:blue">description</td>
        <td style="width: 11%;border:1px solid black;color:blue">date d'approvisionnement</td>	
		
	</tr>	
	</thead> 
<tbody>
<?php if(!empty($excel)){    foreach($excel as $excels){ 
     ?>
      <tr>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['idcommande_fou'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['nom_fournisseur'] ?></button></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['intrants'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['nom_produit'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['qt'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['pu_d_A'] ?>Ar</td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['montant'] ?>Ar</td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['unite'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['description'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['date_appro'] ?></td>
    
      </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  
</tbody>

 </table>

   <tr> 
	
   
 </tr>



 