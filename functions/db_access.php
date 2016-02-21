<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/2/2016-->
<!-- * Time: 3:37 PM-->
<!-- */-->

<?php
class Database
{
    //TODO: save the username and password as an environment variable.
    private static $dbName = 'eCalendar2.0' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';

    private static $cont  = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through whole application
        if ( null == self::$cont )
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }

    public static function insert(){

    }

    public static function delete(){

    }

    public static function update(){

    }

    public static function getUserDetails($username,$detail){
        $pdo= self::connect();
        $query = "select * from users where username = '$username'";
        $queryPrepared = $pdo->prepare($query);
        $queryPrepared->execute(array($username));

        while($row = $queryPrepared->fetch()){
            return $row[$detail];
        }
    }
}
?>
