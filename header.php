<?php 
global $opt_themes;   
?>
<!DOCTYPE html>
<html <?php if(!is_rtl()){?> dir='ltr'<?php } ?> <?php language_attributes(); ?>>
<head> 
<!--[ Meta for browser ]-->
<meta charset='<?php bloginfo( 'charset' ); ?>'/>
<meta content='width=device-width, initial-scale=1, user-scalable=1, minimum-scale=1, maximum-scale=5' name='viewport'/>
<meta content='IE=edge' http-equiv='X-UA-Compatible'/>
<meta content='max-image-preview:large' name='robots'/>

<?php 
wp_head();
plusui_head();
if($opt_themes['header_section_on']){
echo $opt_themes['header_section'];
}
?>
 
</head>
 
<body id='mainCont'>
<div <?php body_class(); ?> >
<input class='prfI hidden' id='offPrf' type='checkbox'/>
<input class='navI hidden' id='offNav' type='checkbox'/>
<input class='navM hidden' id='onMode' type='checkbox'/>
<!--[ Preloader ]-->
<!--[ Toast Notif ]-->
<div class='tNtf alt notranslate' id='toastNotif'></div>
<!--[ Fixed Notif ]-->
<div id='fixedNotif'></div>
<!--[ Neon Lighting ]-->
<div class='nLght' id='neonLight'></div>
<div class='hidden section' id='license' name='License'>
<div class='widget HTML' id='HTML15'>
<div class='blog-admin' id='admCk'></div> 
<?php 
plusui_head_js();
?>
</div>
</div>

<?php
global $opt_themes; 
$maintenances_on		= $opt_themes['mdn_maintenances'];
$date_time				= $opt_themes['mdn_tanggal_jam'];
$date_time				= str_replace('-', '/', $date_time);
$maintenances_cnts		= $opt_themes['mdn_contents'];
if($maintenances_on){ if(!current_user_can('administrator')){
?>

<div class='mntnM'>
<!--[ Maintenance Mode ]-->
<div class='section' id='maintenance-mode'>
<div class='widget HTML' id='HTML00'>
<div class='mtm' id='maintainCont'>
<div class='mtmC'>
<?php echo $maintenances_cnts; ?> 
<script type='text/javascript'>
/*<![CDATA[*/
const maintenanceEndOn = '<?php echo $date_time; ?>';
/*]]>*/
</script>
<div class='clock'>
<div class='tBox'>
<span class='days'></span>
<span class='unit'><?php echo $opt_themes['mdn_days']; ?></span>
</div>
<div class='tBox'>
<span class='hours'></span>
<span class='unit'><?php echo $opt_themes['mdn_hours']; ?></span>
</div>
<div class='tBox'>
<span class='minutes'></span>
<span class='unit'><?php echo $opt_themes['mdn_minutes']; ?></span>
</div>
<div class='tBox'>
<span class='seconds'></span>
<span class='unit'><?php echo $opt_themes['mdn_seconds']; ?></span>
</div>
</div>
</div>
</div>
<script>/*<![CDATA[*/ /* Maintenance Mode */ if (qSel('#maintainCont')!=null){const dayDisplay=qSel('.tBox .days'),hourDisplay=qSel('.tBox .hours'),minuteDisplay=qSel('.tBox .minutes'),secondDisplay=qSel('.tBox .seconds'),maintainCont=qSel('#maintainCont'),maintainEndDate=new Date(maintenanceEndOn);let maintenanceDone=!1;const updateTimer=()=>{let e=new Date;var t=maintainEndDate.getTime()-e.getTime();t<=1e3&&(maintenanceDone=!0);var n=36e5,a=Math.floor(t/864e5),o=Math.floor(t%864e5/n),n=Math.floor(t%n/6e4),t=Math.floor(t%6e4/1e3);dayDisplay.innerText=a<10?'0'+a:a,hourDisplay.innerText=o<10?'0'+o:o,minuteDisplay.innerText=n<10?'0'+n:n,secondDisplay.innerText=t<10?'0'+t:t};setInterval(()=>{maintenanceDone?addCt(maintainCont,'hdn'):updateTimer()},1000);}; /*]]>*/</script>
</div>
</div>
</div>
<?php }} ?>

