<?php
require_once '../../Model/database.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $contact_id = $_GET['id'];

    $db = new Database();
    $conn = $db->connect();

    $sql = "DELETE FROM contact WHERE id = $contact_id";

    if ($conn->query($sql) === true) {
        echo "<script>alert('CONTATO EXCLUÍDO COM SUCESSO!');
      window.location.href = '../../index.php';
      </script>";
    } else {
        echo "<script>alert('ERRO AO EXCLUIR CONTATO: $conn->error;');
      window.location.href = '../../index.php';
      </script>";

    }

    $db->disconnect();
} else {
    echo "ID do contato não fornecido.";
}
