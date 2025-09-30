<?php
// Remove the Customizer link from upper admin bar 
function remove_customizer_link_from_upper_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('customize');
}
add_action( 'wp_before_admin_bar_render', 'remove_customizer_link_from_upper_bar' ); 

// Remove  the Customizer sub-menu item
function remove_customizer() {
    $customize_url = add_query_arg( 'return', urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER['REQUEST_URI'] ) ) ), 'customize.php' );
	remove_submenu_page( 'themes.php', $customize_url );
}
add_action( 'admin_menu', __NAMESPACE__ . '\remove_customizer' );