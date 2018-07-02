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
    
        if (isset($url[0])) {
            $link = $url[0];
            switch ($link) {
                    case "home":
                        $style_home = "style_active";
                        $style_font_home = "text-active";
                    break;    
                    case "about":
                        $style_about = "style_active";
                        $style_font_about = "text-active";
                    break;
                    case "plan":
                        $style_plan = "style_active";
                        $style_font_plan = "text-active";
                    break;
                    case "contact":
                        $style_contact = "style_active";
                        $style_font_contact = "text-active";
                    break;
                    case "login":
                        $style_login = "style_active";
                        $style_font_login = "text-active";
                    break;
                    case "register":
                        $style_register = "style_active";
                        $style_font_register = "text-active";
                    break;
                default :
                    $style_home = "style_active";
                    $style_font_home = "text-active";
            }
        }
?>
<nav>
    <ul class="menu">
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-27">
            <a class="<?php echo $style_home;?>" href="<?php echo site_url().'home';?>"><span class="<?php echo $style_font_home;?>">Inicio</span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-32">
            <a class="<?php echo $style_about;?>" href="<?php echo site_url().'about';?>"><span class="<?php echo $style_font_about;?>">Acerca</span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31">
            <a class="<?php echo $style_plan;?>" href="<?php echo site_url().'plan';?>"><span class="<?php echo $style_font_plan;?>">Plan</span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-93">
            <a class="<?php echo $style_contact;?>" href="<?php echo site_url().'contact';?>"><span class="<?php echo $style_font_contact;?>">Contacto</span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-93">
            <a class="<?php echo $style_register;?>" href="<?php echo site_url().'register';?>"><span class="<?php echo $style_font_register;?>">¡Regístrate!</span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28">
            <a class="<?php echo $style_login;?>" href="<?php echo site_url().'login';?>"><span class="<?php echo $style_font_login;?>">Login</span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28">
            <a><img src="<?php echo site_url().'static/page_front/images/language/es.png';?>" alt="espanol" width="40"/></a>
            <a><img src="<?php echo site_url().'static/page_front/images/language/en.png';?>" alt="espanol" width="40"/></a>
        </li>
    </ul>
</nav>