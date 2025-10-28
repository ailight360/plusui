<?php 
global $opt_themes;
?>

</div>
<!--[ Mobile Menu ]-->
<div class='mobMn section' id='mobile-menu'>
<div class='widget TextList' id='TextList99'>
<ul>
<li class='mH nmH'>
<span aria-label='Home' data-text='Home' role='button'>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label='Home'><svg class='line' viewBox='0 0 24 24'><g transform='translate(2.400000, 2.000000)'><line class='svgC' x1='6.6787' x2='12.4937' y1='14.1354' y2='14.1354'></line><path d='M1.24344979e-14,11.713 C1.24344979e-14,6.082 0.614,6.475 3.919,3.41 C5.365,2.246 7.615,0 9.558,0 C11.5,0 13.795,2.235 15.254,3.41 C18.559,6.475 19.172,6.082 19.172,11.713 C19.172,20 17.213,20 9.586,20 C1.959,20 1.24344979e-14,20 1.24344979e-14,11.713 Z'></path></g></svg></a>
</span>
</li>
<li class='mS'>
<label aria-label='Search' data-text='Search' for='searchIn'>
<svg class='line' viewBox='0 0 24 24'><g><circle cx='11.36167' cy='11.36167' r='9.36167'></circle><line class='svgC' x1='22' x2='19.9332' y1='22' y2='19.9332'></line></g></svg>
</label>
</li>
<li class='mN'>
<label aria-label='Menu' data-text='Menu' for='offNav'>
<svg class='line' viewBox='0 0 24 24'><g transform='translate(3.000000, 3.000000)'><path class='fill' d='M18.00036,3.6738 C18.00036,5.7024 16.35516,7.3476 14.32656,7.3476 C12.29796,7.3476 10.65366,5.7024 10.65366,3.6738 C10.65366,1.6452 12.29796,-6.39488462e-15 14.32656,-6.39488462e-15 C16.35516,-6.39488462e-15 18.00036,1.6452 18.00036,3.6738 Z'></path><path class='fill svgC' d='M7.3467,3.6738 C7.3467,5.7024 5.7024,7.3476 3.6729,7.3476 C1.6452,7.3476 4.79616347e-15,5.7024 4.79616347e-15,3.6738 C4.79616347e-15,1.6452 1.6452,-6.39488462e-15 3.6729,-6.39488462e-15 C5.7024,-6.39488462e-15 7.3467,1.6452 7.3467,3.6738 Z'></path><path class='fill svgC' d='M18.00036,14.26194 C18.00036,16.29054 16.35516,17.93484 14.32656,17.93484 C12.29796,17.93484 10.65366,16.29054 10.65366,14.26194 C10.65366,12.23334 12.29796,10.58814 14.32656,10.58814 C16.35516,10.58814 18.00036,12.23334 18.00036,14.26194 Z'></path><path class='fill' d='M7.3467,14.26194 C7.3467,16.29054 5.7024,17.93484 3.6729,17.93484 C1.6452,17.93484 4.79616347e-15,16.29054 4.79616347e-15,14.26194 C4.79616347e-15,12.23334 1.6452,10.58814 3.6729,10.58814 C5.7024,10.58814 7.3467,12.23334 7.3467,14.26194 Z'></path></g></svg>
</label>
</li>
<?php if (is_single() ) { ?>
<li class="mS">
<label aria-label="<?php _e('Share', TEXT_DOMAIN); ?>" data-text="<?php _e('Share', TEXT_DOMAIN); ?>" for="forShare">
<svg class="line" viewBox="0 0 24 24"><path d="M92.30583,264.72053a3.42745,3.42745,0,0,1-.37,1.57,3.51,3.51,0,1,1,0-3.13995A3.42751,3.42751,0,0,1,92.30583,264.72053Z" transform="translate(-83.28571 -252.73452)"></path><circle class="svgC" cx="18.48892" cy="5.49436" r="3.51099"></circle><circle class="svgC" cx="18.48892" cy="18.50564" r="3.51099"></circle><line class="cls-3" x1="12.53012" x2="8.65012" y1="8.476" y2="10.416"></line><line class="cls-3" x1="12.53012" x2="8.65012" y1="15.496" y2="13.556"></line></svg>
</label>
</li>
<li class="mC">
<label aria-label="<?php _e('Comments', TEXT_DOMAIN); ?>" data-text="<?php _e('Comments', TEXT_DOMAIN); ?>" for="forComments">
<svg class="line" viewBox="0 0 24 24"><path d="M22 10V13C22 17 20 19 16 19H15.5C15.19 19 14.89 19.15 14.7 19.4L13.2 21.4C12.54 22.28 11.46 22.28 10.8 21.4L9.3 19.4C9.14 19.18 8.77 19 8.5 19H8C4 19 2 18 2 13V8C2 4 4 2 8 2H14"></path><path class="svgC komentar" d="M19.5 7C20.8807 7 22 5.88071 22 4.5C22 3.11929 20.8807 2 19.5 2C18.1193 2 17 3.11929 17 4.5C17 5.88071 18.1193 7 19.5 7Z" ></path></svg>
</label>
</li>			 
<?php } else { ?>
<li class='mD'>
<span aria-label='Mode' class='tDL' data-light='Light' data-text='Dark' onclick='darkMode()' role='button'>
<svg class='line' viewBox='0 0 24 24'>
<g class='d1'><path d='M183.72453,170.371a10.4306,10.4306,0,0,1-.8987,3.793,11.19849,11.19849,0,0,1-5.73738,5.72881,10.43255,10.43255,0,0,1-3.77582.89138,1.99388,1.99388,0,0,0-1.52447,3.18176,10.82936,10.82936,0,1,0,15.118-15.11819A1.99364,1.99364,0,0,0,183.72453,170.371Z' transform='translate(-169.3959 -166.45548)'></path></g>
<g class='d2'><path class='f' d='M12 18.5C15.5899 18.5 18.5 15.5899 18.5 12C18.5 8.41015 15.5899 5.5 12 5.5C8.41015 5.5 5.5 8.41015 5.5 12C5.5 15.5899 8.41015 18.5 12 18.5Z'></path><path class='svgC' d='M19.14 19.14L19.01 19.01M19.01 4.99L19.14 4.86L19.01 4.99ZM4.86 19.14L4.99 19.01L4.86 19.14ZM12 2.08V2V2.08ZM12 22V21.92V22ZM2.08 12H2H2.08ZM22 12H21.92H22ZM4.99 4.99L4.86 4.86L4.99 4.99Z' stroke-width='2'></path></g></svg>
</span>
</li>	 
<li class='mS'>
<span aria-label='Top' data-text='Top' onclick='window.scrollTo({top: 0});' role='button'>
<svg class='line' viewBox='0 0 24 24'><g transform='translate(2.500000, 3.000000)'><path class='fill' d='M9.5,18 C3.00557739,18 0.456662548,17.5386801 0.0435259337,15.2033146 C-0.36961068,12.8679491 2.27382642,8.47741935 3.08841712,7.02846996 C5.81256986,2.18407813 7.66371927,0 9.5,0 C11.3362807,0 13.1874301,2.18407813 15.9115829,7.02846996 C16.7261736,8.47741935 19.3696107,12.8679491 18.9564741,15.2033146 C18.5443995,17.5386801 15.9944226,18 9.5,18 Z'></path></g></svg>
</span>
</li>
<?php } ?>
</ul>
</div>
</div>

