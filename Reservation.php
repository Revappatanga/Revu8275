<?php
$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$email = filter_input(INPUT_POST, 'email');
$member = filter_input(INPUT_POST, 'member');
$tnumber = filter_input(INPUT_POST, 'tnumber');
$date = filter_input(INPUT_POST, 'date');

if (!empty($fname)) {
    if(!empty($lname)){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "reservation";
        $conn=new mysqli ($host,$dbusername,$dbpassword,$dbname);
        if(mysqli_connect_error()){
            die('Connect Error ('. mysqli_connect_errno().')'
            . mysqli_connect_error());
        }
        else{

        $sql="INSERT INTO Hotel (fname,lname,email,member,tnumber,date) values ('$fname','$lname','$email','$member','$tnumber','$date')";
        if($conn->query($sql)){
                echo "New record is inserted sucessfully";
    }
    else{
        echo "Error:". $sql."<br>".$conn->error;
    }
    $conn->close();
}
    }
    else{
        echo "Lastname should not be empty";
        die();
    }
}

else{
    echo "Firstname should not be empty";
    die();
}
?>