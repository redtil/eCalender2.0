<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: rediet-->
<!-- * Date: 2/24/2016-->
<!-- * Time: 4:32 PM-->
<!-- */-->
<?php
include 'Users.php';

class Task{
    private static $pdo;
    private static $userid;

    public function __construct(){
        self::$pdo = Database::connect();
    }
    public static function create($username){
        $instance = new Task();
        $userObj = new User();
        $instance::$userid= $userObj::getUserDetails($username,"id");
        return $instance;
    }

    public static function insert($task,$startTime,$endTime,$date){
        $query = 'insert into tasks (task,userid,startTime,endTime,dateTask) values (?,?,?,?,?)';
        $queryPrepared = self::$pdo->prepare($query);
        $queryPrepared->execute(array($task,self::$userid,$startTime,$endTime,$date));
    }
    public static function delete($taskid){
        $query = "delete from tasks where id=?";
        $queryPrepared = self::$pdo->prepare($query);
        $queryPrepared->execute(array($taskid));
    }
    public static function update(){

    }
    public static function getTaskDetails($taskid,$detail){
        $query = "select * from tasks where id = '$taskid'";
        $queryPrepared = self::$pdo->prepare($query);
        $queryPrepared->execute(array($taskid));

        while($row = $queryPrepared->fetch()){
            return $row[$detail];
        }
    }
}
?>