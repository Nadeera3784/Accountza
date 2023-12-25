<!doctype html>
<html lang="en">
<head itemscope="" itemtype="https://schema.org/WebSite">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Accountza.io">
    <meta name="keywords" content="invoicing, accounting, book-keeping, estimates generator, invoice generator, invoice template">
    <meta name="robots" content="index, follow">
    <meta name="description" content="A powerful invoicing tool built specifically for small business, freelancers and startups">
    <meta name="theme-color" content="#3324f5"/>
    <meta name="msapplication-TileColor" content="#3324f5">
    <meta name="apple-mobile-web-app-status-bar-style" content="#3324f5" />
    <title>Accountza | Contact Us</title>
    <meta name="google-site-verification" content="ItywWXdf3QDbEPJMKrcDe0alOVxQoAlk_TV7O5PCC8g" />
    <meta name="msvalidate.01" content="2AF0F645A14B31E97D9267A4C27C7B71"/>
    <meta name="yandex-verification" content="6c8cb2596ebb6201" />
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
    <link rel="canonical" href="https://accountza.io" />
    <?php $this->load->view('css');?>
</head>

<body>
     
    <?php $this->load->view('navbar');?>

    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center t-5">
                    <h1 class="mb-3 main_cpation">Contact Us</h1>
                </div>
            </div>
        </div>
        <section class="waves">
            <svg viewBox="0 0 100 25">
                <path fill="#ffffff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z"></path>
            </svg>
        </section>
    </section>

    <section class="pt-5 pb-5">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h3>Have a question?</h3>
            <p>We’re here to help and answer any question you might have. We look forward to hearing from you</p>
               <?php echo form_open("app/contact_processor");?>
               <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success  alert-dismissible" role="alert">
                        <?php echo  $this->session->flashdata('success');?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                <?php endif; ?>

                <div class="form-row">
                    <div class="form-group col-md-6">
                       <label for="name">Name:</label>
                       <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter your name" value="<?php echo set_value('name');?>" autocomplete="off">
                       <?php echo form_error('name'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter email address" value="<?php echo set_value('email');?>" autocomplete="off">
                        <?php echo form_error('email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control form-control-lg" id="message" name="message" placeholder="Enter Message" autocomplete="off"><?php echo set_value('message');?></textarea>
                    <?php echo form_error('message'); ?>
                </div>
                <button type="submit" class="btn btn-style-1 mr-3">Send Message</button>
                <?php echo form_close();?>
            </div>
        </div>
      </div>
    </section>
 
    <footer>
        <div class="container">
            <div class="footer_content">
                <nav class="footer_nav">
                    <ul class="links">
                        <li>
                            <h6>Sitemap</h6>
                        </li>
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li><a href="javascript:void(0)">About</a></li>
                        <li><a href="<?php echo base_url();?>terms">Terms</a></li>
                    </ul>
                    <ul class="links">
                        <li>
                            <h6>Support</h6>
                        </li>
                        <li><a href="javascript:void(0)">Help</a></li>
                        <li><a href="<?php echo base_url();?>frequently-asked-questions">FAQ</a></li>
                        <li><a href="<?php echo base_url();?>contact">Contact</a></li>
                    </ul>
                    <ul class="links">
                        <li>
                            <h6>Socials </h6>
                        </li>
                        <li><a href="https://www.facebook.com/accountza">Facebook</a></li>
                        <li><a href="javascript:void(0)">Twitter</a></li>
                        <li><a href="javascript:void(0)">Linkedin</a></li>
                    </ul>
                    <ul class="links">
                        <li>
                            <h6>Reach Us </h6>
                        </li>
                        <div class="footer_contact">
                          <div class="address">
                                <p>1B Rahula Road, 		
                                    <br> Matara,
                                    Sri Lanka
                                </p>
                            </div>
                            <!--<div class="phone">-->
                            <!--    <p>+94765435116</p>-->
                            <!--</div>-->
                            <div class="phone">
                                <p>hello@accountza.io</p>
                            </div>
                        </div>
                    </ul>

                </nav>
            </div>
            <div class="footer_info">
                <div class="copyright">
                    <h5>© 2021 Accountza.io</h5>
                </div>
                <ul class="footer_links">
                    <li><a href="<?php echo base_url();?>privacy-policy">Privacy Policy</a></li>
                    <li><a href="<?php echo base_url();?>terms">Terms</a></li>
                    <li><a href="<?php echo base_url();?>privacy-policy">Acceptable Use Policy</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <?php $this->load->view('js');?>

</body>
</html>
