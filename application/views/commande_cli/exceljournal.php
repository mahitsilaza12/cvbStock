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
		<td style="width: 11%;border:1px solid black;color:blue">nom client</td>		
        <td style="width: 11%;border:1px solid black;color:blue">numero facture</td>
        <td style="width: 11%;border:1px solid black;color:blue">date commande</td>	
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
$total = 0; 
      if(!empty($exceljournal)){ $last = 0;    foreach($exceljournal as $exceljournals){
  
    $exceljournals['rest']= ($exceljournals['net']-$exceljournals['payee'] );
    $exceljournals['ver']= 'incomplet';
    if($exceljournals['payee']==$exceljournals['net'] )
      {
       $exceljournals['ver']= 'complet';
      }
      if($exceljournals['numfact'] == $last)
      {
        $last = $exceljournals['numfact'];
     }
   
      else {
        $last = $exceljournals['numfact'];
                                                          
  
  ?>
  <tr>
            <td style="width: 11%;border:1px solid black"><?= $exceljournals["nom_client"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $exceljournals["numfact"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $exceljournals["date_commande"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $exceljournals["net"]?></td>
            <td style="width: 11%;border:1px solid black"><?= $exceljournals["type_d_payement"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $exceljournals["payee"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $exceljournals["date_payement"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $exceljournals["rest"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $exceljournals["date_d_echeance"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $exceljournals["ver"]?></td> 
 

        
  </tr>
<?php 
}
$total +=$exceljournals['payee'];
}
} else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

</tbody>

<tfoot>
                                  <tr>
                                        <th scmontanDope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">total: </th>
                                        <th scope="col"><?php echo $total ?>Ar</th>

                                        
                                      </tr>
                                  </tfoot>

 </table>

   <tr> 
	
   
 </tr>



 