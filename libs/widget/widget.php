<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*   
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*-----------------------------------------------------------------------------------*/ 

require EX_THEMES_DIR.'/libs/widget/widget-sidebar.php';
require EX_THEMES_DIR.'/libs/widget/widget-slider.php';
require EX_THEMES_DIR.'/libs/widget/widget-categorie.php';
require EX_THEMES_DIR.'/libs/widget/widget-featured.php';

/*-----------------------------------------------------------------------------------*/
/*  Category Style 1
/*-----------------------------------------------------------------------------------*/
class mdn_widgets_for_category_style extends WP_Widget {
public function __construct() {
		$widget_options = array( 
				'classname'		=> 'median_widgets_custom_for_category_style_1', 
				'description'	=> __( 'Display List Category on Sidebar', TEXT_DOMAIN ) 
				);
		parent::__construct( 'median_widgets_custom_for_category_style_1',  '(Plus UI) Sidebar Category', $widget_options );
}

public function widget( $args, $instance ) {
		global $wpdb, $post; 
		$title				= apply_filters( 'widget_title', empty( $instance['title'] ) ? __(  'Sidebar Category', TEXT_DOMAIN  ) : $instance['title'], $instance, $this->id_base); 
		$more				= ( ! empty( $instance['more'] ) ) ? $instance['more'] : '';
        $less				= ( ! empty( $instance['less'] ) ) ? $instance['less'] : '';
        $number_posts		= ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 );
		$layout_style		= ( ! empty( $instance['layout_style'] ) ) ? wp_strip_all_tags( $instance['layout_style'] ) : wp_strip_all_tags( 'style_1' )
		?>
		<div class="section" id="side-widget">
		<div class="widget Label" >  		
		<?php if( 'style_2' === $layout_style ) : ?>
		<!-- style 1 -->
		<?php if ( $title ) { ?><h3 class="title dt"><?php echo $title;?></h3><?php } ?>

		<?php 
		$categories = get_categories( array(
					'orderby' => 'name',
					//'order'   => 'ASC'
					) );
		$hasmore	= false;
		$i			= 0; 
		?>
		<div class="wL pSml bg cl">
		<?php foreach(($categories) as $cat) {
		if($i==$number_posts) {
		$hasmore	= true; 
		if($hasmore) { ?>			
		<div class="lbSh">
		<input class="lbIn hidden" id="lbAl-1" type="checkbox">
		<div class="lbAl">
		<?php } }
		  echo '<div class="lbSz s-5"><a class="lbN" href="'.get_category_link($cat->cat_ID).'" alt="'.$cat->cat_name.'"><span class="lbT">'.$cat->cat_name.'</span><span class="lbC" data-text="('.$cat->category_count.')"></span></a></div>';
		  $i++;
		}
		if($hasmore) { 
		?>
		</div>
		<label aria-label="Show labels" class="lbM" data-hide="<?php if($less) { echo $less; } ?>" data-show="<?php if($more) { echo $more; } ?>" data-text="(+<?php echo count( $categories ) - $number_posts; ?>)" for="lbAl-1"></label>
		</div>
		<?php } ?>
		</div> 
		<?php else : ?>
		<!-- style 2 -->
		<?php if ( $title ) { ?><h3 class="title dt"><?php echo $title;?></h3><?php } ?>		
		<?php 
		$categories = get_categories( array(
					'orderby' => 'name',
					//'order'   => 'ASC'
					) );
		$hasmore	= false;
		$i			= 0; 
		?>
		<div class="wL pSml bg ls">
		<ul>
		<?php foreach(($categories) as $cat) {
		if($i==$number_posts) {
		$hasmore	= true; 
		if($hasmore) { ?>	
		</ul>	
		<div class="lbSh">
		<input class="lbIn hidden" id="lbAl-2" type="checkbox">
		<ul class="lbAl">
		<?php }}
		  echo '<li><a class="lbN" href="'.get_category_link($cat->cat_ID).'" alt="'.$cat->cat_name.'"><span class="lbT">'.$cat->cat_name.'</span><span class="lbR"><span class="lbC" data-text="'.$cat->category_count.'"></span><svg class="line" viewBox="0 0 24 24"><g transform="translate(4.500000, 2.500000)"><path d="M7.47024319,0 C1.08324319,0 0.00424318741,0.932 0.00424318741,8.429 C0.00424318741,16.822 -0.152756813,19 1.44324319,19 C3.03824319,19 5.64324319,15.316 7.47024319,15.316 C9.29724319,15.316 11.9022432,19 13.4972432,19 C15.0932432,19 14.9362432,16.822 14.9362432,8.429 C14.9362432,0.932 13.8572432,0 7.47024319,0 Z"></path></g></svg></span></a></li>';
		  $i++;
		}
		if($hasmore) {
		?>
		</ul>
		<label aria-label="Show Categorie " class="lbM" data-hide="<?php if($less) { echo $less; } ?>" data-show="<?php if($more) { echo $more; } ?>" data-text="(+<?php echo count( $categories ) - $number_posts; ?>)" for="lbAl-2" ></label>	
		</div>	
		<?php } ?>
		</ul> 
		</div> 
		<?php endif; ?>	
		
