<?php
if ( ! function_exists( 'film_studio_setup' ) ) :
function film_studio_setup() {

// Root path/URI.
define( 'FILM_STUDIO_PARENT_DIR', get_template_directory() );
define( 'FILM_STUDIO_PARENT_URI', get_template_directory_uri() );

// Root path/URI.
define( 'FILM_STUDIO_PARENT_INC_DIR', FILM_STUDIO_PARENT_DIR . '/inc');
define( 'FILM_STUDIO_PARENT_INC_URI', FILM_STUDIO_PARENT_URI . '/inc');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );

	add_theme_support( 'responsive-embeds' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'film-studio' );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary-menu'  => esc_html__( 'Primary Menu', 'film-studio' ),
		'responsive-menu'  => esc_html__( 'Responsive Menu', 'film-studio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	
	add_theme_support('custom-logo');

	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	// Gutenberg wide images.
	add_theme_support( 'align-wide' );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', film_studio_google_font() ) );
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'film_studio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'film_studio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function film_studio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'film_studio_content_width', 1170 );
}
add_action( 'after_setup_theme', 'film_studio_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function film_studio_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'film-studio' ),
		'id' => 'film-studio-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'film-studio' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><div class="title"><span class="shap"></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'film-studio' ),
		'id' => 'film-studio-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'film-studio' ),
		'before_widget' => '<div class="footer-widget col-lg-3 col-sm-6 wow fadeIn" data-wow-delay="0.2s"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title w-title">',
		'after_title' => '</h5><span class="shap"></span>',
	) );
}
add_action( 'widgets_init', 'film_studio_widgets_init' );

/**
 * All Styles & Scripts.
 */

require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

require_once get_template_directory() . '/wptt-webfont-loader.php';

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/aboutthemes/about-theme.php' );

/*
 * Enable support for Post Formats.
 *
 * See: https://codex.wordpress.org/Post_Formats
*/
add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

add_filter( 'nav_menu_link_attributes', 'film_studio_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function film_studio_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

function film_studio_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/customizer/customizer-custom-controls.php' );
}
add_action( 'customize_register', 'film_studio_custom_controls' );

function film_studio_activation_notice() {
    // Check if the notice has already been dismissed
    if (get_option('film_studio_notice_dismissed')) {
        return;
    }
    ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="film-studio-getting-started-notice clearfix">
            <div class="film-studio-theme-notice-content">
                <h2 class="film-studio-notice-h2">
                    <?php
                    printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                        esc_html__('Welcome! Thank you for choosing %1$s!', 'film-studio'), '<strong>' . wp_get_theme()->get('Name') . '</strong>');
                    ?>
                </h2>
            
                <a class="film-studio-btn-get-started button button-primary button-hero film-studio-button-padding" href="<?php echo esc_url(admin_url('themes.php?page=film-studio-about')); ?>"><?php esc_html_e('Get started', 'film-studio') ?></a><span class="film-studio-push-down">
            </div>
        </div>
    </div>
    <?php
}

add_action('admin_notices', 'film_studio_activation_notice');

// Add Ajax action to handle dismiss
add_action('wp_ajax_dismiss_film_studio_notice', 'dismiss_film_studio_notice');

// Reset the dismissed status when the theme is activated
function reset_film_studio_notice_status() {
    delete_option('film_studio_notice_dismissed');
}
add_action('after_switch_theme', 'reset_film_studio_notice_status');

function dismiss_film_studio_notice() {
    update_option('film_studio_notice_dismissed', true);
    wp_die('Notice dismissed');
}


function remove_theme_customizer_setting($wp_customize) {
    // Remove the setting
    $wp_customize->remove_setting('display_header_text');
    // Remove the control
    $wp_customize->remove_control('display_header_text');
}
add_action('customize_register', 'remove_theme_customizer_setting', 20); 
// Use a priority greater than the one used for adding the setting

// Set the number of products per row to 3 on the shop page
add_filter('loop_shop_columns', 'film_studio_custom_shop_loop_columns');

if (!function_exists('film_studio_custom_shop_loop_columns')) {
    function film_studio_custom_shop_loop_columns() {
        // Retrieve the number of columns from theme customizer setting (default: 3)
        $columns = get_theme_mod('film_studio_custom_shop_per_columns', 3);
        return $columns;
    }
}

// Set the number of products per page on the shop page
add_filter('loop_shop_per_page', 'film_studio_custom_shop_per_page', 20);

if (!function_exists('film_studio_custom_shop_per_page')) {
    function film_studio_custom_shop_per_page($products_per_page) {
        // Retrieve the number of products per page from theme customizer setting (default: 9)
        $products_per_page = get_theme_mod('film_studio_custom_shop_product_per_page', 9);
        return $products_per_page;
    }
}
