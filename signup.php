<?php
if(isset($_POST['create'])){
    require "db.php";

    $name = $_POST['name'];
    $surName = $_POST['surname'];
    $guardianName = $_POST['guardianName'];
    $password = $_POST['password'];
    $confirmPassWord = $_POST['confirmPassword'];
    $email= $_POST['email'];
    $address = $_POST['address'];

    if($_POST['password']!=$_POST['confirmPassword']){
        echo " passwords donot match";
        exit();
    }
// 


    // $sql = " INSERT INTO  registration(name,surname,guardian_name,password,email,address)
    // VALUES('$Name','$Surname','$Guardian_name','$PassWord','$Email','$Address')";
    // $result= msqli_query($conn,$sql);

    // exit();

    $stmt = $conn-> prepare("INSERT INTO registration(name,surname,guardian_name, password, email, address)
    VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $name ,$surName,$guardianName, $password, $email, $address);
    $stmt -> execute();
    echo" REISTRATION SUCCESSFUL....";
    $stmt->close();
    $conn->close();
    header("./signup.html");
    exit();



}
?>