		</div>	
		</div>
 
<?php }
// Create the admin area widget settings form.
public function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'				=> 'List Category Sidebar ',	
				'more'				=> 'Show More',	 	
				'less'				=> 'Show Less',	 
				'layout_style'      => 'style_1',  
                'number_posts'      => 3,  
			)
		);
		$title			= ! empty( $instance['title'] ) ? $instance['title'] : '';  
		$more			= ! empty( $instance['more'] ) ? $instance['more'] : '';  
		$less			= ! empty( $instance['less'] ) ? $instance['less'] : '';  
		$layout_style	= wp_strip_all_tags( $instance['layout_style'] ); 
        $number_posts	= absint( $instance['number_posts'] );   

		?>
		<p style="text-align: center;font-weight: bold;">List Category Sidebar</p>
		<hr />
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><b>Title </b></label>
        </p>
        <p>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>  
		<p>
			<label for="<?php echo $this->get_field_id( 'more' ); ?>"><b>Title More</b></label>
        </p>
        <p>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'more' ); ?>" name="<?php echo $this->get_field_name( 'more' ); ?>" value="<?php echo esc_attr( $more ); ?>" />
		</p> 
		<hr /> 
		<p>
			<label for="<?php echo $this->get_field_id( 'less' ); ?>"><b>Title Less</b></label>
        </p>
        <p>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'less' ); ?>" name="<?php echo $this->get_field_name( 'less' ); ?>" value="<?php echo esc_attr( $less ); ?>" />
		</p> 
		<hr /> 
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'layout_style' ) ); ?>"><em><?php _e( 'Select for Styles.', TEXT_DOMAIN ); ?></em></label>
        </p>
        <p>
			<select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'layout_style', TEXT_DOMAIN ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'layout_style' ) ); ?>">
			<option value="style_1" <?php echo selected( $instance['layout_style'], 'style_1', false ); ?>><?php _e( 'Style 1', TEXT_DOMAIN ); ?></option>
			<option value="style_2" <?php echo selected( $instance['layout_style'], 'style_2', false ); ?>><?php _e( 'Style 2', TEXT_DOMAIN ); ?></option>
			</select>
        </p>
        <p>
			<em style="font-size: x-small;display:none;">*<?php _e( 'Select for styles.', TEXT_DOMAIN ); ?></em>
		</p> 
		<hr /> 
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>"><?php _e( 'Number post', TEXT_DOMAIN ); ?></label>
        </p>
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'number_posts' ) ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
        </p>  
            <hr />

