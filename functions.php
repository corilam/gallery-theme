<?php
/**
 * Gallery functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gallery
 */

if ( ! function_exists( 'gallery_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gallery_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Gallery, use a find and replace
	 * to change 'gallery' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gallery', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	// register_nav_menus( array(
	//	'primary' => esc_html__( 'Primary', 'gallery' ),
	//) );

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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gallery_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'gallery_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gallery_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gallery_content_width', 640 );
}
add_action( 'after_setup_theme', 'gallery_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gallery_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gallery' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gallery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gallery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gallery_scripts() {
	wp_enqueue_style( 'gallery-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gallery-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gallery-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gallery_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function artify_custom_enqueue_child_theme_styles() {
wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'artify_custom_enqueue_child_theme_styles' );

function gallery_theme_scripts() {
	wp_enqueue_style( 'dobsondev-neet-theme-style', get_stylesheet_uri() );
	wp_register_script( 'misc', get_template_directory_uri() . '/js/misc.js', array('jquery'), true);
	wp_enqueue_script('misc');
	wp_register_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.js', true);
	wp_enqueue_script('lightbox');
	/* Add Foundation CSS */
	wp_enqueue_style( 'foundation-style', get_template_directory_uri() . '/foundation/css/foundation.min.css', array(), 'all' );
	/* Animate.CSS */
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), 'all' );
	/* Font Awesome */
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), 'all' );
	/* Waypoints */
	wp_register_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '', true );
	wp_enqueue_script('wow');
	/* Add Foundation JS */
	wp_enqueue_script( 'what-input', get_template_directory_uri() . '/foundation/js/vendor/what-input.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'foundation-app', get_template_directory_uri() . '/foundation/js/app.js', array( 'jquery' ), true );
	/* Foundation Init JS */
	wp_enqueue_script( 'foundation-init-js', get_template_directory_uri() . '/foundation/js/vendor/foundation.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/foundation/js/vendor/jquery.js', array( 'jquery' ), '', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gallery_theme_scripts' );

function load_custom_wp_admin_style() {
        wp_register_script( 'media-lib-uploader',  get_template_directory_uri() . '/uploader.js', array('jquery'), '', true );
		wp_enqueue_script( 'media-lib-uploader' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/* Custom Menus */
register_nav_menus( array(
	'main-nav' => 'Primary Menu',
));

/* Custom Images Sizes */
add_image_size('slideshow',1300, 500, true);
add_image_size('home-thumbnail', 370, 300, true);
add_image_size('Artist Header', 1200, 500, true);
add_image_size('exhibit-page', 600, 400, true);
add_image_size('other-news', 360, 200, true);
add_image_size('other-news', 800, 300, true);

/* Hide custom fields  */
add_action('admin_init','remove_custom_meta_boxes');
function remove_custom_meta_boxes() {
remove_meta_box('postcustom','post','normal');
remove_meta_box('postcustom','page','normal');
remove_meta_box('postcustom','artists','normal');
remove_meta_box('postcustom','events','normal');
remove_meta_box('postcustom','news','normal');
}

/* Options Framework Init- thanks to WPTheming.com for the great addition to this theme! */
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_stylesheet_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

/* Change Excerpt length */
function gallery_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'gallery_excerpt_length', 999 );

/* 
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
	
	$optionsframework_settings = get_option('optionsframework');
	
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
		
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}

function owl_scripts() {
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'owl', '//cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js', 'jquery', false );
  wp_enqueue_style('owl-carousel', '//cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css');
  wp_enqueue_style('owl-theme', get_template_directory_uri() . '/css/owl.theme.css');
  wp_enqueue_style('owl-transitions', get_template_directory_uri() . '/css/owl.transitions.css');
}
add_action( 'wp_enqueue_scripts', 'owl_scripts');

function init_in_footer() {
	add_action( 'print_footer_scripts', 'footer_init' );
}
add_action('wp_enqueue_scripts', 'init_in_footer');

function gallery_widgets() {
register_sidebar (array(
	'name'          => __( 'Footer1', 'gallery' ),
	'id'            => 'footer-1',
	'description'   => '',
    'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
	));	
register_sidebar (array(
	'name'          => __( 'Footer 2', 'gallery' ),
	'id'            => 'footer-2',
	'description'   => '',
    'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
	));	
register_sidebar (array(
	'name'          => __( 'Footer 3', 'gallery' ),
	'id'            => 'footer-3',
	'description'   => '',
    'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
	));
}
add_action( 'widgets_init', 'gallery_widgets' );

/*// Show Future Posts- disabled
function show_future_posts($posts)
{
   global $wp_query, $wpdb;
   if(is_single() && $wp_query->post_count == 0)
   {
      $posts = $wpdb->get_results($wp_query->request);
   }
   return $posts;
}
add_filter('the_posts', 'show_future_posts');*/

add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;
});

// Custom Post Types
function gallery_register_post_type() {
	
	$artistLabels = array(
        'name' => __('Artists'),
        'singular_name' => __('Artist'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Artist'),
        'edit_item' => __('Edit Artist'),
        'new_item' => __('New Artist'),
        'all_items' => __('All Artists'),
        'view_item' => __('View Artist'),
        'search_items' => __('Search Artists'),
        'not_found' => __('No Artist was found'),
        'not_found_in_trash' => __('No Artist was found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => __('Artists')
    );

    $artistArgs = array(
        'labels' => $artistLabels,
        'public' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'menu_icon' => 'dashicons-art',
        'query_var' => true,
        'rewrite' => array('slug' => 'artist-cats'),
        'has_archive' => true,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
//            'trackbacks',
            'custom-fields',
//            'comments',
            'revisions',
//            'page-attributes',
//            'post-formats',
        )
    );	
    register_post_type('artists', $artistArgs);
	
	$eventLabels = array(
        'name' => __('Events'),
        'singular_name' => __('Event'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Event'),
        'edit_item' => __('Edit Event'),
        'new_item' => __('New Event'),
        'all_items' => __('All Events'),
        'view_item' => __('View Event'),
        'search_items' => __('Search Event'),
        'not_found' => __('No Event was found'),
        'not_found_in_trash' => __('No Event was found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => __('Events')
    );

    $eventArgs = array(
        'labels' => $eventLabels,
        'public' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'menu_icon' => 'dashicons-calendar',
        'query_var' => true,
        'rewrite' => array('slug' => 'event-cats'),
        'has_archive' => true,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
//            'trackbacks',
            'custom-fields',
//            'comments',
            'revisions',
//            'page-attributes',
//            'post-formats',
		)
    );	
    register_post_type('events', $eventArgs);
	
	$newsLabels = array(
        'name' => __('News'),
        'singular_name' => __('News'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add News'),
        'edit_item' => __('Edit News'),
        'new_item' => __('New News'),
        'all_items' => __('All News'),
        'view_item' => __('View News'),
        'search_items' => __('Search News'),
        'not_found' => __('No News was found'),
        'not_found_in_trash' => __('No News was found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => __('News')
    );

    $newsArgs = array(
        'labels' => $newsLabels,
        'public' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'menu_icon' => 'dashicons-media-text',
        'query_var' => true,
        'rewrite' => array('slug' => 'news-cats'),
        'has_archive' => true,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
//            'trackbacks',
            'custom-fields',
//            'comments',
            'revisions',
//            'page-attributes',
//            'post-formats',
        )
    );
	
    register_post_type('news', $newsArgs);
}
add_action('init', 'gallery_register_post_type');

function gallery_taxonomies() {
    register_taxonomy(
        'event_categories',
        'events',
        array(
            'labels' => array(
                'name' => 'Event Categories',
                'add_new_item' => 'Add New Event Category',
                'new_item_name' => "New Event Type Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
	register_taxonomy(
        'artist_categories',
        'artists',
        array(
            'labels' => array(
                'name' => 'Artist Categories',
                'add_new_item' => 'Add New Artist Category',
                'new_item_name' => "New Artist Type Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
	);
	register_taxonomy(
        'news_categories',
        'news',
        array(
            'labels' => array(
                'name' => 'News Categories',
                'add_new_item' => 'Add News Category',
                'new_item_name' => "News Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
	);
}
add_action( 'init', 'gallery_taxonomies', 0 );

// Create Featured Post category programatically
function create_featured_post_category() {
	wp_insert_term(
		'Featured',
		'category',
		array(
		  'description'	=> 'Shows posts on the home page',
		  'slug' => 'featured-post'
		)
	);
}
add_action( 'after_setup_theme', 'create_featured_post_category' );

// Create Featured Artist category programatically
function create_featured_artist_category() {
	wp_insert_term(
		'Featured',
		'artist_categories',
		array(
		  'description'	=> 'Shows posts on the home page',
		  'slug' => 'featured-artist'
		)
	);
}
add_action( 'init', 'create_featured_artist_category' );

// Create Featured Artist category programatically
function create_featured_news_category() {
	wp_insert_term(
		'Featured',
		'news_categories',
		array(
		  'description'	=> 'Shows posts on the home page',
		  'slug' => 'featured-news'
		)
	);
}
add_action( 'init', 'create_featured_news_category' );

// Create Featured Artist category programatically
function create_featured_events_category() {
	wp_insert_term(
		'Featured',
		'event_categories',
		array(
		  'description'	=> 'Shows posts on the home page',
		  'slug' => 'featured-events'
		)
	);
}
add_action( 'init', 'create_featured_events_category' );

// Add Meta Boxes
function add_custom_meta_box() {
    add_meta_box(
        'custom_meta_box', // $id
        'Artist Details', // $title 
        'show_custom_meta_box', // $callback
        'artists', // $page
        'normal', // $context
        'high'); // $priority		
}
add_action('add_meta_boxes', 'add_custom_meta_box');
// Field Array
$prefix = 'tf_';
$custom_meta_fields = array(
	array(
        'label'=> 'Life Details',
        'desc'  => 'Birth-Death, Place',
        'id'    => $prefix.'lifespan',
        'type'  => 'text'),
	array(
		'label'=> 'Biography',
        'desc'  => 'Artist Bio, use HTML for line breaks and styling',
        'id'    => $prefix.'biography',
        'type'  => 'textarea')
	);
	
// The Callback
function show_custom_meta_box() {
global $custom_meta_fields, $post;
// Use nonce for verification
wp_nonce_field( basename( __FILE__ ), 'custom_meta_box_nonce' );
     
    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($custom_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
                switch($field['type']) {
                    // text
					case 'text':
    					echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
        			<br /><span class="description">'.$field['desc'].'</span>';
					break;
					case 'textarea':
    					echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
					break;
                } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

// Save the Data
function save_custom_meta($post_id) {
    global $custom_meta_fields;
     
    // verify nonce
    if (!isset($_POST['custom_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }
     
// loop through fields and save the data
    foreach ($custom_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_custom_meta');


function add_bldob_meta_box()
{global $post;
    if(!empty($post))
    {$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'page-templates/home-page.php' )
        {
    add_meta_box(
        'bldob_meta_box', // $id
        'Home Page Options', // $title
        'show_bldob_meta_box', // $callback
		'page', //$post
        'normal', // $context
        'high'); // $priority
		}
	}
}

add_action('add_meta_boxes', 'add_bldob_meta_box');

// Field Array
$prefix = 'bldob_';
$bldob_meta_fields = array(
	array(
       	'label'=> 'Top 3 Blocks Display',
        'desc'  => 'Display top 3 blocks?',
        'id'    => $prefix.'checkbox_top',
        'type'  => 'checkbox'
	),
	array(
    	'label'    => 'Home Slide Category',
    	'desc'    => 'Choose from Blog, News, Events or Artists',
    	'id'      => $prefix . 'slideselect',
    	'type'    => 'select',
    	'options' => array(
            'one' => array (
                'label' => 'Events',
                'value' => 'events'
            ),
			'two' => array (
                'label' => 'Artists',
                'value' => 'artists'
            ),
            'three' => array (
                'label' => 'News',
                'value' => 'news'
			),
			'four' => array (
                'label' => 'Blog',
                'value' => 'post'
			)
		)
	),
	array(
    	'label' => 'Featured Box 1 Title',
    	'desc'  => 'Title of the 1st Featured Box',
    	'id'    => $prefix.'home_box_title_1',
    	'type'  => 'text'
	),
	array(
    	'label'    => 'Featured Box 1',
    	'desc'    => 'Select a category',
    	'id'      => $prefix . 'home_box_1',
    	'type'    => 'select',
    	'options' => array(
            'one' => array (
                'label' => 'Events',
                'value' => 'events'
            ),
			'two' => array (
                'label' => 'Artists',
                'value' => 'artists'
            ),
            'three' => array (
                'label' => 'News',
                'value' => 'news'
			),
			'four' => array (
                'label' => 'Blog',
                'value' => 'post'
			)
		)
	),
	array(
    	'label' => 'Featured Box 2 Title',
    	'desc'  => 'Title of the 2nd Featured Box',
    	'id'    => $prefix.'home_box_title_2',
    	'type'  => 'text'
	),
	array(
    	'label'    => 'Featured Box 2',
    	'desc'    => 'Select a category',
    	'id'      => $prefix . 'home_box_2',
    	'type'    => 'select',
    	'options' => array(
            'one' => array (
                'label' => 'Events',
                'value' => 'events'
            ),
			'two' => array (
                'label' => 'Artists',
                'value' => 'artists'
            ),
            'three' => array (
                'label' => 'News',
                'value' => 'news'
			),
			'four' => array (
                'label' => 'Blog',
                'value' => 'post'
			)
		)
	),
	array(
    	'label' => 'Featured Box 3 Title',
    	'desc'  => 'Title of the 3rd Featured Box',
    	'id'    => $prefix.'home_box_title_3',
    	'type'  => 'text'
	),
	array(
    	'label'    => 'Featured Box 3',
    	'desc'    => 'Select a category',
    	'id'      => $prefix . 'home_box_3',
    	'type'    => 'select',
    	'options' => array(
            'one' => array (
                'label' => 'Events',
                'value' => 'events'
            ),
			'two' => array (
                'label' => 'Artists',
                'value' => 'artists'
            ),
            'three' => array (
                'label' => 'News',
                'value' => 'news'
			),
			'four' => array (
                'label' => 'Blog',
                'value' => 'post'
			)
		)
	),
	array(
       	'label'=> 'Bottom Display',
        'desc'  => 'Display 3 of the same blocks',
        'id'    => $prefix.'checkbox',
        'type'  => 'checkbox'
	),
	array(
    	'label' => 'Featured Box 4 Title',
    	'desc'  => 'Title of the bottom row blocks',
    	'id'    => $prefix.'home_box_title_4',
    	'type'  => 'text'
	),
	array(
    	'label'    => 'Featured Box 4',
    	'desc'    => 'Select a category',
    	'id'      => $prefix . 'home_box_4',
    	'type'    => 'select',
    	'options' => array(
            'one' => array (
                'label' => 'Events',
                'value' => 'events'
            ),
			'two' => array (
                'label' => 'Artists',
                'value' => 'artists'
            ),
            'three' => array (
                'label' => 'News',
                'value' => 'news'
			),
			'four' => array (
                'label' => 'Blog',
                'value' => 'post'
			)
		) 		
	)
);

function show_bldob_meta_box() {
global $bldob_meta_fields, $post;

// Use nonce for verification
echo '<input type="hidden" name="bldob_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($bldob_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
                switch($field['type']) {
					// Home page options
					case 'text':
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
							<br /><span class="description">'.$field['desc'].'</span>';
					break;
					case 'select':
    					echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
    					foreach ($field['options'] as $option) {
        				echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
    					}
    					echo '</select><br /><span class="description">'.$field['desc'].'</span>';
					break;
					case 'checkbox':
    					echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
        				<label for="'.$field['id'].'">'.$field['desc'].'</label>';
						break;
                } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

// Save the Data
function save_bldob_meta($post_id) {
    global $bldob_meta_fields;
// verify nonce
    if (!isset($_POST['bldob_meta_box_nonce']) || !wp_verify_nonce($_POST['bldob_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
		}

    // loop through fields and save the data
    foreach ($bldob_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_bldob_meta');

// Event meta boxes for specifics
function add_eve_meta_box(){
    add_meta_box(
        'eve_meta_box', // $id
        'Event Specifics', // $title
        'show_eve_meta_box', // $callback
		'events', //$post
        'normal', // $context
        'high'); // $priority
	}

add_action('add_meta_boxes', 'add_eve_meta_box');

// Field Array
$prefix = 'eve_';
$eve_meta_fields = array(
	array(
    	'label' => 'Event Details',
    	'desc'  => 'Your title for this section',
    	'id'    => $prefix.'details',
    	'type'  => 'text'
	),
	array(
    	'label' => 'Event Date & Time',
    	'desc'  => 'For display purposes- this looks nicer :-)',
    	'id'    => $prefix.'date',
    	'type'  => 'text'
	),
	array(
    	'label' => 'Event Location',
    	'desc'  => 'Where the event is taking place?',
    	'id'    => $prefix.'location',
    	'type'  => 'text'
	),
	array(
    	'label' => 'Cost',
    	'desc'  => 'Cost (optional)',
    	'id'    => $prefix.'cost',
    	'type'  => 'text'
	),
	array(
    	'label' => 'Other Info',
    	'desc'  => 'Additional Info (optional)',
    	'id'    => $prefix.'misc',
		'std'   => '',
    	'type'  => 'textarea'
	),
	array(
       	'label'=> 'Upcoming events',
        'desc'  => 'Display other Upcoming Events at the bottom of the page?',
        'id'    => $prefix.'checkbox',
        'type'  => 'checkbox'
	),
	array(
    	'label' => 'Upcoming Events Label',
    	'desc'  => 'What you want to call the Upcoming Events block at the bottom',
    	'id'    => $prefix.'past_label',
    	'type'  => 'text'
	),
);

function show_eve_meta_box() {
global $eve_meta_fields, $post;

// Use nonce for verification
echo '<input type="hidden" name="eve_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($eve_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
                switch($field['type']) {
                    // case items will go here

					// Home page options
					case 'text':
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
							<br /><span class="description">'.$field['desc'].'</span>';
					break;
					case 'textarea':
    					echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
					break;
					// checkbox
					case 'checkbox':
    					echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
        				<label for="'.$field['id'].'">'.$field['desc'].'</label>';
							break;
                } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

// Save the Data
function save_eve_meta($post_id) {
    global $eve_meta_fields;
// verify nonce
    if (!isset($_POST['eve_meta_box_nonce']) || !wp_verify_nonce($_POST['eve_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
		}

    // loop through fields and save the data
    foreach ($eve_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_eve_meta');

function add_ge_meta_box()
{global $post;
    if(!empty($post))
    {$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'page-templates/events-page.php' )
        {
    add_meta_box(
        'ge_meta_box', // $id
        'Events Page Options', // $title
        'show_ge_meta_box', // $callback
		'page', //$post
        'normal', // $context
        'high'); // $priority
		}
	}
}

add_action('add_meta_boxes', 'add_ge_meta_box');

// Field Array
$prefix = 'ge_';
$ge_meta_fields = array(
	array(
       	'label'=> 'Past Events',
        'desc'  => 'Display Past Events?',
        'id'    => $prefix.'checkbox',
        'type'  => 'checkbox'
		),
	array(
    	'name' => 'Past Events Title',
		'label' => 'Past Events Title',
    	'desc' => 'What do you want to call the past events section?',
    	'id' => $prefix . 'past_label',
    	'type' => 'text'
		)
);

function show_ge_meta_box() {
global $ge_meta_fields, $post;

// Use nonce for verification
echo '<input type="hidden" name="ge_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($ge_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
                switch($field['type']) {
					// Text
					case 'text':
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
							<br /><span class="description">'.$field['desc'].'</span>';
							break;
					// checkbox
					case 'checkbox':
    					echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
        				<label for="'.$field['id'].'">'.$field['desc'].'</label>';
							break;
                } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

// Save the Data
function save_ge_meta($post_id) {
    global $ge_meta_fields;

    // verify nonce
    // verify nonce
    if (!isset($_POST['ge_meta_box_nonce']) || !wp_verify_nonce($_POST['ge_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
		}
	// loop through fields and save the data
    foreach ($ge_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
}
}
add_action('save_post', 'save_ge_meta');



function prfx_custom_meta() {
    add_meta_box( 'prfx_meta', __( 'Art', 'prfx-textdomain' ), 'prfx_meta_callback', 'artists','normal', 'high' );
}
add_action( 'add_meta_boxes', 'prfx_custom_meta' );

function prfx_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>
 
    <p>
    <label for="meta-image1" class="prfx-row-title"><?php _e( 'Image and Description 1', 'prfx-textdomain' )?></label>
    <input type="text" name="meta-image1" id="meta-image1" value="<?php if ( isset ( $prfx_stored_meta['meta-image1'] ) ) echo $prfx_stored_meta['meta-image1'][0]; ?>" />
    <input type="button" id="meta-image-button1" class="button" value="<?php _e( 'Choose Image', 'prfx-textdomain' )?>" />
	<input type="text" name="meta-image-description1" id="meta-image-description1" value="<?php if ( isset ( $prfx_stored_meta['meta-image-description1'] ) ) echo $prfx_stored_meta['meta-image-description1'][0]; ?>" />
	</p>
	
	<p>
    <label for="meta-image2" class="prfx-row-title"><?php _e( 'Image and Description 2', 'prfx-textdomain' )?></label>
    <input type="text" name="meta-image2" id="meta-image2" value="<?php if ( isset ( $prfx_stored_meta['meta-image2'] ) ) echo $prfx_stored_meta['meta-image2'][0]; ?>" />
    <input type="button" id="meta-image-button2" class="button" value="<?php _e( 'Choose Image', 'prfx-textdomain' )?>" />
	<input type="text" name="meta-image-description2" id="meta-image-description2" value="<?php if ( isset ( $prfx_stored_meta['meta-image-description2'] ) ) echo $prfx_stored_meta['meta-image-description2'][0]; ?>" />
	</p>
	
	<p>
    <label for="meta-image3" class="prfx-row-title"><?php _e( 'Image and Description 3', 'prfx-textdomain' )?></label>
    <input type="text" name="meta-image3" id="meta-image3" value="<?php if ( isset ( $prfx_stored_meta['meta-image3'] ) ) echo $prfx_stored_meta['meta-image3'][0]; ?>" />
    <input type="button" id="meta-image-button3" class="button" value="<?php _e( 'Choose Image', 'prfx-textdomain' )?>" />
	<input type="text" name="meta-image-description3" id="meta-image-description3" value="<?php if ( isset ( $prfx_stored_meta['meta-image-description3'] ) ) echo $prfx_stored_meta['meta-image-description3'][0]; ?>" />
	</p>
	
	<p>
    <label for="meta-image4" class="prfx-row-title"><?php _e( 'Image and Description 4', 'prfx-textdomain' )?></label>
    <input type="text" name="meta-image4" id="meta-image4" value="<?php if ( isset ( $prfx_stored_meta['meta-image4'] ) ) echo $prfx_stored_meta['meta-image4'][0]; ?>" />
    <input type="button" id="meta-image-button4" class="button" value="<?php _e( 'Choose Image', 'prfx-textdomain' )?>" />
	<input type="text" name="meta-image-description4" id="meta-image-description4" value="<?php if ( isset ( $prfx_stored_meta['meta-image-description4'] ) ) echo $prfx_stored_meta['meta-image-description4'][0]; ?>" />
	</p>
	
	<p>
    <label for="meta-image5" class="prfx-row-title"><?php _e( 'Image and Description 5', 'prfx-textdomain' )?></label>
    <input type="text" name="meta-image5" id="meta-image5" value="<?php if ( isset ( $prfx_stored_meta['meta-image5'] ) ) echo $prfx_stored_meta['meta-image5'][0]; ?>" />
    <input type="button" id="meta-image-button5" class="button" value="<?php _e( 'Choose Image', 'prfx-textdomain' )?>" />
	<input type="text" name="meta-image-description5" id="meta-image-description5" value="<?php if ( isset ( $prfx_stored_meta['meta-image-description5'] ) ) echo $prfx_stored_meta['meta-image-description5'][0]; ?>" />
	</p>
	
	<p>
    <label for="meta-image6" class="prfx-row-title"><?php _e( 'Image and Description 6', 'prfx-textdomain' )?></label>
    <input type="text" name="meta-image6" id="meta-image6" value="<?php if ( isset ( $prfx_stored_meta['meta-image6'] ) ) echo $prfx_stored_meta['meta-image6'][0]; ?>" />
    <input type="button" id="meta-image-button6" class="button" value="<?php _e( 'Choose Image', 'prfx-textdomain' )?>" />
	<input type="text" name="meta-image-description6" id="meta-image-description6" value="<?php if ( isset ( $prfx_stored_meta['meta-image-description6'] ) ) echo $prfx_stored_meta['meta-image-description6'][0]; ?>" />
	</p>
 
    <?php
}

function prfx_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
	// Checks for input and saves if needed
	if( isset( $_POST[ 'meta-image1' ] ) ) {
    update_post_meta( $post_id, 'meta-image1', $_POST[ 'meta-image1' ] );
	update_post_meta( $post_id, 'meta-image-description1', $_POST[ 'meta-image-description1' ] );
	}
	
	if( isset( $_POST[ 'meta-image2' ] ) ) {
    update_post_meta( $post_id, 'meta-image2', $_POST[ 'meta-image2' ] );
	update_post_meta( $post_id, 'meta-image-description2', $_POST[ 'meta-image-description2' ] );
	}
	
	if( isset( $_POST[ 'meta-image3' ] ) ) {
    update_post_meta( $post_id, 'meta-image3', $_POST[ 'meta-image3' ] );
	update_post_meta( $post_id, 'meta-image-description3', $_POST[ 'meta-image-description3' ] );
	}
	
	if( isset( $_POST[ 'meta-image4' ] ) ) {
    update_post_meta( $post_id, 'meta-image4', $_POST[ 'meta-image4' ] );
	update_post_meta( $post_id, 'meta-image-description4', $_POST[ 'meta-image-description4' ] );
	}
	
	if( isset( $_POST[ 'meta-image5' ] ) ) {
    update_post_meta( $post_id, 'meta-image5', $_POST[ 'meta-image5' ] );
	update_post_meta( $post_id, 'meta-image-description5', $_POST[ 'meta-image-description5' ] );
	}
	
	if( isset( $_POST[ 'meta-image6' ] ) ) {
    update_post_meta( $post_id, 'meta-image6', $_POST[ 'meta-image6' ] );
	update_post_meta( $post_id, 'meta-image-description6', $_POST[ 'meta-image-description6' ] );
	}
 
}
add_action( 'save_post', 'prfx_meta_save' );
function prfx_image_enqueue() {
    global $typenow;
    if( $typenow == 'artists' ) {
        wp_enqueue_media();
 
        // Registers and enqueues the required javascript.
        wp_register_script( 'meta-box-image', plugin_dir_url( __FILE__ ) . 'uploader.js', array( 'jquery' ) );
        wp_localize_script( 'meta-box-image', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
                'button' => __( 'Use this image', 'prfx-textdomain' ),
            )
        );
        wp_enqueue_script( 'meta-box-image' );
    }
}
add_action( 'admin_enqueue_scripts', 'prfx_image_enqueue' );


// Thanks again Devin @ WPTheming.com
function ep_eventposts_metaboxes() {
    add_meta_box( 'ept_event_date_start', 'Start Date and Time', 'ept_event_date', 'events', 'side', 'default', array( 'id' => '_start') );
    add_meta_box( 'ept_event_date_end', 'End Date and Time', 'ept_event_date', 'events', 'side', 'default', array('id'=>'_end') );
}
add_action( 'admin_init', 'ep_eventposts_metaboxes' );
// Metabox HTML
function ept_event_date($post, $args) {
    $metabox_id = $args['args']['id'];
    global $post, $wp_locale;
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'ep_eventposts_nonce' );
    $time_adj = current_time( 'timestamp' );
    $month = get_post_meta( $post->ID, $metabox_id . '_month', true );
    if ( empty( $month ) ) {
        $month = gmdate( 'm', $time_adj );
    }
    $day = get_post_meta( $post->ID, $metabox_id . '_day', true );
    if ( empty( $day ) ) {
        $day = gmdate( 'd', $time_adj );
    }
    $year = get_post_meta( $post->ID, $metabox_id . '_year', true );
    if ( empty( $year ) ) {
        $year = gmdate( 'Y', $time_adj );
    }
    $hour = get_post_meta($post->ID, $metabox_id . '_hour', true);
    if ( empty($hour) ) {
        $hour = gmdate( 'H', $time_adj );
    }
    $min = get_post_meta($post->ID, $metabox_id . '_minute', true);
    if ( empty($min) ) {
        $min = '00';
    }
    $month_s = '<select name="' . $metabox_id . '_month">';
    for ( $i = 1; $i < 13; $i = $i +1 ) {
        $month_s .= "\t\t\t" . '<option value="' . zeroise( $i, 2 ) . '"';
        if ( $i == $month )
            $month_s .= ' selected="selected"';
        $month_s .= '>' . $wp_locale->get_month_abbrev( $wp_locale->get_month( $i ) ) . "</option>\n";
    }
    $month_s .= '</select>';
    echo $month_s;
    echo '<input type="text" name="' . $metabox_id . '_day" value="' . $day  . '" size="2" maxlength="2" />';
    echo '<input type="text" name="' . $metabox_id . '_year" value="' . $year . '" size="4" maxlength="4" /> @ ';
    echo '<input type="text" name="' . $metabox_id . '_hour" value="' . $hour . '" size="2" maxlength="2"/>:';
    echo '<input type="text" name="' . $metabox_id . '_minute" value="' . $min . '" size="2" maxlength="2" />';
}
function ept_event_location() {
    global $post;
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'ep_eventposts_nonce' );
    // The metabox HTML
    $event_location = get_post_meta( $post->ID, '_event_location', true );
    echo '<label for="_event_location">Location:</label>';
    echo '<input type="text" name="_event_location" value="' . $event_location  . '" />';
}
// Save the Metabox Data
function ep_eventposts_save_meta( $post_id, $post ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;
    if ( !isset( $_POST['ep_eventposts_nonce'] ) )
        return;
    if ( !wp_verify_nonce( $_POST['ep_eventposts_nonce'], plugin_basename( __FILE__ ) ) )
        return;
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ) )
        return;
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though
    $metabox_ids = array( '_start', '_end' );
    foreach ($metabox_ids as $key ) {
        $events_meta[$key . '_month'] = $_POST[$key . '_month'];
        $events_meta[$key . '_day'] = $_POST[$key . '_day'];
            if($_POST[$key . '_hour']<10){
                 $events_meta[$key . '_hour'] = '0'.$_POST[$key . '_hour'];
             } else {
                   $events_meta[$key . '_hour'] = $_POST[$key . '_hour'];
             }
        $events_meta[$key . '_year'] = $_POST[$key . '_year'];
        $events_meta[$key . '_hour'] = $_POST[$key . '_hour'];
        $events_meta[$key . '_minute'] = $_POST[$key . '_minute'];
        $events_meta[$key . '_eventtimestamp'] = $events_meta[$key . '_year'] . $events_meta[$key . '_month'] . $events_meta[$key . '_day'] . $events_meta[$key . '_hour'] . $events_meta[$key . '_minute'];
    }
    // Add values of $events_meta as custom fields
    foreach ( $events_meta as $key => $value ) { // Cycle through the $events_meta array!
        if ( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode( ',', (array)$value ); // If $value is an array, make it a CSV (unlikely)
        if ( get_post_meta( $post->ID, $key, FALSE ) ) { // If the custom field already has a value
            update_post_meta( $post->ID, $key, $value );
        } else { // If the custom field doesn't have a value
            add_post_meta( $post->ID, $key, $value );
        }
        if ( !$value ) delete_post_meta( $post->ID, $key ); // Delete if blank
    }
}
add_action( 'save_post', 'ep_eventposts_save_meta', 1, 2 );
/**
 * Helpers to display the date on the front end
 */
// Get the Month Abbreviation
function eventposttype_get_the_month_abbr($month) {
    global $wp_locale;
    for ( $i = 1; $i < 13; $i = $i +1 ) {
                if ( $i == $month )
                    $monthabbr = $wp_locale->get_month_abbrev( $wp_locale->get_month( $i ) );
                }
    return $monthabbr;
}
// Display the date
function eventposttype_get_the_event_date() {
    global $post;
    $eventdate = '';
    $month = get_post_meta($post->ID, '_month', true);
    $eventdate = eventposttype_get_the_month_abbr($month);
    $eventdate .= ' ' . get_post_meta($post->ID, '_day', true) . ',';
    $eventdate .= ' ' . get_post_meta($post->ID, '_year', true);
    $eventdate .= ' at ' . get_post_meta($post->ID, '_hour', true);
    $eventdate .= ':' . get_post_meta($post->ID, '_minute', true);
    echo $eventdate;
	}

/**
 * Checks font options to see if a Google font is selected.
 * If so, options_typography_enqueue_google_font is called to enqueue the font.
 * Ensures that each Google font is only enqueued once.
 */
 
if ( !function_exists( 'options_typography_google_fonts' ) ) {
	function options_typography_google_fonts() {
		$all_google_fonts = array_keys( options_typography_get_google_fonts() );
		// Define all the options that possibly have a unique Google font
		$google_font = of_get_option('google_font', array ('face' =>'Rokkitt, serif'));
		$google_font_title = of_get_option('google_font_title', array ('face' => 'Rokkitt, serif'));
		// Get the font face for each option and put it in an array
		$selected_fonts = array(
			$google_font['face'],
			$google_font_title['face']
		);
		// Remove any duplicates in the list
		$selected_fonts = array_unique($selected_fonts);
		// Check each of the unique fonts against the defined Google fonts
		// If it is a Google font, go ahead and call the function to enqueue it
		foreach ( $selected_fonts as $font ) {
			if ( in_array( $font, $all_google_fonts ) ) {
				options_typography_enqueue_google_font($font);
			}
		}
	}
}

add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );

// Google Fonts
/**
 * Returns a select list of Google fonts
 * Feel free to edit this, update the fallbacks, etc.
 */

function options_typography_get_google_fonts() {
	// Google Font Defaults
	$google_faces = array(
		'Arvo, serif' => 'Arvo',
		'Copse, sans-serif' => 'Copse',
		'Open Sans, sans-serif' => 'Open Sans',
		'Oswald, sans-serif' => 'Oswald',
		'Pacifico, cursive' => 'Pacifico',
		'Lato, sans-serif' => 'Lato',
		'Montserrat, sans-serif' => 'Montserrat',
		'Rokkitt, serif' => 'Rokkit',
		'Quattrocento, serif' => 'Quattrocento',
		'Raleway, sans-serif' => 'Raleway',
		'Ubuntu, sans-serif' => 'Ubuntu',
		'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz'
	);
	return $google_faces;
}

/**
 * Enqueues the Google $font that is passed
 */
 
function options_typography_enqueue_google_font($font) {
	$font = explode(',', $font);
	$font = $font[0];
	// Certain Google fonts need slight tweaks in order to load properly
	// Like our friend "Raleway"
	if ( $font == 'Raleway' )
		$font = 'Raleway:500';
	if ( $font == 'Lato' )
		$font = 'Lato:700';
	$font = str_replace(" ", "+", $font);
	wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );
}

/* 
 * Outputs the selected option panel styles inline into the <head>
 */
 
function options_typography_styles() {
     $output = '';
     $input = '';

     if ( of_get_option( 'google_font' ) ) {
          $input = of_get_option( 'google_font' );
	  $output .= options_typography_font_styles( of_get_option( 'google_font' ) , '.google-font');
     }
	 
	 
     if ( of_get_option( 'google_font_title' ) ) {
          $input = of_get_option( 'google_font_title' );
	  $output .= options_typography_font_styles( of_get_option( 'google_font_title' ) , '.google-font-title');
  }

     if ( $output != '' ) {
	$output = "\n<style>\n" . $output . "</style>\n";
	echo $output;
     }
}
add_action('wp_head', 'options_typography_styles');

/* 
 * Returns a typography option in a format that can be outputted as inline CSS
 */
 
function options_typography_font_styles($option, $selectors) {
		$output = $selectors . ' {';
		$output .= 'font-family:' . $option['face'] . '; ';
		$output .= '}';
		$output .= "\n";
		return $output;
		}