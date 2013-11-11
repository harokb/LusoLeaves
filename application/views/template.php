<?php
	$_external_css[] = '';
	$_internal_css[] = '';
	$_internal_js[] = '';
	$_external_js[] = '';
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Luso Leaves</title>

    <meta name="keywords" content=""/>
    <meta name="description" content=""/>

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>favicon.png"/>

	<link href="<?php echo asset_url(); ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo asset_url(); ?>css/lusoleaves.css" rel="stylesheet">
    
    <?php echo format_external_css($_external_css); ?>
    <?php echo format_internal_css($_internal_css); ?>

    <?php echo format_external_js($_external_js) ?>
    <?php echo format_internal_js($_internal_js) ?>
</head>
<body>
<div id="view">
	<!-- Menu -->
	<nav class="navbar navbar-inverse navbar-static-top" style="margin-bottom: 1px;" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">LusoLeaves</a>
			</div>
		
		
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
			        <li>
			            <a href="<?= site_url('main') ?>" accesskey="1" title="">
			                <?php echo $this->lang->line("homepage"); ?>
			            </a>
			        </li>
			        <li>
			            <a href="<?= site_url('products') ?>" accesskey="2" title="">
			                <?php echo $this->lang->line("products"); ?>
			            </a>
			        </li>
			        <?php if ($is_admin): ?>
		            <li>
		                <a href="<?= site_url('users') ?>" accesskey="2" title="">
		                    Users
		                </a>
		            </li>
			        <?php endif; ?>
			        <?php if ($is_logged_in): ?>
		            <li>
		                <a href="<?= site_url('users/logout') ?>" accesskey="3" title="">
		                    <?php echo $this->lang->line("logout"); ?>
		                </a>
		            </li>
			        <?php else: ?>
		            <li>
		                <a href="<?= site_url('users/login') ?>" accesskey="3" title="">
		                    <?php echo $this->lang->line("login"); ?>
		                </a>
		            </li>
		            <li>
			            <a href="<?= site_url('users/register') ?>" accesskey="4" title="">
			                <?php echo $this->lang->line("register"); ?>
			            </a>
			        </li>
			        <?php endif; ?>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			    	<li>
			    		<a href="<?= base_url() . $this->lang->switch_uri('pt'); ?>" style="padding-top: 12px;">
		        			<img src="https://cdn1.iconfinder.com/data/icons/flags_gosquared/32/Portugal_flat.png" alt="PT"/>
		    			</a>
					</li>
					<li>
						<a href="<?= base_url() . $this->lang->switch_uri('en'); ?>" style="padding-top: 12px;">
		        			<img src="https://cdn1.iconfinder.com/data/icons/flags/flags/32/United%20Kingdom%28Great%20Britain%29.png" alt="EN"/>
		    			</a>
		    		</li>
		    		<li>
						<a href="<?= base_url() . $this->lang->switch_uri('es'); ?>" style="padding-top: 12px;">
		        			<img src="https://cdn1.iconfinder.com/data/icons/flags/flags/32/Spain.png" alt="EN"/>
		    			</a>
		    		</li>
			    </ul>
		    </div>
		</div>
	</nav>

<!-- -------------------------------------------------------------------------- -->
<!-- Content starts here                                                        -->
<!-- -------------------------------------------------------------------------- -->
	<?php echo $this->load->view($content_view); ?>
<!-- -------------------------------------------------------------------------- -->
<!-- Content ends here                                                          -->
<!-- -------------------------------------------------------------------------- -->	
</div>

<footer>
	<div class="container">
		<div class="row">
    		<div class="col-lg-12">
    			<p>Copyright (c) 2013 LusoLeaves.com. All rights reserved.</p>
			</div>
		</div>
    </div>
</footer>

<script src="<?php echo asset_url(); ?>js/jquery-2.0.3.js"></script>
<script src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>

</body>
</html>
