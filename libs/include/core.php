<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP 
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/ 
if ( ! defined( 'ABSPATH' ) ) exit;
function plusui_head() { 
global $opt_themes; 

echo PHP_EOL.PHP_EOL.'<!-- Theme Designer -->'.PHP_EOL;
echo '<meta name="designer" content="'.EXTHEMES_AUTHOR.'" />'.PHP_EOL;
echo '<meta name="themes" content="'.strtolower(TEXT_DOMAIN).'" />'.PHP_EOL;
echo '<meta name="version" content="'.VERSION.'" />'.PHP_EOL; 
 
if($opt_themes['json_seo_on']){ 

$blogname				= get_option("blogname");
$siteurls				= get_option("siteurl");
$blogemail				= get_option("admin_email");
$blogdesc				= get_option("blogdescription");
$sitelangs				= get_bloginfo("language");
?>

<!--- Theme Json Schema Organization --->
<script type="application/ld+json">{"@context": "https://schema.org","@type": "Organization","url": "<?php echo esc_url( home_url( '/' ) ); ?>","logo": "<?php echo $opt_themes['img_json_seo']['url'];  ?>","sameAs": ["<?php echo $opt_themes['json_tl_url']; ?>","<?php echo $opt_themes['json_fb_url']; ?>","<?php echo $opt_themes['json_tw_url']; ?>","<?php echo $opt_themes['json_yt_url']; ?>","<?php echo $opt_themes['json_ig_url']; ?>"]}</script>
<!--- Theme Json Schema WebSite --->
<script type='application/ld+json'>{"@context": "https://schema.org","@type": "WebSite","url": "<?php echo esc_url( home_url( '/' ) ); ?>","name": "<?php echo get_option("blogname"); ?>","alternateName": "<?php echo get_option("blogname"); ?>","potentialAction": {"@type": "SearchAction","target": "<?php echo esc_url( home_url( '/' ) ); ?>?s={search_term_string}","query-input":"required name=search_term_string","inLanguage":"<?php echo get_bloginfo("language"); ?>"}}</script>
<?php if (is_single() ) { 
global $opt_themes, $post;
$image_url          = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', true);
$authorurl			= get_author_posts_url( $post->post_author );
$author_id			= get_post_field( 'post_author', $post );
$author_name		= get_the_author_meta('user_nicename', $author_id);
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
$authorurl			= get_author_posts_url( $post->post_author ); 
$desc_blog_post		= trim(strip_tags( get_post()->post_content ));
$des_post			= preg_replace('~[\r\n]+~', '', $desc_blog_post);
$des_post			= str_replace('"', '', $des_post);
$des_post			= mb_substr( $des_post, 0, 200, 'utf8' );
?>
<!--- Theme Json Schema BlogPosting --->
<script type='application/ld+json'>{"@context": "http://schema.org","@type": "BlogPosting","mainEntityOfPage": {"@type": "WebPage","@id": "<?php echo wp_get_canonical_url( $post ); ?>"},"headline": "<?php echo get_the_title(); ?>","description": "<?php echo $des_post; ?>","datePublished": "<?php echo mysql2date( DATE_W3C, $post->post_date_gmt, false ); ?>","dateModified": "<?php echo mysql2date( DATE_W3C, $post->post_modified_gmt, false ); ?>","image": {"@type": "ImageObject","url": "<?php echo $image_url[0]; ?>","height": <?php echo $image_url[2]; ?>,"width": <?php echo $image_url[1]; ?>},"publisher": {"@type": "Organization","name": "<?php echo get_option("blogname"); ?>","logo": {"@type": "ImageObject","url": "<?php echo $opt_themes['img_json_seo']['url'];  ?>","width": 200,"height": 200 }},"author": {"@type": "Person","name": "<?php echo $author_name; ?>","image": "<?php echo $avatars_urls; ?>","url": "<?php echo $authorurl; ?>"}}</script>
<?php } } ?>

<link href='<?php echo $opt_themes['favicons']['url']; ?>' rel='icon' type='image/x-icon'/> 
<meta content='yes' name='mobile-web-app-capable'/>
 
<meta content='<?php echo get_bloginfo('description'); ?>' name='application-name'/>
<link href='<?php echo $opt_themes['favicons']['url']; ?>' rel='apple-touch-icon' sizes='57x57'/> 
<meta content='yes' name='apple-mobile-web-app-capable'/>
<meta content='black-translucent' name='apple-mobile-web-app-status-bar-style'/>
<meta content='<?php echo get_bloginfo('description'); ?>' name='apple-mobile-web-app-title'/> 

<!--[ Theme Color ]-->
<meta content='<?php echo $opt_themes['themeC']; ?>' name='theme-color'/>
<meta content='<?php echo $opt_themes['themeC']; ?>' name='msapplication-navbutton-color'/>
<meta content='<?php echo $opt_themes['themeC']; ?>' name='apple-mobile-web-app-status-bar-style'/>
<meta content='#000000' name='msapplication-TileColor'/>  

<!--[ Preconnect and DNS Prefetch ]-->
<link href='//translate.google.com' rel='preconnect dns-prefetch'/>
<link href='//blogger.com' rel='preconnect dns-prefetch'/>
<link href='//maxcdn.bootstrapcdn.com' rel='preconnect dns-prefetch'/>
<link href='//fonts.googleapis.com' rel='preconnect dns-prefetch'/>
<link href='//use.fontawesome.com' rel='preconnect dns-prefetch'/>
<link href='//ajax.googleapis.com' rel='preconnect dns-prefetch'/>
<link href='//ajax.microsoft.com ' rel='preconnect dns-prefetch'/>
<link href='//ajax.aspnetcdn.com ' rel='preconnect dns-prefetch'/>
<link href='//github.com' rel='preconnect dns-prefetch'/>
<link href='//cdn.rawgit.com' rel='preconnect dns-prefetch'/>
<link href='//cdnjs.cloudflare.com' rel='preconnect dns-prefetch'/>
<link href='//www.google-analytics.com' rel='preconnect dns-prefetch'/>
<link href='//www.facebook.com' rel='preconnect dns-prefetch'/>
<link href='//connect.facebook.net' rel='preconnect dns-prefetch'/>
<link href='//disqus.com' rel='preconnect dns-prefetch'/>
<link href='//plus.google.com' rel='preconnect dns-prefetch'/>
<link href='//twitter.com' rel='preconnect dns-prefetch'/>
<link href='//platform.twitter.com' rel='preconnect dns-prefetch'/>
<link href='//syndication.twitter.com' rel='preconnect dns-prefetch'/>
<link href='//r.twimg.com ' rel='preconnect dns-prefetch'/>
<link href='//p.twitter.com ' rel='preconnect dns-prefetch'/>
<link href='//cdn.api.twitter.com ' rel='preconnect dns-prefetch'/>
<link href='//www.youtube.com' rel='preconnect dns-prefetch'/>
<link href='//img.youtube.com' rel='preconnect dns-prefetch'/>
<link href='//www.pinterest.com' rel='preconnect dns-prefetch'/>
<link href='//statically.io/' rel='preconnect dns-prefetch'/>
<link href='//www.linkedin.com' rel='preconnect dns-prefetch'/>
<link href='//player.vimeo.com' rel='preconnect dns-prefetch'/>
<!--[ CSS stylesheet ]-->
<?php get_template_part( '/assets/css/root' ); ?>
<!--<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />-->
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css" rel="stylesheet" />

<?php 
if(is_rtl()){?>
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/rtl.css" rel="stylesheet" /> 
<?php } ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/header_main.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/header_sec.js"></script>

<?php }

