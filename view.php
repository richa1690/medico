<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  


<style>
	#bt{
		text-align: center;border-radius: 5px;border: none;color: black;height: 50px;margin-top:30px;
	}
		#bt2{
		text-align: center;border-radius: 5px;border: none;color: black;height: 50px;margin-top:30px;
	}
  .fa-check
  {
    color: green;
  }

  .update,.delete{
    border: none;
  }

	
</style>

//header
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
	<?php include 'header.php'; ?>
    

<h1 style="text-align: center;"?><b>donor deatils</b></h1>

	<select>
		<option disabled>--select your city</option>
	<?php
	include 'dbcon.php';

 $x =   new userdata();
	    $y =   $x->distinctCity();
            foreach ($y as $ke => $value) {?>
            	<option><?=$value?></option>
         <?php
     }
             ?>
<form>
	</select>

  <select>
    <option>Plasma</option>
    <option>Oxygen</option>
  </select>

</form>
    <div class="table-responsive" style="padding:100px;">
       <table id="totalrides" class="table table-striped table-bordered">
            <thead>
              <tr>
              	<td>id</td>
                <td>name</td>
                <td>email</td>
                <td>contact no</td>
                <td>city</td>
                <td>item</td>
              </tr>
            </thead>
            
        </table>
        
    </div>
        

 
        

 <script>

$(document).ready(function() {
  	debugger;

    var table = $('#totalrides').DataTable( {
    	 stateSave: true,
         "bDestroy": true,
    	"bPaginate": false,
        "bFilter": false,
        "ordering": false,
        "ajax": {
        	"url":"helper.php",
        	"dataSrc":"",
        	"type":"POST",
        	"data":{"action1":'show'},

        },
        "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": '<button class="update" type="button" style="margin:10px;color:green;">Contacted</button>'+ '<button class="delete" type="button" style="margin:10px;color:red;">Unreachable</button>'+'<button class="spam" type="button" style="margin:10px;color:green;">Spam</button>'
        } ]

    } );



    $('#totalrides tbody').on( 'click', '.update', function (e) {
         tr = e.target.parentNode.parentNode;
         id = tr.getElementsByTagName("td")[0].innerHTML;
         // sub = tr.getElementsByTagName("td")[1].innerHTML;
        if ($(this).text() == "Contacted") {
          $(this).text("<i class='fa fa-check' style='font-size:30px'></i>");
          $('.delete').hide();
          contacted = 1; 
        }
        else {
        $(this).text("Contacted"); 
        $('.delete').show();
        contacted = 0; 
      };
      $.ajax({
        method:'POST',
        url:'helper.php',
        data:{'contacted':contacted,'id':id},
        success:function(data)
        {
          console.log(data);
        }
  })
    });





    $('#totalrides tbody').on( 'click', '.delete', function (e) {
         tr = e.target.parentNode.parentNode;
         id = tr.getElementsByTagName("td")[0].innerHTML;
         // sub = tr.getElementsByTagName("td")[1].innerHTML;
        if ($(this).text() == "Unreachable") {
          $(this).text("<i class='fa fa-times' style='font-size:30px'></i>");
          $('.update').hide();
          x=-1;

        }
        else {
        $(this).text("Unreachable"); 
        $('.update').show();
        x=0;
      };
                   $.ajax({
    method:'POST',
    url:'helper.php',
    data:{'status':x,'id':id},
    success:function(data)
    {
    console.log(data);
    }
  })
      console.log(x);
    });


        $('#totalrides tbody').on( 'click', '.spam', function (e) {
         tr = e.target.parentNode.parentNode;
         id = tr.getElementsByTagName("td")[0].innerHTML;
         // sub = tr.getElementsByTagName("td")[1].innerHTML;
        if ($(this).text() == "Spam") {
          $(this).text("<i class='fa fa-times' style='font-size:30px'></i>");
        
          x=-2;

        }
        else {
        $(this).text("Spam"); 
       
        x=0;
      };
                   $.ajax({
    method:'POST',
    url:'helper.php',
    data:{'status':x,'id':id},
    success:function(data)
    {
    console.log(data);
    }
  })
      console.log(x);
    });



        
      
        });





    </script>
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
      <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>


      <?php include 'footer.php';?>
<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      
  

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>
