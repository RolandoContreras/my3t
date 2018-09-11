<?php 
    //GET URL NAV
    $url = explode("/", uri_string());
    $style_home = "";
    $style_font_home = "";
    $style_about = "";
    $style_font_about = "";
    $style_plan = "";
    $style_font_plan = "";
    $style_contact = "";
    $style_font_contact = "";
    $style_login = "";
    $style_font_login = "";
    $style_register = "";
    $style_font_register = "";
    
        if (isset($url[1])) {
            $link = $url[1];
            switch ($link) {
                    case "home":
                        $style_home = "style_active";
                        $style_font_home = "text-active";
                        $nav = "home";
                    break;    
                    case "about":
                        $style_about = "style_active";
                        $style_font_about = "text-active";
                        $nav = "about";
                    break;
                    case "plan":
                        $style_plan = "style_active";
                        $style_font_plan = "text-active";
                        $nav = "plan";
                    break;
                    case "contact":
                        $style_contact = "style_active";
                        $style_font_contact = "text-active";
                        $nav = "contact";
                    break;
                    case "login":
                        $style_login = "style_active";
                        $style_font_login = "text-active";
                        $nav = "login";
                    break;
                    case "register":
                        $style_register = "style_active";
                        $style_font_register = "text-active";
                        $nav = "register";
                    break;
                default :
                    $style_home = "style_active";
                    $style_font_home = "text-active";
                    $nav = "home";
            }
        }
?>
<nav>
    <ul class="menu">
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-27">
            <a class="<?php echo $style_home;?>" href="<?php echo site_url().'home';?>"><span class="<?php echo $style_font_home;?>"><?=lang('idioma.nav_inicio');?></span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-32">
            <a class="<?php echo $style_about;?>" href="<?php echo site_url().'about';?>"><span class="<?php echo $style_font_about;?>"><?=lang('idioma.nav_acerca');?></span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31">
            <a class="<?php echo $style_plan;?>" href="<?php echo site_url().'plan';?>"><span class="<?php echo $style_font_plan;?>"><?=lang('idioma.nav_membresias');?></span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-93">
            <a class="<?php echo $style_contact;?>" href="<?php echo site_url().'contact';?>"><span class="<?php echo $style_font_contact;?>"><?=lang('idioma.nav_contacto');?></span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-93">
            <a class="<?php echo $style_register;?>" href="<?php echo site_url().'register';?>"><span class="<?php echo $style_font_register;?>"><?=lang('idioma.nav_registro');?></span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28">
            <a class="<?php echo $style_login;?>" href="<?php echo site_url().'login';?>"><span class="<?php echo $style_font_login;?>"><?=lang('idioma.nav_login');?></span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28">
            <a href='<?php echo site_url()."es/$nav";?>' style="display: inline-block"><img src="<?php echo site_url().'static/page_front/images/language/es.png';?>" alt="espanol" width="40"/></a>
            <a href="<?php echo site_url()."en/$nav";?>" style="display: inline-block"><img src="<?php echo site_url().'static/page_front/images/language/en.png';?>" alt="espanol" width="40"/></a>
        </li>
    </ul>
</nav>