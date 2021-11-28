<?php
/*$guestid =$_GET['guestid'];
$guest = new Guest();
$result=$guest->single_guest($guestid);*/
if(!isset($_SESSION)) 
{ 
session_start(); 
} 

  $name = $_SESSION['name']; 
  $last = $_SESSION['last'];
  $country =$_SESSION['country'];
  $city = $_SESSION['city'] ;
  $address = $_SESSION['address'];
  $zip =  $_SESSION['zip'] ;
  $phone = $_SESSION['phone'];
  $email = $_SESSION['email'];
  $password =$_SESSION['pass'];
  $stat = $_SESSION['pending'];

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

           <form action="index.php?view=payment" method="post"  name="" >
            <span id="printout">
           <fieldset >
           <center><legend><h2>Booking Invoice</h2></legend></center>
           <p>
           <img src="\justines/img/logo1.png" height="60px" width="60px">

            <? print(Date("l F d, Y")); ?>
            <br/><br/>
           Sir/Madam <?php echo $name.' '.$last;?> <br/>
           <?php echo $address;?><br/>
           <?php echo $phone;?> <br/>
           <?php echo $email;?><br/><br/>
           Dear Sir/Madam. <?php echo $last;?>,<br/><br/>
           Greetings from JIJO BNBs Kenya<br/><br/>
           Please keep the invoice of your reservation:<br/><br/>
           <strong>GUEST NAME(S):</strong> <?php echo $name.' '.$last;?>


          </p>

        <table class="table table-hover">
                  <thead>
              <tr  bgcolor="#999999">
              <th width="10">#</th>
              <th align="center" width="120">Room Type</th>
               <th align="center" width="120">Check In</th>
               <th align="center" width="120">Location</th>
                <th align="center" width="120">Check Out</th>
                 <th align="center" width="120">Nights</th>
              <th  width="120">Price</th>
               <th align="center" width="120">Room</th>
              <th align="center" width="90">Amount</th>
           
              
         
            </tr> 
          </thead>
          <tbody>
              

            <?php
            if(!isset($_SESSION)) 
            { 
            session_start(); 
            } 
             $arival   = $_SESSION['from']; 
              $departure = $_SESSION['to']; 
              $days = dateDiff($arival,$departure);
              $query->$conn->query("SELECT *,typeName FROM room ro, roomtype rt WHERE ro.typeID = rt.typeID and roomNo =". $_SESSION['roomid']);
              while($fetch = $query->fetch_array()){
              echo '<tr>'; 
              echo '<td></td>';
              echo '<td>'. $fetch['typeName'].'</td>';
              echo '<td>'.$arival.'</td>';
              echo '<td>'.$fetch['location'].'</td>';
              echo '<td>'.$departure.'</td>';
              echo '<td>'.$days.'</td>';
              echo '<td >Ksh.'. $fetch['price'].'</td>';
               echo '<td >'.$fetch['roomName'].'</td>';
                echo '<td >Ksh.'. $fetch['price'].'</td>';
        

              
              echo '</tr>';
              $payable= $fetch['price'] *$days;
           $_SESSION['pay']= $payable;
            } 
            ?>
          </tbody>
          <tfoot>
               <tr>
                   <td colspan="6"></td><td align="right"><h5><b>Order Total: </b></h5>
                   <td align="left">
                  <h5><b> Ksh.<?php echo $payable= $days*$fetch['price']; ?></b></h5>
                                   
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

       
<p>We are eagerly anticipating your arrival and would like to advise you of the following in order to help you with your trip planning.Your reservation number is <b><?php echo $_SESSION['confirmation']?>:</b><br/><br/>Should there be a concern with your reservation, a customer service representative will contact you. Otherwise, consider your reservation confirmed.</p>
<ul>
 <li>Function Room rate is Ksh 500.00 for first four hours and Ksh 100.00 for each succeeding hours.</li>
 <li>No pets allowed.</li>
 <li>Outside foods are allowed inside the guest house.</li>
 <li>Check in time is 1pm and Check out time is 10 am.</li>
 <li>Guest arriving before 1 pm shall be accommodated if rooms are vacant and ready.</li>
 <li>Free WIFI access.</li>
 <li>Room rates inclusive of government tax and service charge.</li>
 <li>Rates are subject to change without prior notice.</li>
 <li>Cancellation notification must be made at least a day prior to arrival for refund of deposits. Cancellation received within the 10 days period will result to forfeiture of full deposits.</li>
 <li>We organize Breakfast, Lunch and Dinner with our cafeteria upon request with 2 hours notice.</li><br>
<strong>I have agreed that I will present the following documents upon check in:</strong><br/>
 <li>Proof of M-Pesa or Bank Payment.</li>
 <li>Authorization message or letter from payer for guest/s whose transactions were paid for in his/ her behalf.</li>
 </ul>
If you have any questions to <strong><?php echo $fetch['location'];?></strong> , please email at gaila8218@gmail.com or call +254 780410173 we can arrange for a pic-up if requested
<br/><br/>
Thank you for choosing JIJO airBnbs Kenya.
<br/><br/>
Respectfully your,<br/><br/>
Best BNB Patner Kenya.
<br/><br/><br/>
</span>
<div id="divButtons" name="divButtons">
<input type="button" value="Download" onclick="tablePrint();" class="btn btn-primary">
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
  <script>
function tablePrint(){ 
 document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
   
    return false;  
    } 
  $(document).ready(function() {
    oTable = jQuery('#list').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers"
    } );
  });   
</script>