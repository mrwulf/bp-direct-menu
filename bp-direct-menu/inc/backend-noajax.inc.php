<?php
if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

/* Add a metabox in admin menu page */
add_action('admin_head-nav-menus.php', 'bpdm_add_nav_menu_metabox');
function bpdm_add_nav_menu_metabox() {
	add_meta_box( 'bpdm', __( 'BuddyPress Direct Links' ) . ' v' . BPDIRECTMENU_VERSION, 'bpdm_nav_menu_metabox', 'nav-menus', 'side', 'default' );
}

/* The metabox code : Awesome code stolen from screenfeed.fr (GregLone) Thank you mate. */
function bpdm_nav_menu_metabox( $object )
{
	global $nav_menu_selected_id;

	$elems = array( '#bpdmlogin#' => __( 'Log In' ), 
					'#bpdmlogout#' => __( 'Log Out' ), 
					'#bpdmloginout#' => __( 'Log In' ).'|'.__( 'Log Out' ), 
					'#bpdmregister#' => __( 'Register' ) ,
					'#bpdmcustom#' => __( 'Custom Direct Link' )
				   );
	class bpdmlogItems {
		public $db_id = 0;
		public $object = 'bpdmlog';
		public $object_id;
		public $menu_item_parent = 0;
		public $type = 'custom';
		public $title;
		public $url;
		public $target = '';
		public $attr_title = '';
		public $classes = array();
		public $xfn = '';
	}

	$elems_obj = array();
	foreach ( $elems as $value => $title ) {
		$elems_obj[$title] = new bpdmlogItems();
		$elems_obj[$title]->object_id	= esc_attr( $value );
		$elems_obj[$title]->title		= esc_attr( $title );
		$elems_obj[$title]->url			= esc_attr( $value );
	}

	$walker = new Walker_Nav_Menu_Checklist( array() );
	?>
	<div id="bp-direct-links" class="bpdirectlinksdiv">
		<div id="tabs-panel-bp-direct-links-all" class="tabs-panel tabs-panel-view-all tabs-panel-active">
			<ul id="bp-direct-linkschecklist" class="list:bp-direct-links categorychecklist form-no-clear">
				<?php echo walk_nav_menu_tree( array_map( 'wp_setup_nav_menu_item', $elems_obj ), 0, (object)array( 'walker' => $walker ) ); ?>
			</ul>
		</div>

		<p class="button-controls">
			<span class="list-controls hide-if-no-js">
				<a href="javascript:void(0);" class="help" onclick="jQuery( '#help-bp-direct-links' ).toggle();"><?php _e( 'Help' ); ?></a>
				<span class="hide-if-js" id="help-bp-direct-links"><br /><a name="help-bp-direct-links"></a>
					<?php
						echo '&#9725; You can add a redirection page after the user\'s login/logout simply adding a relative link after the link\'s keyword, example <code>#bpdmloginout#index.php</code>.';
						echo '<br />&#9725; You can also add <code>%actualpage%</code> to redirect the user on the actual visited page, example : <code>#bpdmloginout#%actualpage%</code>.';
						echo '<br />&#9725; For the custom link, put the url-piece after the keyword, example : <code>#bpdmcustom#/activity/friends/</code> will redirect to: <code>http://%site%/members/%username%/activity/friends/</code>.  Custom links only show up when a user is logged in.';
					?>
				</span>
			</span>

			<span class="add-to-menu">
				<input type="submit"<?php disabled( $nav_menu_selected_id, 0 ); ?> class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu'); ?>" name="add-bp-direct-links-menu-item" id="submit-bp-direct-links" />
				<span class="spinner"></span>
			</span>
		</p>
	</div>
	<?php
}

/* Modify the "type_label" */
add_filter( 'wp_setup_nav_menu_item', 'bpdm_nav_menu_type_label' );
function bpdm_nav_menu_type_label( $menu_item )
{
	$elems = array( '#bpdmlogin#', '#bpdmlogout#', '#bpdmloginout#', '#bpdmregister#', '#bpdmcustom#' );
	if ( isset($menu_item->object, $menu_item->url) && $menu_item->object == 'custom' && in_array($menu_item->url, $elems) )
		$menu_item->type_label = ( 'BP Direct Link' );
	return $menu_item;
}