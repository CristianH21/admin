<?php 

    if(isset($_POST['submit-signin'])){

        require 'dbh.inc.php';

        $email = $_POST['email'];
        $pwd = $_POST['pwd'];


        if (empty($email) || empty($pwd)) {
            header("Location: ../signin.php?error=emptyfields");
            exit();
        } else {

            $sql = "SELECT * FROM users WHERE email=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../signin.php?error=sqlerror");
                exit(); 
            } else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($pwd, $row['password']);
                    //$pwdCheck = true;

                    if($pwdCheck == false){
                        header("Location: ../signin.php?error=wrongpwd");
                        exit();
                    } else if($pwdCheck == true){
                        session_start();

                        $_SESSION['id'] = $row['id'];
                        $_SESSION['firstName'] = $row['first_name'];
                        $_SESSION['lastName'] = $row['last_name'];
                        $_SESSION['userName'] = $row['user_name'];
                        $_SESSION['email'] = $row['email'];

                        header("Location: ../index.php");
                        exit();
                    } else {
                        header("Location: ../signin.php?error=wrongpwd");
                        exit();
                    }
                } else {
                    header("Location: ../signin.php?error=nouser");
                    exit();
                }
            }

        }
    }

?>