<?php 
    if( get_field('header_colour') ) {
        $hc = get_field('header_colour');
    } elseif( is_404() ) { 
        $hc = 'light';
    } elseif( is_post_type_archive( 'podcasts' ) ) {
        $hc = 'dark';
    } else {
        $hc = 'dark';
    }
?>
<header class="<?=$hc;?>">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="<?=bloginfo('url');?>" class="navbar-brand">
                <?php 
                    $l_logo = get_field('light_logo', 'option');
                    $d_logo = get_field('dark_logo', 'option');
                ?>
                <img src="<?=$l_logo;?>" alt="" class="img-fluid dark">
                <img src="<?=$d_logo;?>" alt="" class="img-fluid light">
            </a>
            <button type='button' data-toggle='collapse' data-target='.navbar-collapse' id='nav-btn' class='navbar-toggler ml-auto menu' aria-label='Menu Button'>
                <svg width="35" height="35" viewBox="0 0 100 100">
                    <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058"></path>
                    <path class="line line2" d="M 20,50 H 80"></path>
                    <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942"></path>
                </svg>
            </button>
            <?php 
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'depth' => '2',
                    'container' => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'navigation',
                    'menu_class' => 'navbar-nav ml-auto',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker(),
                ));
            ?>
            <div class="menu-right">
                <ul class="right-btns list-unstyled list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="<?=get_field('login_link', 'option');?>" target="_blank" class="login">
                            <svg xmlns="http://www.w3.org/2000/svg" width="96.052" height="96.052" viewBox="0 0 96.052 96.052">
                                <path id="Icon_material-person" data-name="Icon material-person" d="M54.026,54.026A24.013,24.013,0,1,0,30.013,30.013,24.006,24.006,0,0,0,54.026,54.026Zm0,12.007C38,66.033,6,74.077,6,90.046v12.007h96.052V90.046C102.052,74.077,70.055,66.033,54.026,66.033Z" transform="translate(-6 -6)" fill="#fff"/>
                            </svg>
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>