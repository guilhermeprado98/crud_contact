<?php
require_once '../../Model/database.php';

class UpdateController
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function updateContact($contact_id, $contact_name, $contact_datebirth, $contact_email, $contact_phone, $phone_whatsapp, $send_notification_email, $send_notification_sms, $contact_telephone, $contact_profession)
    {
        $contact_datebirth = date('Y-m-d', strtotime(str_replace('/', '-', $contact_datebirth)));

        $stmt = $this->conn->prepare("UPDATE contact
        SET contact_name = ?,
            contact_datebirth = ?,
            contact_email = ?,
            contact_phone = ?,
            phone_whatsapp = ?,
            send_notification_email = ?,
            send_notification_sms = ?,
            contact_telephone = ?,
            contact_profession = ?
        WHERE id = ?");

        if (!$stmt) {
            echo "<script>alert('ERRO AO ATUALIZAR CONTATO: " . $this->conn->error . "');
window.location.href = '../../index.php';
</script>";
        }

        $stmt->bind_param("ssssiissii", $contact_name, $contact_datebirth, $contact_email, $contact_phone, $phone_whatsapp, $send_notification_email, $send_notification_sms, $contact_telephone, $contact_profession, $contact_id);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "<script>alert('ERRO AO ATUALIZAR CONTATO: " . $stmt->error . "');
window.location.href = '../../index.php';
</script>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $contact_id = $_GET['id'];
    $contact_name = $_POST['nomeCompleto'];
    $contact_datebirth = $_POST['dataNascimento'];
    $contact_email = $_POST['email'];
    $contact_profession = $_POST['profissao'];
    $contact_phone = $_POST['celular'];
    $phone_whatsapp = isset($_POST['flexCheckDefault1']) ? 1 : 0; // 1 se marcado, 0 se não marcado
    $send_notification_email = isset($_POST['flexCheckDefault2']) ? 1 : 0; // 1 se marcado, 0 se não marcado
    $send_notification_sms = isset($_POST['flexCheckDefault3']) ? 1 : 0; // 1 se marcado, 0 se não marcado
    $contact_telephone = $_POST['telefone'];

    $contactController = new UpdateController();

    if ($contactController->updateContact($contact_id, $contact_name, $contact_datebirth, $contact_email, $contact_phone, $phone_whatsapp, $send_notification_email, $send_notification_sms, $contact_telephone, $contact_profession)) {
        echo "<script>alert('CONTATO ATUALIZADO COM SUCESSO!');
       window.location.href = '../../index.php';
       </script>";
    } else {
        echo "<script>alert('ERRO AO ATUALIZAR CONTATO: " . $stmt->error . "');
   window.location.href = '../../index.php';
   </script>";
    }
}
