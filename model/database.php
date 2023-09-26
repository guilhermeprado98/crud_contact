<?php
/*
Class de Conexão ao banco de dados
@host
@username
@password
@database
@conn
 */
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = 'admin';
    private $database = 'crud_contact';
    private $conn;

    /*
    Método para conectar ao banco de Dados.
     */
    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die('Erro de conexão com o banco de dados: ' . $this->conn->connect_error);
        }
        return $this->conn;
    }

    public function disconnect()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }

}
