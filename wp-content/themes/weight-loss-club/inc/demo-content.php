<div class="theme-offer">
   <?php
     // POST and update the customizer and other related data of Weight Loss Club
    if ( isset( $_POST['submit'] ) ) {

        // Check if Classic Blog Grid plugin is installed
        if (!is_plugin_active('classic-blog-grid/classic-blog-grid.php')) {
            // Plugin slug and file path for Classic Blog Grid
            $weight_loss_club_plugin_slug = 'classic-blog-grid';
            $weight_loss_club_plugin_file = 'classic-blog-grid/classic-blog-grid.php';
        
            // Check if Classic Blog Grid is installed and activated
            if ( ! is_plugin_active( $weight_loss_club_plugin_file ) ) {
        
                // Check if Classic Blog Grid is installed
                $weight_loss_club_installed_plugins = get_plugins();
                if ( ! isset( $weight_loss_club_installed_plugins[ $weight_loss_club_plugin_file ] ) ) {
        
                    // Include necessary files to install plugins
                    include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
                    include_once( ABSPATH . 'wp-admin/includes/file.php' );
                    include_once( ABSPATH . 'wp-admin/includes/misc.php' );
                    include_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );
        
                    // Download and install Classic Blog Grid
                    $weight_loss_club_upgrader = new Plugin_Upgrader();
                    $weight_loss_club_upgrader->install( 'https://downloads.wordpress.org/plugin/classic-blog-grid.latest-stable.zip' );
                }
        
                // Activate the Classic Blog Grid plugin after installation (if needed)
                activate_plugin( $weight_loss_club_plugin_file );
            }
        }

        // ------- Create Main Menu --------
        $weight_loss_club_menuname = 'Primary Menu';
        $weight_loss_club_bpmenulocation = 'primary';
        $weight_loss_club_menu_exists = wp_get_nav_menu_object( $weight_loss_club_menuname );
    
        if (!$weight_loss_club_menu_exists) {
            // Create a new menu
            $weight_loss_club_menu_id = wp_create_nav_menu($weight_loss_club_menuname);

            // Define pages to be created
            $weight_loss_club_pages = array(
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

            $weight_loss_club_page_ids = array();

            // Loop through the pages and create them if they don’t exist
            foreach ($weight_loss_club_pages as $weight_loss_club_slug => $weight_loss_club_data) {
                $weight_loss_club_existing_page = get_page_by_path($weight_loss_club_slug);

                if ($weight_loss_club_existing_page) {
                    // If the page already exists, use its ID
                    $weight_loss_club_page_id = $weight_loss_club_existing_page->ID;
                } else {
                    // Create a new page
                    $weight_loss_club_page_data = array(
                        'post_type'    => 'page',
                        'post_title'   => $weight_loss_club_data['title'],
                        'post_content' => isset($weight_loss_club_data['content']) ? $weight_loss_club_data['content'] : '',
                        'post_status'  => 'publish',
                        'post_author'  => get_current_user_id(), // Set author dynamically
                        'post_name'    => $weight_loss_club_slug,
                    );

                    $weight_loss_club_page_id = wp_insert_post($weight_loss_club_page_data);

                    // Assign custom page template if specified
                    if (!empty($weight_loss_club_data['template'])) {
                        update_post_meta($weight_loss_club_page_id, '_wp_page_template', $weight_loss_club_data['template']);
                    }
                }

                // Store the page IDs
                $weight_loss_club_page_ids[$weight_loss_club_slug] = $weight_loss_club_page_id;
            }

            // Set homepage and blog page
            update_option('page_for_posts', $weight_loss_club_page_ids['blogs']);
            update_option('page_on_front', $weight_loss_club_page_ids['home']);
            update_option('show_on_front', 'page');

            // Define menu items
            $weight_loss_club_menu_items = array(
                'home',
                'about',
                'services',
                'pages',
                'blogs',
            );

            // Add menu items dynamically
            foreach ($weight_loss_club_menu_items as $weight_loss_club_slug) {
                wp_update_nav_menu_item($weight_loss_club_menu_id, 0, array(
                    'menu-item-title' => esc_html($weight_loss_club_pages[$weight_loss_club_slug]['title']),
                    'menu-item-url' => get_permalink($weight_loss_club_page_ids[$weight_loss_club_slug]),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $weight_loss_club_page_ids[$weight_loss_club_slug],
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type',
                ));
            }

            // Assign menu to theme location
            $weight_loss_club_locations = get_theme_mod('nav_menu_locations', array());
            $weight_loss_club_locations[$weight_loss_club_bpmenulocation] = $weight_loss_club_menu_id;
            set_theme_mod('nav_menu_locations', $weight_loss_club_locations);
        }

        //Logo
        set_theme_mod( 'weight_loss_club_the_custom_logo', esc_url( get_template_directory_uri().'/images/Logo.png'));

        //Slider Section
        set_theme_mod( 'weight_loss_club_slider', true);
        set_theme_mod( 'weight_loss_club_slider_sub_title', 'WELCOME TO WEIGHT LOSS THEME');
        set_theme_mod( 'weight_loss_club_button_text', 'READ MORE');
        set_theme_mod( 'weight_loss_club_banner_background_img', esc_url( get_template_directory_uri().'/images/Slider-bg.png'));

        $weight_loss_club_featured_category_id = wp_create_category('Slider');
        set_theme_mod('weight_loss_club_slider_cat', 'Slider');
        
        $weight_loss_club_titles = array(
            'WE PROVIDE BEST WEIGHT LOSS SUPPORT IN TOWN',
            'JOIN OUR COMMUNITY FOR DAILY MOTIVATION',
            'TRANSFORM YOUR BODY WITH OUR CUSTOM PLANS'
        );          
        $weight_loss_club_content = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>';
        
        for ($weight_loss_club_i = 0; $weight_loss_club_i < 3; $weight_loss_club_i++) { // Fixed loop iteration
            set_theme_mod('weight_loss_club_title' . ($weight_loss_club_i + 1), $weight_loss_club_titles[$weight_loss_club_i]);
        
            $weight_loss_club_my_post = array(
                'post_title'    => wp_strip_all_tags($weight_loss_club_titles[$weight_loss_club_i]),
                'post_content'  => $weight_loss_club_content,
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_category' => array($weight_loss_club_featured_category_id),
            );
        
            $weight_loss_club_trainer_post_id = wp_insert_post($weight_loss_club_my_post);
        
            if (!is_wp_error($weight_loss_club_trainer_post_id)) {
                $weight_loss_club_image_url = get_template_directory_uri() . '/images/slider' . ($weight_loss_club_i + 1) . '.png';
                $weight_loss_club_image_id = media_sideload_image($weight_loss_club_image_url, $weight_loss_club_trainer_post_id, null, 'id');
                if (!is_wp_error($weight_loss_club_image_id)) {
                    set_post_thumbnail($weight_loss_club_trainer_post_id, $weight_loss_club_image_id);
                } else {
                    error_log('Failed to set post thumbnail for post ID: ' . $weight_loss_club_trainer_post_id);
                }
            } else {
                error_log('Failed to create post: ' . print_r($weight_loss_club_trainer_post_id, true));
            }
        }   

        //Trainers Section
        set_theme_mod( 'weight_loss_club_disabled_trainers_section', true);
        set_theme_mod( 'weight_loss_club_trainers_title', 'OUR TRAINERS');
        set_theme_mod( 'weight_loss_club_video_button_url', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4');

        $weight_loss_club_featured_trainer_category_id = wp_create_category('Gym Trainers');
        set_theme_mod('weight_loss_club_trainer_cat', 'Gym Trainers');
        
        $weight_loss_club_trainer_titles = array(
            'Margaret Jones',
            'David Lee',
            'Sophia Turner'
        );                 
        $weight_loss_club_trainer_content = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever. since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen</p>';
        
        for ($weight_loss_club_i = 0; $weight_loss_club_i < 3; $weight_loss_club_i++) { // Fixed loop iteration
            set_theme_mod('weight_loss_club_title' . ($weight_loss_club_i + 1), $weight_loss_club_trainer_titles[$weight_loss_club_i]);
        
            $weight_loss_club_trainer_my_post = array(
                'post_title'    => wp_strip_all_tags($weight_loss_club_trainer_titles[$weight_loss_club_i]),
                'post_content'  => $weight_loss_club_trainer_content,
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_category' => array($weight_loss_club_featured_trainer_category_id),
            );
        
            $weight_loss_club_trainer_post_id = wp_insert_post($weight_loss_club_trainer_my_post);
        
            if (!is_wp_error($weight_loss_club_trainer_post_id)) {
                $weight_loss_club_image_url = get_template_directory_uri() . '/images/service' . ($weight_loss_club_i + 1) . '.png';
                $weight_loss_club_image_id = media_sideload_image($weight_loss_club_image_url, $weight_loss_club_trainer_post_id, null, 'id');
                if (!is_wp_error($weight_loss_club_image_id)) {
                    set_post_thumbnail($weight_loss_club_trainer_post_id, $weight_loss_club_image_id);
                } else {
                    error_log('Failed to set post thumbnail for post ID: ' . $weight_loss_club_trainer_post_id);
                }
            } else {
                error_log('Failed to create post: ' . print_r($weight_loss_club_trainer_post_id, true));
            }
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
           <?php echo esc_html( 'Click on the below content to get demo content installed.', 'weight-loss-club' ); ?>
          <br>
          <small><b><?php echo esc_html('Please take a backup if your website is already live with data. This importer will overwrite existing data.', 'weight-loss-club' ); ?></b></small>
          <br><br>

          <form id="demo-importer-form" action="" method="POST" onsubmit="return confirm('Do you really want to do this?');">
            <input type="submit" name="submit" value="<?php echo esc_attr('Run Importer','weight-loss-club'); ?>" class="button button-primary button-large">
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