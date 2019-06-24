<?php 

    if(isset($_POST['submit-profile'])){

        require 'dbh.inc.php';

        $userName = $_POST['username'];
        $pwd = $_POST['pwd'];
        $newPwd = $_POST['newPwd'];

        if(!empty($newPwd) && empty($pwd)){
            header("Location: ../profile.php?error=emptypwd");
            exit();
        } else if( (empty($newPwd) && empty($pwd)) || (empty($newPwd) && !empty($pwd)) ){
            header("Location: ../profile.php");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE user_name=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../profile.php?error=sqlerror");
                exit(); 
            } else {
                mysqli_stmt_bind_param($stmt, "s", $userName);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){

                    $pwdCheck = password_verify($pwd, $row['password']);
                    //$pwdCheck = true;
                    if($pwdCheck == false){
                        header("Location: ../profile.php?error=wrongpwd");
                        exit();
                    } else if($pwdCheck == true){
                        $sql = "UPDATE users SET password=? WHERE user_name=?";
                        $stmt = mysqli_stmt_init($conn);

                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            header("Location: ../profile.php?error=sqlerror");
                            exit(); 
                        } else {
                            $pwdHashed = password_hash($newPwd, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss",$pwdHashed,$userName);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../profile.php?msj=success");
                            exit(); 
                        }
                    } 
                     
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }
?>