<!--[ Footer section ]-->
<?php
$domainsites        = get_bloginfo('url');;
$parse				= parse_url($domainsites);
$sites				= $parse['host'];
?>
<footer>
<div class='footer'>
<div class='fotIn'>
<div class='section' id='footer-widget-1'>
<?php 
echo $opt_themes['footers_info'];
if(has_nav_menu( 'footer-sosmed' )){ 
?>
<div class='widget LinkList' id='LinkList1'>
<ul class='sL'>
<?php 
$footer_sosmed = array( 
    'theme_location'    => 'footer-sosmed', 
	'container' 		=> false,
    'items_wrap'        => '%3$s' 
);
wp_nav_menu( $footer_sosmed );
?>
</ul>
</div>
<?php } ?>
</div> 

<?php 
if(has_nav_menu( 'footer-kiri' )){  
 
?>
<div class='section' id='footer-widget-kiri'>
<div class='widget LinkList' id='LinkList-kiri'>
<h3 class='title'><?php echo wp_get_nav_menu_name( 'footer-kiri' ); ?></h3>
<?php 
$defaults = array(
  'theme_location'  => 'footer-kiri', 
  'menu_class'      => 'widget-content', 
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu', 
  'link_before'     => '<span>',
  'link_after'      => '</span>',
  'items_wrap'      => '<ul>%3$s</ul>',
  'depth'           => 0,
  'walker'          => ''
);
wp_nav_menu($defaults);
?> 
</div>
</div>
<?php }  
if(has_nav_menu( 'footer-mid' )){   
 
?>
<div class='section' id='footer-widget-mid'>
<div class='widget LinkList' id='LinkList-mid'>
<h3 class='title'><?php echo wp_get_nav_menu_name( 'footer-mid' ); ?></h3>
<?php 
$defaults = array(
  'theme_location'  => 'footer-mid', 
  'menu_class'      => 'widget-content', 
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu', 
  'link_before'     => '<span>',
  'link_after'      => '</span>',
  'items_wrap'      => '<ul>%3$s</ul>',
  'depth'           => 0,
  'walker'          => ''
);
wp_nav_menu($defaults);
?> 
</div>
</div>
<?php } 
if(has_nav_menu( 'footer-kanan' )){   
 
?>
<div class='section' id='footer-widget-kanan'>
<div class='widget LinkList' id='LinkList-kanan'>
<h3 class='title'><?php echo wp_get_nav_menu_name( 'footer-kanan' ); ?></h3>
<?php 
$defaults = array(
  'theme_location'  => 'footer-kanan', 
  'menu_class'      => 'widget-content', 
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu', 
  'link_before'     => '<span>',
  'link_after'      => '</span>',
  'items_wrap'      => '<ul>%3$s</ul>',
  'depth'           => 0,
  'walker'          => ''
);
wp_nav_menu($defaults);
?> 
</div>
</div>
<?php } ?> 

