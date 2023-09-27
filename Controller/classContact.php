<?php
require_once __DIR__ . '/../Model/database.php';

/**
 * Classe Contact
 * @package Model
 */
class Contact
{
    /**
     * @var conn A conexão com o banco de dados.
     */
    private $conn;

    /**
     * Construtor da classe Contact.
     */
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    /**
     * Obtém todos os contatos do banco de dados.
     *
     * @return array Um array contendo os contatos encontrados no banco de dados.
     */
    public function getContacts()
    {
        $dados = array();

        $sql = "SELECT * FROM contact";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dados[] = $row;
            }
        }

        return $dados;
    }
    /**
     * Obtém os dados de um contato com base no seu ID.
     *
     * @param int $id O ID do contato a ser buscado.
     * @return array Um array contendo os dados do contato encontrado, ou um array vazio se não for encontrado.
     */
    public function getDataContact($id)
    {
        $dados = array();

        $sql = "SELECT * FROM contact where id = $id";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dados[] = $row;
            }
        }

        return $dados;
    }
}
