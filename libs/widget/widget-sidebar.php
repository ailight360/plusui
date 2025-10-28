<?php
/*-----------------------------------------------------------------------------------*/ 
/*  Sidebar Post With Images or out Images
/*-----------------------------------------------------------------------------------*/
class sidebar_post_image extends WP_Widget { 
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'sidebar-widgets',
            'description' => __( 'Display Post With Images or out Images on Sidebar.', TEXT_DOMAIN ),
        );
        parent::__construct( 'sidebar-widgets', __( '(Plus UI) Sidebar ', TEXT_DOMAIN ), $widget_ops );
    }
    public function widget( $args, $instance ) { 
        $widget_id		= $this->id_base . '-' . $this->number; 
        $category_ids	= ( ! empty( $instance['category_ids'] ) ) ? array_map( 'absint', $instance['category_ids'] ) : array( 0 ); 
        $number_posts	= ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 );    
        $title			= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base ); 
		$show_images	= ( isset( $instance['show_images'] ) ) ? (bool) $instance['show_images'] : false;
		?>
		
		<div class="section" id="side-widget"> 
		<div class='widget PopularPosts' id='PopularPosts00'>
		<?php
		if ( $instance['title'] ) {
           echo '<h2 class="title dt">'.$instance['title'].'</h2>';
        }
 	
		if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
	
		$args = array(
				'posts_per_page'			=> $number_posts,
				'post_type'					=> 'post',
				'no_found_rows'				=> true,
				'post_status'				=> 'publish', 
				'orderby'					=> $instance['orderby'],
				'update_post_term_cache'	=> false,
				'update_post_meta_cache'	=> false,
		);

		if ( ! in_array( 0, $category_ids, true ) ) {
			$args['category__in'] = $category_ids;
		} 
			
		if( $instance['orderby'] == 'views' ){
			$args = array(
				'posts_per_page'	=> $instance['number_posts'],
				'post_type'			=> 'post',
				'order'				=> 'DESC',
				'orderby'			=> 'meta_value_num',
				'meta_key'			=> 'post_views_count',
				'ignore_sticky_posts' => true
			);
		}

		if( isset($instance['orderdate']) && $instance['orderdate'] != 'alltime' ){
				$year		= date('Y');
				$month		= absint( date('m') );
				$week		= absint( date('W') );
				
				$args['year']	= $year;

				if( $instance['orderdate'] == 'pastmonth' ){
					$args['monthnum'] = $month - 1;
				}
				if( $instance['orderdate'] == 'pastweek' ){
					$args['w'] = $week - 1;
				}
				if( $instance['orderdate'] == 'pastyear' ){
					unset( $args['year'] );
					$today = getdate();
					$args['date_query'] = array(
						array(
							'after' => $today[ 'month' ] . ' 1st, ' . ($today[ 'year' ] - 2)
						)
					);
				}
		}

		if( isset($instance['orderdate']) && $instance['orderdate'] == 'bydays' && isset($instance['days_amount']) ){
			$args['year'] = '';
			$days_amount = absint( $instance['days_amount'] ); 
			if( $days_amount > 0 ){
			$days_string = "-$days_amount days";
				$args['date_query'] = array(
					'after'		=> date('Y-m-d', strtotime( $days_string ) ),
					'inclusive'	=> true,
					'column'	=> 'post_date'
				);
			}
		}

        $rp = new WP_Query( apply_filters( 'sidebar_random_post_no_images', $args ) ); 
		?>
        
		<div class="itemPp" role="feed">
			<?php
			$count = 0;
            while ( $rp->have_posts() ) : $rp->the_post(); $count++;
			if ( $count <= 1 ) { 
			if($instance['show_images']) {
			global $wpdb, $post, $opt_themes; 
			$post_id			= get_the_ID();
			$image_id_alt		= get_post_thumbnail_id($post->ID);
			$image_idx			= get_post_thumbnail_id(); 
			$image_urlx			= wp_get_attachment_image_src($image_idx, 'full', true);
			$imagex				= $image_urlx[0];
			$user_info			= get_userdata($post->post_author);
			$username			= $user_info->user_login;
			$first_name			= $user_info->first_name;
			$last_name			= $user_info->last_name;
			$display_name		= $user_info->display_name;
			$roles				= $user_info->roles;
			$user_email			= $user_info->user_email;
			$description		= $user_info->description;
			$avatars			= get_avatar( $user_info->user_email );
			$avatars_urls		= get_avatar_url( $user_info->user_email );
			$author_urls		= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
			?>
			<article class='itm mostP<?php if (!has_post_thumbnail()) { ?> noThmb<?php } ?>'>
				<div class='iThmb pThmb<?php if (!has_post_thumbnail()) { ?> nul<?php } ?>'>
				<?php if (has_post_thumbnail()) { ?>
				<a class='thmb' href='<?php the_permalink(); ?>' aria-label='<?php the_title(); ?>'>
				<img alt='<?php the_title(); ?>' class='imgThm' src='<?php the_post_thumbnail_url('full'); ?>' /> 
				<!--
				<?php the_post_thumbnail('full', array('class' => 'imgThm')); ?>
				<?php the_post_thumbnail_url('full'); ?>
				-->
				</a>
				<?php } else { ?>
				<div class="thmb">
				<span class="imgThm" data-text="<?php _e('No image', TEXT_DOMAIN); ?>"></span>
				</div>
				<?php } ?>
				<div class='iFxd'>
				<?php if($opt_themes['komentar_on']){ ?>
				<a aria-label='Comments' class='cmnt' data-text='<?php echo comments_number('0', '1', '%'); ?>' href='<?php the_permalink(); ?>#comment' role='button'>
				<svg class='line' viewBox='0 0 24 24'><g transform='translate(2.000000, 2.000000)'><path d='M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z'></path></g></svg>
				</a>
				<?php } if($opt_themes['read_on']){ ?>
				<span class='pV pu-views' data-id="<?php echo get_the_ID(); ?>" data-text="<?php echo format_numbers(get_view_post_alt()); ?>">
				<svg class='line' viewBox='0 0 24 24'><g transform='translate(2.000000, 4.000000)'><path class='svgC' d='M13.1643,8.0521 C13.1643,9.7981 11.7483,11.2141 10.0023,11.2141 C8.2563,11.2141 6.8403,9.7981 6.8403,8.0521 C6.8403,6.3051 8.2563,4.8901 10.0023,4.8901 C11.7483,4.8901 13.1643,6.3051 13.1643,8.0521 Z'></path><path d='M0.7503,8.0521 C0.7503,11.3321 4.8923,15.3541 10.0023,15.3541 C15.1113,15.3541 19.2543,11.3351 19.2543,8.0521 C19.2543,4.7691 15.1113,0.7501 10.0023,0.7501 C4.8923,0.7501 0.7503,4.7721 0.7503,8.0521 Z'></path></g></svg>
				</span>  
				<?php } if($opt_themes['bookmark_on']){ ?>
				<span aria-label='<?php echo $opt_themes['opts_title_other_20']; ?>' bm-id='<?php echo get_the_ID(); ?>' bm-img='<?php if (has_post_thumbnail()) { echo $imagex; } ?>' bm-ttl='<?php the_title(); ?>' bm-url='<?php the_permalink(); ?>' class='bM bmPs' data-added='<?php echo $opt_themes['opts_title_other_21']; ?>' role='button'>
				<svg class='line' viewBox='0 0 24 24'><g transform='translate(4.500000, 2.500000)'><path d='M7.47024319,0 C1.08324319,0 0.00424318741,0.932 0.00424318741,8.429 C0.00424318741,16.822 -0.152756813,19 1.44324319,19 C3.03824319,19 5.64324319,15.316 7.47024319,15.316 C9.29724319,15.316 11.9022432,19 13.4972432,19 C15.0932432,19 14.9362432,16.822 14.9362432,8.429 C14.9362432,0.932 13.8572432,0 7.47024319,0 Z'></path><line class='svgC v' transform='translate(-4.500000, -2.500000)' x1='12' x2='12' y1='6' y2='12'></line><line class='svgC h' transform='translate(-4.500000, -2.500000)' x1='15' x2='9' y1='9' y2='9'></line></g></svg>
				</span>	
				<?php } ?>
				</div>
				<?php if($opt_themes['author_on']){ ?>	
				<div class='iFxd bl'>
				<div class='aNm t'>
				<div class='im lazy' data-style='background-image: url(<?php if($avatars_urls) { echo $avatars_urls; } ?>)'>
				</div>
				<bdi class='nm' data-text='<?php echo $display_name; ?>'></bdi>
				<svg viewBox='0 0 24 24'><path d='M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z'></path></svg>
				</div>
				</div>
				<?php } if ( is_user_logged_in() ) { if(current_user_can('editor') || current_user_can('administrator')){  ?>
				<div class='blog-admins'>
				<div class='iFxd l'>
				<a aria-label='Edit this post' class='edit' data-text='Edit' href='<?php echo get_edit_post_link(); ?>' role='button' target='_blank'>
				<svg class='line' viewBox='0 0 24 24'><g transform='translate(3.500000, 3.500000)'><line class='svgC' x1='9.8352' x2='16.2122' y1='16.0078' y2='16.0078'></line><path d='M12.5578,1.3589 L12.5578,1.3589 C11.2138,0.3509 9.3078,0.6229 8.2998,1.9659 C8.2998,1.9659 3.2868,8.6439 1.5478,10.9609 C-0.1912,13.2789 1.4538,16.1509 1.4538,16.1509 C1.4538,16.1509 4.6978,16.8969 6.4118,14.6119 C8.1268,12.3279 13.1638,5.6169 13.1638,5.6169 C14.1718,4.2739 13.9008,2.3669 12.5578,1.3589 Z'></path><line x1='7.0041' x2='11.8681' y1='3.7114' y2='7.3624'></line></g></svg>
				</a>
				</div>
				</div>
				<?php }} ?>
				</div>
					
				<div class='iInf pSml'>
				<time class='aTtmp iTtmp pbl' data-text='<?php echo get_the_time('M j')?>' datetime='<?php echo mysql2date( DATE_W3C, $post->post_date_gmt, false ); ?>' title='Published: <?php echo get_the_date(); ?>'></time>
				<div class='pLbls' data-text='<?php echo $instance['in']; ?>'>
				<?php
					$i = 0;
					foreach((get_the_category()) as $cat) {
					echo '<a aria-label="' . $cat->cat_name . '" data-text="' . $cat->cat_name . '&nbsp;" href="'.get_category_link($cat->cat_ID).'"  rel="tag"></a>&nbsp;';
					if (++$i == 1) break;
					}
				?> 
				</div>
				</div>
					
				<div class='iCtnt'>
				<div class='iInr'>
				<h3 class='iTtl aTtl'><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h3>
				<div class='pSnpt'>
				<?php echo get_excerpt_by_id($post->ID); ?>
				</div>
				</div>
				</div>
			</article>
			<?php } else { ?>
			<article class='itm'>
			<div class='iInf pSml'>
			<time class='aTtmp iTtmp pbl' data-text='<?php echo get_the_time('M j')?>' datetime='<?php echo mysql2date( DATE_W3C, $post->post_date_gmt, false ); ?>' title='Published: <?php echo get_the_date(); ?>'></time>
			<div class='pLbls' data-text='<?php echo $instance['in']; ?>'>
			<?php
					$i = 0;
					foreach((get_the_category()) as $cat) {
					echo '<a aria-label="' . $cat->cat_name . '" data-text="' . $cat->cat_name . '&nbsp;" href="'.get_category_link($cat->cat_ID).'"  rel="tag"></a>&nbsp;';
					if (++$i == 2) break;
					}
				?> 
			</div>
			</div>
			<div class='iCtnt'>
			<div class='iInr'>
			<h3 class='iTtl aTtl'><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h3>
			<?php if($instance['show_desc']){?>
			<div class='pSnpt'>
			<?php echo get_excerpt_by_id($post->ID); ?>
			</div>
			<?php } ?>
			</div>
			</div>
			</article>
			<?php } } else { ?>
			<article class='itm'>
			<div class='iInf pSml'>
			<time class='aTtmp iTtmp pbl' data-text='<?php echo get_the_time('M j')?>' datetime='<?php echo mysql2date( DATE_W3C, $post->post_date_gmt, false ); ?>' title='Published: <?php echo get_the_date(); ?>'></time>
			<div class='pLbls' data-text='<?php echo $instance['in']; ?>'>
			<?php
					$i = 0;
					foreach((get_the_category()) as $cat) {
					echo '<a aria-label="' . $cat->cat_name . '" data-text="' . $cat->cat_name . '&nbsp;" href="'.get_category_link($cat->cat_ID).'"  rel="tag"></a>&nbsp;';
					if (++$i == 1) break;
					}
				?> 
			</div>
			</div>
			<div class='iCtnt'>
			<div class='iInr'>
			<h3 class='iTtl aTtl'><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h3>
			<?php if($instance['show_desc']){?>
			<div class='pSnpt'>
			<?php echo get_excerpt_by_id($post->ID); ?>
			</div>
			<?php } ?>
			</div>
			</div>
			</article>
			<?php } 
			endwhile;
			wp_reset_postdata();
			?>		 
		</div>			
	 
		
		</div>
		</div>
        <?php         
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance     = $old_instance;
        $new_instance = wp_parse_args( (array) $new_instance,
            array(
                'title'             => '',
                'category_ids'      => array( 0 ),
                'number_posts'      => 3,
                'orderby'			=> 'date',
                'orderdate'			=> 'alltime',
                'days_amount'		=> 30,
				'show_images'		=> false, 
				'show_desc'			=> false,  
				'in'				=> '', 
            )
        ); 
        $instance['title']			= sanitize_text_field( $new_instance['title'] );
        $instance['category_ids']	= array_map( 'absint', $new_instance['category_ids'] );
        $instance['number_posts']	= absint( $new_instance['number_posts'] );
		$instance['orderby']		= $new_instance['orderby'];
		$instance['orderdate']		= $new_instance['orderdate'];
		$instance['days_amount']	= (int) $new_instance['days_amount'];
		$instance['show_images']	= (bool) $new_instance['show_images'];
		$instance['show_desc']		= (bool) $new_instance['show_desc']; 
		$instance['in']				= strip_tags( $new_instance[ 'in' ] );  

        if ( in_array( 0, $instance['category_ids'], true ) ) {
            $instance['category_ids'] = array( 0 );
        }
        return $instance;
    }
    
    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance,
            array(
                'title'             => __( 'Widget Sidebar', TEXT_DOMAIN ), 
                'category_ids'      => array( 0 ), 
                'number_posts'      => 3,
                'orderby'			=> 'date',
                'orderdate'			=> 'alltime',
                'days_amount'		=> 30,
				'show_images'		=> true,
				'show_desc'			=> true, 
				'in'				=> 'in', 
            )
        ); 
        $title					= sanitize_text_field( $instance['title'] );
        $category_ids			= array_map( 'absint', $instance['category_ids'] );
        $number_posts			= absint( $instance['number_posts'] );
		$days_amount			= isset( $instance['days_amount'] ) ? absint( $instance['days_amount'] ) : 30;
		$show_images			= (bool) $instance['show_images'];
		$show_desc				= (bool) $instance['show_desc'];
		$in						= $instance['in']; 
		
        $categories				= get_categories(
								array(
									'hide_empty'   => 0,
									'hierarchical' => 1,
								)
        );
        $number_of_cats			= count( $categories );
        $number_of_rows			= ( 10 > $number_of_cats ) ? $number_of_cats + 1 : 10;
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids		= array( 0 );
        }
        $selection_category  = sprintf(
            '<select name="%s[]" id="%s" class="widefat " multiple="multiple" size="%d" >',
            $this->get_field_name( 'category_ids' ),
            $this->get_field_id( 'category_ids' ),
            $number_of_rows
        );
        $selection_category .= "\n";
        $cat_list = array();
        if ( 0 < $number_of_cats ) {
            while ( $categories ) {
                if ( 0 === $categories[0]->parent ) {
                    $current_entry = array_shift( $categories );
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => 0,
                    );
                    continue;
                }
                $parent_index = $this->get_cat_parent_index( $cat_list, $categories[0]->parent );
                if ( false === $parent_index ) {
                    $current_entry = array_shift( $categories );
                    $categories[] = $current_entry;
                    continue;
                }
                $depth = $cat_list[ $parent_index ]['depth'] + 1;
                $new_index = $parent_index + 1;
                foreach ( $cat_list as $entry ) {
                    if ( $depth <= $entry['depth'] ) {
                        $new_index = $new_index++;
                        continue;
                    }
                    $current_entry = array_shift( $categories );
                    $end_array  = array_splice( $cat_list, $new_index );
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => $depth,
                    );
                    $cat_list   = array_merge( $cat_list, $end_array );
                    break;
                }
            }
            
            $selected            = ( in_array( 0, $category_ids, true ) ) ? ' selected="selected"' : '';
            $selection_category .= "\t";
            $selection_category .= '<option value="0"' . $selected . '>' . __( 'All Categories', TEXT_DOMAIN ) . '</option>';
            $selection_category .= "\n";
            foreach ( $cat_list as $category ) {
                $cat_name            = apply_filters( 'gmr_list_cats', $category['name'], $category );
                $pad                 = ( 0 < $category['depth'] ) ? str_repeat( '&ndash;&nbsp;', $category['depth'] ) : '';
                $selection_category .= "\t";
                $selection_category .= '<option value="' . $category['id'] . '"';
                $selection_category .= ( in_array( $category['id'], $category_ids, true ) ) ? ' selected="selected"' : '';
                $selection_category .= '>' . $pad . $cat_name . '</option>';
                $selection_category .= "\n";
            }
        }
       
        $selection_category .= "</select>\n";
        ?>
		<p style="text-align: center;font-weight: bold;"> Post With Images or out Images </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', TEXT_DOMAIN ); ?></label>
		</p> 
		<p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p> 
		<hr />
		<p>
			<label for="<?php echo $this->get_field_id( 'in' ); ?>"><b>Title IN </b></label>
		</p> 
		<p>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'in' ); ?>" name="<?php echo $this->get_field_name( 'in' ); ?>" value="<?php echo esc_attr( $in ); ?>" />
		</p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'category_ids' ) ); ?>"><?php _e( 'Selected Categories', TEXT_DOMAIN ); ?></label>
		</p> 
		<p>
            <?php echo $selection_category;  ?>
            <hr />
            <small><?php _e( 'Click on the categories with pressed CTRL key to select multiple categories. If All Categories was selected then other selections will be ignored.', TEXT_DOMAIN ); ?></small>
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>"><?php _e( 'Number post', TEXT_DOMAIN ); ?></label>
		</p> 
		<p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'number_posts' ) ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
        </p> 
		<hr />
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_images ); ?> id="<?php echo esc_html( $this->get_field_id( 'show_images' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'show_images' ) ); ?>" /><label for="<?php echo esc_html( $this->get_field_id( 'show_images' ) ); ?>"><?php _e( 'Show First Images?', TEXT_DOMAIN ); ?></label>
		</p>
		<hr />
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_desc ); ?> id="<?php echo esc_html( $this->get_field_id( 'show_desc' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'show_desc' ) ); ?>" /><label for="<?php echo esc_html( $this->get_field_id( 'show_desc' ) ); ?>"><?php _e( 'Show Desc ?', TEXT_DOMAIN ); ?></label>
		</p>
		<hr />
		<p>
			<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Mode:',  TEXT_DOMAIN ) ?> </label>
        </p>
        <p>
			<select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>">
			<option <?php if ($instance['orderby'] == 'date') echo 'selected="selected"'; ?> value="date"><?php _e('Recent Posts',  TEXT_DOMAIN ); ?></option>
			<option <?php if ($instance['orderby'] == 'rand') echo 'selected="selected"'; ?> value="rand"><?php _e('Random Posts',  TEXT_DOMAIN ); ?></option>
			<option <?php if ($instance['orderby'] == 'modified') echo 'selected="selected"'; ?> value="modified"><?php _e('Recent Modified ',  TEXT_DOMAIN ); ?></option>
			<option <?php if ($instance['orderby'] == 'views') echo 'selected="selected"'; ?> value="views"><?php _e('Post Views',  TEXT_DOMAIN ); ?></option>
			</select>
		</p>
		<hr />
		<div class="mdn-select-day">
		<p>
			<label for="<?php echo $this->get_field_id('orderdate'); ?>"><?php _e('Date:',  TEXT_DOMAIN ) ?> </label>
        </p>
        <p>
				<select id="<?php echo $this->get_field_id('orderdate'); ?>" name="<?php echo $this->get_field_name('orderdate'); ?>">
				<option <?php if ($instance['orderdate'] == 'alltime') echo 'selected="selected"'; ?> value="alltime"><?php _e('All Time',  TEXT_DOMAIN ); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastyear') echo 'selected="selected"'; ?> value="pastyear"><?php _e('Past Year',  TEXT_DOMAIN ); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastmonth') echo 'selected="selected"'; ?> value="pastmonth"><?php _e('Past Month',  TEXT_DOMAIN ); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastweek') echo 'selected="selected"'; ?> value="pastweek"><?php _e('Past Week',  TEXT_DOMAIN ); ?></option>
				<option <?php if ($instance['orderdate'] == 'bydays') echo 'selected="selected"'; ?> value="bydays"><?php _e('Last "X" days', TEXT_DOMAIN); ?></option>
				</select>
		</p>
		<p class="mdn-days <?php echo $this->get_field_id('orderdate'); ?> <?php if ($instance['orderdate'] != 'bydays') echo 'hidden'; ?>">        
			<label for="<?php echo $this->get_field_id('days_amount'); ?>"><?php _e( 'Number of last days to filter:', TEXT_DOMAIN); ?></label>
			<input id="<?php echo $this->get_field_id('days_amount'); ?>" name="<?php echo $this->get_field_name('days_amount'); ?>" type="text" value="<?php echo $days_amount; ?>" size="1" />
		</p>
		</div>
		<hr />
		<script>
			(function($){
			$(document).ready(function(){
				$('.mdn-select-day').each(function(){
					var container = $(this);
					container.find('select').on('change', function(){
						var value = $(this).val();
						if( value == 'bydays' ){
							container.find('.mdn-days').show();
						}else{
							container.find('.mdn-days').hide();
						}
					});
				});
			});
		})(jQuery);
		</script>
        <?php
    }
    private function get_cat_parent_index( $arr, $id ) {
        $len = count( $arr );
        if ( 0 === $len ) {
            return false;
        }
        $id = absint( $id );
        for ( $i = 0; $i < $len; $i++ ) {
            if ( $id === $arr[ $i ]['id'] ) {
                return $i;
            }
        }
        return false;
    } 
}
add_action( 'widgets_init', function() {register_widget( 'sidebar_post_image' ); } );
