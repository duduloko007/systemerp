  
// Confirmar Senhas.
function confirmePassord(event){
  if(document.getElementById("password_confirme").value != document.getElementById("password").value){

    var html = '<div class="text-danger">As senhas não conferem. Você deve digitar duas senhas iguais nos campos "Senha" e "Confirme a Senha".</div>';
    $('.userPassError').html(html);
    $('.userPassError').show();

    $('.password_confirme').addClass("alert-danger");
    $('.userPassSuccess').html(html);
    $('.userPassSuccess').hide();
    $('.password_confirme').focus();

  } else{
    var html = '<div class="text-success">Senhas conferem.</div>';
    $('.userPassSuccess').html(html);
    $('.userPassSuccess').show();

    $('.password_confirme').removeClass("alert-danger");
    $('.userPassError').html(html);
    $('.userPassError').hide();
    $('input[name=group]').focus();


  }

}
// Confirmar Usuarios
function confirmeUser(event){
  if(document.getElementById("user_confirme").value != document.getElementById("user").value){

    var html = '<div class="text-danger">As usúarios não conferem. Você deve digitar dois usúarios iguais nos campos "Usúario" e "Confirme o Usúario".</div>';
    $('.userError').html(html);
    $('.userError').show();

    $('.user_confirme').addClass("alert-danger");
    $('.userSuccess').html(html);
    $('.userSuccess').hide();
    $('.user_confirme').focus();

  } else{
    var html = '<div class="text-success">Usúarios conferem.</div>';
    $('.userSuccess').html(html);
    $('.userSuccess').show();

    $('.user_confirme').removeClass("alert-danger");
    $('.userError').html(html);
    $('.userError').hide();
    $('input[name=password]').focus();


  }

}