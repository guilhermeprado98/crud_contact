<?php

require_once 'Controller/classContact.php';
require_once 'Model/database.php';

?>

<!DOCTYPE html>
<html>

<head>
   <title>Gerenciamento de Contatos</title>
   <link rel="stylesheet" href="include/css/bootstrap.min.css">
   <link rel="stylesheet" href="include/css/style.css">
   <script src="include/js/jquery-3.7.1.min.js"></script>
   <script src="include/js/bootstrap.bundle.min.js"></script>

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
   <div class="header">
      <img src="assets/logo_alphacode.png" class="logo-header"></img>
      <span class="span-title">Cadastro de Contatos</span>
   </div>
   <div class="container">
      <form method="post" action="Controller/Contact/add_contact.php">
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="nomeCompleto">Nome Completo</label>
               <input type="text" class="form-control" name="nomeCompleto" placeholder="Ex.: Letícia Pacheco dos Santos"
                  onfocus="highlightLabel(this)" onblur="unhighlightLabel(this)" required>
            </div>
            <div class="form-group col-md-6">
               <label for="dataNascimento">Data de Nascimento</label>
               <input type="text" class="form-control" name="dataNascimento" placeholder="Ex.: 03/10/2003"
                  onfocus="highlightLabel(this)" onblur="unhighlightLabel(this)" required>
            </div>
         </div>

         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="email">E-mail</label>
               <input type="email" class="form-control" name="email" placeholder="Ex.: leticia@gmail.com"
                  onfocus="highlightLabel(this)" onblur="unhighlightLabel(this)" required>
            </div>
            <div class="form-group col-md-6">
               <label for="profissao">Profissão</label>
               <input type="text" class="form-control" name="profissao" placeholder="Ex.: Desenvolvedora Web"
                  onfocus="highlightLabel(this)" onblur="unhighlightLabel(this)" required>
            </div>
         </div>

         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="celular">Celular para Contato</label>
               <input type="tel" class="form-control" name="celular" placeholder="Ex.: (11) 98493-2039"
                  onfocus="highlightLabel(this)" onblur="unhighlightLabel(this)" required>
            </div>
            <div class="form-group col-md-6">
               <label for="telefone">Telefone para Contato</label>
               <input type="tel" class="form-control" name="telefone" placeholder="Ex.: (11) 4033-2019"
                  onfocus="highlightLabel(this)" onblur="unhighlightLabel(this)" required>
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

         <button type="submit" class="btn btn-primary">Cadastrar Contato</button>
      </form>
   </div>
   <hr>
   </hr>

   <table class="table">
      <thead>
         <tr class="thead">
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>E-mail</th>
            <th>Celular para Contato</th>
            <th>Ações</th>
         </tr>
      </thead>
      <tbody>
         <?php
$contact = new Contact();
$dados = $contact->getContacts();
foreach ($dados as $dado): ?>
         <tr>
            <td><?=$dado['contact_name'];?></td>
            <td><?=date('d/m/Y', strtotime($dado['contact_datebirth']));?></td>
            <td><?=$dado['contact_email'];?></td>
            <td><?=$dado['contact_phone'];?></td>
            <td>

               <a href="View/update_view.php?id=<?=$dado['id'];?>">
                  <img src="assets/editar.png" alt="Editar">
               </a>
               <a href="Controller/Contact/delete_contact.php?id=<?=$dado['id'];?>">
                  <img src="assets/excluir.png" alt="Excluir">
               </a>
            </td>
         </tr>
         <?php endforeach;?>
      </tbody>
   </table>


   <footer class="footer">
      <div class="div-footer">
         <div id="text-footer" style="margin-left:30px; font-weight: 500;">Termos | Políticas</div>
         <div id="text-footer" style="font-weight: 500;">© Copyright 2022 | Desenvolvido por<img
               src="assets/logo_rodape_alphacode.png" width="20%"></img></div>
         <div id="text-footer" style="margin-right:20px; font-weight: 500;">© Alphacode IT Solutions
            2022</div>
      </div>
   </footer>
</body>

</html>
