<?php
require_once 'includes/initialize.php';
if(!isset($_SESSION)) 
{ 
session_start(); 
} 
$arival    = $_SESSION['from']; 
$departure = $_SESSION['to'];
$name      = $_SESSION['name']; 
$last      = $_SESSION['last'];
$country   = $_SESSION['country'];
$city      = $_SESSION['city'] ;
$address   = $_SESSION['address'];
$zip       = $_SESSION['zip'] ;
$phone     = $_SESSION['phone'];
$email     = $_SESSION['email'];
$password  = $_SESSION['pass'];
$roomid   = $_SESSION['roomid'];
$_SESSION['pending'] = 'pending';
$stat     = $_SESSION['pending'];
$days     = dateDiff($arival,$departure);
?>

<div class="container">
  <?php include'sidebar.php';?>

    <div class="col-xs-12 col-sm-9">
      <!--<div class="jumbotron">-->
        <div class="">
          <div class="panel panel-default">
            <div class="panel-body">  
             
                 <?php // include'navigator.php';?>


          <td valign="top" class="body" style="padding-bottom:10px;">
          <form action="booking/bookingreceiver.php" method="post"  name="personal" >
           <fieldset >
           <legend><h2>Billing Details</h2></legend>
           <p>

            <strong>FIRST NAME:</strong> <?php echo $name;?> <br/>
            <strong>LAST NAME:</strong> <?php echo $last;?><br/>
            <strong>COUNTRY:</strong> <?php echo $country;?><br/>
            <strong>CITY:</strong> <?php  echo $city;?><br/>
            <strong>ADDRESS:</strong> <?php echo $address;?><br/>
            <strong>ZIP CODE:</strong> <?php echo $zip; ?><br/>
            <strong>PHONE:</strong> <?php echo $phone;?><br/>
            <strong>E-MAIL:</strong> <?php echo $email;?><br/>
          </p>

        <table class="table table-hover">
                  <thead>
              <tr  bgcolor="#999999">
              <th width="10">#</th>
              <th align="center" width="120">Room Type</th>
              <th align="center" width="120">Check In</th>
              <th align="center" width="120">Check Out</th>
              <th align="center" width="120">Nights</th>
              <th  width="120">Price</th>
              <th align="center" width="120">Room</th>
              <th align="center" width="90">Amount</th>
           
              
         
            </tr> 
          </thead>
          <tbody>
              
            <?php
              $query = $conn->query("SELECT *,typeName FROM room ro, roomtype rt WHERE ro.typeID = rt.typeID and roomNo =". $_SESSION['roomid']) or die(mysqli_error());
              while($fetch = $query->fetch_array()){

              echo '<tr>'; 
              echo '<td></td>';
              echo '<td>'. $fetch['typeName'].'</td>';
              echo '<td>'.$arival.'</td>';
              echo '<td>'.$departure.'</td>';
              echo '<td>'.$days.'</td>';
              echo '<td >Ksh '. $fetch['price'].'</td>';
               echo '<td >'. $fetch['roomName'].'</td>';
                echo '<td >Ksh'. $fetch['price'].'</td>';
        

                $payable= $fetch['price'] *$days;
                $_SESSION['pay']= $payable;
              echo '</tr>';
              
            } 
            ?>
          </tbody>
          <tfoot>
           <tr>
                   <td colspan="6"></td><td align="right"><h5><b>Order Total:  </b></h5>
                   <td align="left">
                  <h5><b> <?php echo 'Ksh '.$payable; ?></b></h5>
                                   
                  </td>
          </tr>
         <tr>
                  <!--  <td colspan="4"></td><td colspan="5">
                            <div class="col-xs-12 col-sm-12" align="right">
                                <button type="submit" class="btn btn-primary" align="right" name="btnlogin">Payout</button>
                            </div>
                   
                     </td> -->
          </tr>
         
          </tfoot>  
        </table>
              <div class="form-group">
                  <div class="col-md-12">
                    

                    <div class="col-md-10">
                      <b>Special Request</b>
                 <textarea class="form-control input-sm" name="message" placeholder="Any personal request?">
                </textarea>
                Some requests might have corresponding charges and subject to availability. <br/>
                <br/>
                    </div>
                  </div>
                </div>
                 <div class="form-group">
                  <div class="col-md-12">
                    

                    <div class="col-md-10">
                   <button type="submit" class="btn btn-primary" align="right" name="btnsubmitbooking">Submit Booking</button>
                    </div>
                  </div>
                </div>



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