<?php }
// Apply settings to the widget instance.
public function update( $new_instance, $old_instance ) {
	$instance     = $old_instance;
		$new_instance = wp_parse_args(
			(array) $new_instance,
			array(
				'title'             => '',  
				'more'				=> '',  
				'less'				=> '',  
				'layout_style'      => 'style_1', 
                'number_posts'      => 3,    
			)
		);
	$instance[ 'title' ]		= strip_tags( $new_instance[ 'title' ] ); 
	$instance[ 'more' ]			= strip_tags( $new_instance[ 'more' ] ); 
	$instance[ 'less' ]			= strip_tags( $new_instance[ 'less' ] ); 
	$instance[ 'layout_style' ]	= wp_strip_all_tags( $new_instance['layout_style'] ); 
	$instance[ 'number_posts' ] = absint( $new_instance['number_posts'] );   
	return $instance;
}
}

function mdn_widgets_register_for_category_style() {
register_widget( 'mdn_widgets_for_category_style' );
}
add_action( 'widgets_init', 'mdn_widgets_register_for_category_style' );

/*-----------------------------------------------------------------------------------*/
/*  Recent Comments Sidebar
/*-----------------------------------------------------------------------------------*/
class mdn_widgets_for_comments_sidebar extends WP_Widget {
public function __construct() {
		$widget_options		= array( 
				'classname'			=> 'median_widgets_custom_for_comments_sidebar', 
				'description'		=> __( 'Display Recent Comments on Sidebar', TEXT_DOMAIN ) 
				);
		parent::__construct( 'median_widgets_custom_for_comments_sidebar',  '(Plus UI) Sidebar Comments ', $widget_options );
}

public function widget( $args, $instance ) {
		global $wpdb, $post;
		$title				= apply_filters( 'widget_title', empty( $instance['title'] ) ? __(  'Recent Comments', TEXT_DOMAIN  ) : $instance['title'], $instance, $this->id_base);
		$description		= empty( $instance['description'] ) ? '' : wp_strip_all_tags( $instance['description'] );
		?>

		<div class="section" id="side-widget">
		<div class="widget PopularPosts">
		<?php if ( $title ) { ?>
		<h3 class="title dt"><?php echo $title;?></h3>
		<?php } ?>
		<?php bg_recent_comments(); ?>
		</div>
		</div>
		 
			
<?php }
// Create the admin area widget settings form.
public function form( $instance ) {
	$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'				=> 'Recent Comments'		 
			)
		);
		$title				= ! empty( $instance['title'] ) ? $instance['title'] : ''; 
		$description		= wp_strip_all_tags( $instance['description'] );

		?>
		<p style="text-align: center;font-weight: bold;">Recent Comments</p>
		<hr />
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
        </p>
        <p>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<hr />

<?php }
// Apply settings to the widget instance.
public function update( $new_instance, $old_instance ) {
		$instance				= $old_instance;
		$instance[ 'title' ]	= strip_tags( $new_instance[ 'title' ] );
		return $instance;
}
}
// Register the widget.
function mdn_widgets_register_for_comments_sidebar() {
register_widget( 'mdn_widgets_for_comments_sidebar' );
}
//add_action( 'widgets_init', 'mdn_widgets_register_for_comments_sidebar' );

