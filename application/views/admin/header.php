<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Dashboard</title>
	<meta name="robots" content="noindex,nofollow">
	<meta name="googlebot" content="noindex,nofollow,noarchive,nosnippet,noodp" />
    <meta name="robots" content="noindex,nofollow,noarchive,nosnippet,noodp" />
	<meta name="description" content="#" />
	<meta name="keywords" content="#" />
	<meta name="author" content="#"/>
	<link rel="shortcut icon" href="<?php echo base_url();?>frontend/images/favicon.ico">
	<link rel="icon" href="<?php echo base_url();?>frontend/images/favicon.ico" type="image/x-icon">
	<?php
	if(isset($css)){
		$arrlength = count($css);
		for($x = 0; $x < $arrlength; $x++) {
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url().$this->config->item('app_backend_asset_root').$css[$x]."\">\n";
		}
	}
	?>
    <link href="<?php echo base_url() . $this->config->item('app_backend_asset_root'); ?>/css/default.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="wrapper theme-2-active navbar-top-light">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="nav-wrap">
				<div class="mobile-only-brand pull-left">
					<div class="nav-header pull-left">
						<div class="logo-wrap">
							<a href="<?php echo base_url(); ?>agent/index">
								<img class="brand-img" src="<?php echo base_url() . $this->config->item('app_backend_asset_root'); ?>/images/logo.png"/> 
								<span class="brand-text"><img src="<?php echo base_url() . $this->config->item('app_backend_asset_root'); ?>/images/brand.png" alt="brand"></span>
							</a>
						</div>
					</div>	
					<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="ti-align-left"></i></a>
					<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="ti-more"></i></a>
				</div>
				<div id="mobile_only_nav" class="mobile-only-nav pull-right">
					<ul class="nav navbar-right top-nav pull-right">
						
						<li>
							<a id="open_right_sidebar" href="#"><i class="ti-settings  top-nav-icon"></i></a>
						</li>
						<li class="dropdown auth-drp">
							<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo base_url() . $this->config->item('app_backend_asset_root');?>/images/default_user.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
							<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
								<li>
									<a href="<?php echo base_url();?>agent/company_settings"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo base_url();?>auth/logout"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
								</li>
							</ul>
						</li>
					</ul>
				</div>	
				</div>
			</nav>
			<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
				    <li>
						<a href="<?php echo base_url();?>admin/index"  class="<?php echo ($this->uri->segment(2) == "index") ? "active" : '';?>"><div class="pull-left"><i class="icon-grid mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="<?php echo base_url();?>admin/invoices" class="<?php echo ($this->uri->segment(2) == "invoices" || $this->uri->segment(2) == "view_invoice") ? "active" : '';?>">
						<div class="pull-left"><i class="ti-clipboard mr-20"></i><span class="right-nav-text">Invoices</span></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="<?php echo base_url();?>admin/expenses" class="<?php echo ($this->uri->segment(2) == "expenses" || $this->uri->segment(2) == "view_expense") ? "active" : '';?>">
						<div class="pull-left"><i class="icon-wallet mr-20"></i><span class="right-nav-text">Expenses</span></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="<?php echo base_url();?>admin/estimates" class="<?php echo ($this->uri->segment(2) == "estimates" || $this->uri->segment(2) == "view_estimate" || $this->uri->segment(2) == "update_estimate") ? "active" : '';?>">
						<div class="pull-left"><i class="icon-docs  mr-20"></i><span class="right-nav-text">Estimates</span></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="<?php echo base_url();?>admin/clients" class="<?php echo ($this->uri->segment(2) == "clients" || $this->uri->segment(2) == "view_client") ? "active" : '';?>">
						<div class="pull-left"><i class="icon-people mr-20"></i><span class="right-nav-text">Clients</span></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="<?php echo base_url();?>admin/agents" class="<?php echo ($this->uri->segment(2) == "agents" || $this->uri->segment(2) == "view_client") ? "active" : '';?>">
						<div class="pull-left"><i class="icon-user-follow  mr-20"></i><span class="right-nav-text">Agents</span></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="<?php echo base_url();?>admin/subscriptions" class="<?php echo ($this->uri->segment(2) == "subscriptions" || $this->uri->segment(2) == "update_subscription" || $this->uri->segment(2) == "add_subscription") ? "active" : '';?>">
						<div class="pull-left"><i class="ti-widget  mr-20"></i><span class="right-nav-text">Subscriptions</span></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="<?php echo base_url();?>admin/support"  class="<?php echo ($this->uri->segment(2) == "support" || $this->uri->segment(2) == "view_ticket") ? "active" : '';?>">
						<div class="pull-left"><i class="ti-headphone-alt   mr-20"></i><span class="right-nav-text">Support</span></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#reports"  class="<?php echo ($this->uri->segment(2) == "report_expenses" || $this->uri->segment(2) == "report_expenses_vs_income") ? "active" : '';?>">
						<div class="pull-left"><i class="icon-chart  mr-20"></i><span class="right-nav-text">Reports</span></div><div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
						<ul id="reports" class="collapse collapse-level-1">
							<li>
								<a href="<?=base_url();?>admin/report_expenses">Expenses</a>
							</li>
							<li>
								<a href="<?=base_url();?>admin/report_expenses_vs_income">Expenses vs Income</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#settings" class="<?php echo ($this->uri->segment(2) == "change_password" || $this->uri->segment(2) == "company_settings") ? "active" : '';?>">
						<div class="pull-left"><i class="ti-settings mr-20"></i><span class="right-nav-text">Settings</span></div><div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
						<ul id="settings" class="collapse collapse-level-1">
							<li>
								<a href="<?=base_url();?>admin/change_password">Change Password</a>
							</li>
							<li>
								<a href="<?=base_url();?>admin/company_settings">Company Settings</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>