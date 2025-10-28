<?php
/* 
Template Name: Template - Sitemap Style 2
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
<style>
.headH .headSub{max-width:none}.sitemaps {margin:30px 0 40px }.sitemaps .loading {background:var(--contentB);border-radius:6px;box-shadow:0 10px 30px rgba(0,0,0,.08);padding:40px 0;text-align:center }.sitemaps .loading::before {content:attr(data-text) }.drK .sitemaps .loading {background:var(--darkBs) }.sMaps {background:var(--contentB);font-family:var(--fontBa);padding:20px;border-radius:6px;box-shadow:0 10px 40px rgba(149,157,165,.2) }.sMaps li {padding-top:30px }.sMaps .sMapsT {margin:0;font-weight:bold;}.sMaps .sMapsT::before {content:'Label: ';font-size:90%;opacity:.8 }.sMaps .sMapsT::after {content:'';display:block;height:1px;background-color:var(--linkC);margin-top:10px;animation:anime 2s infinite;-webkit-animation:anime 2s infinite;}@keyframes anime {0% {width:30px }50% {width:60px }100% {width:30px }}@-webkit-keyframes anime {0% {width:30px }50% {width:60px }100% {width:30px }}.drK .sMaps {background-color:var(--darkBs);box-shadow:0 10px 40px rgba(0,0,0,.1) }.drK .sMapsT:after {background-color:var(--darkTa) }.sMaps .pThmb > * {transition:var(--trans-2);-webkit-transition:var(--trans-2) }.sMaps .pThmb:hover > * {transform:scale(1.1);-webkit-transform:scale(1.1) }.sMaps {margin:40px 0 0 }.sMaps ul {display:flex;flex-wrap:wrap;position:relative;width:calc(100% + 20px);left:-10px;right:-10px;list-style:none;margin:0;padding:0;counter-reset:p-cnt }.sMaps ul li {width:calc(50% - 20px);margin:0 10px 0;position:relative }.sMaps .iF {display:flex;flex-direction:row-reverse;align-items:flex-start;position:relative;width:calc(100% + 15px);left:-7.5px;right:-7.5px }.sMaps .iF >* {margin:0 7.5px }.sMaps .iF .pThmb {flex:0 0 72px }.sMaps .iF .pThmb .thmb {padding-top:100% }.sMaps .iF .pCtnt {display:flex;flex-grow:1;width:calc(100% - 102px) }.sMaps .iF .pCtnt::before {flex-shrink:0;content:'0' counter(p-cnt);counter-increment:p-cnt;width:25px;opacity:.6;font-size:85%;line-height:1.8em }.sMaps .iF .pInf {position:relative;margin-top:8px }.sMaps .iF .pInr {flex:1 0;width:calc(100% - 25px) }.sMaps .iF .pSnpt {font-size:93%;margin-top:8px }.pTag + .pFoot .sMaps .pSnpt {display:none }.sMaps .thmb::before {content:'No image';display:block;position:absolute;top:50%;left:50%;max-width:none;max-height:100%;-webkit-transform:translate(-50%, -50%);transform:translate(-50%, -50%);font-size:12px;font-family:var(--fontB);opacity:.7;white-space:nowrap }.sMaps .thmb div {background-position:center;background-size:cover;background-repeat:no-repeat;position:absolute;top:0;left:0;bottom:0;right:0 }.sMaps .pSnpt {}.sMaps .pInf {position:absolute;bottom:0;left:0;right:0 }.sMaps .pInf::before {content:attr(data-date);font-family:var(--fontB);font-size:13px;opacity:.6 }@media screen and (max-width:640px) {.sMaps ul li {width:calc(100% - 20px) }.sMaps .iF {max-width:500px;margin-left:auto;margin-right:auto }}@media screen and (max-width:500px) {.sMaps ul {width:calc(100% + 15px);left:-7.5px;right:-7.5px }.sMaps ul li {width:calc(50% - 15px);margin:0 7.5px 0 }.sMaps ul li {width:calc(100% - 15px) }
</style>


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
					<h1 class="pTtl aTtl sml itm"><span><?php the_title(); ?></span></h1>
					 
					<div class='pInr'>
					
						 
						<div class='pEnt' id='postID-<?php echo get_the_ID(); ?>'>
						<div class="pS post-body postBody" id="postBody">


						<!--start kontent -->
						<div class="sitemaps" id="sitemaps">

						
						
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
						 
						<div class="sMaps">
						<h4 class="sMapsT"><?php echo $learnedia_cat->cat_name; ?></h4>
						 
						<ul>
						<?php foreach ($learnedia_posts_array as $learnedia_post){ 
						global $wpdb, $post, $opt_themes, $wp_query;  
						$image_id       = get_post_thumbnail_id($learnedia_post); 
						$image_url      = wp_get_attachment_image_src($image_id, 'full', true); 
						$featured_img   = $image_url[0];  
						$linkgambar		= get_the_post_thumbnail_url($learnedia_post); 
						?>
						  
						<li>
						<div class="iF">
						<div class="pThmb">
						<a class="thmb" aria-label="<?php echo get_the_title($learnedia_post); ?>" href="<?php echo get_permalink($learnedia_post); ?>" title="<?php echo get_the_title($learnedia_post); ?>"><div style="background-image:url(<?php if ($linkgambar) { echo $linkgambar; } else { ?>data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=<?php } ?> )"></div></a>
						</div>
						<div class="pCtnt">
						<div class="pInr">
						<div class="iTtl aTtl">
						<a href="<?php echo get_permalink($learnedia_post); ?>"><?php echo get_the_title($learnedia_post); ?></a>
						</div>
						<div class="pSnpt">
						<?php echo get_excerpt_by_id($learnedia_post); ?>
						</div>
						<div class="pInf pSml" data-date="<?php echo get_the_date(); ?>"></div>
						</div>
						</div>
						</div>
						</li>
						<?php } ?>
						</ul> 		
						</div>									
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