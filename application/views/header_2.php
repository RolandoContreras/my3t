<header class="site-header main-header menu-type-standard-menu">
                    <div class="container">
        		<div class="logo-and-menu-container">
                            <div itemscope itemtype="http://schema.org/Organization" class="logo-column">
                                <style>.header-logo.logo-image {width: 95px;}</style>
                                <a itemprop="url" href="<?php echo site_url();?>" class="header-logo logo-image">
                                                <img itemprop="logo" src="<?php echo site_url().'static/page_front/images/logo/logo_small.png'?>" height="125" class="main-logo" alt="logo"/>
                                </a>
                            </div>
			<div class="menu-column">
                            <div class="menu-items-blocks standard-menu-container menu-skin-dark reveal-from-top">
                                <?php $this->load->view("nav");?>
                                <a class="menu-bar menu-skin-dark menu-bar-hidden-desktop" href="#">
                                    <span class="ham"></span>
				</a>
                            </div>
			</div>
                        </div>
                    </div>
</header>