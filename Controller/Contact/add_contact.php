<?php
require_once '../../Model/database.php';

class ContactController
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function addContact($contact_name, $contact_datebirth, $contact_email, $contact_phone, $phone_whatsapp, $send_notification_email, $send_notification_sms, $contact_telephone)
    {
        $contact_datebirth = date('Y-m-d', strtotime(str_replace('/', '-', $contact_datebirth)));

        $stmt = $this->conn->prepare("INSERT INTO contact (contact_name, contact_datebirth, contact_email, contact_phone, phone_whatsapp, send_notification_email, send_notification_sms, contact_telephone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {

            echo "<script>alert('ERRO AO CADASTRAR CONTATO: " . $this->conn->error . "');
            window.location.href = '../../index.php';
            </script>";
        }

        $stmt->bind_param("ssssiiss", $contact_name, $contact_datebirth, $contact_email, $contact_phone, $phone_whatsapp, $send_notification_email, $send_notification_sms, $contact_telephone);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "<script>alert('ERRO AO CADASTRAR CONTATO: " . $stmt->error . "');
            window.location.href = '../../index.php';
            </script>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $contact_name = $_POST['nomeCompleto'];
    $contact_datebirth = $_POST['dataNascimento'];
    $contact_email = $_POST['email'];
    $contact_phone = $_POST['celular'];
    $phone_whatsapp = isset($_POST['flexCheckDefault1']) ? 1 : 0; // 1 se marcado, 0 se não marcado
    $send_notification_email = isset($_POST['flexCheckDefault2']) ? 1 : 0; // 1 se marcado, 0 se não marcado
    $send_notification_sms = isset($_POST['flexCheckDefault3']) ? 1 : 0; // 1 se marcado, 0 se não marcado
    $contact_telephone = $_POST['telefone'];

    $contactController = new ContactController();

    if ($contactController->addContact($contact_name, $contact_datebirth, $contact_email, $contact_phone, $phone_whatsapp, $send_notification_email, $send_notification_sms, $contact_telephone)) {
        echo "<script>alert('CONTATO CADASTRADO COM SUCESSO!');
        window.location.href = '../../index.php';
        </script>";
    } else {
        echo "<script>alert('ERRO AO CADASTRAR CONTATO: " . $stmt->error . "');
    window.location.href = '../../index.php';
    </script>";
    }
}
