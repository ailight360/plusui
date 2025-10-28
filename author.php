<?php 
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*
/*  @EXTHEM.ES
/*  Follow Social Media Exthem.es
/*  Youtube : https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA
/*  Facebook : https://www.facebook.com/groups/exthem.es
/*  Twitter : https://twitter.com/bangreyblog
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/
get_header(); 
global $opt_themes;
$curauth		= (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$username		= $curauth->user_login;
$first_name		= $curauth->first_name;
$last_name		= $curauth->last_name;	  
$display_name	= $curauth->display_name;
$roles			= implode(', ', $curauth->roles);
$user_email		= $curauth->user_email;
$description	= $curauth->description;
$avatars		= get_avatar( $curauth->user_email );
$avatars_urls	= get_avatar_url( $curauth->user_email );
$location		= $curauth->locations;
$twitter		= $curauth->twitter;
$facebook		= $curauth->facebook;
$linkedin		= $curauth->linkedin;
$instagram		= $curauth->instagram;
$skype			= $curauth->skype;
$telegram		= $curauth->telegram;
$pinterest		= $curauth->pinterest;
$youtube		= $curauth->youtube; 

?>
<main class='blogItm mainbar ' style="width: 100%;">
 
	<div class="section" id="main-widget">
		<div class="widget Blog" id="Blog1">
			<div class="blogTtl">
				<div class="t srch">
				<span class="hm" data-text="<?php echo $opt_themes['opts_title_other_1']; ?>"></span>
				<?php echo $display_name; ?>
				</div>
			</div>
			 		
		<div class="content-profile-page">
			<div class="profile-user-page card">
				<div class="img-user-profile">
				<img class="profile-bgHome"  />
				<img class="avatar" src="<?php echo $avatars_urls; ?>" alt="<?php echo $display_name; ?>" />
				</div>
				<button>@<?php echo $username; ?></button>
				<div class="user-profile-data"> 
					<h3 style="margin-top: 3em;"><?php echo $display_name; ?></h3>             
				</div> 
				<div class="description-profile" style="margin: 10px;"><?php echo $description; ?></div>
					 
					<div class="follow-subscribe-social">
					<ul>
					<?php if($facebook) { ?>
					<li><a aria-label="Facebook" href="<?php echo $facebook; ?>"><span class="a" style="opacity: .7;"><svg class="c-1" viewBox="0 0 32 32"><path d="M24,3H8A5,5,0,0,0,3,8V24a5,5,0,0,0,5,5H24a5,5,0,0,0,5-5V8A5,5,0,0,0,24,3Zm3,21a3,3,0,0,1-3,3H17V18h4a1,1,0,0,0,0-2H17V14a2,2,0,0,1,2-2h2a1,1,0,0,0,0-2H19a4,4,0,0,0-4,4v2H12a1,1,0,0,0,0,2h3v9H8a3,3,0,0,1-3-3V8A3,3,0,0,1,8,5H24a3,3,0,0,1,3,3Z"></path></svg></span></a></li>
					<?php } if($instagram) { ?>
					<li><a aria-label="Instagram" href="<?php echo $instagram; ?>"><span class="a" style="opacity: .7;"><svg class="c-1" viewBox="0 0 32 32"><path d="M22,3H10a7,7,0,0,0-7,7V22a7,7,0,0,0,7,7H22a7,7,0,0,0,7-7V10A7,7,0,0,0,22,3Zm5,19a5,5,0,0,1-5,5H10a5,5,0,0,1-5-5V10a5,5,0,0,1,5-5H22a5,5,0,0,1,5,5Z"></path><path d="M16,9.5A6.5,6.5,0,1,0,22.5,16,6.51,6.51,0,0,0,16,9.5Zm0,11A4.5,4.5,0,1,1,20.5,16,4.51,4.51,0,0,1,16,20.5Z"></path><circle cx="23" cy="9" r="1"></circle></svg></span></a></li>
					<?php } if($twitter) { ?>
					<li><a aria-label="Twitter" href="<?php echo $twitter; ?>"><span class="a" style="opacity: .7;"><svg class="c-1" viewBox="0 0 32 32"><path d="M13.35,28A13.66,13.66,0,0,1,2.18,22.16a1,1,0,0,1,.69-1.56l2.84-.39A12,12,0,0,1,5.44,4.35a1,1,0,0,1,1.7.31,9.87,9.87,0,0,0,5.33,5.68,7.39,7.39,0,0,1,7.24-6.15,7.29,7.29,0,0,1,5.88,3H29a1,1,0,0,1,.9.56,1,1,0,0,1-.11,1.06L27,12.27c0,.14,0,.28-.05.41a12.46,12.46,0,0,1,.09,1.43A13.82,13.82,0,0,1,13.35,28ZM4.9,22.34A11.63,11.63,0,0,0,13.35,26,11.82,11.82,0,0,0,25.07,14.11,11.42,11.42,0,0,0,25,12.77a1.11,1.11,0,0,1,0-.26c0-.22.05-.43.06-.65a1,1,0,0,1,.22-.58l1.67-2.11H25.06a1,1,0,0,1-.85-.47,5.3,5.3,0,0,0-4.5-2.51,5.41,5.41,0,0,0-5.36,5.45,1.07,1.07,0,0,1-.4.83,1,1,0,0,1-.87.2A11.83,11.83,0,0,1,6,7,10,10,0,0,0,8.57,20.12a1,1,0,0,1,.37,1.05,1,1,0,0,1-.83.74Z"></path></svg></span></a></li>
					<?php } if($youtube) { ?>
					<li><a aria-label="Youtube" href="<?php echo $youtube; ?>"><span class="a" style="opacity: .7;"><svg class="c-1" viewBox="0 0 32 32"><path d="M29.73,9.9A5,5,0,0,0,25.1,5.36a115.19,115.19,0,0,0-18.2,0A5,5,0,0,0,2.27,9.9a69,69,0,0,0,0,12.2A5,5,0,0,0,6.9,26.64c3,.24,6.06.36,9.1.36s6.08-.12,9.1-.36a5,5,0,0,0,4.63-4.54A69,69,0,0,0,29.73,9.9Zm-2,12A3,3,0,0,1,25,24.65a113.8,113.8,0,0,1-17.9,0,3,3,0,0,1-2.78-2.72,65.26,65.26,0,0,1,0-11.86A3,3,0,0,1,7.05,7.35C10,7.12,13,7,16,7s6,.12,9,.35a3,3,0,0,1,2.78,2.72A65.26,65.26,0,0,1,27.73,21.93Z"></path><path d="M21.45,15.11l-8-4A1,1,0,0,0,12,12v8a1,1,0,0,0,.47.85A1,1,0,0,0,13,21a1,1,0,0,0,.45-.11l8-4a1,1,0,0,0,0-1.78ZM14,18.38V13.62L18.76,16Z"></path></svg></span></a></li>
					<?php } if($linkedin) { ?>
					<li><a aria-label="LinkedIn" href="<?php echo $linkedin; ?>"><span class="a" style="opacity: .7;"><svg class="c-1" viewBox="0 0 32 32"><path d="M24,3H8A5,5,0,0,0,3,8V24a5,5,0,0,0,5,5H24a5,5,0,0,0,5-5V8A5,5,0,0,0,24,3Zm3,21a3,3,0,0,1-3,3H8a3,3,0,0,1-3-3V8A3,3,0,0,1,8,5H24a3,3,0,0,1,3,3Z"></path><path d="M11,14a1,1,0,0,0-1,1v6a1,1,0,0,0,2,0V15A1,1,0,0,0,11,14Z"></path><path d="M19,13a4,4,0,0,0-4,4v4a1,1,0,0,0,2,0V17a2,2,0,0,1,4,0v4a1,1,0,0,0,2,0V17A4,4,0,0,0,19,13Z"></path><circle cx="11" cy="11" r="1"></circle></svg></span></a></li>
					<?php } if($pinterest) { ?>  
					<li><a aria-label='Pinterest' href='<?php echo $pinterest; ?>'><span class="a" style="opacity: .7;"><svg class='c-1' viewBox='0 0 32 32'><path d='M16,2A14,14,0,1,0,30,16,14,14,0,0,0,16,2Zm0,26a12,12,0,0,1-3.81-.63l1.2-4.81A7.93,7.93,0,0,0,16,23a8.36,8.36,0,0,0,1.4-.12,8,8,0,1,0-9.27-6.49,1,1,0,0,0,2-.35,6,6,0,1,1,3.79,4.56L15,16.24A1,1,0,1,0,13,15.76l-2.7,10.81A12,12,0,1,1,16,28Z'></path></svg></span></a></li>
					<?php } if($telegram) { ?>   
					<li><a aria-label="Telegram" href="<?php echo $telegram; ?>"><span class="a" style="opacity: .7;"><svg class="c-1" viewBox="0 0 32 32"><path d="M24,28a1,1,0,0,1-.62-.22l-6.54-5.23a1.83,1.83,0,0,1-.13.16l-4,4a1,1,0,0,1-1.65-.36L8.2,18.72,2.55,15.89a1,1,0,0,1,.09-1.82l26-10a1,1,0,0,1,1,.17,1,1,0,0,1,.33,1l-5,22a1,1,0,0,1-.65.72A1,1,0,0,1,24,28Zm-8.43-9,7.81,6.25L27.61,6.61,5.47,15.12l4,2a1,1,0,0,1,.49.54l2.45,6.54,2.89-2.88-1.9-1.53A1,1,0,0,1,13,19a1,1,0,0,1,.35-.78l7-6a1,1,0,1,1,1.3,1.52Z"></path></svg></span></a></li>
					<?php } if($skype) { ?>
					<li><a aria-label='Skype' href='<?php echo $skype; ?>'><span class="a" style="opacity: .7;"><svg class='c-1' viewBox='0 0 32 32'><path d='M28.66,18.89A12.52,12.52,0,0,0,29,16,13,13,0,0,0,16,3a12.52,12.52,0,0,0-2.89.34,7,7,0,0,0-9.77,9.77A12.52,12.52,0,0,0,3,16,13,13,0,0,0,16,29a12.52,12.52,0,0,0,2.89-.34,7,7,0,0,0,9.77-9.77ZM23,28a5,5,0,0,1-3.23-1.19,1,1,0,0,0-.65-.23l-.26,0A11,11,0,0,1,5.39,13.14a1,1,0,0,0-.2-.91,5,5,0,0,1,7-7,1,1,0,0,0,.91.2A11,11,0,0,1,26.61,18.86a1,1,0,0,0,.2.91A5,5,0,0,1,23,28Z'/><path d='M14.5,12H18a1,1,0,0,1,1,1,1,1,0,0,0,2,0,3,3,0,0,0-3-3H14.5a3.5,3.5,0,0,0,0,7h3a1.5,1.5,0,0,1,0,3H14a1,1,0,0,1-1-1,1,1,0,0,0-2,0,3,3,0,0,0,3,3h3.5a3.5,3.5,0,0,0,0-7h-3a1.5,1.5,0,0,1,0-3Z'/></svg></span></a></li>
					<?php } ?>

					</ul>
					</div>
		  
			</div>
		</div>
 
			<?php 
			/* $total_items = count_user_posts( get_the_author_meta('ID'), 'post', false ); echo esc_html( $total_items ); */ 
			?>
				
			<div class="blogPts">
			<?php 		
			$pages						= (get_query_var('paged')) ? get_query_var('paged') : 1; 
			query_posts( array(                                
				'paged'					=> $pages, 	 
				/* 'posts_per_page'		=> 4,  */							
				'author'				=> $curauth->ID, 
				'order'					=> 'DESC' 
				)
			);
                  
			if (have_posts()) : while (have_posts()) : the_post();
					 
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
			<article class='ntry<?php if (!has_post_thumbnail()) { ?> noThmb<?php } ?>'>
			<div class='pThmb<?php if (!has_post_thumbnail()) { ?> nul<?php } ?>'>
			<?php if (has_post_thumbnail()) { ?>
			<a class='thmb' href='<?php the_permalink(); ?>'>
			<img alt='<?php the_title(); ?>' class='imgThm lazy' data-src='<?php if (has_post_thumbnail()) { echo $imagex; } ?>' src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs='/>
			<noscript><img alt='<?php the_title(); ?>' class='imgThm' src='<?php if (has_post_thumbnail()) { echo $imagex; } ?>'/></noscript>
			</a>
			<?php } else { ?>
			<div class="thmb">
			<span class="imgThm" data-text="No image"></span>
			</div>
			<?php } ?>
			<div class='iFxd'>
			<?php if($opt_themes['komentar_on']){ ?>
			<a aria-label='Comments' class='cmnt' data-text='<?php echo comments_number('0', '1', '%'); ?>' href='<?php the_permalink(); ?>#comment' role='button'>
			<svg class='line' viewBox='0 0 24 24'><g transform='translate(2.000000, 2.000000)'><path d='M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z'></path></g></svg>
			</a>
			<?php } if($opt_themes['read_on']){ ?>
			<span class='pV pu-views' data-id="<?php echo get_the_ID(); ?>" data-text="<?php echo format_numbers(get_view_post_alt()); ?>" >
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
			<div class='pCntn'>
			<div class='pHdr pSml'>
			<div class='pLbls' data-text='<?php echo $opt_themes['opts_title_other_5']; ?>'>
			<?php
				$i = 0;
				foreach((get_the_category()) as $cat) {
				echo '<a aria-label="' . $cat->cat_name . '" data-text="' . $cat->cat_name . '&nbsp;" href="'.get_category_link($cat->cat_ID).'"  rel="tag"></a>&nbsp;';
				if (++$i == 2) break;
				}
			?> 
			</div>
			</div>
			<h2 class='pTtl aTtl sml'>
			<a data-text='<?php the_title(); ?>' href='<?php the_permalink(); ?>' rel='bookmark'>
			<?php the_title(); ?>
			</a>
			</h2>
			<div class='pSnpt'>
			<?php echo get_excerpt_by_id($post->ID); ?>
			</div>
			<div class='pInf pSml'>
			<time class='aTtmp pTtmp pbl' data-text='<?php echo get_the_date(); ?>' data-type='<?php echo $opt_themes['opts_title_other_4']; ?>' datetime='<?php echo mysql2date( DATE_W3C, $post->post_date_gmt, false ); ?>' title='<?php echo $opt_themes['opts_title_other_4']; ?>: <?php echo get_the_date(); ?>'></time>
			<a aria-label='<?php echo $opt_themes['opts_title_other_3']; ?>' class='pJmp' data-text='<?php echo $opt_themes['opts_title_other_3']; ?>' href='<?php the_permalink(); ?>'></a>
			</div>
			</div>
			</article>
			<?php 
			endwhile; 
			wp_reset_postdata();
			endif; 
			?>				
			</div>   
			<?php if(!empty(get_next_posts_link())) { get_template_part('template/pagenavy'); } else { if(!empty(get_previous_posts_link())) { get_template_part('template/pagenavy'); } } ?> 
		</div>
	</div>
</main>

  
  
  
<style>
.content-profile-page {margin: 1em auto;width: 100%;}.card {background: var(--notifU);border-radius: 0.3rem;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);border: .1em solid rgba(0, 0, 0, 0.2);margin-bottom: 1em;}.profile-user-page .img-user-profile {margin: 0 auto;text-align: center;}.profile-user-page .img-user-profile .profile-bgHome {width: 100%;height: 14em;}img.profile-bgHome {background-color: var(--notifU) !important;}.drK .card {background: var(--darkB);}.drK img.profile-bgHome {background-color: var(--darkBa) !important;}.profile-user-page .img-user-profile .avatar {margin: 0 auto;background: rgb(14 20 27 / 30%);width: 7em;height: 7em;padding: 0.25em;border-radius: .4em;margin-top: -10em;box-shadow: 0 0 .1em rgba(0, 0, 0, 0.35);}.profile-user-page button {position: absolute;font-size: 13px;font-weight: bold;cursor: pointer;width: 7em;background: var(--linkB);border: 1px solid var(--linkB);color: #fff;outline: none;border-radius: 0 .6em .6em 0;padding: .40em;}.drK .profile-user-page button {background: var(--linkB);color: white;border: 1px solid var(--linkB);}.profile-user-page .user-profile-data, .profile-user-page .description-profile {text-align: center;padding: 0 1.5em;}.drK .profile-user-page .user-profile-data h3 {color: var(--linkB);}.profile-user-page .user-profile-data h3 {margin-top: 0.35em;color: var(--headC);margin-bottom: 0;}.profile-user-page .user-profile-data p {font-size: 1.1em;margin-top: 0;margin-bottom: 0.5em;}.profile-user-page .description-profile {font-size: 0.98em;}.profile-user-page .data-user {margin-bottom: 0;cursor: pointer;padding: 0;list-style: none;display: table;width: 100.15%;}.profile-user-page .data-user li {margin: 0;padding: 0;width: 33.33334%;display: table-cell;text-align: center;border-left: 0.1em solid transparent;}.profile-user-page .data-user li:first-child {border-left: 0;}.profile-user-page .data-user li:first-child a {border-bottom-left-radius: 0.3rem;}.profile-user-page .data-user li:last-child a {border-bottom-right-radius: 0.3rem;}.profile-user-page .data-user li a, .profile-user-page .data-user li strong {display: block;}.profile-user-page .data-user li a {background-color: #f7f7f7;border-top: 1px solid rgba(242,242,242,0.5);border-bottom: .2em solid #f7f7f7;box-shadow: inset 0 1px 0 rgba(255,255,255,0.4),0 1px 1px rgba(255,255,255,0.4);padding: .93em 0;color: #46494c;}.profile-user-page .data-user li a strong, .profile-user-page .data-user li a span {font-weight: 600;line-height: 1;}.profile-user-page .data-user li a strong {font-size: 2em;}.profile-user-page .data-user li a span {color: #717a7e;}.profile-user-page .data-user li a:hover {background: rgba(0, 0, 0, 0.05);border-bottom: .2em solid #3498db;color: #3498db;}.profile-user-page .data-user li a:hover span {color: #3498db;}.follow-subscribe-social {margin: 0 0 15px;padding: 0 0 14px;}.follow-subscribe-social ul {list-style: none;margin: 0;padding: 0;text-align: center;}.follow-subscribe-social ul li {display: inline;margin: 0 15px 0 0;border-bottom: none;}.follow-subscribe-social ul li:last-child {margin: 0;}
</style>

<?php  
get_footer(); 