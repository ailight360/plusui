<?php
/* 
Template Name: Template - Sitemap Style 1
*/
 
###### https://www.geeksforgeeks.org/php-str_replace-function/
###### PHP | str_replace() Function 
###### Input string 
$url = get_bloginfo('url');
###### using str_replace() function 
$urls = str_replace('http://', '', $url);
$linkX = get_bloginfo('url');;
$parse = parse_url($linkX);
$urls = $parse['host'];
//$urls = str_replace('https://', '', $url);
$datePublished = mysql2date( DATE_W3C, $post->post_date, false );
$dateModified = mysql2date( DATE_W3C, $post->post_modified_gmt, false );
 
$post_date = get_the_date( 'l, F j, Y' );
$post_time = get_the_date( 'g:i A' );
get_header();
global $opt_themes, $post, $wpdb, $wp_query, $the_query, $current_user; 
?>

<main class='blogItm mainbar ' style="width: 100%;">
	<div class='section' id='main-widget'>
		<div class='widget Blog' id='Blog '>
			<div class='blogPts'>
				<article class='ntry ps post'>
					  <div class="brdCmb" itemscope="itemscope" itemtype="https://schema.org/BreadcrumbList">
<div class="hm" itemprop="itemListElement" itemscope="itemscope" itemtype="https://schema.org/ListItem">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="item"><span itemprop="name"><?php echo $opt_themes['opts_title_other_1']; ?></span></a>
<meta content="1" itemprop="position">
</div>
<div class="tl" data-text="<?php the_title(); ?>"></div>
</div>
					<h1 class='pTtl aTtl sml itm'><span><?php the_title(); ?></span></h1>
					 
					<div class='pInr'>
					
						 
						<div class='pEnt' id='postID-<?php echo get_the_ID(); ?>'>
						<div class='pS post-body postBody' id='postBody'>

						<!--start kontent -->
						<div class="postSection sitemaps" id="sitemaps">
						
						
						<?php
                                        // Add categories you'd like to exclude in the exclude here
						$learnedia_cats = get_categories('exclude=');
						foreach ($learnedia_cats as $learnedia_cat) {
						$learnedia_posts_by_slug = array(
						'category_name'    => $learnedia_cat->slug,
						'exclude'          => '', // enter the ID or comma-separated list of page IDs to exclude
						'numberposts'      => -1  // number of posts to show, default value is 5
						);
						$learnedia_posts_array = get_posts( $learnedia_posts_by_slug ); ?>
						<details class="sp toc" style="margin-bottom: 10px;">
						<summary data-show="<?php _e('Show all', TEXT_DOMAIN); ?>" data-hide="<?php _e('Hide all', TEXT_DOMAIN); ?>" style="text-transform: uppercase;;font-weight: bold;"><?php echo $learnedia_cat->cat_name; ?></summary>
						<div class="toC" id="autoToc">
						<ol>
						<?php foreach ($learnedia_posts_array as $learnedia_post){ ?>
						<li><a href="<?php echo get_permalink($learnedia_post); ?>"><?php echo get_the_title($learnedia_post); ?></a></li>
						<?php } ?>
						</ol>
						</div>
						</details>										
						<?php } ?>
						
						
						</div>	 

						</div>
						</div>
						 
					</div>

                        </article>
                     
                    </div>
                </div>
            </div>
        </main>

<?php 
 
get_footer(); 