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


// Modify the custom query for podcasts to include pagination
    function custom_podcasts_archive_query( $query ) {
        if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'podcasts' ) ) {
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'podcasts',
                'orderby' => 'published_date',
                'order' => 'DESC',
                'posts_per_page' => 2,
                'paged' => $paged
            );
            $query->set( 'paged', $paged );
            $query->set( 'posts_per_page', 2 ); // Adjust the number of posts per page as needed
        }
    }
    add_action( 'pre_get_posts', 'custom_podcasts_archive_query' );


    /**
     * Fix pagination on archive pages
     * After adding a rewrite rule, go to Settings > Permalinks and click Save to flush the rules cache
     */
    // function my_pagination_rewrite() {
    //   add_rewrite_rule('blog/page/?([0-9]{1,})/?$', 'index.php?category_name=blog&paged=$matches[1]', 'top');
    // }
    // add_action('init', 'my_pagination_rewrite');

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


      //Custom Taxonomy for problem solved
function custom_taxonomy() {
    $labels = array(
        'name' => 'Problem Solved Tags',
        'singular_name' => 'Problem Solved Tag',
        'search_items' => 'Search Problem Solved Tags',
        'all_items' => 'All Problem Solved Tags',
        'parent_item' => 'Parent Problem Solved Tag',
        'parent_item_colon' => 'Parent Problem Solved Tag:',
        'edit_item' => 'Edit Problem Solved Tag',
        'update_item' => 'Update Problem Solved Tag',
        'add_new_item' => 'Add New Problem Solved Tag',
        'new_item_name' => 'New Problem Solved Tag Name',
        'menu_name' => 'Problem Solved Tags',
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'tag' ), 
    );

    register_taxonomy( 'result_tag', array( 'results' ), $args );
}
add_action( 'init', 'custom_taxonomy', 0 );

// Custom Taxonomy for Industry
function custom_industry_taxonomy() {
    $labels = array(
        'name' => 'Industry Tags',
        'singular_name' => 'Industry Tag',
        'search_items' => 'Search Industry Tags',
        'all_items' => 'All Industry Tags',
        'parent_item' => 'Parent Industry Tag',
        'parent_item_colon' => 'Parent Industry Tags:',
        'edit_item' => 'Edit Industry Tag',
        'update_item' => 'Update Industry Tag',
        'add_new_item' => 'Add New Industry Tag',
        'new_item_name' => 'New Industry Tag Name',
        'menu_name' => 'Industry Tags',
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'industry' ),
    );

    register_taxonomy( 'industry_taxonomy', array( 'results' ), $args );
}
add_action( 'init', 'custom_industry_taxonomy', 0 );


function custom_results_archive_query( $query ) {
    if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'results' ) ) {
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'results',
            'orderby' => 'published_date',
            'order' => 'DESC',
            'posts_per_page' => 2,
            'paged' => $paged
        );
        $query->set( 'paged', $paged );
        $query->set( 'posts_per_page', 2 ); 
    }
}
add_action( 'pre_get_posts', 'custom_results_archive_query' );

add_action('wp_ajax_filter_results', 'filter_results');
add_action('wp_ajax_nopriv_filter_results', 'filter_results');

function filter_results() {
    $industry = isset($_POST['industry']) ? $_POST['industry'] : '';
    $tags = isset($_POST['tags']) ? $_POST['tags'] : '';
    $page = isset($_POST['page']) ? $_POST['page'] : 1;

    $args = array(
        'post_type' => 'results',
        'orderby' => 'published_date',
        'order' => 'DESC',
        'posts_per_page' => 2,
        'paged' => $page,
    );

    // Apply filters if provided
    $tax_query = array(); // Initialize tax query array
    if ($industry && $tags) {
        $tax_query = array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'industry_taxonomy',
                'field' => 'slug',
                'terms' => $industry,
            ),
            array(
                'taxonomy' => 'result_tag',
                'field' => 'slug',
                'terms' => $tags,
            ),
        );
    } elseif ($industry) {
        $tax_query[] = array(
            'taxonomy' => 'industry_taxonomy',
            'field' => 'slug',
            'terms' => $industry,
        );
    } elseif ($tags) {
        $tax_query[] = array(
            'taxonomy' => 'result_tag',
            'field' => 'slug',
            'terms' => $tags,
        );
    }

    // Add tax query to args
    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    $custom_loop = new WP_Query($args);

    ob_start();
    while ($custom_loop->have_posts()) : $custom_loop->the_post(); ?>
<div class="single-result" data-aos="fade-up" data-aos-delay="200">
    <div class="inner">
        <div class="tags">
            <?php 
                    $tags = get_the_terms(get_the_ID(), 'result_tag');
                    if ($tags && !is_wp_error($tags)) {
                        foreach ($tags as $tag) {
                            echo '<div class="prob"> <p>' . $tag->name . '</p></div>'; 
                        }
                    }
                    ?>
        </div>
        <div class="logo">
            <?php $img = get_field('logo'); ?>
            <img src="<?=wp_get_attachment_image_url( $img, '' );?>" class="img-fluid">
        </div>
        <div class="content">
            <?php if( get_field('title') ) : ?>
            <h3><?=get_field('title');?></h3>
            <?php else : ?>
            <h3><?=get_the_title();?></h3>
            <?php endif; ?>
            <?php if( get_field('excerpt') ) : ?>
            <p><?=wp_trim_words(get_field('excerpt'), 17);?></p>
            <?php endif; ?>
        </div>
        <div class="read-more">
            <a href="<?=get_the_permalink();?>" class="arrow-btn">Read More</a>
        </div>
    </div>
</div>
<?php endwhile;
    wp_reset_postdata();

    $output = ob_get_clean();

// Get pagination links
$pagination = paginate_links( array(
    'total' => $custom_loop->max_num_pages,
    'current' => $page,
    'format' => '?page=%#%', 
    'show_all' => false,
    'type' => 'array',
) );

    // Send both results and pagination as JSON response
    wp_send_json(array(
        'results' => $output,
        'pagination' => $pagination,
    ));

    die();
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