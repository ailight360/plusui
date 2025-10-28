<?php

/*-----------------------------------------------------------------------------------*/ 
/*  Random Post With Images
/*-----------------------------------------------------------------------------------*/
class mdn_random_post_image_sidebar_widget_ extends WP_Widget { 
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'sidebar-rndom-image-widgets',
            'description' => __( 'Display Post with One Images on Sidebar Widget.', TEXT_DOMAIN ),
        );
        parent::__construct( 'sidebar-rndom-image-widgets', __( '(Median) Sidebar Post with One Images', TEXT_DOMAIN ), $widget_ops );
    }
	
    public function widget( $args, $instance ) { 
        $widget_id			= $this->id_base . '-' . $this->number; 
        $category_ids		= ( ! empty( $instance['category_ids'] ) ) ? array_map( 'absint', $instance['category_ids'] ) : array( 0 );
        $number_posts		= ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 );
        $title				= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base ); 
		?>
		
		<div class="section" id="side-widget">
		<div class="widget PopularPosts">		
		<?php
		if ( $title ) {
           echo '<h2 class="title dt">'.$title.'</h2>';
        }
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
        
        $args = array(
            'posts_per_page'			=> $number_posts,
            'no_found_rows'				=> true,
            'post_status'				=> 'publish',            
            'update_post_term_cache'	=> false,
            'update_post_meta_cache'	=> false,			
            'orderby'					=> $instance['orderby'],
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
                $year = date('Y');
                $month = absint( date('m') );
                $week = absint( date('W') );

                $args['year'] = $year;

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
                        'inclusive' => true, // include the selected days as well
					    'column'    => 'post_date' // 'post_modified', 'post_date_gmt', 'post_modified_gmt'
                    );
                }            
            }

        $rp = new WP_Query( apply_filters( 'sidebar_random_post_images', $args ) ); 
		?>
         
		<div class="itemPp" role="feed">		  
            <?php
			$count = 0;
            while ( $rp->have_posts() ) : $rp->the_post(); $count++;
			if ( $count <= 1 ) { ?>
			<?php get_template_part('template/content/loop.widget.sidebar.3'); ?>
			<?php } else { ?>
			<?php get_template_part('template/content/loop.widget.sidebar.4'); ?>
			<?php } ?>
			<?php endwhile; ?>
            <?php wp_reset_postdata(); ?>		 
		</div>
		
		</div>
		</div>
        <?php
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance			= $old_instance;
        $new_instance		= wp_parse_args( (array) $new_instance,
            array(
                'title'             => '', 
                'category_ids'      => array( 0 ), 
                'number_posts'      => 3,      
                'orderby'			=> 'date',
                'orderdate'			=> 'alltime',
                'days_amount'		=> 30 
            )
        ); 
        $instance['title']				= sanitize_text_field( $new_instance['title'] );  
        $instance['category_ids']		= array_map( 'absint', $new_instance['category_ids'] ); 
        $instance['number_posts']		= absint( $new_instance['number_posts'] );    
		$instance['orderby']			= $new_instance['orderby'];
		$instance['orderdate']			= $new_instance['orderdate'];
		$instance['days_amount']		= (int) $new_instance['days_amount'];   
        if ( in_array( 0, $instance['category_ids'], true ) ) {
            $instance['category_ids'] = array( 0 );
        }
        return $instance;
    }
    
    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title'             => __( 'Widget Sidebar Post Images', TEXT_DOMAIN ), 
                'category_ids'      => array( 0 ), 
                'number_posts'      => 3,  
                'orderby'			=> 'date',
                'orderdate'			=> 'alltime',
                'days_amount'		=> 30,
            )
        ); 
        $title				= sanitize_text_field( $instance['title'] );  
        $category_ids		= array_map( 'absint', $instance['category_ids'] ); 
        $number_posts		= absint( $instance['number_posts'] );   		
		$days_amount		= isset( $instance['days_amount'] ) ? absint( $instance['days_amount'] ) : 30;
        $categories			= get_categories(
            array(
                'hide_empty'   => 0,
                'hierarchical' => 1,
            )
        );
        $number_of_cats = count( $categories );
        $number_of_rows = ( 10 > $number_of_cats ) ? $number_of_cats + 1 : 10;
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
        $selection_category  = sprintf(
            '<select name="%s[]" id="%s" class="cat-select widefat" multiple size="%d">',
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
		<p style="text-align: center;font-weight: bold;">Sidebar Post with one Images</p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', TEXT_DOMAIN ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'category_ids' ) ); ?>"><?php esc_html_e( 'Selected categories', TEXT_DOMAIN ); ?></label>
            <?php echo $selection_category;  ?>
		<hr />
            <small><?php esc_html_e( 'Click on the categories with pressed CTRL key to select multiple categories. If All Categories was selected then other selections will be ignored.', TEXT_DOMAIN ); ?></small>
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>"><?php esc_html_e( 'Number post', TEXT_DOMAIN ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'number_posts' ) ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
        </p>  
		<hr />
		
		<p>
			<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php echo esc_html_x('Mode:', 'admin', TEXT_DOMAIN) ?> </label>
			<select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>">
			<option <?php if ($instance['orderby'] == 'date') echo 'selected="selected"'; ?> value="date"><?php echo esc_html_x('Recent Posts', 'admin', TEXT_DOMAIN); ?></option>
			<option <?php if ($instance['orderby'] == 'rand') echo 'selected="selected"'; ?> value="rand"><?php echo esc_html_x('Random Posts', 'admin', TEXT_DOMAIN); ?></option>
			<?php if( function_exists('get_field') ): // By views ?>
			<option <?php if ($instance['orderby'] == 'views') echo 'selected="selected"'; ?> value="views"><?php echo esc_html_x('Post views', 'admin', TEXT_DOMAIN); ?></option>
			<?php endif; ?>
			</select>
		</p>
		<hr />
		<div class="mdn-select-day">
		<p>
			<label for="<?php echo $this->get_field_id('orderdate'); ?>"><?php echo esc_html_x('Date:', 'admin', TEXT_DOMAIN) ?> </label>
				<select id="<?php echo $this->get_field_id('orderdate'); ?>" name="<?php echo $this->get_field_name('orderdate'); ?>">
				<option <?php if ($instance['orderdate'] == 'alltime') echo 'selected="selected"'; ?> value="alltime"><?php echo esc_html_x('All Time', 'admin', TEXT_DOMAIN); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastyear') echo 'selected="selected"'; ?> value="pastyear"><?php echo esc_html_x('Past Year', 'admin', TEXT_DOMAIN); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastmonth') echo 'selected="selected"'; ?> value="pastmonth"><?php echo esc_html_x('Past Month', 'admin', TEXT_DOMAIN); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastweek') echo 'selected="selected"'; ?> value="pastweek"><?php echo esc_html_x('Past Week', 'admin', TEXT_DOMAIN); ?></option>
				<option <?php if ($instance['orderdate'] == 'bydays') echo 'selected="selected"'; ?> value="bydays"><?php esc_html_e('Last "X" days', 'epcl_framework'); ?></option>
				</select>
		</p>
		<p class="mdn-days <?php echo $this->get_field_id('orderdate'); ?> <?php if ($instance['orderdate'] != 'bydays') echo 'hidden'; ?>">
			<label for="<?php echo $this->get_field_id('days_amount'); ?>"><?php esc_html_e( 'Number of last days to filter:', 'epcl_framework'); ?></label>
			<input id="<?php echo $this->get_field_id('days_amount'); ?>" name="<?php echo $this->get_field_name('days_amount'); ?>" type="text" value="<?php echo $days_amount; ?>" size="1" />
		</p>
		</div>
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
//add_action( 'widgets_init', function() { register_widget( 'mdn_random_post_image_sidebar_widget_' ); } ); 
