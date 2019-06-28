<?php 
    //ADDING SERVICE
    if(isset($_POST['submit-service-add'])){

        require 'dbh.inc.php';

        $userName = $_POST['username'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $description = $_POST['description'];
        $pros = $_POST['pros'];
        $cons = $_POST['cons'];
        $icon = $_POST['icon'];
        $dateRegistered = date("d-m-Y h:i:sa");
        $enabled = true;
        $system_log = "User: ".$userName." created service on ".$dateRegistered." || ";

        if(empty($title) || empty($subtitle) || empty($description)){
            header("Location: ../services/create.php?error=emptyfields");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE user_name=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../services/create.php?error=sqlerror");
                exit(); 
            } else {
                mysqli_stmt_bind_param($stmt, "s", $userName);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $userId = $row['id'];
                    $sql = "INSERT INTO services (title,subtitle,description,pros,cons,date_registered,enabled,system_log,id_user_fk) VALUES (?,?,?,?,?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../services/create.php?error=sqlerror");
                        exit(); 
                    } else {
                        mysqli_stmt_bind_param($stmt, "sssssssss",$title,$subtitle,$description,$pros,$cons,$dateRegistered,$enabled,$system_log,$userId);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../services/create.php?msj=success");
                        exit(); 
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }
?>