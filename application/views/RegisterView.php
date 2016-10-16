	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Register
				</div>
				<div class="panel-body">
					<?php echo form_open('Register')?>
						Email:
						<input type="text" name="email" class="form-control">
						Username:
						<input type="text" name="username" class="form-control">
						Password:
						<input type="password" name="password" class="form-control">
						Confirm Password:
						<input type="password" name="confirm_pass" class="form-control">
						<br>
						<input type="submit" value="Register" class="btn btn-success">
						<input type="hidden" name="is_activated" value="1">
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
					</div>
				</div>
			</div>
		</div>
	</div>