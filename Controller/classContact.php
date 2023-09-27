<?php
require_once __DIR__ . '/../Model/database.php';

class Contact
{
    private $conn;

    public function __construct()
    {

        $db = new Database();
        $this->conn = $db->connect();
    }

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
