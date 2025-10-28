			
			<?php
            global $post, $opt_themes, $wp_query;
			
			
			if ($opt_themes['load_more_on']){ 	
			misha_paginator( get_pagenum_link() );
			} else {

			// don't display the button if there are not enough posts
			if( 1 < $wp_query->max_num_pages ) {
            if(get_previous_posts_link() || get_next_posts_link()){
            ?>
            <div class='blogPg' id='blogPager'> 
            <?php if(!empty(get_previous_posts_link())) { ?> 
            <?php echo previous_posts_link( "<svg class='line' aria-label='".__('Newest', TEXT_DOMAIN)."' viewBox='0 0 24 24'><g transform='translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) translate(5.500000, 4.000000)'><line x1='6.7743' x2='6.7743' y1='15.7501' y2='0.7501'></line><path d='M12.7988,9.6998 C12.7988,9.6998 9.5378,15.7498 6.7758,15.7498 C4.0118,15.7498 0.7498,9.6998 0.7498,9.6998'></path></g></svg>", 0 );?>
            <?php } else { ?>
            <div class="nwLnk nPst" aria-label='<?php _e('Newest', TEXT_DOMAIN); ?>'>
            <svg class='line' viewBox='0 0 24 24'><g transform='translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) translate(5.500000, 4.000000)'><line x1='6.7743' x2='6.7743' y1='15.7501' y2='0.7501'></line><path d='M12.7988,9.6998 C12.7988,9.6998 9.5378,15.7498 6.7758,15.7498 C4.0118,15.7498 0.7498,9.6998 0.7498,9.6998'></path></g></svg>
            </div>
            <?php } ?>	
            <?php if ( !is_paged() ) { ?>
            <div class="hmLnk nPst" aria-label='<?php _e('Home', TEXT_DOMAIN); ?>'>
            <svg class="line" viewBox="0 0 24 24"><g transform="translate(2.400000, 2.000000)"><path d="M1.24344979e-14,11.713 C1.24344979e-14,6.082 0.614,6.475 3.919,3.41 C5.365,2.246 7.615,0 9.558,0 C11.5,0 13.795,2.235 15.254,3.41 C18.559,6.475 19.172,6.082 19.172,11.713 C19.172,20 17.213,20 9.586,20 C1.959,20 1.24344979e-14,20 1.24344979e-14,11.713 Z"></path></g></svg>
            </div>
            <?php } else { ?>
            <div class="hmLnk" aria-label='<?php _e('Home', TEXT_DOMAIN); ?>'>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label='<?php _e('Home', TEXT_DOMAIN); ?>' ><svg class='line' viewBox='0 0 24 24'><g transform='translate(2.400000, 2.000000)'><path d='M1.24344979e-14,11.713 C1.24344979e-14,6.082 0.614,6.475 3.919,3.41 C5.365,2.246 7.615,0 9.558,0 C11.5,0 13.795,2.235 15.254,3.41 C18.559,6.475 19.172,6.082 19.172,11.713 C19.172,20 17.213,20 9.586,20 C1.959,20 1.24344979e-14,20 1.24344979e-14,11.713 Z'></path></g></svg></a>
            </div>		
            <?php } ?>	
            <?php if(!empty(get_next_posts_link())) { ?>					 
            <?php echo next_posts_link( "<svg aria-label='".__('Oldest', TEXT_DOMAIN)."' class='line' viewBox='0 0 24 24'><g transform='translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) translate(5.500000, 4.000000)'><line x1='6.7743' x2='6.7743' y1='15.7501' y2='0.7501'></line><path d='M12.7988,9.6998 C12.7988,9.6998 9.5378,15.7498 6.7758,15.7498 C4.0118,15.7498 0.7498,9.6998 0.7498,9.6998'></path></g></svg>", 0 );?>
            <?php } else { ?>
            <div class="olLnk nPst" aria-label='<?php _e('Oldest', TEXT_DOMAIN); ?>' >
            <svg class='line' viewBox='0 0 24 24'><g transform='translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) translate(5.500000, 4.000000)'><line x1='6.7743' x2='6.7743' y1='15.7501' y2='0.7501'></line><path d='M12.7988,9.6998 C12.7988,9.6998 9.5378,15.7498 6.7758,15.7498 C4.0118,15.7498 0.7498,9.6998 0.7498,9.6998'></path></g></svg>
            </div>
            <?php } ?>
            </div>	
            <?php }}} if ($opt_themes['load_more_on']){ ?>
			<script src='<?php echo get_template_directory_uri(); ?>/assets/js/load_more.js'></script>
            <script> 			
            if(typeof InfiniteScroll !== "undefined") { 
			var infinite_scroll = new InfiniteScroll ({ 
			type: 0, 
			target: { 
				posts: ".blogPts", 
				post: ".ntry", 
				anchors: ".blogPg", 
				anchor: ".olLnk"}, 
			text: {
				load: "<a aria-label='<?php _e($opt_themes['text_load_more_1'], TEXT_DOMAIN); ?>' class='jsLd' data-text='<?php _e($opt_themes['text_load_more_1'], TEXT_DOMAIN); ?>' href='javascript:;'></a>", 
				loading: "<div class='jsLd wait nPst' aria-label='<?php _e('Loading', TEXT_DOMAIN); ?>&hellip;' data-text='<?php _e('Loading', TEXT_DOMAIN); ?>&hellip;'><svg viewBox='0 0 50 50' x='0px' y='0px'><path d='M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z'><animateTransform attributeName='transform' attributeType='xml' dur='0.6s' from='0 25 25' repeatCount='indefinite' to='360 25 25' type='rotate'></animateTransform></path></svg></div>", 
				loaded: "<div class='jsLd nPst' data-text='<?php _e('No More', TEXT_DOMAIN); ?>' aria-label='<?php _e('No More', TEXT_DOMAIN); ?>'></div>", 
				error: "<a aria-label='<?php _e('Error', TEXT_DOMAIN); ?>' class='jsLd error' data-text='<?php _e('Error', TEXT_DOMAIN); ?>&hellip;' href='javascript:;'></a>"
				}
			}); 
			}  
            </script>
			<?php } 