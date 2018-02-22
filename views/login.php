<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>System ERP / Login</title>
 <link rel="icon" href="<?php BASE_URL;?>assets/images/favicon.ico" type="image/x-icon" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script  src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
  <script  src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo BASE_URL_BOWER ?>/font-awesome/css/font-awesome.min.css">
  <script  src="<?php echo BASE_URL; ?>assets/js/icheck.min.js"></script>
  <link rel="stylesheet" href="<?php echo BASE_URL_CSS ?>bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo BASE_URL_CSS ?>font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo BASE_URL_CSS ?>Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL_CSS ?>AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo BASE_URL_CSS ?>blue.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>System</b> ERP</a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Faça login para iniciar sua sessão</p> 
      <form method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control"  name="user" placeholder="Usuário" required="">
          <span class="fa fa-user-circle form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Senha" required="">
          <span class="fa fa-key form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
            </div>
          </div>
          <div class="col-xs-4">
            <input type="submit" class="btn btn-primary btn-block btn-flat" value="Entrar">
          </div>
          <?php if (isset($error) && !empty($error)): ?>
           <div class="warning"><?php echo $error; ?></div>
         <?php endif; ?>
       </div>
     </form>
     <!--<a href="#">Recuperar senha</a><br>-->
   </div>
 </div>
<!--<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>-->
</body>
</html>