<div class='mainWrp'>
<!--[ Header section ]-->
<header class='header' id='header'>
<!--[ Header content ]-->
<div class='headCn'>
<div class='headD headL'>
<div class='headIc'>
<label class='tNav tIc bIc' for='offNav' onclick='vibRate(50)'>
<!--<svg class='line' viewBox='0 0 24 24'><line x1='3' x2='21' y1='12' y2='12'/><line x1='3' x2='21' y1='5' y2='5'/><line x1='3' x2='21' y1='19' y2='19'/></svg>-->
<svg class='line' viewBox='0 0 24 24'>
<g class='h1'><path d='M 3 18 H 14 M 10 6 H 21'></path><line class='svgC' x1='3' x2='21' y1='12' y2='12'></line></g>
<g class='h2' transform='translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) translate(5.000000, 8.500000)'><path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path></g>
<g class='h3' transform='translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) translate(5.000000, 8.500000)'><path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path></g>
</svg>
</label>
</div>
<!--[ Header widget ]-->
<?php
$domainsites        = get_bloginfo('url');
$parse				= parse_url($domainsites);
$sites				= $parse['host'];
?>
<div class='headN section' id='header-title'>
<div class='widget Header' id='Header1'>
<?php
if($opt_themes['logo_banner_on']){
?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="<?php echo get_bloginfo( 'description' ); ?>" height="78" src="<?php echo $opt_themes['logo_banner']['url']; ?>" width="320"></a>
<?php } else { ?>
<div class='headInnr'>
<h<?php if( is_home() ){ ?>1<?php } else { ?>2<?php } ?> class='headH hasSub'>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><bdi><span class='headTtl'><?php echo $opt_themes['logo_text']; ?></span></bdi></a>
<span class='headSub' data-text='<?php echo $opt_themes['logo_desc']; ?>'></span>
</h<?php if( is_home() ){ ?>1<?php } else { ?>2<?php } ?>>
</div>
<?php } ?>
<div class='headDsc hidden'><?php echo get_bloginfo('description'); ?></div>
</div>
</div>
</div>

<div class='headD headR'>
<div class='headI'>
<div class='headS section' id='header-search'>
<div class='widget BlogSearch' id='BlogSearch1'>
<form class="srchF" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>"  target='_top'> 
<input aria-label='<?php echo $opt_themes['opts_title_other_7']; ?>' autocomplete='off' id='searchIn' minlength='3' name='s' placeholder='<?php echo $opt_themes['opts_title_other_7']; ?>' required='required' value=''/>
<span class='sb'>
<svg class='line' viewBox='0 0 24 24'><g><circle cx='11.36167' cy='11.36167' r='9.36167'></circle><line class='svgC' x1='22' x2='19.9332' y1='22' y2='19.9332'></line></g></svg>
</span>
<button aria-label='<?php echo $opt_themes['opts_title_other_8']; ?>' class='sb' data-text='<?php echo $opt_themes['opts_title_other_8']; ?>' type='reset'></button>
<span class='fCls'></span>
</form>
</div>
</div>