/*-----------------------------------------------------------------------------------*/
/*  Banner ADS for Sidebar
/*-----------------------------------------------------------------------------------*/
class mdn_widgets_for_banner_sidebar extends WP_Widget {
// Set up the widget name and description.
public function __construct() {
	$widget_options			= array(
				'classname' 	=> 'median_widgets_custom_for_banners_sidebar', 
				'description' 	=> __( 'Display Advertiser or Banner Images Ads', TEXT_DOMAIN ) 
				);
	parent::__construct( 'median_widgets_custom_for_banners_sidebar',  '(Plus UI) Ads', $widget_options );
}
// Create the widget output.
public function widget( $args, $instance ) {
global $wpdb, $post;
 
$bannerinfeed		= ( ! empty( $instance['bannerinfeed'] ) ) ? $instance['bannerinfeed'] : '';
$sticky				= ( isset( $instance['sticky'] ) ) ? (bool) $instance['sticky'] : false;
?>

<div class="<?php if ($sticky){ ?>sideSticky <?php } ?>section" id="side-sticky">
	<div class="widget HTML" >
	<?php echo do_shortcode( htmlspecialchars_decode( $bannerinfeed ) ) ?>
	</div>
</div> 
			
<?php }
// Create the admin area widget settings form.
public function form( $instance ) {
			$instance = wp_parse_args(
						(array) $instance,
						array(         
							'bannerinfeed'      => '<div class=\'adB h240\' data-text=\'Ads go here (Sticky Ad - Desktop only)\'></div>',
							'sticky'			=> false,
						)
					);
			$title				= ! empty( $instance['title'] ) ? $instance['title'] : ''; 
			$description		= wp_strip_all_tags( $instance['description'] );
			$bannerinfeed		= $instance['bannerinfeed'];
			$sticky				= (bool) $instance['sticky'];
?>
			 
			<p style="text-align: center;font-weight: bold;"> Advertiser Widget </p>
			<hr />
			<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'bannerinfeed' ) ); ?>">Your HTML Code</label>
			</p>
			<p>
			<textarea class="widefat" rows="6" id="<?php echo esc_html( $this->get_field_id( 'bannerinfeed' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'bannerinfeed' ) ); ?>"><?php echo esc_textarea( $instance['bannerinfeed'] ); ?></textarea>
			</p>
			<p>
			<input class="checkbox" type="checkbox" <?php checked( $sticky ); ?> id="<?php echo esc_html( $this->get_field_id( 'sticky' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'sticky' ) ); ?>" />
			<label for="<?php echo esc_html( $this->get_field_id( 'sticky' ) ); ?>"><?php _e( 'Sticky Ads?', TEXT_DOMAIN ); ?> Sticky For Sidebar</label>
			</p>
			<hr />
<?php }
// Apply settings to the widget instance.
public function update( $new_instance, $old_instance ) { 
			$instance			= $old_instance;
			$new_instance		= wp_parse_args(
						(array) $new_instance,
						array(
							'bannerinfeed'      => '', 
							'sticky'			=> false,  
						)
					); 
			$instance[ 'bannerinfeed']		= $new_instance['bannerinfeed'];
			$instance[ 'sticky']			= (bool) $new_instance['sticky'];
			return $instance;
}
}
// Register the widget.
function mdn_widgets_register_for_banner_sidebar() {
register_widget( 'mdn_widgets_for_banner_sidebar' );
}
add_action( 'widgets_init', 'mdn_widgets_register_for_banner_sidebar' );

/*-----------------------------------------------------------------------------------*/
/*  Banner ADS for Floating Footer
/*-----------------------------------------------------------------------------------*/
class mdn_widgets_for_banner_floating_footer extends WP_Widget {
// Set up the widget name and description.
public function __construct() {
	$widget_options			= array(
				'classname'		=> 'median_widgets_for_banner_floating_footer', 
				'description'	=> __( 'Display Advertiser or Banner Images Ads on Floating Footer ', TEXT_DOMAIN )
				);
	parent::__construct( 'median_widgets_for_banner_floating_footer',  '(Median) Ads Footer', $widget_options );
}
// Create the widget output.
public function widget( $args, $instance ) {
		global $wpdb, $post;		 
		$bannerinfeed		= ( ! empty( $instance['bannerinfeed'] ) ) ? $instance['bannerinfeed'] : ''; 
		?>

		<div class="section">
		<div class="widget HTML">
		<input class="ancrI hidden" id="ancrI" type="checkbox">
		<div class="ancrA">
		<label aria-label="Close Menu" class="ancrC" for="ancrI"></label>
		<div class="ancrCn">
		<?php echo do_shortcode( htmlspecialchars_decode( $bannerinfeed ) ) ?>
		</div>
		</div>
		</div>
		</div>		 
			
<?php }
// Create the admin area widget settings form.
public function form( $instance ) {
		$instance = wp_parse_args(
					(array) $instance,
					array(         
						'bannerinfeed'      => '<div class="adB" data-text="Your Ads Floating Footer"></div>', 
					)
				);
		$title				= ! empty( $instance['title'] ) ? $instance['title'] : '';  
		$bannerinfeed		= $instance['bannerinfeed']; 
		?>
		<p style="text-align: center;font-weight: bold;">Ads Floating Footer</p>
		<hr /> 
		<p>
		<label for="<?php echo esc_html( $this->get_field_id( 'bannerinfeed' ) ); ?>">Your HTML Code</label>
        </p>
        <p>
		<textarea class="widefat" rows="6" id="<?php echo esc_html( $this->get_field_id( 'bannerinfeed' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'bannerinfeed' ) ); ?>"><?php echo esc_textarea( $instance['bannerinfeed'] ); ?></textarea>
		</p> 
		<hr /> 
<?php }
// Apply settings to the widget instance.
public function update( $new_instance, $old_instance ) { 
		$instance			= $old_instance;
		$new_instance		= wp_parse_args(
					(array) $new_instance,
					array(
						'bannerinfeed'      => '',  
					)
				); 
		$instance[ 'bannerinfeed']		= $new_instance['bannerinfeed']; 
		return $instance;
}
}
// Register the widget.
function mdn_widgets_register_for_banner_floating_footers() {
register_widget( 'mdn_widgets_for_banner_floating_footer' );
}
//add_action( 'widgets_init', 'mdn_widgets_register_for_banner_floating_footers' );

