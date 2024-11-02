<?php
class DbConfig 
{   
    private $_host = 'localhost';
    private $_username = 'u626267807_eyecare';
    private $_password = 'Eyecare@1';
    private $_database = 'u626267807_eyecare';
    public $connection;
    
    public function __construct()
    {
        if (!isset($this->connection)) 
        {
        
$this->connection =
 new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        
            if (!$this->connection) {
            echo 'Cannot connect to database server';
            exit;
            }            
        }    
        
       return $this->connection;
    }
}
?>