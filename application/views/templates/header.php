<html>
	<head>
		<title>CodeIgniter Application</title>
                <link rel="icon" href="<?=base_url()?>assets/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.27.0/dist/sweetalert2.min.css">                
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css">  
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery/jquery.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom/jquery.validate.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
                <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
                <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>  
                <script type="text/javascript" src=" https://cdn.jsdelivr.net/npm/sweetalert2@7.27.0/dist/sweetalert2.all.min.js"></script>  
               
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom/bootstrap-datepicker.js"></script>
             
                

	</head>
	<body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">CodeIgniter App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
      </li>
       <?php if(!$this->session->userdata('logged_in')) : ?>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
      </li>          
      <?php endif; ?>
      <?php if($this->session->userdata('logged_in')) : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>clients/index">Clients</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
      </li>  
      <?php endif; ?>
    </ul>   
  </div>
</nav>
    <div class="container">
      <!-- Flash messages -->
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('client_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('client_created').'</p>'; ?>
      <?php endif; ?>


     