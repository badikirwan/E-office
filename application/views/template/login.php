
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edmin</title>
	<link type="text/css" href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url('assets/')?>css/theme.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url('assets/')?>images/icons/css/font-awesome.css" rel="stylesheet">
</head>
<body style="height: 100%; max-width: 100% !important;">
	<div class="wrapper">
		<div class="container" style="margin-bottom:2px">
			<div class="row">
				<div class="module module-login span4 offset4">
					<?php echo form_open('auth/login') ?>
						<div class="module-head">
							<h3>Sign In</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="inputEmail" name="user" placeholder="Username">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" id="inputPassword" name="pass" placeholder="Password">
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right">Login</button>
									<label class="checkbox">
										<input type="checkbox"> Remember me
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->


	<script src="<?php echo base_url('assets/')?>scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/')?>scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/')?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
