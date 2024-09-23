<?php
/************************************************************************************** 
    LOADING CSS AND JS FILES

    /// Save this file into a folder named "inc" inside your current theme. For example: child-theme/inc
    Then, include it in your theme or child theme functions.php by using the following:
    require_once get_stylesheet_directory() . '/inc/load-scripts.php';
    
**************************************************************************************/

if ( ! function_exists( 'theme_child_scripts' ) ) {

    function theme_child_scripts(){

        wp_enqueue_script('jquery');

        // Helper function for safe filemtime
        function safe_filemtime($file_path) {
            if (file_exists($file_path)) {
                return filemtime($file_path);
            }
            return '1.0.0'; /
        }


        /**************************************************************************************
            LOAD GOOGLE FONT
        **************************************************************************************/

        wp_enqueue_style( 'noto-serif-font', 'https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&display=swap', false );
        wp_enqueue_style( 'main-styles', get_stylesheet_uri() );



        /**************************************************************************************
            AOS
        **************************************************************************************/
        $cacheAOSCSS = safe_filemtime(get_stylesheet_directory() . '/assets/libraries/aos.css');

        wp_enqueue_style('aoscss', get_stylesheet_directory_uri() . '/assets/libraries/aos.css', array(), $cacheAOSCSS, false, 'all');

        $cacheAOSJS = safe_filemtime(get_stylesheet_directory() . '/assets/libraries/aos.js');
        
        wp_enqueue_script( 'aosjs', get_stylesheet_directory_uri() . '/assets/libraries/aos.js', array( 'jquery' ), $cacheAOSJS, true );



        /**************************************************************************************
            Load Font Awesome
        **************************************************************************************/

		  $cacheFontAwesome = safe_filemtime(get_stylesheet_directory() . '/assets/libraries/fontawesome-6-6-0/css/all.min.css');

        wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/assets/libraries/fontawesome-6-6-0/css/all.min.css', array(), $cacheFontAwesome, false, 'all');



       /**************************************************************************************
            Load General Files
        **************************************************************************************/
        $cacheBusterGeneralCSS = safe_filemtime(get_stylesheet_directory() . '/assets/css/mp-general.min.css');
        wp_enqueue_style('generalcss', get_stylesheet_directory_uri() . '/assets/css/mp-general.min.css', array(), $cacheBusterGeneralCSS, false, 'all');

        $cacheBusterGeneralJS = safe_filemtime(get_stylesheet_directory() . '/assets/js/mp-general.js');
        wp_enqueue_script( 'OneNineGeneralsjs', get_stylesheet_directory_uri() . '/assets/js/mp-general.js', array( 'jquery' ), $cacheBusterGeneralJS, true );



        /**************************************************************************************
            Load CSS & JS for Blog & Posts
        **************************************************************************************/
        $cacheBusterBlogCSS = safe_filemtime(get_stylesheet_directory() . '/assets/css/mp-blog.min.css');
        if (is_home() || is_singular('post') || is_search() || is_page( 282 )) {
            wp_enqueue_style('blogcss', get_stylesheet_directory_uri() . '/assets/css/mp-blog.min.css', array(), $cacheBusterBlogCSS, false, 'all');

            $cacheBusterBlogJS = safe_filemtime(get_stylesheet_directory() . '/assets/js/mp-blog.js');
            wp_enqueue_script( 'blogjs', get_stylesheet_directory_uri() . '/assets/js/mp-blog.js', array( 'jquery' ), $cacheBusterBlogJS, true );
        }



        /**************************************************************************************
            Load CSS & JS for About Page
        **************************************************************************************/
        $cacheBusterAboutCSS = safe_filemtime(get_stylesheet_directory() . '/assets/css/mp-about.min.css');
        $cacheBusterAboutJS = safe_filemtime(get_stylesheet_directory() . '/assets/js/mp-about.js');

        if (is_page( 244 )) {
            wp_enqueue_style('aboutcss', get_stylesheet_directory_uri() . '/assets/css/mp-about.min.css', array(), $cacheBusterAboutCSS, false, 'all');
            wp_enqueue_script( 'aboutjs', get_stylesheet_directory_uri() . '/assets/js/mp-about.js', array( 'jquery' ), $cacheBusterAboutJS, true );
        } 
        

    }
}

add_action( 'wp_enqueue_scripts', 'theme_child_scripts' );
