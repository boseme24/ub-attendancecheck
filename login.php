<?php
if(isset($_POST['check'])){
    require "db.php";

    $surName = $_POST['surname'];
    $password = $_POST['password'];
    $email= $_POST['email'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL())){
        header("Location:./login.html?error=sql error");
        exit(;)
    }else{
        $sql = " SELECT  * FROM registration WHERE email = ?";
        $stmt= msqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ./login.html?error=sql error");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result)==0){
                header("Location:./login.html? error");
                exit();
            }
            while($row = mysqli_fetch_assoc($result)){
                $passwordCheck = password_verify($password, $row['password']);
                if($passwordCheck==false){
                    header("Location:./login.html?error= Incorrect Password");
                    exit();
                }
                elseif($passwordCheck==true){
                    session_start();

                    $_SESSION['email'] = $row['email'];

                    header("Location:./login.php?");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn)
}
else{
    header("Location:./login.html");
    exit();
}
?>