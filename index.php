<!DOCTYPE html>
<html>

<head>
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
   <div class="header">
      <img src="assets/logo_alphacode.png" class="logo-header"></img>
      <span class="span-title">Cadastro de Contatos</span>
   </div>
   <div class="container">
      <form>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="nomeCompleto">Nome Completo</label>
               <input type="text" class="form-control" id="nomeCompleto" placeholder="Ex.: Letícia Pacheco dos Santos">
            </div>
            <div class="form-group col-md-6">
               <label for="dataNascimento">Data de Nascimento</label>
               <input type="text" class="form-control" id="dataNascimento" placeholder="Ex.: 03/10/2003"
                  onblur="formatarData()" onkeypress="if(event.keyCode==13) { formatarData(); return false; }">
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="email">E-mail</label>
               <input type="email" class="form-control" id="email" placeholder="Ex.: leticia@gmail.com"
                  onblur="validarEmail()">
            </div>
            <div class="form-group col-md-6">
               <label for="profissao">Profissão</label>
               <input type="text" class="form-control" id="profissao" placeholder="Ex.: Desenvolvedora Web">
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="celular">Celular para Contato</label>
               <input type="tel" class="form-control" id="celular" placeholder="Ex.: (11) 98493-2039">
            </div>
            <div class="form-group col-md-6">
               <label for="telefone">Telefone para Contato</label>
               <input type="tel" class="form-control" id="telefone" placeholder="Ex.: (11) 4033-2019">
            </div>
         </div>

         <div class="form-row">
            <div class="form-group col-md-6">
               <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
               <label class="form-check-label" for="flexCheckDefault">
                  Número de celular possui Whatsapp
               </label>
            </div>

            <div class="form-group col-md-6">
               <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
               <label class="form-check-label" for="flexCheckDefault">
                  Enviar notificações por E-mail
               </label>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
               <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
               <label class="form-check-label" for="flexCheckDefault">
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
$dados = array();
foreach ($dados as $dado): ?>
         <tr>
            <td><?=$dado['nome'];?></td>
            <td><?=$dado['data_nascimento'];?></td>
            <td><?=$dado['email'];?></td>
            <td><?=$dado['celular'];?></td>
            <td>
               <img src="assets/editar.png"></img>
               <img src="assets/excluir.png"></img>
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
