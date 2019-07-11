<?php 
    //CREATING SERVICE
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
        $system_log_image = "User: ".$userName." uploaded image on ".$dateRegistered." in service || ";
        $icon = $_FILES['icon']['name'];
        $banner = $_FILES['banner']['name'];
        $target = "../uploads/images/".basename($icon);
        $targetBanner = "../uploads/images/".basename($banner);
        $allowed_image_extension = array("png","jpg","jpeg");
        $icon_extension = pathinfo($_FILES["icon"]["name"], PATHINFO_EXTENSION);
        $banner_extension = pathinfo($_FILES["banner"]["name"], PATHINFO_EXTENSION);
        $iconId = null;
        $bannerId = null;
        $deleted_logical = false;

        if(empty($title) || empty($subtitle) || empty($description)){
            header("Location: ../services/create.php?error=emptyfields&t=$title&st=$subtitle&d=$description&c=$cons&p=$pros");
            exit();
        } else if(file_exists($_FILES["icon"]["tmp_name"]) && ! in_array($icon_extension, $allowed_image_extension)){
            header("Location: ../services/create.php?error=ei&t=$title&st=$subtitle&d=$description&c=$cons&p=$pros");
           exit();
        } else if(($_FILES["icon"]["size"] > 1000000)){
           header("Location: ../services/create.php?error=eis&t=$title&st=$subtitle&d=$description&c=$cons&p=$pros");
            exit();
        } else if(file_exists($_FILES["banner"]["tmp_name"]) && ! in_array($banner_extension, $allowed_image_extension)){
            header("Location: ../services/create.php?error=eib&t=$title&st=$subtitle&d=$description&c=$cons&p=$pros");
            exit();
        } else if(($_FILES["banner"]["size"] > 5000000)){
           header("Location: ../services/create.php?error=eisb&t=$title&st=$subtitle&d=$description&c=$cons&p=$pros");
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
                    
                    if(file_exists($_FILES["icon"]["tmp_name"])){
                        $sql2 = "INSERT INTO images (name,date_registered,system_log) VALUES (?,?,?)";
                        $stmt2 = mysqli_stmt_init($conn);

                        if(mysqli_stmt_prepare($stmt2, $sql2)){
                            mysqli_stmt_bind_param($stmt2, "sss",$icon,$dateRegistered,$system_log_image);
                            mysqli_stmt_execute($stmt2);
                            $iconId = mysqli_insert_id($conn);
                            if(!move_uploaded_file($_FILES["icon"]["tmp_name"], $target)){
                                header("Location: ../services/create.php?error=imgicon");
                                exit();  
                            }
                        } else {
                            header("Location: ../services/create.php?error=sqlerror");
                            exit(); 
                        }
                    }

                    if(file_exists($_FILES["banner"]["tmp_name"])){
                        $sql3 = "INSERT INTO images (name,date_registered,system_log) VALUES (?,?,?)";
                        $stmt3 = mysqli_stmt_init($conn);

                        if(mysqli_stmt_prepare($stmt3, $sql3)){
                            mysqli_stmt_bind_param($stmt3, "sss",$banner,$dateRegistered,$system_log_image);
                            mysqli_stmt_execute($stmt3);
                            $bannerId = mysqli_insert_id($conn);
                            if(!move_uploaded_file($_FILES["banner"]["tmp_name"], $targetBanner)){
                                header("Location: ../services/create.php?error=imgbanner");
                                exit();  
                            }
                        } else {
                            header("Location: ../services/create.php?error=sqlerror");
                            exit(); 
                        }
                    }

                    $sql4 = "INSERT INTO services (title, subtitle, description, pros, cons, date_registered, enabled, system_log, id_users_fk, id_icon_fk, id_banner_fk, deleted_logical) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                    $stmt4 = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt4, $sql4)){  
                        header("Location: ../services/create.php?error=sqlerror");
                        exit(); 
                    } else {
                        mysqli_stmt_bind_param($stmt4, "ssssssssssss",$title,$subtitle,$description,$pros,$cons,$dateRegistered,$enabled,$system_log,$userId,$iconId,$bannerId,$deleted_logical);
                        mysqli_stmt_execute($stmt4);
                        header("Location: ../services/catalog.php?msj=service");
                        exit(); 
                    }
 
                }//checked
            }//checked
        }//checked
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }//checked


    //UPDATING SERVICE
    if(isset($_POST['submit-service-update'])){
        
        require 'dbh.inc.php';

        $serviceId = $_POST['id'];
        $userName = $_POST['username'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $description = $_POST['description'];
        $pros = $_POST['pros'];
        $cons = $_POST['cons'];
        date_default_timezone_set("America/New_York");
        $dateRegistered = date("Y-m-d h:i:sa");
        $enabled = true;
        $system_log = "User: ".$userName." updated service on ".$dateRegistered." || ";
        $system_log_image = "User: ".$userName." updated upload image on ".$dateRegistered." in service || ";
        $icon = $_FILES['icon']['name'];
        $banner = $_FILES['banner']['name'];
        $target = "../uploads/images/".basename($icon);
        $targetBanner = "../uploads/images/".basename($banner);
        $allowed_image_extension = array("png","jpg","jpeg");
        $icon_extension = pathinfo($_FILES["icon"]["name"], PATHINFO_EXTENSION);
        $banner_extension = pathinfo($_FILES["banner"]["name"], PATHINFO_EXTENSION);

        if(empty($title) || empty($subtitle) || empty($description)){
            header("Location: ../services/update.php?srvc=".$serviceId."&error=emptyfields&t=$title&st=$subtitle&d=$description&icn=$icon&bnnr=$banner");
            exit();
        } else if(file_exists($_FILES["icon"]["tmp_name"]) && ! in_array($icon_extension, $allowed_image_extension)){
            header("Location: ../services/update.php?srvc=".$serviceId."&error=ei&t=$title&st=$subtitle&d=$description&c=$cons&p=$pros");
            exit();
        } else if(($_FILES["icon"]["size"] > 1000000)){
            header("Location: ../services/update.php?srvc=".$serviceId."&error=eis&t=$title&st=$subtitle&d=$description&c=$cons&p=$pros");
            exit();
        } else if(file_exists($_FILES["banner"]["tmp_name"]) && ! in_array($banner_extension, $allowed_image_extension)){
            header("Location: ../services/update.php?srvc=".$serviceId."&error=eib&t=$title&st=$subtitle&d=$description&c=$cons&p=$pros");
            exit();
        } else if(($_FILES["banner"]["size"] > 5000000)){
            header("Location: ../services/update.php?srvc=".$serviceId."&error=eisb&t=$title&st=$subtitle&d=$description&c=$cons&p=$pros");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE user_name=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../services/update.php?srvc=".$serviceId."&error=sqlerror");
                exit(); 
            } else {
                mysqli_stmt_bind_param($stmt, "s", $userName);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){

                    $sql2 = "SELECT services.id, services.title, services.subtitle, services.description, services.pros, services.cons, icon.id AS icon_id, banner.id AS banner_id FROM services INNER JOIN images AS icon ON icon.id = IFNULL(services.id_icon_fk,0) INNER JOIN images AS banner ON banner.id = IFNULL(services.id_banner_fk,0) WHERE services.id= ".$serviceId;
                    $result2 = mysqli_query($conn, $sql2);

                    if (mysqli_num_rows($result2) > 0) {
                        while($row = mysqli_fetch_assoc($result2)) {
                            $iconId = $row['icon_id'];
                            $bannerId = $row['banner_id'];
                        }
                    }

                    //CHECK IF ICON HAS BEEN CHANGED
                    if(file_exists($_FILES["icon"]["tmp_name"])){
                        if($iconId > 0){
                            $sql3 = "UPDATE images SET name=?, system_log=CONCAT(system_log,?) WHERE id=?";
                            $stmt3 = mysqli_stmt_init($conn);
                            if(mysqli_stmt_prepare($stmt3, $sql3)){
                                mysqli_stmt_bind_param($stmt3, "sss",$icon,$system_log_image,$iconId);
                                mysqli_stmt_execute($stmt3);
                                echo "Updating already existing image.";
                                if(!move_uploaded_file($_FILES["icon"]["tmp_name"], $target)){
                                    header("Location: ../services/update.php?srvc=".$serviceId."&error=imgicon");
                                    exit();  
                                }
                            } else {
                                header("Location: ../services/update.php?srvc=".$serviceId."&error=sqlerror");
                                exit(); 
                            }
                        } else {
                            $sql3 = "INSERT INTO images (name,date_registered,system_log) VALUES (?,?,?)";
                            $stmt3 = mysqli_stmt_init($conn);
                            if(mysqli_stmt_prepare($stmt3, $sql3)){
                                mysqli_stmt_bind_param($stmt3, "sss",$icon,$dateRegistered,$system_log_image);
                                mysqli_stmt_execute($stmt3);
                                $iconId = mysqli_insert_id($conn);
                                if(!move_uploaded_file($_FILES["icon"]["tmp_name"], $target)){
                                    header("Location: ../services/update.php?srvc=".$serviceId."&error=imgicon");
                                    exit();  
                                }
                            } else {
                                header("Location: ../services/update.php?srvc=".$serviceId."&error=sqlerror");
                                exit(); 
                            }
                        }
                    }

                    //CHECK IF BANNER HAS BEEN CHANGED
                    if(file_exists($_FILES["banner"]["tmp_name"])){
                        if($bannerId > 0){
                            $sql4 = "UPDATE images SET name=?, system_log=CONCAT(system_log,?) WHERE id=?";
                            $stmt4 = mysqli_stmt_init($conn);
                            if(mysqli_stmt_prepare($stmt4, $sql4)){
                                mysqli_stmt_bind_param($stmt4, "sss",$banner,$system_log_image,$bannerId);
                                mysqli_stmt_execute($stmt4);
                                if(!move_uploaded_file($_FILES["banner"]["tmp_name"], $targetBanner)){
                                    header("Location: ../services/update.php?srvc=".$serviceId."&error=imgbannerupdate");
                                    exit();  
                                }
                            } else {
                                header("Location: ../services/update.php?srvc=".$serviceId."&error=sqlerror");
                                exit(); 
                            }
                        } else {
                            $sql4 = "INSERT INTO images (name,date_registered,system_log) VALUES (?,?,?)";
                            $stmt4 = mysqli_stmt_init($conn);
                            if(mysqli_stmt_prepare($stmt4, $sql4)){
                                mysqli_stmt_bind_param($stmt4, "sss",$banner,$dateRegistered,$system_log_image);
                                mysqli_stmt_execute($stmt4);
                                $bannerId = mysqli_insert_id($conn);
                                if(!move_uploaded_file($_FILES["banner"]["tmp_name"], $targetBanner)){
                                    header("Location: ../services/update.php?srvc=".$serviceId."&error=imgbannerinsert");
                                    exit();  
                                }
                            } else {
                                header("Location: ../services/update.php?srvc=".$serviceId."&error=sqlerror");
                                exit(); 
                            }
                        }
                    }

                    $sql5 = "UPDATE services SET title=?, subtitle=?, description=?, pros=?, cons=?, enabled=?, system_log=CONCAT(system_log,?), id_icon_fk=?, id_banner_fk=? WHERE id=?";
                    $stmt5 = mysqli_stmt_init($conn);

                    if(mysqli_stmt_prepare($stmt5, $sql5)){
                        mysqli_stmt_bind_param($stmt5, "ssssssssss",$title,$subtitle,$description,$pros,$cons,$enabled,$system_log,$iconId,$bannerId,$serviceId);
                        mysqli_stmt_execute($stmt5);
                        header("Location: ../services/update.php?srvc=".$serviceId."&msj=success");
                        exit();
                    } else {
                        header("Location: ../services/update.php?srvc=".$serviceId."&error=sqlerror");
                        exit(); 
                    }

                }
            }
        }
    }

    //DELETING SERVICE
    if(isset($_POST['submit-service-delete'])){

        require 'dbh.inc.php';

        $serviceId = $_POST['id'];
        $userName = $_POST['username'];
        $deleted_logical = true;

        $sql = "SELECT * FROM users WHERE user_name=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../services/update.php?srvc=".$serviceId."&error=sqlerror");
            exit(); 
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $sql2 = "UPDATE services SET deleted_logical=? WHERE id=?";
                $stmt2 = mysqli_stmt_init($conn);

                if(mysqli_stmt_prepare($stmt2, $sql2)){
                    mysqli_stmt_bind_param($stmt2, "ss",$deleted_logical,$serviceId);
                    mysqli_stmt_execute($stmt2);
                    header("Location: ../services/catalog.php?msj=deleted");
                    exit();
                } else {
                    header("Location: ../services/update.php?srvc=".$serviceId."&error=sqlerror");
                    exit(); 
                }
            }
        }
    }
?>