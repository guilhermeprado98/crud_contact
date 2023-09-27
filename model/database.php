<?php
/**
 * Classe Database
 *
 * @package Model
 */
class Database
{
    /**
     * @var string O endereço do host do banco de dados.
     */
    private $host = 'localhost';

    /**
     * @var string O nome de usuário do banco de dados.
     */
    private $username = 'root';

    /**
     * @var string A senha do banco de dados.
     */
    private $password = 'admin';

    /**
     * @var string O nome do banco de dados.
     */
    private $database = 'crud_contact';

    /**
     * @var conn A conexão com o banco de dados.
     */
    private $conn;

    /**
     * Estabelece a conexão com o banco de dados.
     *
     * @return conn A conexão estabelecida.
     */
    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die('Erro de conexão com o banco de dados: ' . $this->conn->connect_error);
        }
        return $this->conn;
    }

    /**
     * Desconecta do banco de dados, se houver uma conexão.
     */
    public function disconnect()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }

}
