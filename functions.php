<?php   
// Update the version only when the styles are saved
define( 'THEME_VERSION', filemtime( get_template_directory() . '/styles/style.css' ) );

// Load styles
function load_stylesheets() {	
	// Mandatory WP file
	wp_enqueue_style( 'style', get_stylesheet_uri(), null, THEME_VERSION);

	// Global styles
	wp_enqueue_style( 'main', get_template_directory_uri() . "/styles/style.css", null, THEME_VERSION);

	// Page based styles
	if(is_front_page()) {
		wp_enqueue_style( 'front-page', get_template_directory_uri() . "/styles/front-page/front-page.css", null, THEME_VERSION);
	}
}
add_action ( 'wp_enqueue_scripts', 'load_stylesheets' );

// Load scripts
function load_scripts() {
	// Bootstrap library
	wp_register_script('bootstrap-scripts',  get_template_directory_uri() . "/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js", [], null, true);
    wp_enqueue_script('bootstrap-scripts');

	// Gsap for on-scroll animations
	// gsap core
	wp_register_script('gsap-core',  "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js", [], null, true);
    wp_enqueue_script('gsap-core');

	// gsap scrolltrigger
	wp_register_script('gsap-scrolltrigger',  "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/ScrollTrigger.min.js", [], null, true);
    wp_enqueue_script('gsap-scrolltrigger');
	
	// General custom scripts
	wp_register_script('scripts',  get_template_directory_uri() . "/assets/custom-js/scripts.js", [], THEME_VERSION, true );
	wp_enqueue_script('scripts');

	// Custom on-scroll animations using gsap
	wp_register_script('scroll-animations',  get_template_directory_uri() . "/assets/custom-js/scroll-animations.js", [], THEME_VERSION, true);
	wp_enqueue_script('scroll-animations');
}
add_action('wp_enqueue_scripts', 'load_scripts');


// BS5 Nav walker
require_once('inc/bs5-nav-walker.php');

// Basic general settins (menus, acf, excerpt) etc.
require_once('inc/basic-wp-settings.php');

// Page speed optimization
require_once('inc/page-speed.php');

// Administration:
require_once('inc/administration/disable-comments.php');
require_once('inc/administration/enable-svg.php');
require_once('inc/administration/remove-customizer.php');

// Custom functions:
require_once('inc/team-members-cpt.php');
require_once('inc/administration/register-acf-fields.php');
require_once('inc/register-blocks.php');
require_once('inc/utils.php');