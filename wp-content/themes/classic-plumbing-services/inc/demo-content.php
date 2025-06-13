<div class="theme-offer">
   <?php
     // POST and update the customizer and other related data of Classic Plumbing Services
    if ( isset( $_POST['submit'] ) ) {

        // Check if Classic Blog Grid plugin is installed
        if (!is_plugin_active('classic-blog-grid/classic-blog-grid.php')) {
            // Plugin slug and file path for Classic Blog Grid
            $classic_plumbing_services_plugin_slug = 'classic-blog-grid';
            $classic_plumbing_services_plugin_file = 'classic-blog-grid/classic-blog-grid.php';
        
            // Check if Classic Blog Grid is installed and activated
            if ( ! is_plugin_active( $classic_plumbing_services_plugin_file ) ) {
        
                // Check if Classic Blog Grid is installed
                $classic_plumbing_services_installed_plugins = get_plugins();
                if ( ! isset( $classic_plumbing_services_installed_plugins[ $classic_plumbing_services_plugin_file ] ) ) {
        
                    // Include necessary files to install plugins
                    include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
                    include_once( ABSPATH . 'wp-admin/includes/file.php' );
                    include_once( ABSPATH . 'wp-admin/includes/misc.php' );
                    include_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );
        
                    // Download and install Classic Blog Grid
                    $classic_plumbing_services_upgrader = new Plugin_Upgrader();
                    $classic_plumbing_services_upgrader->install( 'https://downloads.wordpress.org/plugin/classic-blog-grid.latest-stable.zip' );
                }
        
                // Activate the Classic Blog Grid plugin after installation (if needed)
                activate_plugin( $classic_plumbing_services_plugin_file );
            }
        }

        // ------- Create Main Menu --------
        $classic_plumbing_services_menuname = 'Primary Menu';
        $classic_plumbing_services_bpmenulocation = 'primary';
        $classic_plumbing_services_menu_exists = wp_get_nav_menu_object( $classic_plumbing_services_menuname );
    
        if (!$classic_plumbing_services_menu_exists) {
            // Create a new menu
            $classic_plumbing_services_menu_id = wp_create_nav_menu($classic_plumbing_services_menuname);

            // Define pages to be created
            $classic_plumbing_services_pages = array(
                'home' => array(
                    'title' => 'Home',
                    'template' => '/templates/template-home-page.php'
                ),
                'about' => array(
                    'title' => 'About',
                    'content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'
                ),
                'services' => array(
                    'title' => 'Services',
                    'content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'
                ),
                'pages' => array(
                    'title' => 'Pages',
                    'content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'
                ),
                'blogs' => array(
                    'title' => 'Blogs',
                    'content' => ''
                ),
            );

            $classic_plumbing_services_page_ids = array();

            // Loop through the pages and create them if they don’t exist
            foreach ($classic_plumbing_services_pages as $classic_plumbing_services_slug => $classic_plumbing_services_data) {
                $classic_plumbing_services_existing_page = get_page_by_path($classic_plumbing_services_slug);

                if ($classic_plumbing_services_existing_page) {
                    // If the page already exists, use its ID
                    $classic_plumbing_services_page_id = $classic_plumbing_services_existing_page->ID;
                } else {
                    // Create a new page
                    $classic_plumbing_services_page_data = array(
                        'post_type'    => 'page',
                        'post_title'   => $classic_plumbing_services_data['title'],
                        'post_content' => isset($classic_plumbing_services_data['content']) ? $classic_plumbing_services_data['content'] : '',
                        'post_status'  => 'publish',
                        'post_author'  => get_current_user_id(), // Set author dynamically
                        'post_name'    => $classic_plumbing_services_slug,
                    );

                    $classic_plumbing_services_page_id = wp_insert_post($classic_plumbing_services_page_data);

                    // Assign custom page template if specified
                    if (!empty($classic_plumbing_services_data['template'])) {
                        update_post_meta($classic_plumbing_services_page_id, '_wp_page_template', $classic_plumbing_services_data['template']);
                    }
                }

                // Store the page IDs
                $classic_plumbing_services_page_ids[$classic_plumbing_services_slug] = $classic_plumbing_services_page_id;
            }

            // Set homepage and blog page
            update_option('page_for_posts', $classic_plumbing_services_page_ids['blogs']);
            update_option('page_on_front', $classic_plumbing_services_page_ids['home']);
            update_option('show_on_front', 'page');

            // Define menu items
            $classic_plumbing_services_menu_items = array(
                'home',
                'about',
                'services',
                'pages',
                'blogs',
            );

            // Add menu items dynamically
            foreach ($classic_plumbing_services_menu_items as $classic_plumbing_services_slug) {
                wp_update_nav_menu_item($classic_plumbing_services_menu_id, 0, array(
                    'menu-item-title' => esc_html($classic_plumbing_services_pages[$classic_plumbing_services_slug]['title']),
                    'menu-item-url' => get_permalink($classic_plumbing_services_page_ids[$classic_plumbing_services_slug]),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $classic_plumbing_services_page_ids[$classic_plumbing_services_slug],
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type',
                ));
            }

            // Assign menu to theme location
            $classic_plumbing_services_locations = get_theme_mod('nav_menu_locations', array());
            $classic_plumbing_services_locations[$classic_plumbing_services_bpmenulocation] = $classic_plumbing_services_menu_id;
            set_theme_mod('nav_menu_locations', $classic_plumbing_services_locations);
        }

        //Logo
        set_theme_mod( 'classic_plumbing_services_the_custom_logo', esc_url( get_template_directory_uri().'/images/Logo.png'));

        //Header Section
        set_theme_mod( 'classic_plumbing_services_topbar_text', 'Get fast, reliable plumbing services with expert solutions for your home & business!');
        set_theme_mod( 'classic_plumbing_services_phone_number', '1234567890');

        //Banner Section
        set_theme_mod( 'classic_plumbing_services_banner', true);
        set_theme_mod( 'classic_plumbing_services_banner_title', 'Expert Plumbing Solutions for Homes & Businesses Anytime');
        set_theme_mod( 'classic_plumbing_services_banner_middle_img', esc_url( get_template_directory_uri().'/images/banner.png'));

        $classic_plumbing_services_demo_data = array(
            'left' => array(
                array(
                    'title' => 'Leak Detection & Repair',
                    'link'  => '#',
                    'desc'  => 'Identifying and fixing water leaks to prevent property damage.',
                    'icon'  => 'fa-solid fa-tint',
                ),
                array(
                    'title' => 'Bathroom & Kitchen Plumbing',
                    'link'  => '#',
                    'desc'  => 'Installing and repairing sinks, faucets, showers, toilets, and disposals.',
                    'icon'  => 'fa-solid fa-faucet-drip',
                ),
                array(
                    'title' => 'Pipe Repair & Replacement',
                    'link'  => '#',
                    'desc'  => 'Fixing damaged pipes and upgrading outdated plumbing systems.',
                    'icon'  => 'fa-solid fa-toilet',
                ),
            ),
            'right' => array(
                array(
                    'title' => 'Emergency Plumbing Services',
                    'link'  => '#',
                    'desc'  => '24/7 assistance for burst pipes, leaks, and urgent plumbing issues.',
                    'icon'  => 'fa-solid fa-water',
                ),
                array(
                    'title' => 'Drain Cleaning & Unclogging',
                    'link'  => '#',
                    'desc'  => 'Clearing blocked drains, sinks, and sewer lines.',
                    'icon'  => 'fa-solid fa-bath',
                ),
                array(
                    'title' => 'Water Heater Installation & Repair',
                    'link'  => '#',
                    'desc'  => 'Servicing, repairing, and installing water heaters, including tankless.',
                    'icon'  => 'fa-solid fa-triangle-exclamation',
                ),
            ),
        );
    
        // Left section data
        foreach ($classic_plumbing_services_demo_data['left'] as $classic_plumbing_services_i => $classic_plumbing_services_data) {
            set_theme_mod("classic_plumbing_services_banner_left_title$classic_plumbing_services_i", $classic_plumbing_services_data['title']);
            set_theme_mod("classic_plumbing_services_banner_left_title_link$classic_plumbing_services_i", $classic_plumbing_services_data['link']);
            set_theme_mod("classic_plumbing_services_banner_left_content$classic_plumbing_services_i", $classic_plumbing_services_data['desc']);
            set_theme_mod("classic_plumbing_services_left_services_icon$classic_plumbing_services_i", $classic_plumbing_services_data['icon']);
        }
    
        // Right section data
        foreach ($classic_plumbing_services_demo_data['right'] as $classic_plumbing_services_j => $classic_plumbing_services_data) {
            set_theme_mod("classic_plumbing_services_banner_right_title$classic_plumbing_services_j", $classic_plumbing_services_data['title']);
            set_theme_mod("classic_plumbing_services_banner_right_title_link$classic_plumbing_services_j", $classic_plumbing_services_data['link']);
            set_theme_mod("classic_plumbing_services_banner_right_content$classic_plumbing_services_j", $classic_plumbing_services_data['desc']);
            set_theme_mod("classic_plumbing_services_right_services_icon$classic_plumbing_services_j", $classic_plumbing_services_data['icon']);
        }

        //About Section
        set_theme_mod( 'classic_plumbing_services_disabled_about_section', true);
        $classic_plumbing_services_about_sentences = array(
            'Residential',
            'Municipal',
            'Commercial',
            'Hospitality',
            'Industrial',
        );
        foreach ($classic_plumbing_services_about_sentences as $classic_plumbing_services_i => $classic_plumbing_services_sentence) {
            $classic_plumbing_services_index = $classic_plumbing_services_i + 1; // Because your loop starts from 1
            set_theme_mod("classic_plumbing_services_about_sentence$classic_plumbing_services_index", $classic_plumbing_services_sentence);
        }
        set_theme_mod( 'classic_plumbing_services_industrial_title', 'Industrial');
        set_theme_mod( 'classic_plumbing_services_industrial_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ante diam, fermentum at tortor eu, consequat gravida ligula.');
        set_theme_mod( 'classic_plumbing_services_experince_count', '30+');
        set_theme_mod( 'classic_plumbing_services_experince_text', 'Years of Experience');

        // Function to fetch or create a page using WP_Query
        function get_or_create_page_by_title( $classic_plumbing_services_page_title, $classic_plumbing_services_page_content = '' ) {
            $classic_plumbing_services_args = array(
                'post_type'      => 'page',
                'title'          => $classic_plumbing_services_page_title,
                'post_status'    => 'publish',
                'posts_per_page' => 1,
                'fields'         => 'ids'
            );
            $classic_plumbing_services_query = new WP_Query( $classic_plumbing_services_args );

            if ( ! empty( $classic_plumbing_services_query->posts ) ) {
                return $classic_plumbing_services_query->posts[0];
            } else {
                // Create the page if it doesn't exist
                $classic_plumbing_services_page_id = wp_insert_post( array(
                    'post_type'    => 'page',
                    'post_title'   => $classic_plumbing_services_page_title,
                    'post_content' => $classic_plumbing_services_page_content,
                    'post_status'  => 'publish',
                    'post_author'  => 1
                ));
                return $classic_plumbing_services_page_id;
            }
        }

        // Create Page
        $classic_plumbing_services_page_title = 'About Us';
        $classic_plumbing_services_page_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ante diam, fermentum at tortor eu, consequat gravida ligula. Cras convallis fringilla elementum. Sed rutrum purus ex, sit amet dictum purus ultrices a. Pellentesque rutrum mauris nisi, non mollis libero lacinia vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in feugiat massa, eu rhoncus neque.';
        $classic_plumbing_services_page_id = get_or_create_page_by_title( $classic_plumbing_services_page_title, $classic_plumbing_services_page_content );

        if ( $classic_plumbing_services_page_id ) {
            set_theme_mod( 'classic_plumbing_services_select_about_page', $classic_plumbing_services_page_id );
        } else {
            error_log('Failed to create or fetch the "Welcome to Corporate Business Theme" page.');
        }

        $classic_plumbing_services_image_url = get_template_directory_uri().'/images/about.png';
        $classic_plumbing_services_image_id = media_sideload_image($classic_plumbing_services_image_url, $classic_plumbing_services_page_id, null, 'id');
        if (!is_wp_error($classic_plumbing_services_image_id)) {
            // Set the downloaded image as the post's featured image
            set_post_thumbnail($classic_plumbing_services_page_id, $classic_plumbing_services_image_id);
        } 

        // Show success message and the "View Site" button
         echo '<div class="success">Demo Import Successful</div>';
    }
     ?>
    <ul>
        <li>
        <hr>
        <?php 
        // Check if the form is submitted
        if ( !isset( $_POST['submit'] ) ) : ?>
           <!-- Show demo importer form only if it's not submitted -->
           <?php echo esc_html( 'Click on the below content to get demo content installed.', 'classic-plumbing-services' ); ?>
          <br>
          <small><b><?php echo esc_html('Please take a backup if your website is already live with data. This importer will overwrite existing data.', 'classic-plumbing-services' ); ?></b></small>
          <br><br>

          <form id="demo-importer-form" action="" method="POST" onsubmit="return confirm('Do you really want to do this?');">
            <input type="submit" name="submit" value="<?php echo esc_attr('Run Importer','classic-plumbing-services'); ?>" class="button button-primary button-large">
          </form>
        <?php 
        endif; 

        // Show "View Site" button after form submission
        if ( isset( $_POST['submit'] ) ) {
        echo '<div class="view-site-btn">';
        echo '<a href="' . esc_url(home_url()) . '" class="button button-primary button-large" style="margin-top: 10px;" target="_blank">View Site</a>';
        echo '</div>';
        }
        ?>

        <hr>
        </li>
    </ul>
 </div>