/*-----------------------------------------------------------------------------------*/
/*  Notification Header
/*-----------------------------------------------------------------------------------*/
class mdn_widgets_for_notification_header extends WP_Widget {
// Set up the widget name and description.
public function __construct() {
	$widget_options			= array(
				'classname'		=> 'median_widgets_for_notification_header',
				'description'	=> __( 'Display Notification on Header ', TEXT_DOMAIN )
				);
	parent::__construct( 'median_widgets_for_notification_header',  '(Median) Notification', $widget_options );
}
// Create the widget output.
public function widget( $args, $instance ) {
		global $wpdb, $post;		 
		$bannerinfeed		= ( ! empty( $instance['bannerinfeed'] ) ) ? $instance['bannerinfeed'] : ''; 
		?>
		<div class="section">
		<div class="widget HTML" >
		<input class="ntfI hidden" id="forNft" type="checkbox">
		<div class="ntfC">
		<div class="ntfT">
		<div class="ntfA"> 
		<?php echo do_shortcode( htmlspecialchars_decode( $bannerinfeed ) ) ?>
		</div>
		</div>
		<label aria-label="Close Menu" class="c" for="forNft"></label>
		</div>
		</div>
		</div>
		 
			
<?php }
// Create the admin area widget settings form.
public function form( $instance ) {
		$instance = wp_parse_args(
					(array) $instance,
					array(         
						'bannerinfeed'      => '<span>We come with '.TEXT_DOMAIN.' the latest version '.EXTHEMES_VERSION.', get this theme through our official site.  </span><a href=\'https://exthem.es\'>Get nows!</a>', 
					)
				); 
		$bannerinfeed		= $instance['bannerinfeed']; 
		?>		
		<p style="text-align: center;font-weight: bold;">Notification Header</p>
		<hr /> 
		<p>
		<label for="<?php echo esc_html( $this->get_field_id( 'bannerinfeed' ) ); ?>">Your HTML Code</label>
        </p>
        <p>
		<textarea class="widefat" rows="6" id="<?php echo esc_html( $this->get_field_id( 'bannerinfeed' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'bannerinfeed' ) ); ?>"><?php echo esc_textarea( $instance['bannerinfeed'] ); ?></textarea>
		</p> 
		<hr /> 
<?php }
// Apply settings to the widget instance.
public function update( $new_instance, $old_instance ) { 
		$instance			= $old_instance;
		$new_instance		= wp_parse_args(
					(array) $new_instance,
					array(
						'bannerinfeed'      => '', 
						'sticky'			=> false,  
					)
				); 
		$instance[ 'bannerinfeed']		= $new_instance['bannerinfeed']; 
		return $instance;
}
}
// Register the widget.
function mdn_widgets_register_for_notification_headers() {
register_widget( 'mdn_widgets_for_notification_header' );
}
//add_action( 'widgets_init', 'mdn_widgets_register_for_notification_headers' );

