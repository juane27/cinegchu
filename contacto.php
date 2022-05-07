<?php 
include "shared/header.php";
include "model/enviar.php";

?>
<style>
<?php include 'css/contacto.css'; ?>
</style>
<?php

?>
<main>
<div class="container"> <div class=" text-center mt-5 ">
        <h1>Contactanos</h1>
    </div>
    <div class="row mt-0">
        <div class="col-lg-7 ">
            <div class="card-contact">
                    <div class="container">
                        <form id="contact-form" role="form" method="post" >
                            <div class="controls">
                                <div class="row contact">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_nombre" >Nombre:</label> <input id="form_name" type="text" name="name" class="form-control" placeholder="Porfavor ingresa tu nombre *" required="required" data-error="Tu nombre es requerido."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_apellido">Apellido:</label> <input id="form_apellido" type="text" name="apellido" class="form-control" placeholder="Porfavor ingresa tu apellido *" required="required" data-error="Tu apellido es requerido."> </div>
                                    </div>
                                </div>
                                <div class="row contact">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Email:</label> <input id="form_email" type="email" name="email" class="form-control" placeholder="Porfavor ingresa tu e-mail *" required="required" data-error="Tu e-mail es requerido."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_need">Selecciona tu asunto:</label> <select id="form_need" name="need" class="form-control" required="required" data-error="Por favor especifica tu asunto.">
                                                <option value="" selected disabled>--Selecciona tu asunto--</option>
                                                <option>Información sobre los cines</option>
                                                <option>Información sobre mi compra</option>
                                                <option>Reembolso</option>
                                                <option>Otro</option>
                                            </select> </div>
                                    </div>
                                </div>
                                <div class="row contact">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_message">Mensaje:</label> <textarea id="form_message" name="message" class="form-control" placeholder="Escribe tu mensaje aquí." rows="4" required="required" data-error="Please, leave us a message."></textarea> </div>
                                    </div>
                                    <div class="col-md-12"> <input type="submit" class="btn btn-danger btn-send pt-2 btn-block " value="Enviar mensaje"> </div>
                                    <?php if ($_POST) {
                                        $name = $_POST['name'];
                                        $apellido = $_POST['apellido'];
                                        $email = $_POST['email'];
                                        $subject = $_POST['need'];
                                        $message = $_POST['message'];
                                        $need= $_POST['need'];
                                        $c = clsEnviar_contacto::constructorParametros(
                                            $name,
                                            $apellido,
                                            $email,
                                            $subject,
                                            $message,
                                            $need,
                                        );
                                        $c->enviar_contacto();
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
</div>

</main>

<script> 
function validateForm() {
  var name =  document.getElementById('name').value;
  if (name == "") {
      document.querySelector('.status').innerHTML = "Tienes que ingresar tu nombre";
      return false;
  }
  var email =  document.getElementById('email').value;
  if (email == "") {
      document.querySelector('.status').innerHTML = "Tienes que ingresar tu e-mail";
      return false;
  } else {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(!re.test(email)){
          document.querySelector('.status').innerHTML = "El e-mail ingresado no es valido";
          return false;
      }
  }
  var subject =  document.getElementById('subject').value;
  if (subject == "") {
      document.querySelector('.status').innerHTML = "Tienes que ingresar un asunto";
      return false;
  }
  var message =  document.getElementById('message').value;
  if (message == "") {
      document.querySelector('.status').innerHTML = "El mensaje no puede estar vacio";
      return false;
  }
  document.querySelector('.status').innerHTML = "Enviando...";
}

</script>

  



<?php include "shared/footer.php" ?>