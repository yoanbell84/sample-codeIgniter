


<div class="card border-dark mb-3" style="max-width: 50%;margin-top: 10%;margin-left: 25%; ">
  <div class="card-header">CodeIgniter Sample App</div>
  <div class="card-body">
     <?php echo validation_errors(); ?>
      <?php echo form_open('users/register'); ?>
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center"><?= $title; ?></h1>
			<div class="form-group">
				<label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required autofocus>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password" required autofocus>
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="passconf" placeholder="Confirm Password" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</div>
<?php echo form_close(); ?>
  </div>
</div>
