
<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
} 
$arrival =$_SESSION['from']; 
$departure =$_SESSION['to'];
 /*if(!isset($_POST['adults'])){
    message("Choose from Adults!", "error");  
    redirect(".WEB_ROOT. 'booking/");
    //exit;
 }*/
 /* if(isset($_POST['adults'])&&isset($_POST['child'])){
    $_SESSION['roomid']=$_POST['roomid'];
  $_SESSION['adults'] = $_POST['adults'];
  $_SESSION['child']  = $_POST['child'];
   */
  if (!isset($_SESSION['roomid'])){
      header('location: index.php');
  }
 if (isset($_POST['clear'])){
  unset($_SESSION['roomid']);
  header('location: index.php');

 }
 
?>


<!--End of Header-->
<div class="container">
  <?php include'sidebar.php';?>

    <div class="col-xs-12 col-sm-9">
      <!--<div class="jumbotron">-->
        <div class="">
          <div class="panel panel-default">
            <div class="panel-body">  
             <form action="" method="POST">
                 <?php //include'navigator.php';?>
                 <center><img src="img/logo1.png" height="100px" width="100px"></center>
                  <h3 align="center">Your Booking Cart</h3>
                  <table class="table table-hover">
                  <thead>
              <tr  bgcolor="#999999">
              <th width="10">#</th>
              <th align="center" width="120">Room Type</th>
              <th align="center" width="120">Check In</th>
              <th align="center" width="120">Check Out</th>
              <th align="center" width="120">Nights</th>
              <th align="center" width="120">Price</th>
               <th align="center" width="120">Room</th>
              <th align="center" width="90">Amount</th>
               
 
              
         
            </tr> 
          </thead>
          <tbody>
              
            <?php
            include_once 'includes/initialize.php';
            if(!isset($_SESSION)) { 
               session_start(); 
                     } 
             $arival   = $_SESSION['from']; 
              $departure = $_SESSION['to']; 
              $days = dateDiff($arival,$departure);
              $query = $conn->query("SELECT *,typeName FROM room ro, roomtype rt WHERE ro.typeID = rt.typeID and roomNo =". $_SESSION['roomid']) or die(mysqli_error());
              while($fetch = $query->fetch_array()){

              echo '<tr>'; 
              echo '<td></td>';
              echo '<td>'. $fetch['typeName'].'</td>';
              echo '<td>'.$arival.'</td>';
              echo '<td>'.$departure.'</td>';
              echo '<td>'.$days.'</td>';
              echo '<td >Ksh'. $fetch['price'].'</td>';
              echo '<td >'.$fetch['roomName'].'</td>';
              echo '<td >Ksh'. $fetch['price'].'</td>';
                

              
              echo '</tr>';
              $payable=($fetch['price'] * $days);
              $_SESSION['pay']= $payable;
            } 
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4"><h5><b>Order Total: Ksh  <?php echo $_SESSION['pay'];?></b></h5></td><td colspan="5"> 
                            <div class="col-xs-12 col-sm-12" align="right">
                               <button type="submit" class="btn btn-primary" align="right"name="clear">Clear Cart</button>
                               <?php
                               if(!isset($_SESSION)) { 
                               session_start(); 
                               } 
                                if (isset($_SESSION['guest_id'])){
                                  ?>
                                  <a href="index2.php#index.php?pages=3" class="btn btn-primary" align="right"name="continue">Continue Booking</a>
                                 <?php 
                                }else{ ?>
                                   <a href="index2.php#index.php?pages=2"class="btn btn-primary" align="right"name="continue">Continue Booking</a>
                               <?php
                                }

                               ?>
                                 
                            </div>
                   
            </td>
            </tr>
          </tfoot>  
        </table>
      </form>
            </div>
          </div>  
          
        </div>
    <!--  </div>-->
    </div>
    <!--/span--> 
    <!--Sidebar-->

  </div>
  <!--/row-->
</div>
