<?php 
    //Initial theme setup, adds HTML5 support
    require get_template_directory().'/inc/themeSetup.php';
    //Enqueue Styles and Scripts
    require get_template_directory().'/inc/enqueueScriptsStyles.php';
    //Load required plugins for theme.
    require get_template_directory().'/inc/plugin-includes.php';
    //Plugin to make Bootstrap navigation to work with WordPress
    require get_template_directory().'/inc/class-wp-bootstrap-navwalker.php';
    //Add Navwalker mega menu for bootstrap (below needs to be uncommented)
    //require get_template_directory().'/inc/wp_bootstrap4-mega-navwalker.php';
    require get_template_directory().'/inc/createRequiredPages.php';
    //Custom ACF stuff to setup theme options
    require get_template_directory().'/inc/mwnThemeACFStuff.php';
    
    require get_template_directory().'/inc/addLogoOptionToCustomiser.php';
    
    //Include WP Customiser for additional customisations
    require get_template_directory().'/inc/customizer.php';

    //Add help / info page to admin area
    if (is_admin()) {
        require get_template_directory() . '/inc/BootstrapBasicAdminHelp.php';
        $bbsc_adminhelp = new BootstrapBasicAdminHelp();
        add_action('admin_menu', array($bbsc_adminhelp, 'themeHelpMenu'));
        unset($bbsc_adminhelp);
    }

    //Add WooCommerce Support
    function mwn_add_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }
    add_action( 'after_setup_theme', 'mwn_add_woocommerce_support' );

    //Set excerpt lengeth to 50 words
    function mwn_custom_excerpt_length($length) {
        return 50;
    }
    add_filter('excerpt_length', 'mwn_custom_excerpt_length', 999);

    //Change the way the end of the excerpt is displayed
    function excerptMore($more){
        return'....';
    }
    add_filter('excerpt_more', 'excerptMore');

    remove_filter('acf_the_content', 'wpautop');


    add_filter('use_block_editor_for_post', '__return_false');

    function pagination_bar( $query_wp ) {
        $pages = $query_wp->max_num_pages;
        $big = 999999999; // need an unlikely integer
        if ($pages > 1)
        {
            $page_current = max(1, get_query_var('paged'));
            echo paginate_links(array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => $page_current,
                'total' => $pages,
            ));
        }
    }

    /**
     * Fix pagination on archive pages
     * After adding a rewrite rule, go to Settings > Permalinks and click Save to flush the rules cache
     */
    function my_pagination_rewrite() {
      add_rewrite_rule('blog/page/?([0-9]{1,})/?$', 'index.php?category_name=blog&paged=$matches[1]', 'top');
    }
    add_action('init', 'my_pagination_rewrite');

    // CPT
    if ( ! function_exists('results_pt') ) {
        // Register Custom Post Type
        function results_pt() {
          $labels = array(
            'name'                  => _x( 'Results', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Result', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Results', 'text_domain' ),
            'name_admin_bar'        => __( 'Results', 'text_domain' ),
            'archives'              => __( 'Result Archives', 'text_domain' ),
            'attributes'            => __( 'Result Attributes', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent Result:', 'text_domain' ),
            'all_items'             => __( 'All Results', 'text_domain' ),
            'add_new_item'          => __( 'Add New Result', 'text_domain' ),
            'add_new'               => __( 'Add New', 'text_domain' ),
            'new_item'              => __( 'New Result', 'text_domain' ),
            'edit_item'             => __( 'Edit Result', 'text_domain' ),
            'update_item'           => __( 'Update Result', 'text_domain' ),
            'view_item'             => __( 'View Result', 'text_domain' ),
            'view_items'            => __( 'View Results', 'text_domain' ),
            'search_items'          => __( 'Search Results', 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into Result', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Result', 'text_domain' ),
            'items_list'            => __( 'Items list', 'text_domain' ),
            'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
          );
          $args = array(
            'label'                 => __( 'Results', 'text_domain' ),
            'description'           => __( 'Results', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'thumbnail' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-portfolio',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => array( 'slug' => 'results', 'with_front' => false ),  
            'capability_type'       => 'page',
          );
          register_post_type( 'results', $args );
        }
        add_action( 'init', 'results_pt', 0 );
      }

      if ( ! function_exists('podcast_pt') ) {
        // Register Custom Post Type
        function podcast_pt() {
          $labels = array(
            'name'                  => _x( 'Podcasts', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Podcast', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Podcasts', 'text_domain' ),
            'name_admin_bar'        => __( 'Podcasts', 'text_domain' ),
            'archives'              => __( 'Podcast Archives', 'text_domain' ),
            'attributes'            => __( 'Podcast Attributes', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent Podcast:', 'text_domain' ),
            'all_items'             => __( 'All Podcasts', 'text_domain' ),
            'add_new_item'          => __( 'Add New Podcast', 'text_domain' ),
            'add_new'               => __( 'Add New', 'text_domain' ),
            'new_item'              => __( 'New Podcast', 'text_domain' ),
            'edit_item'             => __( 'Edit Podcast', 'text_domain' ),
            'update_item'           => __( 'Update Podcast', 'text_domain' ),
            'view_item'             => __( 'View Podcast', 'text_domain' ),
            'view_items'            => __( 'View Podcasts', 'text_domain' ),
            'search_items'          => __( 'Search Podcasts', 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into Podcast', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Podcast', 'text_domain' ),
            'items_list'            => __( 'Items list', 'text_domain' ),
            'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
          );
          $args = array(
            'label'                 => __( 'Podcasts', 'text_domain' ),
            'description'           => __( 'Podcasts', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'thumbnail' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-microphone',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => array( 'slug' => 'podcasts', 'with_front' => false ),  
            'capability_type'       => 'page',
          );
          register_post_type( 'podcasts', $args );
        }
        add_action( 'init', 'podcast_pt', 0 );
      }




 // Shortcodes
 add_shortcode( 'result_slider', 'result_slider' );
 function result_slider() {
   $html = "";
   global $post;
   $exclude_ids = array( $post->ID );
   
   $args = array(
     'post_type' => 'results',
     'post_status' => 'publish',
     'post__not_in' => $exclude_ids,
     'posts_per_page' => 6,
     'order' => 'DESC',
     'orderby' => 'date',
   );

   $query = new WP_Query( $args );
    
     if ( $query->found_posts > 0 ) {
       $html .= '<div class="results-slider">';
         foreach( $query->posts as $the_post ) {
              $img = get_field('logo', $the_post );
              $title = get_field('title', $the_post );
              $excerpt = get_field('excerpt', $the_post );
              
              $html .= '<div class="item">';
              $html .= '<div class="single-result">';
                $html .= '<div class="inner">';
                  $html .= '<div class="prob">';
                    $html .= '<p>Problem solved</p>';
                  $html .= '</div>';
                  $html .= '<div class="logo">';
                    $html .= '<img src="'.wp_get_attachment_image_url( $img, '' ).'" class="img-fluid">';
                  $html .= '</div>';
                  $html .= '<div class="content">';
                    $html .= '<h3>'.$title.'</h3>';
                    $html .= '<p>'.$excerpt.'</p>';
                  $html .= '</div>';
                  $html .= '<div class="read-more">';
                    $html .= '<a href="'.get_the_permalink( $the_post ).'" class="arrow-btn">Read More</a>';
                  $html .= '</div>';
                $html .= '</div>';
              $html .= '</div>';
              $html .= '</div>';
         }
       $html .= '</div>';
     } else {
         $html .= 'Results Coming Soon!';
     }

   return $html;

 }