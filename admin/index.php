<?php
// If the user is not logged in redirect to the login page...
if(!isset($_SESSION)) 
        { 
	      session_start(); 
       }
if (!isset($_SESSION['name'])) {
	header('Location: ../admin/login.php');
	exit;
}
 //include 'modal.php'; 
 $content='../admin/home.php';
?>
<?php
include_once("../includes/initialize.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>JIJO Admins</title>
<link rel="shortcut icon" type="img/icon" href="../img/icon.png"/>
<link href="../cssa/bootstrap.min.css" rel="stylesheet">
<link href="../cssa/dataTables.bootstrap.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="../cssa/jquery.dataTables.css">
<link href="../cssa/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" language="javascript" src="../jsa/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../jsa/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="../jsa/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="../jsa/bootstrap-modal.js"></script>
<script type="text/javascript" src="../jsa/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../jsa/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
</head>
<script type="text/javascript">
//execute if all html elemen has been completely loaded
$(document).ready(function(){

//specify class name of a specific element. click event listener--
$('.cls_btn').click(function(){
//access the id of the specific element that has been click	
var id = $(this).attr('id');
//to debug every value of element,variable, object ect...
console.log($(this).attr('id'));

//execute a php file without reloading the page and manipulate the php responce data
$.ajax({

  type: "POST",
  //the php file that contain a mysql query
  url: "some.php",
  //submit parameter
  data: { id:id,name:"kevin" }
})
//.done means will execute if the php file has done all the processing(ex: query)
/*  .done(function( msg ) {
  	//decode JSON from PHP file response
  	var result = JSON.parse(msg);

  	console.log(this);
    
  	//apply the value to each element
    $('#display #infoid').html(result[0].member_id);
    $('#display #infoname').html(result[0].fName+" "+result[0].lName);
    $('#display #Email').html(result[0].email);
    $('#display #Gender').html(result[0].gender);
    $('#display #bday').html(result[0].bday);
      });*/

});

});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('.toggle-modal').click(function(){
		$('#logout').modal('toggle');
	}); 
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('.toggle-modal-reserve').click(function(){
		$('#reservation').modal('toggle');
	}); 
});


</script>


<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 1
        } ],
        //vertical scroll
         "scrollY":        "400px",
        "scrollCollapse": true,
        //ordering start at column 2
       "order": [[ 2, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
    </script>
    <link href="..//css/offcanvas.css" rel="stylesheet">

<body>
<!--Header-->

	    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="../admin/index.php"><img src="\justines/img/logo2.png" height="42px" width="170px"></a>
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	            <li><a href="../admin/index.php" >Home</a></li>
	            <li><a href="../admin/mod_room/index.php">Rooms</a></li>
	            <li><a href="../admin/mod_roomtype/index.php">Room Types</a></li>
	            <li><a href="../admin/mod_reservation/index.php">Reservation</a></li>
	            <li><a href="../admin/mod_comments/index.php">Comments</a></li>
	            <li><a href="../admin/mod_amenities/index.php">Amenities</a></li>
	            <li><a href="../admin/mod_reports/index.php">Reports</a></li>
	             <li><a href="../admin/mod_users/index.php" >Users</a></li>
	            <li><a class="toggle-modal" href="#logout">Logout</a></li>
	          </ul>
	   
	        </div><!-- /.nav-collapse -->
	      </div><!-- /.container -->
	    </div><!-- /.navbar -->
<!--
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="well">-->
				<!-- <img  width="1100px" hieght="100px" class="img-rounded"/> -->
		<!--	<div class="media">
			  <a class="pull-left" href="#">
			    <img class="media-object" src="../img/banner.png" alt="...">
			  </a>
			</div>
				</div>
			</div>
		</div>

-->
</div>      

<!--End of Header-->

<div class="container">
<?php
//include_once '../index.php';
echo '<hr>';
 require_once ($content);
 ?>
	<!--/row-->
	
	<hr>
	     <footer>
        <p><center>&copy; JIJO AIR-BNBS @2021 Powered by Schweitzer</center> </p>

        <script>


		  function checkall(selector)
		  {
		    if(document.getElementById('chkall').checked==true)
		    {
		      var chkelement=document.getElementsByName(selector);
		      for(var i=0;i<chkelement.length;i++)
		      {
		        chkelement.item(i).checked=true;
		      }
		    }
		    else
		    {
		      var chkelement=document.getElementsByName(selector);
		      for(var i=0;i<chkelement.length;i++)
		      {
		        chkelement.item(i).checked=false;
		      }
		    }
		  }

		  function checkNumber(textBox)
			{
				while (textBox.value.length > 0 && isNaN(textBox.value)) {
					textBox.value = textBox.value.substring(0, textBox.value.length - 1)
				}
				textBox.value = trim(textBox.value);
			}
			//
			function checkText(textBox)
			{
				var alphaExp = /^[a-zA-Z]+$/;
				while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
					textBox.value = textBox.value.substring(0, textBox.value.length - 1)
				}
				textBox.value = trim(textBox.value);
			}
		  </script>			
      </footer>
</div>
<!--/.container-->
</body>
</html>
 <script type="text/javascript">
	$('.start').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.end').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
</script>
