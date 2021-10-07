<?php

    include "conn.php";

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $retry_pass = md5($_POST['retry-password']);
    $minat = $_POST['minat'];

    if (empty($nama)) {
        header("location: ../../views/register-portal.php?message=empty_name");
    }
    else if (empty($alamat)) {
        header("location: ../../views/register-portal.php?message=empty_address");
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../../views/register-portal.php?message=wrong_email");
    }
    else if (empty($telp)) {
        header("location: ../../views/register-portal.php?message=empty_number");
    }
    else if (empty($username)) {
        header("location: ../../views/register-portal.php?message=empty_username");
    }
    else if (empty($password)) {
        header("location: ../../views/register-portal.php?message=empty_password");
    }
    else if (empty($retry_pass)) {
        header("location: ../../views/register-portal.php?message=empty_password_retry");
    }
    else if ($minat == "null") {
        header("location: ../../views/register-portal.php?message=wrong_minat");
    }
    else if ($password != $retry_pass) {
        header("location: ../../views/register-portal.php?message=incorrect_password");
    }
    else {
        $cek_duplicate = mysqli_query($connect, "SELECT * FROM karyawan WHERE username = '$username' ");
        $count = mysqli_num_rows($cek_duplicate);

        if ($count==0) {
            $generateID = "PGW".uniqid();
            $status;

            if ($minat == "admin") {
                $status = "verified";
            } else if ($minat == "karyawan") {
                $status = "unverified"; // wait for verified by admin
            }

            $changeName = strtoupper($nama);
            $query = mysqli_query($connect, "INSERT INTO karyawan (id_pgw, nama, alamat, gender, email, telp, username, password, level, status) VALUES
            ('$generateID', '$changeName', '$alamat', '$gender', '$email', '$telp', '$username', '$password', '$minat', '$status')");

            if ($query) {
                header("location: ../../views/login-portal.php?message=register_success");
            } else {
                header("location: ../../views/register-portal.php?message=gagal_simpan");
            }
            
        } else {
            header("location: ../../views/register-portal.php?message=user_not_available");
        }
    }

?>