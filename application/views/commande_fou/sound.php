<?php
header('content-Type: application/vnd.ms-excel');
header('content-Disposition:attachement;filename="payement_de_fournisseur.xls"');

?>



<table style="margin:50px auto 10px auto;height: 400px;border-collapse: collapse;border:1px solid black;text-align: center">
	<thead>
    <tr>
		<td  style="border-bottom:1px solid black;padding-bottom: 10px" colspan="8">Historique des payement :</td>
	</tr>
	<tr>		
		<td style="width: 11%;border:1px solid black;color:blue">nom_fournisseur</td>		
        <td style="width: 11%;border:1px solid black;color:blue">numero_facture</td>
		<td style="width: 11%;border:1px solid black;color:blue">date_appro</td>
		<td style="width: 11%;border:1px solid black;color:blue">somme_a_payeee</td>
		<td style="width: 11%;border:1px solid black;color:blue">type_de_payement</td>
        <td style="width: 11%;border:1px solid black;color:blue">payee</td>
		<td style="width: 11%;border:1px solid black;color:blue">date_de_payement</td>
		<td style="width: 11%;border:1px solid black;color:blue">rest_a_payee</td>
        <td style="width: 11%;border:1px solid black;color:blue">date_d_echeance</td>	
        <td style="width: 11%;border:1px solid black;color:blue">verification</td>	
		
	</tr>	
	</thead> 
<tbody>
<?php $total = 0;  if(!empty($excel)){  $re=0;  $last = 0; $som=0;   foreach($excel as $excels){ 
  
  $excels['ver']= 'incomplet';
                                                            
  $excels['rest'] =  ($excels['net'] - $excels['payee'] );

 
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
       $total +=$excels['payee'];
       $re +=$excels['rest'];
       $som +=$excels['net'];


     ?>
      <tr>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['nom_fournisseur'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['numfact'] ?></button></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['date_appro'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['net'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['type_d_payement'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['payee'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['date_payement'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['rest'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['date_d_echeance'] ?></td>
        <td style="width: 11%;border:1px solid black"><?php echo $excels['ver'] ?></td>
    
      </tr>
<?php } }} else { ?>
<td colspan= "5">Element non trouvee</td>
<?php    }  ?>  
</tbody>

<tfoot>
                                  <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">Total somme a payer</th>
                                        <th scope="col"><?php 
                                        if(isset($som) ) echo $som."Ar";
                                         ?></th>
                                        <th scope="col">Total a payer:</th>
                                        <th scope="col"><?php 
                                        if(isset($total) ) echo $total."Ar";
                                         ?></th>
                                         <th scope="col">Total rest:</th>
                                         <th scope="col"><?php 
                                        if(isset($re) ) echo $re."Ar";
                                         ?></th>
                              
                                    

                                        
                                      </tr>
                                  </tfoot>

 </table>

   <tr> 
	
   
 </tr>



 