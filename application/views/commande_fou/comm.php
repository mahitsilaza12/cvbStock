<?php
header('content-Type: application/vnd.ms-excel');
header('content-Disposition:attachement;filename="client.xls"');

?>



<table style="margin:50px auto 10px auto;height: 400px;border-collapse: collapse;border:1px solid black;text-align: center">
	<thead>
    <tr>
		<td  style="border-bottom:1px solid black;padding-bottom: 10px" colspan="8">Historique des appro :</td>
	</tr>
	<tr>		
		<td style="width: 11%;border:1px solid black;color:blue">numfact</td>		
        <td style="width: 11%;border:1px solid black;color:blue">nom fournisseur</td>
		<td style="width: 11%;border:1px solid black;color:blue">nom produit</td>
		<td style="width: 11%;border:1px solid black;color:blue">prix</td>
		<td style="width: 11%;border:1px solid black;color:blue">qt</td>
        <td style="width: 11%;border:1px solid black;color:blue">unite</td>
		<td style="width: 11%;border:1px solid black;color:blue">condition</td>
		<td style="width: 11%;border:1px solid black;color:blue">date d'appro</td>
        <td style="width: 11%;border:1px solid black;color:blue">Montant</td>	
    
		
	</tr>	
	</thead> 
<tbody>
<?php if(!empty($excel)){  $te = 0;    foreach($excel as $excels){ 
     $excels['to']=$excels['pu_d_A']*$excels['qt'];
     $te +=$excels['to'];
     ?>
      <tr>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['numfact'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['nom_fournisseur'] ?></button></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['nom_produit'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['pu_d_A'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['qt'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['unite'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['conditio'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['date_appro'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['to'] ?></td>
    
      </tr>
<?php } } else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  
</tbody>

<tfoot>
                                  <tr>
                                     
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">Total :</th>
                                        <th scope="col"><?php 
                                        if(isset($te) ) echo $te."Ar";
                                         ?></th>
                              
                                    

                                        
                                      </tr>
                                  </tfoot>

 </table>

   <tr> 
	
   
 </tr>



 