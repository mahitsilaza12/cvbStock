<?php
header('content-Type: application/vnd.ms-excel');
header('content-Disposition:attachement;filename="depense.xls"');

?>



<table style="margin:50px auto 10px auto;height: 400px;border-collapse: collapse;border:1px solid black;text-align: center">
	<thead>
    <tr>
		<td  style="border-bottom:1px solid black;padding-bottom: 10px" colspan="9">Etats de depense :</td>
	</tr>
	<tr>		
		<td style="width: 11%;border:1px solid black;color:blue">numero</td>		
        <td style="width: 11%;border:1px solid black;color:blue">nom</td>
        <td style="width: 11%;border:1px solid black;color:blue">motif</td>	
		<td style="width: 11%;border:1px solid black;color:blue">montant</td>
		<td style="width: 11%;border:1px solid black;color:blue">date de depense</td>
	
	</tr>	
	</thead> 
<tbody>
<?php
$total = 0; 
      if(!empty($excel)){  $total=0;  foreach($excel as $excels){
                                                 
     $total +=$excels["montant"];
  ?>
  <tr>
            <td style="width: 11%;border:1px solid black"><?= $excels["iddepense"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["nom"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["motif"]?></td> 
            <td style="width: 11%;border:1px solid black"><?= $excels["montant"]?></td>
            <td style="width: 11%;border:1px solid black"><?= $excels["date_depense"]?></td> 

 

        
  </tr>
<?php 
}

} else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  

</tbody>

<tfoot>
                                  <tr>
                                        <th scmontanDope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">Total</th>
                                        <th scope="col"><?php 
                                        if(isset($total) ) echo $total."Ar";
                                         ?></th>
                                      

                                        
                                      </tr>
                                  </tfoot>

 </table>

   <tr> 
	
   
 </tr>



 