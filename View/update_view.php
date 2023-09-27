<?php
require_once '../Controller/classContact.php';
?>

<!DOCTYPE html>
<html>

<head>
   <title>Editar Contato</title>
   <link rel="stylesheet" href="../include/css/bootstrap.min.css">
   <link rel="stylesheet" href="../include/css/style.css">
   <script src="../include/js/jquery-3.7.1.min.js"></script>
   <script src="../include/js/bootstrap.bundle.min.js"></script>
   <style>
   </style>
   <script>
   function formatarData() {
      const dataNascimentoInput = document.getElementById('dataNascimento');
      const dataNascimento = dataNascimentoInput.value;

      const regex = /^(\d{2})\/(\d{2})\/(\d{4})$/;
      if (!regex.test(dataNascimento)) {
         alert('Formato de data inválido. Use dd/mm/aaaa.');
         return;
      }

      const [, dia, mes, ano] = regex.exec(dataNascimento);
      const dataFormatada = `${dia}/${mes}/${ano}`;
      dataNascimentoInput.value = dataFormatada;
   }

   function validarEmail() {
      const emailInput = document.getElementById('email');
      const email = emailInput.value;

      const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!emailRegex.test(email)) {
         alert('Formato de e-mail inválido. Use o formato seuemail@seuprovedor.com.');
         return;
      }
   }

   function highlightLabel(input) {
      const label = input.parentElement.querySelector('label');
      if (label) {
         label.classList.add('highlight');
      }
   }


   function unhighlightLabel(input) {
      const label = input.parentElement.querySelector('label');
      if (label) {
         label.classList.remove('highlight');
      }
   }
   </script>
</head>

<body>
   <?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $contact_id = $_GET['id'];

    $contactController = new Contact();
    $contactData = $contactController->getDataContact($contact_id);
} else {
    echo "ID do contato não fornecido.";
}

?>


   <div class="header">
      <img src="../assets/logo_alphacode.png" class="logo-header"></img>
      <span class="span-title">Editar Contato</span>
   </div>

   <form method="post" action="../Controller/Contact/update_contact.php?id=<?=$contactData[0]['id']?>"
      style="margin-top: 50px;">
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="nomeCompleto">Nome Completo</label>
            <input type="text" class="form-control" value="<?=$contactData[0]['contact_name']?>" name="nomeCompleto"
               onfocus="highlightLabel(this)" onblur="unhighlightLabel(this)">
         </div>
         <div class="form-group col-md-6">
            <label for="dataNascimento">Data de Nascimento</label>
            <input type="text" class="form-control"
               value="<?=date('d/m/Y', strtotime($contactData[0]['contact_datebirth']))?>" name="dataNascimento"
               onblur="formatarData()" onkeypress="if(event.keyCode==13) { formatarData(); return false; }"
               onfocus="highlightLabel(this)" onblur="unhighlightLabel(this)">
         </div>
      </div>
      <div class="form-row">

         <div class="form-group col-md-6">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" value="<?=$contactData[0]['contact_email']?>" name="email"
               placeholder="Ex.: leticia@gmail.com" onfocus="highlightLabel(this)" onblur="unhighlightLabel(this)"
               required>
         </div>
         <div class="form-group col-md-6">
            <label for="profissao">Profissão</label>
            <input type="text" class="form-control" value="<?=$contactData[0]['contact_profession']?>" name="profissao"
               onfocus="highlightLabel(this)" onblur="unhighlightLabel(this)">
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="celular">Celular para Contato</label>
            <input type="tel" class="form-control" value="<?=$contactData[0]['contact_phone']?>" name="celular"
               onfocus="highlightLabel(this)" onblur="unhighlightLabel(this)">
         </div>
         <div class="form-group col-md-6">
            <label for="telefone">Telefone para Contato</label>
            <input type="tel" class="form-control" value="<?=$contactData[0]['contact_telephone']?>" name="telefone"
               onfocus="highlightLabel(this)" onblur="unhighlightLabel(this)">
         </div>
      </div>

      <div class="form-row">
         <div class="form-group col-md-6">
            <input class="form-check-input" type="checkbox" <?=$contactData[0]['phone_whatsapp'] == 1 ? 'checked' : ''?>
               value="1" name="flexCheckDefault1">
            <label class="form-check-label" for="flexCheckDefault1">
               Número de celular possui Whatsapp
            </label>
         </div>

         <div class="form-group col-md-6">
            <input class="form-check-input" type="checkbox"
               <?=$contactData[0]['send_notification_email'] == 1 ? 'checked' : ''?> value="1" name="flexCheckDefault2">
            <label class="form-check-label" for="flexCheckDefault2">
               Enviar notificações por E-mail
            </label>
         </div>
      </div>

      <div class="form-row">
         <div class="form-group col-md-6">
            <input class="form-check-input" type="checkbox"
               <?=$contactData[0]['send_notification_sms'] == 1 ? 'checked' : ''?> value="1" name="flexCheckDefault3">
            <label class="form-check-label" for="flexCheckDefault3">
               Enviar notificações por SMS
            </label>
         </div>
      </div>


      <button type="submit" class="btn btn-primary">Editar Contato</button>
   </form>
   <a href="../index.php"><button type="submit" class="btn btn-secondary">Voltar</button></a>

   <footer class="footer">
      <div class="div-footer">
         <div id="text-footer" style="margin-left:30px; font-weight: 500;">Termos | Políticas</div>
         <div id="text-footer" style="font-weight: 500;">© Copyright 2022 | Desenvolvido por<img
               src="../assets/logo_rodape_alphacode.png" width="20%"></img></div>
         <div id="text-footer" style="margin-right:20px; font-weight: 500;">© Alphacode IT Solutions
            2022</div>
      </div>
   </footer>
</body>
