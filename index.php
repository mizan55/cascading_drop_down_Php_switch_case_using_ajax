<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-1">
  <form action="" method="post">
        <!-- start_row -->
  <div class="row">
      <div class="col-md-3">
        <select name="division" id="divisions">
        
        </select>
      </div>
      <div class="col-md-3">
      <select name="districts" id="district">
      <label for="title">Select City:</label>
      
        </select>
      </div>
      <div class="col-md-3">
      <select name="upazila" id="upazilas">
        
        </select>
      </div>
      <div class="col-md-3">
      <select name="union" id="union">
      
        </select>
      </div>
    </div> 
    <!-- end_row -->
  </form>
   


  </div>
  <!-- ...jsCode&link..here.. -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script>
$(document).ready(function() {
//pass division id to load_district function parameter
// $('#divisions').on('change',function(){
//   var div_id=$(this).val();

// })





});


 //init_division
 function division_load(){
   var div = "division";
   
     $.ajax({
       url:'load.php',
       type:'post',
       data:{get:div},
       success:function(data){
        $('#divisions').append("<option value='-1'>Select Division</option>");
        $('#district').append("<option value='-1'>Select district</option>");
        $('#upazilas').append("<option value='-1'>Select upazila</option>");
        $('#union').append("<option value='-1'>Select union</option>");
        $('#district').prop('disabled',true);
        $('#upazilas').prop('disabled',true);
        $('#union').prop('disabled',true);
        $('#divisions').append(data);
        
       }
     });

   }
   division_load();

//load_district_function_start 
$('#divisions').on('change',function(){
 var div_id=$(this).val();
if(div_id==-1){
        $('#district').empty();
        $('#upazilas').empty();
        $('#union').empty();
        $('#district').append("<option value='-1'>Select district</option>");
        $('#upazilas').append("<option value='-1'>Select upazila</option>");
        $('#union').append("<option value='-1'>Select union</option>");
        $('#district').prop('disabled',true);
        $('#upazilas').prop('disabled',true);
        $('#union').prop('disabled',true);
     
}else{
        $('#upazilas').prop('disabled',true);
        $('#union').prop('disabled',true);
        var dis="district";
        $.ajax({
    url:'load.php',
    type:'POST',
    data:{get:dis, div_id:div_id },
    success:function(data){
      $('#district').empty();
      $('#district').prop('disabled', false);
      $('#district').append("<option value='-1'>Select district</option>");
      $('#district').append(data);
    }

  });//end ajax
}
});


//load_upazilla_function_start 
$('#district').on('change',function(){
 var dis_id=$(this).val();

if(dis_id==-1){
     
        $('#upazilas').empty();
        $('#union').empty();
      
        $('#upazilas').append("<option value='-1'>Select upazila</option>");
        $('#union').append("<option value='-1'>Select union</option>");
      
        $('#upazilas').prop('disabled',true);
        $('#union').prop('disabled',true);
     
}else{
        $('#upazilas').append("<option value='-1'>Select upazila</option>");
        $('#union').prop('disabled',true);
        var uzila="upazila";
        $.ajax({
    url:'load.php',
    type:'POST',
    data:{get:uzila, dis_id:dis_id },
    success:function(data){
      $('#upazilas').empty();
      $('#upazilas').prop('disabled', false);
      $('#upazilas').append("<option value='-1'>Select upazilas</option>");
      $('#upazilas').append(data);
    }

  });//end ajax
}
});  //end_upazilla


//load_union_function_start 
$('#upazilas').on('change',function(){
 var up_id=$(this).val();

if(up_id==-1){
     
       
        $('#union').empty();
      
      
        $('#union').append("<option value='-1'>Select union</option>");
      
    
        $('#union').prop('disabled',true);
     
}else{
       
var union="union";
        $.ajax({
    url:'load.php',
    type:'POST',
    data:{get:union, up_id:up_id },
    success:function(data){
      $('#union').empty();
      $('#union').prop('disabled', false);
      $('#union').append("<option value='-1'>Select union</option>");
      $('#union').append(data);
    }

  });//end ajax
}
});  //end_upazilla















  

//Load_district
// $('#divisions').on('change',function(){
//  var div_id=$(this).val();
// if(div_id){
//   $("#district").children().remove()
//   $.ajax({
//     url:'load.php',
//     type:'POST',
//     data:{get:div_id},
//     success:function(data){
//       $('#district').append(data);
//     }
//   });
// }
// }); //end

    
   
  </script>
</body>
</html>