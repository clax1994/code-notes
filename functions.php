add_action( 'wp_ajax_clax_admin_sidebar', 'sa_clax_admin_sidebar' );
add_action( 'wp_ajax_nopriv_clax_admin_sidebar', 'sa_clax_admin_sidebar' );
/**
 * Retrieves information about the user who is currently logged into the site.
 *
 * This function is intended to be called via the client-side of the public-facing
 * side of the site.
 *
 * @since    1.0.0
 */
function sa_clax_admin_sidebar() {
 	

 	if (current_user_can('editor') || current_user_can('administrator')) {
 		get_template_part( 'side-admin' );
 	}
      else{
      	get_template_part( 'new' );
      }
     
    wp_die();
 
}
