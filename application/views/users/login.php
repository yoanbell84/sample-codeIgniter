

<div class="card border-dark mb-3" style="max-width: 50%;margin-top: 10%;margin-left: 25%; ">
  <div class="card-header">CodeIgniter Sample App</div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $title; ?></h4>
      <?php echo form_open('users/login' , array( 'id' => 'login-form', 'class' => 'login' ) ); ?>
        <div class="row">
		<div class="col-md-12">
			    <?php echo validation_errors(); ?>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
                                         <p>New User? <a href="<?php echo base_url(); ?>users/register">Sign up now</a></p>
		</div>
	</div>
    <?php echo form_close(); ?>
  </div>
</div>
	
