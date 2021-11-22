
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() ?>issets/css/bootstrap.min.css">
  

  <style>
  
#dd{
  margin-top:60px;
  margin-right:30px;
}


  </style>
</head>
<body>

<div class="row">
<div class="col-md-12">

<?php   
$success =$this->session->userdata("success");
if($success !=''){?>
<div class="alert alert-success"><?php echo $success; ?></div>
<?php
}
?>

<?php   
$failure =$this->session->userdata("failure");
if($failure !=''){?>
<div class="alert alert-success"><?php echo $failure; ?></div>
<?php
}
?>
</div>
</div>
<div>
</div>

  

                
                <div>

 
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  
                    <div class="col-md-6 col-md-10"class="row" style="height:650px;margin-left:-13px;margin-right:200px; box-shadow: 0px 20px 30px; margin-top:60px; left:229px;position:fixed;"> 


                        <div style=";height:10px;margin-top:px;margin-right:180px;margin-left:px; box-shadow: 0px 20px 30px; width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded">
                                <div class="form-row">
                                <div class="form-group col-md-12" style="left:5px;margin-top:px;">
                                <h1 style="text-align:center;height:70px; margin-top:8px; " class="p-3 mb-2 bg-info text-white"><button style="margin-left:270px;" type="button" class="btn btn-light text-info float-left">
                                <h3> </h3> </button></h1>


                                </div>

<!-- eto misy kozy -->
                                </div>

                                 
                                  
                                     <div class="card" style="margin-top:px; box-shadow: 0px 20px 30px;">
                                            <div class="card-body">
                                                <h3 class="card-title" style="text-align:center;color:rgb(150,20,20)">Statistique des enregistrements de
                                                    commande client
                                                </h3>
                                                <p class="card-text">Comparer les commande <strong><em>entrées</em></strong>par des clients au sein de la pharmacie
                                                    <div class="input-group mb-3">
                                                        <select id='annee1' class="form-control form-control-sm col-6 mr-2">
                                                            <option>Choisir une option</option>
                                                            <option value='<?= date("Y") ?>'>Cette année</option>
                                                            <option value='<?= date("Y") - 1 ?>'>L'année dernière</option>
                                                            <option value='<?= date("Y") - 2?>'>Les deux années précedentes</option>
                                                        </select>
                                                        <select id='annee2' class="form-control form-control-sm col-6">
                                                            <option>Choisir une option</option>
                                                            <option value='<?= date("Y") ?>'>Cette année</option>
                                                            <option value='<?= date("Y") - 1 ?>'>L'année dernière</option>
                                                            <option value='<?= date("Y") - 2?>'>Les deux années précedentes</option>
                                                        </select>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" style='cursor:pointer' id="compare"><i
                                                                    class="fas fa-search"></i></span>
                                                        </div>
                                                        <div class="input-group mt-4">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" style='cursor:pointer' id='text-comparer'>Année à
                                                                    comparer</span>
                                                            </div>
                                                            <input type="number" id="first" class="form-control">
                                                            <input type="number" id="second" class="form-control">
                                                        </div>
                                                    </div>
                                                    <table class='table table-hover'>
                                                        <thead style='text-align:center'>
                                                            <th colspan=2>Tableau comparatif des entrées</th>
                                                        </thead>
                                                        <tbody style='text-align:center'>

                                                            <tr>
                                                                <td id='year1'></td>
                                                                <td id='year2'></td>
                                                            </tr>
                                                            <tr>
                                                                <td id='years1'></td>
                                                                <td id='years2'></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </p>
                                            </div>
                                        </div>



                                            
                                               

                                        </div>
                                    </div>
  
                        </div>
                    </div>

                

        







  <script src="<?= base_url() ?>issets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>issets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>issets/chart/Chart.js"></script>  
  <script src="<?= base_url() ?>issets/js/Chart.js"></script>
   <script src="<?= base_url() ?>issets/js/stat.js"></script> 
   
   <script>
//    var ctx = document.getElementById("chart").getContext('2d');
// // var mychart = new chart(ctx, {
// //   type:'line',
//   dat={
//       labels:[1,2,3,4,5,6,7,8,9],
//       datasets:
//       [{
//           label:'client',
//           data:[1,2,3,1,3,2,4,1,5],
//           backgroundColor: 'transparent',
//           borderColor: 'rgba(255,99,132)',
//           borderWidht: 3
//       },
//     {
//         label:'fournisseur',
//         data:[1,2,3,4,5,6,7,8,9],
//         backgroundColor: 'transparent',
//         borderColor: 'rgba(0,255,132)',
//         borderWidht: 3
//     }]
//   }
//   create (ctx,'line',dat)
//   // option:{
//   //     scales:{scales:{yAxes:[{beginAtZero: false}], xAxes:[{autoskip:true, maxTicketsLimit: 20}]}},
//   //     tooltips:{mode:'stat'},
//   //   legend:{display: true,position: 'top', labels: {fontColor: 'rgba(255,255,255)', fontSize: 16}}
//   // }

// // });
   </script>




</body>

<!--    me=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2016 02:09:10 GMT -->
</html>







