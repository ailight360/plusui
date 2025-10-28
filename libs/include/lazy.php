<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/ 
// silences is goldens


function lazyload_image() { 
global $opt_themes; 
if ($opt_themes['lazy_on']){
add_filter( 'the_content', 'my_lazyload_content_images' );
add_filter( 'widget_text', 'my_lazyload_content_images' );
add_filter( 'wp_get_attachment_image_attributes', 'my_lazyload_attachments', 10, 2 );
add_action( 'wp_footer', 'lazy_image_css_js');
}
}
add_action( 'init', 'lazyload_image' );


// Replace the image attributes in Post/Page Content
function my_lazyload_content_images( $content ) {
  $content = preg_replace( '/(<img.+)(src)/Ui', '$1data-$2', $content );
  $content = preg_replace( '/(<img.+)(srcset)/Ui', '$1data-$2', $content );
  return $content;
}

// Replace the image attributes in Post Listing, Related Posts, etc.
function my_lazyload_attachments( $atts, $attachment ) {

  if(!is_admin()){
  $atts['data-src'] = $atts['src'];
  unset( $atts['src'] );
  
  if( isset( $atts['srcset'] ) ) {
    $atts['data-srcset'] = $atts['srcset'];
    unset( $atts['srcset'] );
  }
  }

  return $atts;
}

function lazy_image_css_js() { 
?>
<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>-->
<script id="rendered-js" >
( function() { 'use strict';
  let images = document.querySelectorAll('img[data-src]');
              
  document.addEventListener('DOMContentLoaded', onReady);
  function onReady() {
    // Show above-the-fold images first
    showImagesOnView();

    // scroll listener
    window.addEventListener( 'scroll', showImagesOnView, false );
  }
  
  // Show the image if reached on viewport
  function showImagesOnView( e ) {
    
    for( let i of images ) {
      if( i.getAttribute('src') ) { continue; } // SKIP if already displayed
      
      // Compare the position of image and scroll
      let bounding = i.getBoundingClientRect();
      let isOnView = bounding.top >= 0 &&
      bounding.left >= 0 &&
      bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      bounding.right <= (window.innerWidth || document.documentElement.clientWidth);
      
      if( isOnView ) {
        i.setAttribute( 'src', i.dataset.src );
        if( i.getAttribute('data-srcset') ) {
          i.setAttribute( 'srcset', i.dataset.srcset );
        }
      }
    }
  }
              
})();
</script>
<style>
img[data-src] {
  opacity: 0;
  transition: opacity .25s ease-in-out;
  will-change: opacity;
}

/* appear animation */
img[data-src][src] {
  opacity: 1;
}
</style>
<?php } 