function plusui_head_js() { 
global $opt_themes; 
?>

<script>
const blogUrl ='<?php echo esc_url( home_url( '/' ) ); ?>';
const blogID ='false';
const postID ='false';
const blogTitle ='<?php echo get_bloginfo('name'); ?>';
const isPreview ='false';
const isHomepage ='true';
const isSearch ='false';
const isBlog ='false';
const isSingleItem ='false';
const isPost ='false';
const isPage ='false';
const isError ='false';
const isMobile ='false';
const isPrivateBlog ='false';
const analyticsID ='false';
const caPubAdsense ='false';
const licenseKey =''; 
</script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>

<?php if($opt_themes['auto_dark']){ ?>
<script>
const hours = new Date().getHours();
const body = document.querySelector('body');
document.addEventListener("DOMContentLoaded", () => {
  if (hours > 18 || hours < 7) { 
	document.body.classList.add('drK');
  } else { 
	document.body.classList.remove('drK');
  }
});
</script> 
<?php }}

function plusui_footer() { 
global $opt_themes; 
?>

<!--[ additional javascript ]-->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/footer_sec.js"></script>

<?php 
global $opt_themes; 
if ($opt_themes['lazy_on']){ ?> 
<script>
/*<![CDATA[*/
/* Images */ (function(){var imgU=qSell('img.imgThm, .sImg .im, .cmAv .im, .pIm .im, .admIm .im, .sldC a.sldIm, .zmImg a>img, .zmImg > img, #postBody > img');for(var i=0;i<imgU.length;i++){if(imgU[i].getAttribute('data-src')){var uImg=imgU[i].getAttribute('data-src');if((uImg.includes('blogspot')==!0||uImg.includes('googleusercontent')==!0)&&(uImg.includes('-pd')==!0||uImg.includes('-p-k-no-nu')==!0)&&uImg.includes('-rw')==!1){imgU[i].setAttribute('data-src',uImg.replace('-nu','-nu-rw-e30').replace('-pd','-pd-rw-e30'))}}else if(imgU[i].getAttribute('src')){var uImg=imgU[i].getAttribute('src');if((uImg.includes('blogspot')==!0||uImg.includes('googleusercontent')==!0)&&uImg.includes('p-k-no-nu')==!0&&uImg.includes('-rw')==!1){imgU[i].setAttribute('data-src',uImg.replace('-nu','-nu-rw-e30'))}else{imgU[i].setAttribute('data-src',uImg)};addCt(imgU[i],'lazy');imgU[i].setAttribute('src','data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=')}else if(imgU[i].getAttribute('data-style')){var uImg=imgU[i].getAttribute('data-style');if((uImg.includes('blogspot')==!0||uImg.includes('googleusercontent')==!0)&&uImg.includes('w60')==!0&&uImg.includes('-rw')==!1){imgU[i].setAttribute('data-style',uImg.replace('w60','w60-rw-e30'))}else if((uImg.includes('blogspot')==!0||uImg.includes('googleusercontent')==!0)&&uImg.includes('p-k-no-nu')==!0&&uImg.includes('-rw')==!1){imgU[i].setAttribute('data-style',uImg.replace('-nu','-nu-rw-e30'))}else if((uImg.includes('=s')==!0||uImg.includes('/s')==!0)&&uImg.includes('-rw')==!1){imgU[i].setAttribute('data-style',uImg.replace(/\/s[0-9]+(\-c)?/,'/s1280-rw-e30').replace(/\=s[0-9]+(\-c)?/,'=s1280-rw-e30'))}}};})();

/* Defer Img */ Defer.dom('.lazy', 100, 'loaded', null, {rootMargin:'1px'}),'undefined'!=typeof infinite_scroll&&infinite_scroll.on('load',function(){Defer.dom('.lazy', 100, 'loaded', null, {rootMargin:'1px'}) });

/*]]>*/
</script>
<?php } ?>
 
<script>
/*<![CDATA[*/
/* lazy youtube */ 
!function(){for(var t=qSell(".lazyYt"),e=0;e<t.length;e++){var a="https://img.youtube.com/vi/"+t[e].dataset.embed+"/sddefault.jpg",s=new Image;s.setAttribute("class","lazy"),s.setAttribute("data-src",a),s.setAttribute("src","data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="),s.setAttribute("alt","Youtube video"),s.addEventListener("load",void t[e].appendChild(s)),t[e].addEventListener("click",function(){var t=document.createElement("iframe");t.setAttribute("frameborder","0"),t.setAttribute("allowfullscreen",""),t.setAttribute("src","https://www.youtube.com/embed/"+this.dataset.embed+"?rel=0&showinfo=0&autoplay=1"),this.innerHTML="",this.appendChild(t)})}}();

/* Lightbox image */ 
for(var imageslazy=qSell(".pS .separator img, .pS .tr-caption-container img, .pS .psImg >img, .pS .btImg >img"),i=0;i<imageslazy.length;i++)imageslazy[i].setAttribute("onclick","return false");function wrap(i,a,t){for(var r=document.querySelectorAll(a),e=0;e<r.length;e++){var m=i+r[e].outerHTML+t;r[e].outerHTML=m}}wrap('<div class="zmImg">',".pS .separator >a","</div>"),wrap('<div class="zmImg">',".pS .tr-caption-container td >a","</div>"),wrap('<div class="zmImg">',".pS .separator >img","</div>"),wrap('<div class="zmImg">',".pS .tr-caption-container td >img","</div>"),wrap('<div class="zmImg">',".pS .psImg img","</div>");for(var containerimg=document.getElementsByClassName("zmImg"),i=0;i<containerimg.length;i++)containerimg[i].onclick=function(){this.classList.toggle("s")};

/*]]>*/
</script>
<!--[ Main js ]-->
<script>
/*<![CDATA[*/
const PuSet = {
  license: {
    key: licenseKey
  },
  realViews: {
    databaseUrl: "",
    abbreviation: "true"
  },
  noInternet: {
    enablePopup: "true",
    enableToast: "true",
    offlineMes: "You are Offline!",
    onlineMes: "You are Online!"
  },
  preCopy: {
    copiedMes: "<i class='clipboard'></i><?php echo $opt_themes['opt_title_share_4']; ?>"
  },
  cookieCon: {
    consentMaxAge: "2592000",
    cookieError: "Error: Cookie can&#039;t be set! Please unblock this site from the cookie setting of your browser."
  },
  gTranslate: {
    pageLang: "<?php echo $opt_themes['lang_default']; ?>",
    includedLangs: "<?php echo $opt_themes['lang_alt']; ?>",
    autoDisplay: "true",
    multiLangPage: "true"
  },
  bookmark: {
    bmTitle: "<?php echo $opt_themes['opts_title_other_22']; ?>",
    closeText: "<?php echo $opt_themes['opts_title_other_10']; ?>",
    noBmIcon: "<svg class='line' viewBox='0 0 24 24'><g transform='translate(3.650100, 2.749900)'><path d='M16.51,5.55 L10.84,0.15 C10.11,0.05 9.29,0 8.39,0 C2.1,0 -1.95399252e-14,2.32 -1.95399252e-14,9.25 C-1.95399252e-14,16.19 2.1,18.5 8.39,18.5 C14.69,18.5 16.79,16.19 16.79,9.25 C16.79,7.83 16.7,6.6 16.51,5.55 Z'/><path d='M10.2839,0.0827 L10.2839,2.7437 C10.2839,4.6017 11.7899,6.1067 13.6479,6.1067 L16.5989,6.1067'/><line class='svgC' x1='10.6623' y1='10.2306' x2='5.7623' y2='10.2306'/><line class='svgC' x1='8.2131' y1='12.6808' x2='8.2131' y2='7.7808'/></g></svg>",
    noBmMes: "<?php echo $opt_themes['opts_title_other_23']; ?>",
    noBmAll: "<?php echo $opt_themes['opts_title_other_24']; ?>",
    noBmLink: "/",
    delIcon: "<svg class='line' viewBox='0 0 24 24'><g transform='translate(3.500000, 2.000000)'><path d='M15.3891429,7.55409524 C15.3891429,15.5731429 16.5434286,19.1979048 8.77961905,19.1979048 C1.01485714,19.1979048 2.19295238,15.5731429 2.19295238,7.55409524'/><line x1='16.8651429' y1='4.47980952' x2='0.714666667' y2='4.47980952'/><path d='M12.2148571,4.47980952 C12.2148571,4.47980952 12.7434286,0.714095238 8.78914286,0.714095238 C4.83580952,0.714095238 5.36438095,4.47980952 5.36438095,4.47980952'/></g></svg>",
    addedNtf: "<i class='check'></i><?php echo $opt_themes['opts_title_other_25']; ?>",
    removedNtf: "<i class='del'></i><?php echo $opt_themes['opts_title_other_26']; ?>",
  },
   
  fontFamily: {
    mobileFonts: "@font-face{font-family:'Google Sans Text';font-style:normal;font-weight:400;font-display:swap;src:local('Google Sans Text'),local('Google-Sans-Text'),url(https://fonts.gstatic.com/s/googlesanstext/v16/5aUu9-KzpRiLCAt4Unrc-xIKmCU5qEp2iw.woff2) format('woff2')} @font-face{font-family:'Google Sans Text';font-style:normal;font-weight:700;font-display:swap;src:local('Google Sans Text'),local('Google-Sans-Text'),url(https://fonts.gstatic.com/s/googlesanstext/v16/5aUp9-KzpRiLCAt4Unrc-xIKmCU5oPFTnmhjtg.woff2) format('woff2')} @font-face{font-family:'Google Sans Mono';font-style:normal;font-weight:400;font-display:swap;src:local('Google Sans Mono'),local('Google-Sans-Mono'),url(https://fonts.gstatic.com/s/googlesansmono/v4/P5sUzYWFYtnZ_Cg-t0Uq_rfivrdYH4RE8-pZ5gQ1abT53wVQGrk.woff2) format('woff2')}"
  }
};
/*]]>*/
</script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/footer_main.js"></script>
<?php if ($opt_themes['load_more_on']){?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script>
/*<![CDATA[*/
jQuery(function($){ 
	$('body').on('click', '#plus_ui_loadmore', function(){
		$.ajax({
			url : plus_ui_loadmore_params.ajaxurl, // AJAX handler
			data : {
				'action': 'loadmore', // the parameter for admin-ajax.php
				'query': plus_ui_loadmore_params.posts, // loop parameters passed by wp_localize_script()
				'page' : plus_ui_loadmore_params.current_page, // current page
				'first_page' : plus_ui_loadmore_params.first_page
			},
			type : 'POST',
			beforeSend : function ( xhr ) {
				$('#plus_ui_loadmore').text('<?php _e($opt_themes['text_load_more_2'], TEXT_DOMAIN); ?>'); // some type of preloader
			},
			success : function( data ){
			if( data ) {
					$('#plus_ui_loadmore').remove();
					$('#get_more_posts').before(data).remove();
					plus_ui_loadmore_params.current_page++;
					if ( plus_ui_loadmore_params.current_page == plus_ui_loadmore_params.max_page ) 
					$('#plus_ui_loadmore').text('more agains'); // if last page, HIDE the button
 
				} else {
					$('#plus_ui_loadmore').text('load more agains');// if no data, HIDE the button as well
				}

			}
		});
		return false;
	});

});
/*]]>*/
</script>

<?php }}

function plusui_translate_js() { 
global $opt_themes; 
if($opt_themes['gtranslate_on']){?>
<script id="trans_js" src="<?php echo get_template_directory_uri(); ?>/assets/js/translate.js"></script>
<?php }}