</div>
<!--[ Credit ]-->
<div class='cdtIn section' id='credit-widget'>
<div class='widget HTML' >
<div class='fotCd'>
<?php echo $opt_themes['ft_copyright']; ?> 
</div>
</div>

<div class='widget TextList' id='TextList88'>
<div class='toTopB' id='backTop' onclick='window.scrollTo({top: 0});'>
<svg viewBox='0 0 34 34'><circle class='b' cx='17' cy='17' r='15.92'></circle><circle class='c scrollProgress' cx='17' cy='17' r='15.92'></circle><path class='line d' d='M15.07,21.06,19.16,17l-4.09-4.06'></path></svg>
</div>
</div>
</div>
</div>
</footer>

</div>
</div>
</div>
<!--[ Fixed Back to Top ]-->
<div class='toTopB' id='backTop' onclick='window.scrollTo({top: 0});'>
<svg viewBox='0 0 34 34'><circle class='b' cx='17' cy='17' r='15.92'></circle><circle class='c scrollProgress' cx='17' cy='17' r='15.92'></circle><path class='line d' d='M15.07,21.06,19.16,17l-4.09-4.06'></path></svg>
</div>
<?php if($opt_themes['wave_activate']){?>
<!--[ Waves Animation ]-->
<div class='wvC'><div class='wvS'><svg class='waves' preserveAspectRatio='none' shape-rendering='auto' viewBox='0 24 150 28'><defs><path d='M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z' id='wave-bg'></path></defs><g class='plx'><use x='48' xlink:href='#wave-bg' y='0'></use><use x='48' xlink:href='#wave-bg' y='3'></use><use x='48' xlink:href='#wave-bg' y='5'></use><use x='48' xlink:href='#wave-bg' y='7'></use></g></svg></div><div class='wvH'></div></div>
<?php } ?>
<!--[ Delete 'or data:blog.isMobileRequest' if you want to show ad in both(desktop and mobile) ]-->
</div>
<!--[ Addons ]-->
<div class='section' id='addons-widget'>
<?php if($opt_themes['cookie_on']){?>
<div class='widget HTML' id='HTML21'>
<div class='ckW' id='ckWrap'>
<div class='ckA'>
<div class='ckH'>Cookie Consent</div>
<div class='ckD'>We serve cookies on this site to analyze traffic, remember your preferences, and optimize your experience.</div>
</div>
<div class='ckF'><button class='ckB' id='ckAccept'>Accept</button><a class='ckB' href='https://policies.google.com/technologies/cookies' target='_blank' title='Cookie Policy'>More Details</a></div>
</div>
</div>
<?php } if($opt_themes['nointernet_on']){?>
<div class='widget HTML' id='HTML22'>
<div class='fxPu' id='noInternet'><div class='fxPuW'><div class='fxPuC'><div class='fxPuS'><svg class='line' viewBox='0 0 24 24'><path d='M16.72 11.06A10.94 10.94 0 0 1 19 12.55'></path><path d='M5 12.55a10.94 10.94 0 0 1 5.17-2.39'></path><path d='M10.71 5.05A16 16 0 0 1 22.58 9'></path><path d='M1.42 9a15.91 15.91 0 0 1 4.7-2.88'></path><path d='M8.53 16.11a6 6 0 0 1 6.95 0'></path><line class='svgC' x1='12' x2='12.01' y1='20' y2='20'></line><line class='svgC' x1='1' x2='23' y1='1' y2='23'></line></svg></div><div class='fxPuH'>Oops!</div><div class='fxPuD'>It seems there is something wrong with your internet connection. Please connect to the internet and start browsing again.</div><div class='fxPuB'><a class='btn' href='<?php echo esc_url( home_url( '/' ) ); ?>'><svg class='line' viewBox='0 0 24 24'><polyline points='23 4 23 10 17 10'></polyline><path d='M20.49 15a9 9 0 1 1-2.12-9.36L23 10'></path></svg></a></div></div></div></div>
</div>
<?php } ?>
 
<!--
<div class='widget HTML' id='HTML26'>
<div class='fxPu' id='cntryBlk'><div class='fxPuW'><div class='fxPuC'><div class='fxPuS'><svg class='line' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><circle cx='12' cy='12' r='10'></circle><line class='svgC' x1='12' x2='12' y1='8' y2='12'></line><line class='svgC' x1='12' x2='12.01' y1='16' y2='16'></line></svg></div><div class='fxPuH'>Site is Blocked</div><div class='fxPuD'>Sorry! This site is not available in your country.</div></div></div></div>
<script> function checkCntry(){var dtctCntry=(Intl.DateTimeFormat().resolvedOptions().timeZone);var blkCntry='';console.log('Time Zone: '+dtctCntry);if(dtctCntry===blkCntry){setInterval(function(){addCt(getid('cntryBlk'),'visible')},1000);}}checkCntry(); </script>
</div>
-->

</div>

</div>
<?php
plusui_footer();
wp_footer();  
if($opt_themes['footer_section_on']){
echo $opt_themes['footer_section'];
}
plusui_translate_js();
?>

  </body>
</html>