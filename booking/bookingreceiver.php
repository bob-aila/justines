
<?php
if (isset($_POST['submit'])){
	require_once '../includes/initialize.php';

	if(!isset($_SESSION)){ 
              session_start(); 
    } 
  $arival   = $_SESSION['from']; 
  $departure = $_SESSION['to'];
  /*$adults = $_SESSION['adults'];
  $child = $_SESSION['child'];*/
  $adults = 1;
  $child = 1;
  $roomid = $_SESSION['roomid'];

 $_SESSION['name']   = $_POST['name'];
 $_SESSION['last']   = $_POST['last'];
 $_SESSION['country']   = $_POST['country'];
 $_SESSION['city']    = $_POST['city'];
 $_SESSION['address'] = $_POST['address'];
 $_SESSION['zip']   = $_POST['zip'];
 $_SESSION['phone']   = $_POST['phone'];
 $_SESSION['email']= $_POST['email'];
 $_SESSION['pass']  = $_POST['pass'];
 $_SESSION['pending']  = 'pending';

  header('location: ../index2.php#index.php?pages=3');
}

if(isset($_POST['btnsubmitbooking'])){
    $message = $_POST['message'];
  function createRandomPassword() {
  
      $chars = "abcdefghijkmnopqrstuvwxyz023456789";
  
      srand((double)microtime()*1000000);
  
      $i = 0;
  
      $pass = '' ;
      while ($i <= 7) {
  
          $num = rand() % 33;
  
          $tmp = substr($chars, $num, 1);
  
          $pass = $pass . $tmp;
  
          $i++;
  
      }
  
      return $pass;
  
  }
  // $query = $conn->query("SELECT * FROM guest WHERE email = '$email' AND password = '$pass' ") or die(mysqli_error());
    //       $fetch = $query->fetch_array();
    //       if(isset($fetch)){
        if(!isset($_SESSION)){ 
            session_start(); 
         } 
    $roomid = $_SESSION['roomid'];
    require_once '../includes/initialize.php';
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

    $confirmation = createRandomPassword();
    $_SESSION['confirmation'] = $confirmation;
    require_once '../includes/config.php';
    $query = $conn->query("SELECT * FROM room where roomNo={$roomid}");
    while($fetch = $query->fetch_array()){
      $rate = $fetch['price'];
      $name = $fetch['roomName'];
      $adults = $fetch['Adults'];
      $children = $fetch['Children'];
  
      $payable= $rate*$days;
    $_SESSION['pay']= $payable;
    }  
  
    //check guest
//     $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// if ($conn->query($sql) === TRUE) {
//   $last_id = $conn->insert_id;
//   echo "New record created successfully. Last inserted ID is: " . $last_id;
    $query = $conn->query("SELECT * 
                  FROM  guest 
                  WHERE  `phone` ='{$phone}' OR email='{$email}'");
    $fetch = $query->fetch_array();
    if(isset($fetch)){
    $lastguest= $fetch['guest_id'];
  
      $query = $conn->query("UPDATE guest SET firstname='$name',lastname='$last',
                            country='$country',city='$city',address='$address',
                            zip='$zip',phone='$phone',email='$email',password='$password' 
                        WHERE guest_id='$lastguest'");
  
    }else{
        $sql = "INSERT INTO guest (firstname,lastname,country,city,address,zip,phone,email,password)
        VALUES ('$name','$last','$country','$city','$address','$zip','$phone','$email','$password')";
        if ($conn->query($sql) === TRUE) {
            $lastguest = $conn->insert_id;
        }
     } 

    $sql = "INSERT INTO reservation (roomNo,guest_id,arrival,departure,adults,child,payable,status,confirmation)
    VALUES ('$name','$lastguest','$arival','$departure','$adults','$children','$payable','$stat','$confirmation')";
    if ($conn->query($sql) === TRUE) {
        $lastreserv = $conn->insert_id;
    }
    $sql = "INSERT INTO `comments` (`firstname`, `lastname`, `email`, `comment`) VALUES('$name','$last','$email','$message')";
    if ($conn->query($sql) === TRUE) {
        echo '<script> die("SUCCESS");</script>';
    }
    //  unsetSessions();
    header('location: ../index2.php#index.php?pages=4');
}
  
?>