<?php
/*
 * PDO CLASS
 * CONNECT TO THE DATABASE
 * CREATE PREPARED STATEMENT
 * BIND VALUES
 * RETUEN ROWS AND RESULT
 */

class Database
{

    // Private Properties
    private $host = HOST;
    private $user = USER;
    private $password = PASSWORD;
    private $db = DB;

    // DBH
    private $dbh;
    // STATEMENT
    private $statement;
    // ERROR 
    private $error;

    // DEFAULT CONSTRUCTOR
    public function __construct()
    {
        // GET DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
        // OPTIONAL
        $option = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            // Create the PDO instance
            $this->dbh = new PDO($dsn, $this->user, $this->password, $option);
        } catch (PDOException $px) {
            //throw extion
            $this->error = $px->getMessage();
            echo $this->error;
        }
    }

    // PREPARE STATEMENT WITH QUERY
    public function query($sql)
    {
        $this->statement = $this->dbh->prepare($sql);
    }

    // BIND THE VALUES
    public function bind($param, $value, $type = null)
    {

        // CHECK THE VALUE IS NULL
        if (is_null($type)) {
            // CHECK THE VALUE TYPE AND SET THE VALUE TYPE TO $type
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                    $type = PDO::PARAM_STR;
            }
            $this->statement->bindValue($param, $value, $type);
        }
    }

    // EXECUTE THE STATEMENT
    public function execute()
    {
        $execute = $this->statement->execute();
        return $execute;
    }
    // GET THE RESULT SET AS ARRAY OF OBJECT
    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }
    // FETCH A SINGLE ROW AS OBJECT
    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }
    // RETURN THE ROW NUMBER
    public function rowCount()
    {
        return $this->statement->rowCount();
    }
}
