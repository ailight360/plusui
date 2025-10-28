<?php
/* 
Template Name: Template - Contact
*/


###### https://www.geeksforgeeks.org/php-str_replace-function/
###### PHP | str_replace() Function 
###### Input string 
$url = get_bloginfo('url');
###### using str_replace() function 
$urls1 = str_replace('http://', '', $url);
$linkX = get_bloginfo('url');;
$parse = parse_url($linkX);
$urls = $parse['host'];
//$urls = str_replace('https://', '', $url);
$datePublished = mysql2date( DATE_W3C, $post->post_date, false );
$dateModified = mysql2date( DATE_W3C, $post->post_modified_gmt, false );
$emailX = get_bloginfo('admin_email');
$namesX = get_bloginfo('name');

$post_date = get_the_date( 'l, F j, Y' );
$post_time = get_the_date( 'g:i A' );
if(isset($_POST['submit'])){
    $to = get_bloginfo('admin_email'); // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
}

get_header();
global $opt_themes;
?>

<main class='blogItm mainbar ' style="width: 100%;">
	<div class='section' id='main-widget'>
		<div class='widget Blog' id='Blog1 '>
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
                                        <p>If you have questions, criticisms, or suggestions about this blog. Please contact me by email below or please send me email at <?php echo get_bloginfo('admin_email'); ?></p>
                                        <p>Topics that we accept include:</p>
                                        <p>We will respond to you as soon as possible. Wish you have a happy experience on our website!</p>
										 
										 <div class="formbox">  
										<form id="contactform" method="POST">
											<input type="text" name="first_name" placeholder="Your name">
											<input type="email" name="email" placeholder="Your email" /> 
											<textarea name="message" placeholder="Your message"></textarea>
											 
											<input type="submit" value="Send">
										</form>
										</div>

 
                                    </div>
                                </div>
                             
							</div>

                       </article>
			</div>
		</div>
	</div>
</main>

<style>
.drK #contactform input[type="text"], .drK #contactform input[type="email"], .drK #contactform textarea {
  background: var(--darkBs);
}
.drK #contactform input[type="submit"] {
  color: var(--darkLinks);
  border: 1px solid var(--linkB);
  background: var(--darkBs);
}
.formbox {
	width: 100%;
	margin: 0 auto;
	position: relative;
}

#contactform {
	padding: 25px;
	margin: 0 auto;
	width: 100%;
}

#contactform input[type="text"], #contactform input[type="email"], #contactform textarea {
	width: 100%;
	border: 2px transparent;
	background: var(--notifU);
	margin: 0 0 5px;
	padding: 10px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
}

#contactform input[type="text"]:hover, #contactform input[type="email"]:hover, #contactform textarea:hover {
	-webkit-transition: border-color 0.3s ease-in-out;
	-moz-transition: border-color 0.3s ease-in-out;
	transition: border-color 0.3s ease-in-out;
	border: 1px dotted ;
	-moz-border-image: -moz-linear-gradient(-45deg, var(--linkC) 0%, var(--linkC) 100%);
	-webkit-border-image: -webkit-linear-gradient(-45deg, var(--notifU) 0%, var(--notifU) 100%);
	border-image: linear-gradient(to bottom right, var(--linkC), var(--linkC));
	border-image-slice: 1;
	/* border-top-left-radius: var(--border_rds) !important;
	border-bottom-right-radius: var(--border_rds) !important; */
}

#contactform input[type="submit"] {
	width: 100%;
	/* border: 2px transparent; */
	background: var(--linkB);
	margin: 0 0 5px;
	padding: 10px;
	color: #fffdfc;
	display: block;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
}
/* 
#contactform input[type="submit"]:hover {
	-webkit-transition: background-color 0.3s ease-in-out;
	-moz-transition: background-color 0.3s ease-in-out;
	transition: background-color 0.3s ease-in-out;
	background: -moz-linear-gradient: -moz-linear-gradient(-45deg, var(--linkC) 0%, var(--linkC) 100%);
	background: -webkit-linear-gradient:  -webkit-linear-gradient(-45deg, var(--notifU) 0%, var(--notifU) 100%);
	background: linear-gradient(to bottom right, var(--linkC), var(--linkC));
}
 */
#contactform textarea {
	height: 100px;
	max-width: 100%;
	resize: none;
}

#contactform input:focus, #contactform textarea:focus {
	/* outline: 0;
	border: 2px solid var(--linkC);
	color: var(--link_color); */
	
}

/* ::-webkit-input-placeholder {
	color: var(--link_color);
}

:-moz-placeholder {
	color: var(--link_color);
}

::-moz-placeholder {
	color: var(--link_color);
}

:-ms-input-placeholder {
	color: var(--link_color);
}

.drK ::-webkit-input-placeholder,  .drK :-moz-placeholder, .drK ::-moz-placeholder, .drK :-ms-input-placeholder  {
	color: red!important;
} */
 
.zmImg.s::after {
	color: var(--color_fill_stroke);	
	/* background: var(--notifU); */
}

li a.label-name {
  color: var(--link_color);
}
 
@keyframes blinker {
  0%, 100% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-10px);
  }
}


@keyframes jump {
  0%, 100% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-10px);
  }
}

@keyframes pop {
  0%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.15);
  }
}

@keyframes flip {
  0%, 100% {
    transform: rotateY(0deg);
  }
  50% {
    transform: rotateY(90deg);
  }
}

@keyframes blink {
  0%, 100% {
    color: inherit;
  }
  50% {
    color: yellow;
  }
}

span.n.nolinks{
  color: var(--link_color);
}

.widget.Image {
	padding: 0px!important;
}

.sldT {
  font-size: var(--size_h1);
  font-weight: 700 !important;
  line-height: 1.4em !important;
  letter-spacing: .2px !important;
  text-shadow: 6px 6px 6px rgba(0,0,0, 0.8)!important;
  color: #fffdfc;
  background-color: rgba(0,0,0, 0.2);
}

@media (max-width: 600px) {
.sldT {
	font-size: var(--size_h5)!important;
	}
}

path.svgC.komentar {
	-webkit-animation: indicator 1s ease infinite;stroke: var(--svg_colors);
	}
	
.drK path.svgC.komentar {
	stroke: var(--svg-color-dark);
	}
</style>
<?php  
get_footer(); 