/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  Stop Don't Try Edit
/*  if you don't know php
/*  Premium Wordress Themes
/*  EXTHEM.ES
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/ 
/*  Latest Post choosen Category With out Images
/*-----------------------------------------------------------------------------------*/
class mdn_sidebar_posts extends WP_Widget {
	function __construct() {
		parent::__construct(
			'sidebar_posts', 
			__( TEXT_DOMAIN.' Sidebar Posts', TEXT_DOMAIN ),  
			array( 'description' => __( 'Displays latest posts or posts from a choosen category. Use this widget in the main sidebars.', TEXT_DOMAIN ), ) 
		);
	}

	public function form( $instance ) {
		$defaults = array(
			'title'		=>	__( 'Latest Posts', TEXT_DOMAIN ),
			'category'	=>	'all',
			'number_posts'	=> 5,
			'sticky_posts' => true,
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

	?>

		<p style="text-align: center;font-weight: bold;">Displays latest posts or posts from a choosen category</p>
		<hr />
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', TEXT_DOMAIN ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
		</p>
		<p>
			<label><?php _e( 'Select a post category', TEXT_DOMAIN ); ?></label>
			<?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category'), 'selected' => $instance['category'], 'show_option_all' => 'Show all posts' ) ); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number_posts' ); ?>"><?php _e( 'Number of posts:', TEXT_DOMAIN ); ?></label><br>
			<input type="number" id="<?php echo $this->get_field_id( 'number_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_posts' );?>" value="<?php echo absint( $instance['number_posts'] ) ?>" size="3"/> 
		</p>
		<p>
			<input type="checkbox" <?php checked( $instance['sticky_posts'], true ) ?> class="checkbox" id="<?php echo $this->get_field_id('sticky_posts'); ?>" name="<?php echo $this->get_field_name('sticky_posts'); ?>" />
			<label for="<?php echo $this->get_field_id('sticky_posts'); ?>"><?php _e( 'Ignore sticky posts.', TEXT_DOMAIN ); ?></label>
		</p>

	<?php

	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );	
		$instance[ 'category' ]	= absint( $new_instance[ 'category' ] );
		$instance[ 'number_posts' ] = (int)$new_instance[ 'number_posts' ];
		$instance[ 'sticky_posts' ] = isset( $new_instance['sticky_posts'] ) ? (bool) $new_instance['sticky_posts'] : false;
		return $instance;
	}
	
	public function widget( $args, $instance ) {
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';	
        $title = apply_filters( 'widget_title', $title , $instance, $this->id_base );
		$category = ( ! empty( $instance['category'] ) ) ? absint( $instance['category'] ) : 0;
		$number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : 5; 
		$sticky_posts = ( isset( $instance['sticky_posts'] ) ) ? $instance['sticky_posts'] : true;

		// Latest Posts
		$latest_posts = new WP_Query( 
			array(
				'cat' 					=>	$category,
				'posts_per_page' 		=>	$number_posts,
				'no_found_rows' 		=>  true,
				'ignore_sticky_posts' 	=>  $sticky_posts
			)
		);	
		?>
		<div class="section" id="side-widget">
		<div class="widget PopularPosts" > 
		<?php
			if ( $title ) {
			echo '<h2 class="title dt">'. $title .'</h2>';
			}	
		?>
		
		<?php if( $latest_posts -> have_posts() ) : ?>	
		<div class="itemPp" role="feed">
			<?php while ( $latest_posts -> have_posts() ) : $latest_posts -> the_post(); ?>					
			<?php get_template_part('template/content/loop.widget.sidebar'); ?>					
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div> 
		<?php endif; ?>
        
        </div> 
        </div> 

	<?php	 
	}
}

// Register single category posts widget
function mdn_register_sidebar_posts() {
    register_widget( 'mdn_sidebar_posts' );
}
//add_action( 'widgets_init', 'mdn_register_sidebar_posts' );