<!DOCTYPE html>
<html>

<head>
   <title>Gerenciamento de Contatos</title>
   <link rel="stylesheet" href="include/css/bootstrap.min.css">
   <link rel="stylesheet" href="include/css/style.css">
   <script src="include/js/jquery-3.7.1.min.js"></script>
   <script src="include/js/bootstrap.bundle.min.js"></script>
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
   </script>
</head>

<body>


   <form method="post" action="Controller/Contact/update_contact.php">
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="nomeCompleto">Nome Completo</label>
            <input type="text" class="form-control" name="nomeCompleto" placeholder="Ex.: Letícia Pacheco dos Santos"
               required>
         </div>
         <div class="form-group col-md-6">
            <label for="dataNascimento">Data de Nascimento</label>
            <input type="text" class="form-control" name="dataNascimento" placeholder="Ex.: 03/10/2003"
               onblur="formatarData()" onkeypress="if(event.keyCode==13) { formatarData(); return false; }" required>
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" placeholder="Ex.: leticia@gmail.com"
               onblur="validarEmail()" required>
         </div>
         <div class="form-group col-md-6">
            <label for="profissao">Profissão</label>
            <input type="text" class="form-control" name="profissao" placeholder="Ex.: Desenvolvedora Web" required>
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="celular">Celular para Contato</label>
            <input type="tel" class="form-control" name="celular" placeholder="Ex.: (11) 98493-2039" required>
         </div>
         <div class="form-group col-md-6">
            <label for="telefone">Telefone para Contato</label>
            <input type="tel" class="form-control" name="telefone" placeholder="Ex.: (11) 4033-2019" required>
         </div>
      </div>

      <div class="form-row">
         <div class="form-group col-md-6">
            <input class="form-check-input" type="checkbox" value="" name="flexCheckDefault1">
            <label class="form-check-label" for="flexCheckDefault1">
               Número de celular possui Whatsapp
            </label>
         </div>

         <div class="form-group col-md-6">
            <input class="form-check-input" type="checkbox" value="" name="flexCheckDefault2">
            <label class="form-check-label" for="flexCheckDefault2">
               Enviar notificações por E-mail
            </label>
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
            <input class="form-check-input" type="checkbox" value="" name="flexCheckDefault3">
            <label class="form-check-label" for="flexCheckDefault3">
               Enviar notificações por SMS
            </label>
         </div>
      </div>

      <button type="submit" class="btn btn-primary">Editar Contato</button>
   </form>


</body>