<div class='headP section' id='header-icon'>
<div class='widget TextList' id='TextList000'>
<ul class='headIc'>
<li class='isSrh'>
<label aria-label='Search' class='tSrch tIc bIc' for='searchIn' onclick='vibRate(50)'>
<svg class='line' viewBox='0 0 24 24'><g><circle cx='11.36167' cy='11.36167' r='9.36167'></circle><line class='svgC' x1='22' x2='19.9332' y1='22' y2='19.9332'></line></g></svg>
</label>
</li>
<?php if($opt_themes['gtranslate_on']){?>
<li class='isTrans'>
<label aria-label='Translate' class='tIc bIc' for='offTrans' onclick='vibRate(50)'>
<svg class='line' viewBox='0 0 24 24'><path d='M.5,2V18A1.5,1.5,0,0,0,2,19.5H17L10.5.5H2A1.5,1.5,0,0,0,.5,2Z'></path><path d='M12,4.5H22A1.5,1.5,0,0,1,23.5,6V22A1.5,1.5,0,0,1,22,23.5H13.5l-1.5-4'></path><line x1='17' x2='13.5' y1='19.5' y2='23.5'></line><line class='svgC' x1='14.5' x2='21.5' y1='10.5' y2='10.5'></line><line class='svgC' x1='17.5' x2='17.5' y1='9.5' y2='10.5'></line><path class='svgC' d='M20,10.5c0,1.1-1.77,4.42-4,6'></path><path class='svgC' d='M16,13c.54,1.33,4,4.5,4,4.5'></path><path class='svgC' d='M10.1,7.46a4,4,0,1,0,1.4,3h-4'></path></svg>
</label>
<input class='transI hidden' id='offTrans' type='checkbox'/>
<div class='transW'>
<div class='transH' data-text='<?php echo $opt_themes['opts_title_other_27']; ?>'>
<label class='transCl' for='offTrans'></label>
</div>
<div class='transP'>
<div class='googleTrans' id='_google_translator_element'></div>
</div>
</div>
<label class='fCls' for='offTrans'></label>
</li> 
<?php } if($opt_themes['bookmark_on']){ ?>
<li class="isBkm">
<label aria-label="Bookmark" class="tBkmt tIc bIc n" for="offBkm" onclick="vibRate(50)">
<svg class="line" viewBox="0 0 24 24"><g transform="translate(4.500000, 2.500000)"><path d="M7.47024319,0 C1.08324319,0 0.00424318741,0.932 0.00424318741,8.429 C0.00424318741,16.822 -0.152756813,19 1.44324319,19 C3.03824319,19 5.64324319,15.316 7.47024319,15.316 C9.29724319,15.316 11.9022432,19 13.4972432,19 C15.0932432,19 14.9362432,16.822 14.9362432,8.429 C14.9362432,0.932 13.8572432,0 7.47024319,0 Z"></path></g></svg>
</label>
</li>
<?php } if($opt_themes['contributors_on']){  if (!is_single()) {?> 
<li>
<label aria-label='Profile' class='tPrfl tIc bIc' for='offPrf' onclick='vibRate(50)'>
<svg class="line" viewBox="0 0 24 24"><path class="svgC" d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"></path><path d="M20.5899 22C20.5899 18.13 16.7399 15 11.9999 15C7.25991 15 3.40991 18.13 3.40991 22"></path></svg>
</label>
</li>
<?php }} ?>
<li class='isDrk'>
<label aria-label='Mode' class='navM tDark tIc tDL bIc' for='onMode' >
<svg class='line' viewBox='0 0 24 24'>
<g class='d1'><path d='M183.72453,170.371a10.4306,10.4306,0,0,1-.8987,3.793,11.19849,11.19849,0,0,1-5.73738,5.72881,10.43255,10.43255,0,0,1-3.77582.89138,1.99388,1.99388,0,0,0-1.52447,3.18176,10.82936,10.82936,0,1,0,15.118-15.11819A1.99364,1.99364,0,0,0,183.72453,170.371Z' transform='translate(-169.3959 -166.45548)'></path></g>
<g class='d2'><path class='f' d='M12 18.5C15.5899 18.5 18.5 15.5899 18.5 12C18.5 8.41015 15.5899 5.5 12 5.5C8.41015 5.5 5.5 8.41015 5.5 12C5.5 15.5899 8.41015 18.5 12 18.5Z'></path><path class='svgC' d='M19.14 19.14L19.01 19.01M19.01 4.99L19.14 4.86L19.01 4.99ZM4.86 19.14L4.99 19.01L4.86 19.14ZM12 2.08V2V2.08ZM12 22V21.92V22ZM2.08 12H2H2.08ZM22 12H21.92H22ZM4.99 4.99L4.86 4.86L4.99 4.99Z' stroke-width='2'></path></g></svg>
</label>
<div class='headM' data-text='<?php echo $opt_themes['opts_title_other_29']; ?>'>
<span aria-label='<?php echo $opt_themes['opts_title_other_30']; ?>' class='lgtB' onclick='modeL(); vibRate(50)' role='button'></span>
<span aria-label='<?php echo $opt_themes['opts_title_other_31']; ?>' class='drkB' onclick='modeD(); vibRate(50)' role='button'></span>
<span aria-label='<?php echo $opt_themes['opts_title_other_32']; ?>' class='sydB' onclick='modeS(); vibRate(50)' role='button'></span>
<label aria-label='<?php echo $opt_themes['opts_title_other_28']; ?>' class='themeBtn' for='forCusThm' id='themeBtn' role='button'></label>
</div>
<label class='fCls' for='onMode'></label>
<script>
/*<![CDATA[*/ if (window.matchMedia){qSel('.headR .headM .sydB').style.display='block'}; /*]]>*/
</script>
<input class='cusI hidden' id='forCusThm' type='checkbox'/>
<div class='cusW'>
<div class='cusH'>
<span class='cusHi' data-text='<?php echo $opt_themes['opts_title_other_28']; ?>'></span>
<label class='cusCl' for='forCusThm'></label>
</div>
<div class='cusP'>
<span class='tPkr thB0' onclick='webTheme("theme0");modeL()' style='--pkrC:#eceff1'></span><span class='tPkr thB1' onclick='webTheme("theme1");modeL()' style='--pkrC:#F44336'></span><span class='tPkr thB2' onclick='webTheme("theme2");modeL()' style='--pkrC:#00BFA5'></span><span class='tPkr thB3' onclick='webTheme("theme3");modeL()' style='--pkrC:#2196F3'></span><span class='tPkr thB4' onclick='webTheme("theme4");modeL()' style='--pkrC:#FBC02D'></span><span class='tPkr thB5' onclick='webTheme("theme5");modeL()' style='--pkrC:#E91E63'></span><span class='tPkr thB6' onclick='webTheme("theme6");modeL()' style='--pkrC:#FF5722'></span><span class='tPkr thB7' onclick='webTheme("theme7");modeL()' style='--pkrC:#607D8B'></span><span class='tPkr thB8' onclick='webTheme("theme8");modeL()' style='--pkrC:#5D4037'></span><span class='tPkr thB9' onclick='webTheme("theme9");modeL()' style='--pkrC:#744D97'></span><span class='tPkr thB10' onclick='webTheme("theme10");modeL()' style='--pkrC:#3949AB'></span>
</div>
</div>
<label class='fCls' for='forCusThm'></label>
</li>
</ul>
</div>
 
