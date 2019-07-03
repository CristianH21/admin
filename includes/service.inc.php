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
        date_default_timezone_set("America/New_York");
        $dateRegistered = date("Y-m-d h:i:sa");
        $enabled = true;
        $system_log = "User: ".$userName." created service on ".$dateRegistered." || ";
        $system_log_icon = "User: ".$userName." uploaded image on ".$dateRegistered." || ";
        $icon = $_FILES['icon']['name'];
        $target = "../uploads/images/".basename($icon);
        $allowed_image_extension = array("png","jpg","jpeg");
        $icon_extension = pathinfo($_FILES["icon"]["name"], PATHINFO_EXTENSION);

        if(empty($title) || empty($subtitle) || empty($description)){
            header("Location: ../services/create.php?error=emptyfields&t=$title&st=$subtitle&des=$description&cons=$cons&pros=$pros");
            exit();
        } else if(file_exists($_FILES["icon"]["tmp_name"]) && ! in_array($icon_extension, $allowed_image_extension)){
            header("Location: ../services/create.php?error=ei&t=$title&st=$subtitle&d=$description&c=$cons&p=$pros");
            exit();
        } else if(($_FILES["icon"]["size"] > 2000000)){
            header("Location: ../services/create.php?error=eis&t=$title&st=$subtitle&d=$description&c=$cons&p=$pros");
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
                    
                    $sql2 = "INSERT INTO images (name,date_registered,system_log) VALUES (?,?,?)";
                    $stmt2 = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt2, $sql2)){
                        header("Location: ../services/create.php?error=sqlerror");
                        exit(); 
                    } else {

                        mysqli_stmt_bind_param($stmt2, "sss",$icon,$dateRegistered,$system_log_icon);
                        mysqli_stmt_execute($stmt2);

                        $iconId = mysqli_insert_id($conn);

                        if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target)) {

                            $sql3 = "INSERT INTO services (title, subtitle, description, pros, cons, date_registered, enabled, system_log, id_users_fk, id_icon_fk) VALUES (?,?,?,?,?,?,?,?,?,?)";
                            $stmt3 = mysqli_stmt_init($conn);
        
                            if(!mysqli_stmt_prepare($stmt3, $sql3)){  
                                header("Location: ../services/create.php?error=sqlerror");
                                exit(); 
                            } else {
                                mysqli_stmt_bind_param($stmt3, "ssssssssss",$title,$subtitle,$description,$pros,$cons,$dateRegistered,$enabled,$system_log,$userId,$iconId);
                                mysqli_stmt_execute($stmt3);
                                header("Location: ../services/create.php?msj=success");
                                exit(); 
                            }

                        } else {
                            header("Location: ../services/create.php?error=img");
                            exit();
                        } 
                    }  
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }


    // //UPDATING SERVICE
    // if(isset($_POST['submit-service-update'])){

    //     require 'dbh.inc.php';

    //     $userName = $_POST['username'];
    //     $serviceId = $_POST['id'];
    //     $title = $_POST['title'];
    //     $subtitle = $_POST['subtitle'];
    //     $description = $_POST['description'];
    //     $pros = $_POST['pros'];
    //     $cons = $_POST['cons'];
    //     $icon = $_POST['icon'];
    //     $dateRegistered = date("d-m-Y h:i:sa");
    //     $enabled = $_POST['enabled'];
    //     $system_log = "User: ".$userName." updated service on ".$dateRegistered." || ";

    //     if(empty($title) || empty($subtitle) || empty($description)){
    //         header("Location: ../services/create.php?srvc=".$serviceId."&error=emptyfields");
    //         exit();
    //     } else {
    //         $sql = "SELECT * FROM users WHERE user_name=?;";
    //         $stmt = mysqli_stmt_init($conn);
    //         if(!mysqli_stmt_prepare($stmt, $sql)){
    //             header("Location: ../services/update.php?srvc=".$serviceId."&error=sqlerror");
    //             exit(); 
    //         } else {
    //             mysqli_stmt_bind_param($stmt, "s", $userName);
    //             mysqli_stmt_execute($stmt);
    //             $result = mysqli_stmt_get_result($stmt);
    //             if($row = mysqli_fetch_assoc($result)){
    //                 $sql = "UPDATE services SET title=?, subtitle=?, description=?, pros=?, cons=?, enabled=?, system_log=CONCAT(system_log,?) WHERE id=?";
    //                 $stmt = mysqli_stmt_init($conn);

    //                 if(!mysqli_stmt_prepare($stmt, $sql)){
    //                     header("Location: ../services/update.php?srvc=".$serviceId."&error=sqlerror");
    //                     exit(); 
    //                 } else {
    //                     mysqli_stmt_bind_param($stmt, "ssssssss",$title,$subtitle,$description,$pros,$cons,$enabled,$system_log,$serviceId);
    //                     mysqli_stmt_execute($stmt);
    //                     header("Location: ../services/update.php?srvc=".$serviceId."&msj=success");
    //                     exit(); 
    //                 }
    //             }
    //         }
    //     }
    //     mysqli_stmt_close($stmt);
    //     mysqli_close($conn);

    // }
?>