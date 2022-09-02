<?php
    require_once("configdb.php");
class connection{
    //Atributos importantes en la conexión de la base de datos
    private $db_host;
    private $db_user;
    private $db_pass;
    protected $db_name;
    private $db_charset;
    public $conn;

    public function __construct(){
        $this->db_host = constant('BD_HOST');
        $this->db_user = constant('BD_USER');
        $this->db_pass = constant('BD_PASSWORD');
        $this->db_name= constant('BD_NAME');
        $this->db_charset = constant('BD_CHARSET');
    }
    
    //Método para la conexion a la base de datos 
    
    public function db_open(){
        try{
            $connection = "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name . ";charset=" . $this->db_charset;
            $options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES=>false];
            $conn = new PDO($connection, $this->db_user, $this->db_pass, $options);
            return $conn;
        }catch (PDOException $e){
            print_r($e->getMessage());
        }
    }
    
}
?>