

		
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Login
				</div>
				<div class="panel-body">
					<?php echo form_open('Login')?>
						Username:
						<input type="text" name="username" class="form-control">
						Password:
						<input type="password" name="password" class="form-control">
						<br>
						<input type="submit" value="Login" class="btn btn-success">
					</form>
					<div>
						<!-- Show Errors -->
						<?php if (validation_errors()) : ?>
						<div class="col-md-12">
							<div class="alert alert-danger alerta" role="alert">
								<?= validation_errors() ?>
							</div>
						</div>
    					<?php endif; ?>
    					
    					<?php if (isset($error)) : ?>
						<div class="col-md-12">
							<div class="alert alert-danger alerta" role="alert">
								<?= $error ?>
							</div>
						</div>
							<?php endif; ?>
					</div>
				</div>
				<div class="panel-footer">
					<a href="<?php echo base_url('Register')?>">Register</a>
				</div>
			</div>
		</div>
	</div>