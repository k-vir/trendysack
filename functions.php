<?php
function empty_input_signup($firstname, $lastname, $username, $email, $password, $rpt_password) {
    $result;
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($rpt_password)){
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}

function invalid_uid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}

function invalid_email($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}

function pwd_match($password, $rpt_password) {
    $result;
    if ($password !== $rpt_password){
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}

function uid_exists($conn, $username, $email) {
    $sql = "SELECT * FROM registered_users WHERE reg_user_name = ?  OR reg_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit(); 
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result_data)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function create_user($conn, $firstname, $lastname, $username, $email, $password, $current_time) {
    $sql = "INSERT INTO registered_users (reg_first_name, reg_last_name, reg_user_name, reg_email, reg_password, reg_time) values (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }

        # hashing the password
        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
        

        mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $username, $email, $hashed_pwd, $current_time);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ../login");
        exit();

}

function empty_input_login($username, $password) {
    $result;
    if (empty($username) || empty($password)){
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}

function login_user($conn, $username, $password) {
    $uid_exists = uid_exists($conn, $username, $username);

    if ($uid_exists === false) {
        header("Location: ../login.php?error=usernotexist");
        exit();
    }

    $hashed_pwd = $uid_exists["reg_password"];
    $check_pwd = password_verify($password, $hashed_pwd);

    if ($check_pwd === false) {
        header("Location: ../login.php?error=wrongpwd");
        exit();
    }
    elseif ($check_pwd === true) {
        session_start();
        $_SESSION["userid"] = $uid_exists["reg_id"];
        $_SESSION["useruid"] = $uid_exists["reg_user_name"];
        header("Location: ../");
        exit();
    }
}

function tmp_user_exists($conn, $tmp_user_folder) {
    $sql = "SELECT * FROM tmp_user_detail WHERE folder_location = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../jpgtopng.php?error=stmtfailed");
        exit(); 
    }
    mysqli_stmt_bind_param($stmt, "s", $tmp_user_folder);
    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result_data)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function login_tmp_user($conn, $tmp_user_folder) {
    $tmp_uid_exists = tmp_user_exists($conn, $tmp_user_folder);

    if ($result === false) {
        header("Location: ../jpgtopng.php?error=servererror");
        exit();
    }
    elseif($result === true){
        session_start();
        $_SESSION["user"] = $row["username"];
        $_SESSION["folder"] = $row["folder_location"];
    }
    
}

### contact us page
function empty_input_contact($firstname, $email, $contact_type, $message) {
    $result;
    if (empty($firstname) || empty($email) || empty($contact_type) || empty($message)){
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}

function get_msg($conn, $firstname, $lastname, $email, $mobile, $contact_type, $message, $current_time) {

    $sql = "INSERT INTO contact_us (first_name, last_name, email, mobile_no, message_typ, message, time) values (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "sssisss", $firstname, $lastname, $email, $mobile, $contact_type, $message, $current_time);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ../contact");
        exit();

}

## included in admin login page
function get_safe_value($conn,$str){
    if(($str!='')){
        return mysqli_real_escape_string($conn,$str);
    }
}