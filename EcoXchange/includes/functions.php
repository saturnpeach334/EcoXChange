<?php

//Details not fill :signup.php
function emptyInputSignup($email, $username, $pwd, $pwdRepeat) {
  $result = false;
  if(empty($email || empty($username) || empty($pwd) || empty($pwdRepeat))) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

//Username string :signup.php
function invalidUid($username) {
  $result = false;
  if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

//email not in email format :signup.php
function invalidEmail($email) {
  $result = false;
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

//password not the same for confirmed password :signup.php
function pwdMatch($pwd, $pwdRepeat) {
  $result = false;
  if($pwd !== $pwdRepeat) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
//Check if the login details is empty :Log In.php
function emptyInputLogin($username, $pwd) {
  $result = false;
  if(empty($username) || empty($pwd)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
//Check if the username already being used :signup.php
function uidExists($conn, $username, $email) {
  $sql = "SELECT * FROM customer WHERE cust_ID = ? OR cust_email = ?;";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../pages/signup.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function loginUser($conn, $username, $pwd) {
  $uidExists = uidExists($conn, $username, $username);

  if($uidExists === false) {
    header("location: ../pages/login.php?error=invalidusernameorpwd");
    exit();
  }

  $pwdHashed = $uidExists["usersPwd"];
  $checkPwd = password_verify($pwd, $pwdHashed);

  if($checkPwd === false) {
    header("location: ../pages/login.php?error=invalidpassword");
    exit();
  }
  else if($checkPwd === true) {

    include ("fetchUserData.php");

    if($_SESSION["role"] == "Customer") {

      header("location: ../pages/dashboard-1.php?action=loginsuccess");
      exit();
    }
    else if($_SESSION["role"] == "Staff") {

      header("location: ../pages/dashboard-2.php?action=loginsuccess");
      exit();
    }
  }
}


function insertUserContact($conn, $address, $postcode, $city, $phone, $state ,$userId) {
  $sql = "INSERT INTO userscontact (address, postcode, city, phoneNum, stateId, usersId)
  VALUES (?,?,?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../php/accounts?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ssssss", $address, $postcode, $city, $phone, $state, $userId);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("location: ../php/accounts?action=insertsuccess");
  exit();
}

function updateUserContact($conn, $address, $postcode, $city, $phone, $state, $userId) {

  $sql = "UPDATE userscontact SET address=?, postcode=?, city=?, phoneNum=?, stateId=? WHERE usersId=?;";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../php/accounts?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ssssss", $address, $postcode, $city, $phone, $state, $userId);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("location: ../php/accounts?action=updatesuccess");
  exit();
}




function deleteUser($conn,$userid) {
  $sql = "DELETE FROM users WHERE usersId = ?";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../php/users?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $userid);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("location: ../php/users?action=deletesuccess");
  exit();
}

function insertOrd($conn, $size, $quantity, $orderCode, $productCode) {
  $sql = "INSERT INTO ord (size, quantity, orderCode, productCode)
  VALUES (?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../php/invoice?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ssss", $size, $quantity, $orderCode, $productCode);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function insertOrders($conn,$orderCode,$orderDate,$orderTime,$total,$usersId) {
  $sql = "INSERT INTO orders (orderCode, orderDate, orderTime, orderPrice, usersId, statusId)
  VALUES (?,?,?,?,?,1);";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../php/invoice?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sssss", $orderCode, $orderDate, $orderTime, $total, $usersId);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}
