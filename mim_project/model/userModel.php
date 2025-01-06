<?php

    function getConnection()
    {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'passport_project');
        return $conn;
    }


    function getUser($email, $password, $userType)
    {
        $conn = getConnection();

        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        $table = '';
        if ($userType === 'user')
        {
            $table = 'user_info';
        }
        
        
        if ($userType === 'admin')
        {
            $table = 'admin_info';
        }

        $conn = getConnection();
        $sql = "select * from $table where email='{$email}' and password='{$password}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count==1)
        {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['name'] =$user['full_name'];
            return true;
        }

        else
        {
            return false;
        }
    }

    function login($email, $password)
    {
        $conn = getConnection();
        $sql = "select * from user_info where email='{$email}' and password='{$password}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count==1)
        {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['name'] = $user['full_name'];
            return true;
        }

        else
        {
            return false;
        }
    }

    function addUser($first_name, $last_name, $email, $phone, $nid, $pass, $dob, $gender, $address, $med_history, $emergency_contact)
    {
        $conn = getConnection();
        $sql = "insert into user_info VALUES('{$first_name}', '{$last_name}', '{$email}', '{$phone}', '{$nid}', '{$pass}', '{$dob}', '{$gender}' , '{$address}', '{$med_history}', '{$emergency_contact}')";
        if(mysqli_query($conn, $sql))
        {
            return true;
        }
        
        else
        {
            return false;
        }
    }

    function getUserProfile($email)
    {
        $conn = getConnection();
        $sql = "SELECT * FROM user_info WHERE email='{$email}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            return mysqli_fetch_assoc($result);
        }

        return null;
    }


    function updateUserPassword($email, $currentPassword, $newPassword)
    {
        $conn = getConnection();
        $sql = "SELECT * FROM user_info WHERE email='{$email}' AND password='{$currentPassword}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $updateSql = "UPDATE user_info SET password='{$newPassword}' WHERE email='{$email}'";
            if (mysqli_query($conn, $updateSql)) {
                return true;
            }
        }

        return false;
    }




    


?>