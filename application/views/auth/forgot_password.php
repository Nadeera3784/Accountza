<!doctype html>
<html lang="en">
<head itemscope="" itemtype="https://schema.org/WebSite">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Accountza.io">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="theme-color" content="#3324f5"/>
    <meta name="msapplication-TileColor" content="#3324f5">
    <title>Accountza | Forgot Password</title>
    <meta property="fb:app_id" content="1250675708423075" />
    <meta property="og:site_name" content="Accountza.io" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:url" content="/" />
    <meta property="og:title" content="Accountza.io" />
    <meta property="og:description" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo base_url();?>frontend/images/brand.png"/>
    <meta property="twitter:card" content="summary">
    <meta property="twitter:title" content="Accountza.io">
    <meta property="twitter:description" content="">
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
                <div class="auth__title title title_xl">Lost your password?</div>
                <div class="auth__subtitle title title_sm">Enter your email to reset your password.</div>
            </div>
        </div>
        <div class="auth__container">
            <div class="auth__inner">
                <div class="auth__head">
                    <div class="auth__title title title_xl">
                        <p>Lost your password?</p>
                    </div>
                    <div class="auth__text">If you forgot your password, well, then we’ll email you instructions to reset your password</div>
                </div>
				<?php echo form_open('auth/forgot_password/', array('class' => 'auth__form'));?>
                   <div id="infoMessage"><?php echo $message;?></div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <?php echo form_input($identity);?>
                    </div>
                    <div class="auth__flex">
                        <button type="submit" class="btn btn-style-1 btn-block">Send Reset Link</button>
                    </div>
                    <div class="auth__flex">
                       <a href="<?php echo base_url();?>auth/login"><strong>Return to login</strong></a>
                     </div>
        
                  <?php echo form_close();?>
            </div>
        </div>
        <div class="auth__bg" style="background-image: url(<?php echo base_url();?>frontend/images/bg-login-recover.jpg)"></div>
    </div>

    <?php $this->load->view('js');?>
</body>
</html>
