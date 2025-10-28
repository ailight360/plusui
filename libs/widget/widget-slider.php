<?php

/*-----------------------------------------------------------------------------------*/
/*  Slider Posts Most View widget
/*-----------------------------------------------------------------------------------*/
class mdn_slider_post_widget extends WP_Widget {
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'exthemes-slider-post-widget',
            'description' => __( 'Display Slider Posts on Home', TEXT_DOMAIN ),
        );
        parent::__construct( 'exthemes-slider-post-widget', __(  '(Plus UI) Slider', TEXT_DOMAIN ), $widget_ops );
    }
    public function widget( $args, $instance ) {
        $widget_id			= $this->id_base . '-' . $this->number;
        $category_ids		= ( ! empty( $instance['category_ids'] ) ) ? array_map( 'absint', $instance['category_ids'] ) : array( 0 );
        $number_posts		= ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 );
        $popular_date		= ( isset( $instance['popular_date'] ) ) ? esc_attr( $instance['popular_date'] ) : esc_attr( 'alltime' );  
        
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

        $rp = new WP_Query( apply_filters( 'MedianWP_slider_post_widget_widget_posts_args', $args ) ); 
		?>

		<div class='sldO scrlH section' id='slider-widget'>
		<?php
		$count = 0;
		while ( $rp->have_posts() ) :
		$rp->the_post(); 
		global $wpdb, $post, $opt_themes;  
		$post_id			= get_the_ID();
		$image_id_alt		= get_post_thumbnail_id($post->ID);
		$image_idx			= get_post_thumbnail_id();
		 
		$image_urlx			= wp_get_attachment_image_src($image_idx, 'full', true);
		$imagex				= $image_urlx[0];
		?>		
		<div class="widget Image" id="Image<?php echo $count; ?>">
		<div class="sldC" id="Image<?php echo $count; ?>_img">
		<a aria-label="Slider Image <?php echo $count; ?>" class="sldIm" style="background-image: url(<?php if (has_post_thumbnail()) { echo $imagex; } else { echo $opt_themes['no_images']['url']; } ?>)" href="<?php the_permalink(); ?>" >
		<?php if($instance['show_title']){?>
		<span class="sldT"><?php the_title(); ?></span>
		<?php } ?>
		</a> 
		</div>
		<div class="sldS"></div>
		</div> 
		<?php
		$count++;
		endwhile;
		wp_reset_postdata();
		?> 
		</div>		 
		<?php        
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance     = $old_instance;
        $new_instance = wp_parse_args(
            (array) $new_instance,
            array( 
                'category_ids'      => array( 0 ), 
                'number_posts'      => 3,
                'orderby'			=> 'date',
                'orderdate'			=> 'alltime',
                'days_amount'		=> 30,
				'show_title'		=> false,
            )
        );
        
        $instance['category_ids']	= array_map( 'absint', $new_instance['category_ids'] ); 
        $instance['number_posts']	= absint( $new_instance['number_posts'] );
		$instance['orderby']		= $new_instance['orderby'];
		$instance['orderdate']		= $new_instance['orderdate'];
		$instance['days_amount']	= (int) $new_instance['days_amount'];
		$instance['show_title']		= (bool) $new_instance['show_title'];
		
		
        if ( in_array( 0, $instance['category_ids'], true ) ) {
            $instance['category_ids'] = array( 0 );
        }
        return $instance;
    }
    
    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array( 
                'category_ids'      => array( 0 ), 
                'number_posts'      => 3,
                'orderby'			=> 'date',
                'orderdate'			=> 'alltime',
                'days_amount'		=> 30,
				'show_title'		=> false,
            )
        ); 
        
        $category_ids			= array_map( 'absint', $instance['category_ids'] );
        $number_posts			= absint( $instance['number_posts'] );
		$days_amount			= isset( $instance['days_amount'] ) ? absint( $instance['days_amount'] ) : 30;
		$show_title				= (bool) $instance['show_title'];
        
		
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
		<p style="text-align: center;font-weight: bold;">Slider Posts </p>
		<hr /> 
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'category_ids' ) ); ?>"><?php _e( 'Selected Categories', TEXT_DOMAIN ); ?></label>
        </p> 
        <p>
            <?php echo $selection_category; ?>
		<hr />
            <small><?php _e( 'Click on the categories with pressed CTRL key to select multiple categories. If All Categories was selected then other selections will be ignored.', TEXT_DOMAIN ); ?></small>
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>"><?php _e( 'Number Post', TEXT_DOMAIN ); ?></label>
        </p> 
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'number_posts' ) ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
        </p> 
		<hr />
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_title ); ?> id="<?php echo esc_html( $this->get_field_id( 'show_title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'show_title' ) ); ?>" /><label for="<?php echo esc_html( $this->get_field_id( 'show_title' ) ); ?>"><?php _e( 'Show Title?', TEXT_DOMAIN ); ?></label>
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
add_action( 'widgets_init', function() { register_widget( 'mdn_slider_post_widget' ); } );
