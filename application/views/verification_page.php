<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lhan Samson">

    <title>Verify User</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">  
	<?php echo form_open('user/verify', array('class' => 'form-signin'));?>
      <h1 class="h3 mb-3 font-weight-normal">Insert Code</h1>
      <label for="inputCode" class="sr-only">Activation Code</label>
      <input type="text" id="inputCode" name="verification_code" class="form-control" placeholder="Activation Code" required autofocus>
	  <br />
      <button class="btn btn-lg btn-primary btn-block" type="submit">Verify User</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
	<?php echo form_close();?>
  </body>
</html>