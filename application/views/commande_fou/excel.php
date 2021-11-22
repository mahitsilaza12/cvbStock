<?php
header('content-Type: application/vnd.ms-excel');
header('content-Disposition:attachement;filename="client.xls"');

?>



<table style="margin:50px auto 10px auto;height: 400px;border-collapse: collapse;border:1px solid black;text-align: center">
	<thead>
    <tr>
		<td  style="border-bottom:1px solid black;padding-bottom: 10px" colspan="9">Etats de facture de payement :</td>
	</tr>
	<tr>		
		<td style="width: 11%;border:1px solid black;color:blue">nom fournisseur</td>		
        <td style="width: 11%;border:1px solid black;color:blue">numero facture</td>
        <td style="width: 11%;border:1px solid black;color:blue">date appro</td>	
		<td style="width: 11%;border:1px solid black;color:blue">somme a payee</td>
		<td style="width: 11%;border:1px solid black;color:blue">type de payement</td>
		<td style="width: 11%;border:1px solid black;color:blue">payee</td>
		<td style="width: 11%;border:1px solid black;color:blue">date de payement</td>
		<td style="width: 11%;border:1px solid black;color:blue">rest a payee</td>	
		<td style="width: 11%;border:1px solid black;color:blue">date d'echeance</td>	
        <td style="width: 11%;border:1px solid black;color:blue">verification</td>	
	</tr>	
	</thead> 
<tbody>
<?php
if(!empty($excel)){   $last = 0;  foreach($excel as $excels){
  
  $excels['rest']= ($excels['net']-$excels['payee'] );
  $excels['ver']= 'incomplet';
  if($excels['payee']==$excels['net'] )
    {
     $excels['ver']= 'complet';
    }
    if($excels['numfact'] == $last)
    {
      $last = $excels['numfact'];
   }
 
    else {
      $last = $excels['numfact'];
    
  
  ?>
  <tr>
            <td style="width: 11%;border:1px solid black"><?= $excels["nom_fournisseur"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["numfact"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["date_appro"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["montant"]?></td>
            <td style="width: 11%;border:1px solid black"><?= $excels["type_d_payement"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["payee"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["date_payement"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["rest"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["date_d_echeance"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["ver"]?></td> 
 

        
  </tr>
<?php 
    }
}
 } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

</tbody>

 </table>

   <tr> 
	
   
 </tr>



 