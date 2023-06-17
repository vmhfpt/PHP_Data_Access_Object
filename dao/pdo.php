<?php
   function pdo_get_connetion(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
      $conn = new PDO("mysql:host=$servername;dbname=assignment", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return ($conn);
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
   }
   function pdo_execute($sql){
      $sql_args = array_slice(func_get_args(), 1);
     
      try{
         $conn = pdo_get_connetion();
         $stmt = $conn->prepare($sql);
         $stmt->execute($sql_args);
      }
      catch(PDOException $e) {
         throw $e;
      }
      finally{
        unset($conn);
      }
   }
   function pdo_query($sql){
      $sql_args = array_slice(func_get_args(), 1);
     
       try{
          $conn = pdo_get_connetion();
          $stmt = $conn->prepare($sql);
          $stmt->execute($sql_args);
          $rows = $stmt->fetchAll();
          return ($rows);
       }
       catch(PDOException $e) {
          throw $e;
       }
       finally{
         unset($conn);
       }
   }
   function pdo_query_one($sql){
      $sql_args = array_slice(func_get_args(), 1);
      try{
         $conn = pdo_get_connetion();
         $stmt = $conn->prepare($sql);
         $stmt->execute($sql_args);
         $rows = $stmt->fetch(PDO::FETCH_ASSOC);
         return ($rows);
      }
      catch(PDOException $e) {
         throw $e;
      }
      finally{
        unset($conn);
      }
   }
   function pdo_query_get_lastId($sql){
      $sql_args = array_slice(func_get_args(), 1);
      try{
         $conn = pdo_get_connetion();
         $stmt = $conn->prepare($sql);
         $stmt->execute($sql_args);
         return ($conn->lastInsertId());
      }
      catch(PDOException $e) {
         throw $e;
      }
      finally{
        unset($conn);
      }
   }
   function pdo_query_value($sql) {
      $sql_args =array_slice(func_get_args(),1);
      try {
          $conn = pdo_get_connetion();
          $stmt = $conn->prepare($sql);
          $stmt->execute($sql_args);
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          return array_values($row)[0];
      }
      catch(PDOException $e) {
          throw $e;
      }
      finally {
          unset($conn);
      }
  }
  function pdo_query_get_total($sql){
   $sql_args = array_slice(func_get_args(), 1);
   try{
      $conn = pdo_get_connetion();
      $stmt = $conn->prepare($sql);
      $stmt->execute($sql_args);
      $stmt->fetchAll();
      $count = $stmt->rowCount();
      return ($count);
   }
   catch(PDOException $e) {
      throw $e;
   }
   finally{
     unset($conn);
   }
  }
?>