<div class='widget Profile' id='Profile1'>
<div class='wPrf tm'>
<div class='prfS fixLs'>
<?php 
global $current_user, $post, $opt_themes;
?>
<div class='prfH fixH fixT' data-text='<?php echo $opt_themes['opts_title_other_9']; ?>'>
<label aria-label='<?php echo $opt_themes['opts_title_other_10']; ?>' class='c cl' for='offPrf'></label>
</div>

<div class='prfC'>
<?php
$args = array(
    'role'    => 'administrator',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$users = get_users( $args );
foreach ( $users as $admin ) {
?>
<div class='t'>
<div aria-label='<?php echo $admin->display_name; ?>' class='prfL' data-text='<?php echo $admin->display_name; ?>' style="color: <?php echo $opt_themes['linkC']; ?>;text-transform: capitalize;">
<div class='im lazy' data-style='background-image: url(<?php echo get_avatar_url( $admin->user_email ); ?>);border-style: dotted dashed solid double;' style="">
</div>
<noscript><div class='im' style='background-image: url(<?php echo get_avatar_url( $admin->user_email ); ?>)'></div></noscript>
</div>
</div>
<?php } 
$arg_editor = array(
    'role'    => 'editor',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$editors = get_users( $arg_editor );
foreach ( $editors as $editor ) {
?>
<div class='t'>
<div aria-label='<?php echo $editor->display_name; ?>' class='prfL' data-text='<?php echo $editor->display_name; ?>' style="color: <?php echo $opt_themes['iconC']; ?>;text-transform: capitalize;">
<div class='im lazy' data-style='background-image: url(<?php echo get_avatar_url( $editor->user_email ); ?>);border-style: dotted dashed solid double;'>
</div>
<noscript><div class='im' style='background-image: url(<?php echo get_avatar_url( $editor->user_email ); ?>)'></div></noscript>
</div>
</div>
<?php } ?>
</div>

</div>
</div>
<label class='fCls' for='offPrf'></label>
</div>
 
</div>
</div>
</div>
</div>
</header>

<!--[ Content section ]-->
<div class='mainIn'>
<!--[ Menu content ]-->
<div class='blogMn'>
<div class='mnBr'>
<div class='mnBrs'>
<div class='mnH'>
<label aria-label='<?php echo $opt_themes['opts_title_other_10']; ?>' class='c' data-text='<?php echo $opt_themes['opts_title_other_10']; ?>' for='offNav'></label>
</div>

<!--[ Mobile additional menu(only shown in mobile view) ]-->
<div class='mnMob section' id='nav-widget-1'>
<?php 
if(has_nav_menu( 'side_menu_footer' )){ 
?> 
<!--[ Scroll menu ]-->
<div class='widget PageList' id='PageList002'>
<ul class='mMenu'>
<?php 
$side_menu_footerz = array( 
    'theme_location'    => 'side_menu_footer', 
	'container' 		=> false,
    'items_wrap'        => '%3$s',
    //'walker'            => new menu_header_two,    
);
wp_nav_menu( $side_menu_footerz );
?>
</ul>
</div>
<?php } ?>

<div class='widget LinkList' id='LinkList002'>
<div class='mNav'>
<label class='tIc bIc' for='offNav'>
<svg viewBox='0 0 512 512'><path d='M417.4,224H288V94.6c0-16.9-14.3-30.6-32-30.6c-17.7,0-32,13.7-32,30.6V224H94.6C77.7,224,64,238.3,64,256 c0,17.7,13.7,32,30.6,32H224v129.4c0,16.9,14.3,30.6,32,30.6c17.7,0,32-13.7,32-30.6V288h129.4c16.9,0,30.6-14.3,30.6-32 C448,238.3,434.3,224,417.4,224z'></path></svg>
</label>
</div>

<!--[ Menu Sosial Media ]-->
<?php  
if(has_nav_menu( 'menu_sosmed' )){ 
?>  
<ul class='mSoc'>
<?php 
$menus_sosmed = array( 
    'theme_location'    => 'menu_sosmed', 
	'container' 		=> false,
    'items_wrap'        => '%3$s',
    'walker'            => new menu_sosmed,    
);
wp_nav_menu( $menus_sosmed );
?>
</ul> 
<?php } else { ?>
<ul class='mSoc'>
<?php echo $opt_themes['menu_sosmed_side']; ?>
</ul>
<?php } ?>

</div>
</div> 
 
<?php 
/*
https://wordpress.stackexchange.com/a/404817
*/
if(has_nav_menu( 'header_one' )){ 
?>  
<div class='mnMen section' id='nav-widget-2'>
<div class='widget HTML' id='HTML000'>
<ul class='mnMn' itemscope='itemscope' itemtype='https://schema.org/SiteNavigationElement'>
<?php 
$header_ones = array( 
    'theme_location'    => 'header_one', 
	'container' 		=> false,
    'items_wrap'        => '%3$s',
    'walker'            => new menu_walker,    
);
wp_nav_menu( $header_ones );
?>
</ul>
</div>
</div>
<?php } else { ?>
<div class='mnMen section' id='nav-widget-2'>
<div class='widget HTML' id='HTML000'>
<ul class='mnMn' itemscope='itemscope' itemtype='https://schema.org/SiteNavigationElement'>
<?php echo $opt_themes['menu_side']; ?>  
</ul>
</div>
</div>
<?php } ?>

</div>
</div>
<label class='fCls' for='offNav'></label>
</div>


<!--[ Blog content ]-->
<div class='blogCont'>
<div class='secIn'>
<div class='section' id='notif-widget'>


<?php
if ( is_home() ) {
if(has_nav_menu( 'header_two' )){ 
?> 
<!--[ Scroll menu ]-->
<div class='widget LinkList' id='LinkList001'>
<nav class='navS scrlH'>
<div class='secIn'>
<ul>
<?php 
$headers_two = array( 
    'theme_location'    => 'header_two', 
	'container' 		=> false,
    'items_wrap'        => '%3$s',
    'walker'            => new menu_header_two,    
);
wp_nav_menu( $headers_two );
?>
</ul>
</div>
</nav>
</div>
<?php }} ?>
 
<?php if($opt_themes['notification_header_on']){ ?>
<div class='widget HTML' id='HTML0'>
<input checked='checked' class='ntfI hidden' id='forNft' type='checkbox'/>
<div class='ntfC'>
<div class='ntfT'>
<!--[ Your content here, Lorem ipsum dolor sit amet, consectetur adipiscing elit. ]-->
<!--[ Alternatif content with button link ]-->
<div class='ntfA'> 
<?php echo $opt_themes['notification_header']; ?>
</div>
</div>
<label aria-label='Close Menu' class='c' for='forNft'></label>
</div>
<script>/*<![CDATA[*/ let notIn = qSel("#forNft"); if (Pu.gC("NOTIF_CLOSE") == undefined) {notIn.checked = !1; notIn.addEventListener("change", function(){if (this.checked == !0){Pu.sC("NOTIF_CLOSE", 1 , {secure: !0, "max-age": 1800})} });}; /*]]>*/</script>
</div>
<?php } ?>
</div>
 
<div class='blogM'>