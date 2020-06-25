<?php

if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-34-200-15-192.compute-1.amazonaws.com;port=5432;user=eserwscvrdgahc;password=4acf4bf1a57d5db44a787ca00629cb4e4719a2ea120c22bf9cfd84e368e89853;dbname=dpqj69sdonv1p",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

if($pdo === false){
     echo "ERROR: Could not connect Database";
}

//Khởi tạo Prepared Statement
//$stmt = $pdo->prepare('INSERT INTO order (fullname, address, phone, mail) values (:fullname, :address, :phone, :mail)');

//$stmt->bindParam(':fullname','huu thien');
//$stmt->bindParam(':address','da nang');
//$stmt->bindParam(':phone', '1112223334');
//$stmt->bindParam(':mail', 'thien@gmail.com');
//$stmt->execute();
//$sql = "INSERT INTO order(fullname, address, phone, mail) VALUES('huu thien', 'da nang','1112223334','thien@gmail.com')";
$sql = "INSERT INTO order(fullname, address, phone, mail)"
        . " VALUES('$_POST[fullname]','$_POST[address]','$_P111OST[phone]','$_POST[mail]')";
$stmt = $pdo->prepare($sql);
//$stmt->execute();
 if (is_null($_POST[fullname])) {
   echo "Please insert your detail";
 }
 else
 {
    if($stmt->execute() == TRUE){
        echo "Details inserted successfully.";
    } else {
        echo "Error inserting details: ";
    }
 }
?>
