<?php
header('content-Type: application/vnd.ms-excel');
header('content-Disposition:attachement;filename="client.xls"');

?>



<table style="margin:50px auto 10px auto;height: 400px;border-collapse: collapse;border:1px solid black;text-align: center">
	<thead>
    <tr>
		<td  style="border-bottom:1px solid black;padding-bottom: 10px" colspan="9">Etats stock :</td>
	</tr>
	<tr>		
		<td style="width: 11%;border:1px solid black;color:blue">codeproduit</td>		
        <td style="width: 11%;border:1px solid black;color:blue">Intrants</td>
        <td style="width: 11%;border:1px solid black;color:blue">Nom produit</td>	
		<td style="width: 11%;border:1px solid black;color:blue">stock</td>
		<td style="width: 11%;border:1px solid black;color:blue">presentation</td>
		<td style="width: 11%;border:1px solid black;color:blue">parpresentation</td>
		<td style="width: 11%;border:1px solid black;color:blue">stock_gros</td>
		<td style="width: 11%;border:1px solid black;color:blue">pu_detail</td>	
		<td style="width: 11%;border:1px solid black;color:blue">pu_gros</td>
    <td style="width: 11%;border:1px solid black;color:blue">pu_Achat</td>	
    <td style="width: 11%;border:1px solid black;color:blue">unite</td>
		<td style="width: 11%;border:1px solid black;color:blue">tva</td>	
		<td style="width: 11%;border:1px solid black;color:blue">description</td>	
    <td style="width: 11%;border:1px solid black;color:blue">date(peremption</td>		
	</tr>	
	</thead> 
<tbody>
<?php
if(!empty($excel)){    foreach($excel as $excels){
  

  $excels['par2presentation']=  (int)($excels['stock']/$excels['parpresentation'] );
  ?>
  <tr>
            <td style="width: 11%;border:1px solid black"><?= $excels["idproduit"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["intrants"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["nom_produit"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["stock"]?></td>
            <td style="width: 11%;border:1px solid black"><?= $excels["presentation"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["parpresentation"]." ".$excels['unite']?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["par2presentation"]."  ".$excels['presentation']." est ".$excels['stock']%$excels['parpresentation']." ".$excels['unite']?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["pu_d_V"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["pu_d_G"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["pu_d_A"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["unite"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["tva"]?></td>
            <td style="width: 11%;border:1px solid black"><?= $excels["description"]?></td>
            <td style="width: 11%;border:1px solid black"><?= $excels["datePEr"]?></td>

        
  </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

</tbody>

 </table>

   <tr> 
	
   
 </tr>



 