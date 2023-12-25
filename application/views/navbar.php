<header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url();?>">
                    <img src="<?php echo base_url();?>frontend/images/brand.png" class="navbar-brand-img" alt="...">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>contact">Contact</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <?php  if (!$this->ion_auth->logged_in()):?>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url();?>sign-in"> Sign In </a>
                        </li>
                        <li class="nav-item">
                          <a class="btn btn-sm btn-style-2 ml-3" href="<?php echo base_url();?>sign-up"> Sign Up Free </a>
                        </li>
                        <?php else :?>
                        <li class="nav-item">
                          <a class="nav-link btn-sm btn-style-2" href="<?php echo base_url();?>agent/index"> My Account </a>
                        </li>
                        <?php endif;?>
                    </ul>

                    <!-- <a class="navbar-btn btn btn-sm btn-style-2 lift ml-auto" href="#" target="_blank"> Sign Up Free </a> -->

                </div>
            </div>
        </nav>
    </header>