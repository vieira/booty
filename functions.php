<?php
require('lib/nav.php');
require('lib/utils.php');
?>

<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	$side = get_theme_mod( 'sidebar_setting', 'default_value' );

	if($side == 1 || $side == 3){
        register_sidebar( array(
                'name' => 'left sidebar',
                'id' => 'left_sidebar',
                'before_widget' => '<div class="sidebar-nav">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="rounded btn btn-inverse">',
                'after_title' => '</h2><br><br>',
        ) );
	}

	if($side == 2 || $side == 3){

	register_sidebar( array(
                'name' => 'right sidebar',
                'id' => 'right_sidebar',
                'before_widget' => '<div class="sidebar-nav">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="rounded btn btn-inverse">',
                'after_title' => '</h2><br><br>',
        ) );
	}


}
add_action( 'widgets_init', 'arphabet_widgets_init' );

add_action( 'customize_register', 'booty_customize' );

function booty_customize($wp_customize) {
	
	$wp_customize->add_section( 'booty_sidebar_settings', array(
		'title'          => 'Sidebars Scheme',
		'priority'       => 36,
	) );

	$wp_customize->add_setting( 'sidebar_setting', array(
		'default'        => '0',
		//'type'           => 'radio',
		'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'sidebar_setting', array(
		'label'      => 'Sidebar Scheme',
		'section'    => 'booty_sidebar_settings',
		'settings'   => 'sidebar_setting',
		'type'       => 'radio',
		'choices'    => array(
			'0' => 'Sem Sidebar',
			'1' => 'Sidebar Esquerdo',
			'2' => 'Sidebar Direito',
			'3' => 'Sidebar Esquerdo & Direito',
		),
	) );

}

if ( ! function_exists( 'booty_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function booty_content_nav( $nav_id ) {
        global $wp_query;

        if ( $wp_query->max_num_pages > 1 ) : ?>
                <nav id="<?php echo $nav_id; ?>">
<div class="nav-previous muted"><?php next_posts_link( __( '<strong><span class="meta-nav">&larr;</span> Older posts</strong>', 'booty' ) ); ?></div>
<div class="nav-next pull-right muted"><?php previous_posts_link( __( '<strong>Newer posts <span class="meta-nav">&rarr;</span></strong>', 'booty' ) ); ?></div>
                </nav><!-- #nav-above -->
        <?php endif;
}
endif; // twentyeleven_content_nav

/**
 * Load javascripts used by the theme
 */
function custom_theme_js(){
    wp_register_script( 'infinite_scroll',  get_template_directory_uri() . '/js/vendor/jquery.infinitescroll.min.js', array('jquery'),null,true );
    if( ! is_singular() ) {
        wp_enqueue_script('infinite_scroll');
    }
}
add_action('wp_enqueue_scripts', 'custom_theme_js');

/**
 * Infinite Scroll
 */
function custom_infinite_scroll_js() {
    if( ! is_singular() ) { ?>
    <script>
    var infinite_scroll = {
        loading: {
            img: '<div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div>',
            msgText: "<?php _e( 'Loading the next set of posts...', 'custom' ); ?>",
            finishedMsg: "<?php _e( 'All posts loaded.', 'custom' ); ?>"
        },
        "nextSelector":"#nav-below .nav-previous a",
        "navSelector":"#nav-below",
        "itemSelector":"article",
        "contentSelector":"#content"
    };
    jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
    </script>
    <?php
    }
}
add_action( 'wp_footer', 'custom_infinite_scroll_js',100 );

?>

