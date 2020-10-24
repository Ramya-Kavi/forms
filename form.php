<?php
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $confirmpassword=$_POST['confirm-password'];
  $mobilenumber=$_POST['mobile-number'];

  //Db connection
  //$hostname='localhost';
  //$dbname='form_db';
  //$username='root';
  //$password="mysql";

  $conn = new mysqli('localhost','root','mysql','form_db');
  if($conn->connect_error){
      die('connection failed :'.$conn->connect_error);
  }else{
      $stmt= $conn->prepare("insert into registration(name,email,password,confirmpassword,mobilenumber) values(?,?,?,?,?)");
      $stmt->bind_param("ssssi",$name,$email,$password,$confirmpassword,$mobilenumber);
      $stmt->execute();
      echo "Registration successfull..";
      $stmt->close();
      $conn->close();
  }

  ?>
