<?php
$fename = filter_input(INPUT_POST, 'fename');
$email = filter_input(INPUT_POST, 'email');
$comment = filter_input(INPUT_POST, 'comment');
if (!empty($fename)) {
    if(!empty($email)){
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

        $sql="INSERT INTO feedback (fename,email,comment) values ('$fename','$email','$comment')";
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
        echo "email should not be empty";
        die();
    }
}

else{
    echo "name should not be empty";
    die();
}
?>