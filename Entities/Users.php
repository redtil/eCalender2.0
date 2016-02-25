<!--/**-->
<!--* Created by PhpStorm.-->
<!--* User: rediet-->
<!--* Date: 2/24/2016-->
<!--* Time: 4:32 PM-->
<!--*/-->
<?php
   include(__DIR__."/../functions/db_access.php");
class User{
        private static $pdo;

        public function __construct(){
            self::$pdo = Database::connect();
        }
       public static function insert($username,$encrypted_password,$email){
           $query = "select * from users where username = '$username'";
           $queryPrepared = self::$pdo->prepare($query);
           $queryPrepared->execute(array($username));
//           $sQuery = "select * from users WHERE username = '$username'";
           while($row = $queryPrepared->fetch()) {
               Print  '<script> alert("This username is already used by another user.") </script>';
               Print '<script> window.location.assign("../pages/register.php"); </script>';
               exit;
           }

           $eQuery = "select * from users where email = '$email'";
           $eQueryPrepared = self::$pdo->prepare($eQuery);
           $eQueryPrepared->execute(array($email));
           while( $row = $eQueryPrepared->fetch()){
               Print  '<script> alert("This email address is already used by another user.") </script>';
               Print '<script> window.location.assign("../pages/register.php"); </script>';
               exit;
           }

           $iQuery = 'insert into users (username, password, email) values (?,?,?)';
           $iQueryPrepare = self::$pdo->prepare($iQuery);
           $iQueryPrepare->execute(array($username,$encrypted_password,$email));

           $_SESSION["username"] = $username;
       }
       public static function delete(){

       }
       public static function update(){

       }
       public static function getUserDetails($username,$detail){
           $query = "select * from users where username = '$username'";
           $queryPrepared = self::$pdo->prepare($query);
           $queryPrepared->execute(array($username));

           while($row = $queryPrepared->fetch()){
               return $row[$detail];
           }
       }

       public static function checkPassword($username,$password,$rowPassword){
           echo " I am in checkPassword";
           if(crypt($password,$rowPassword) == $rowPassword){
               $_SESSION["username"] = $username;
               header('location:../index.php?date=today');
           }
           else{
               Print '<script> alert("Password is incorrect") </script>';
               Print '<script> window.location.assign("../pages/login.php")</script>';
               exit;
           }
       }
    }
?>
