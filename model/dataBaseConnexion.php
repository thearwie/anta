<?php
/**
 * Connexion à la base de données 
 */

class Database 
{
  private $connection;
  private $database;
  private $config = [
    'url' => 'localhost',
    'username' => 'viauma',
    'password' => 'rurove',
    'database' => 'viauma'];
    
  public function __construct()
  {
    $this->connect();
  }
  
  public function connect()
  {
    $this->connection = mysqli_connect($this->config['url'], $this->config['username'], $this->config['password'], $this->config['database']);
    if (!$this->connection) 
    {
      die('Impossible de se connecter : ' . mysqli_error());
    }
    
    mysqli_query($this->connection, "SET NAMES 'utf8'");
  }

  public function query($query)
  {
    return mysqli_query($this->connection, $query);
  }
  
  public function close()
  {
    mysqli_close($this->connection);
  }
    
};