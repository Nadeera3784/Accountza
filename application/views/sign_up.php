<!doctype html>
<html lang="en">
<head itemscope="" itemtype="https://schema.org/WebSite">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Accountza.io">
    <meta name="keywords" content="invoicing, accounting, book-keeping, estimates generator, invoice generator, invoice template, invoice maker">
    <meta name="robots" content="index, follow">
    <meta name="description" content="A powerful invoicing tool built specifically for small business, freelancers and startups">
    <meta name="theme-color" content="#3324f5"/>
    <meta name="msapplication-TileColor" content="#3324f5">
    <title>Accountza | Sign Up</title>
    <meta property="fb:app_id" content="1250675708423075" />
    <meta property="og:site_name" content="Accountza.io" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:url" content="https://accountza.io" />
    <meta property="og:title" content="Accountza.io" />
    <meta property="og:description" content="A powerful invoicing tool built specifically for small business, freelancers and startups" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo base_url();?>frontend/images/brand.png"/>
    <meta property="twitter:card" content="summary">
    <meta property="twitter:title" content="Accountza.io">
    <meta property="twitter:description" content="A powerful invoicing tool built specifically for small business, freelancers and startups">
    <meta property="twitter:domain" content="Accountza.io">
    <meta name="twitter:image:src" content="<?php echo base_url();?>frontend/images/brand.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>frontend/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>frontend/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>frontend/images/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url();?>frontend/site.webmanifest">
    <link rel="mask-icon" href="<?php echo base_url();?>frontend/images/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo base_url();?>frontend/images/favicon-32x32.png">
    <?php $this->load->view('css');?>
</head>

<body>

     <div class="auth">
        <div class="auth__main" style="background-image: url(<?php echo base_url();?>frontend/images/bg-login-mobile.jpg)">
            <div class="auth__wrap">
                <div class="auth__title title title_xl">Welcome to Accountza</div>
                <div class="auth__subtitle title title_sm">Sign Up to getting started</div>
            </div>
        </div>
        <div class="auth__container">
            <div class="auth__inner">
                <div class="auth__head">
                    <div class="auth__title title title_xl">
                        <p>Welcome to Accountza</p>
                        <p>Sign Up to getting started</p>
                    </div>
                    <div class="auth__text">Enter your details to proceed further</div>
                </div>
                <?php echo form_open("sign-up", array('class' => 'auth__form'));?>
   
                    <div class="form-group">
                        <label for="username" class="form-label">Hey 👋 First up, what is your name?</label>
                        <input class="form-control" type="text" name="username" placeholder="Enter your name"  value="<?php echo set_value('username');?>">
                        <?php echo form_error('username'); ?>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">What's your preferred email address?</label>
                        <input class="form-control" type="email" name="email" placeholder="Enter an email address" value="<?php echo set_value('email');?>">
                        <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                        <?php echo form_error('email'); ?>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="********">
                        <small class="form-text text-muted">at least 8 characters long</small>
                        <?php echo form_error('password'); ?>
                    </div>

                    <div class="form-group">
                        <label for="password_confirm" class="form-label">Confirm Password</label>
                        <input class="form-control" type="password" name="password_confirm" placeholder="********">
                        <?php echo form_error('password_confirm'); ?>
                    </div>


                    <div class="auth__flex">
                    <label class="switch auth__switch">
                    <?php echo form_checkbox('accept_terms', '1', FALSE, 'id="accept_terms" class="switch__input"');?>
                    <span class="switch__content">I agree with terms & conditions</span></label>
                    </div>
                     <?php echo form_error('accept_terms'); ?>
                    <div class="auth__flex">
                        <button type="submit" class="btn btn-style-1 mr-3">Sign Up</button>
                        <a href="<?php echo base_url();?>sign-in" class="btn btn-style-3">Sign In</a>
                    </div>
                  <?php echo form_close();?>
            </div>
        </div>
        <div class="auth__bg" style="background-image: url(<?php echo base_url();?>frontend/images/bg-login-sign-up.jpg)"></div>
    </div>

    <?php $this->load->view('js');?>
</body>
</html>
