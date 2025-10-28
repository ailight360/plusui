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

function toc_dalam_artikel($content) {
	$html_comment 	= "<!--insert-medianwp-toc-->";
	$comment_found 	= strpos($content, $html_comment) ? true : false;
	$fixed_location = true;
	if (!$fixed_location && !$comment_found) {
		return $content;
	}
	
	$regex = "~(<h([2-6]))(.*?>(.*)<\/h[2-6]>)~";
	
	preg_match_all($regex, $content, $heading_results);
	$num_match		= count($heading_results[0]);
	if($num_match < 3) {
		return $content;
	}
	$link_list		= "";
	for ($i = 0; $i < $num_match; ++ $i) {
        $namesIDX		= preg_replace("/\s+/", "_", $heading_results[4][$i]);
		$namesIDXS		= str_replace('-', '_', $namesIDX);
	    $new_heading	= $heading_results[1][$i]." id='".sanitize_title($namesIDXS)."' ".$heading_results[3][$i];
	    $old_heading	= $heading_results[0][$i];
		$content		= str_replace($old_heading, $new_heading, $content);
	    $link_list		.= "<li><a href='#".sanitize_title($namesIDXS)."'>".ucfirst($heading_results[4][$i])."</a></li>";
	}	
	
    global $opt_themes;
	$buka		= '<details class="sp toc" open>';
	$tutup		= '</details><style>details.toc li {flex-wrap: unset!important;}details.toc li::before {padding-right: 10px;}</style>';  
	$title		= '<summary data-show="'.$opt_themes['opts_title_other_18'].'" data-hide="'.$opt_themes['opts_title_other_19'].'">'.$opt_themes['opts_title_other_17'].'</summary>';
	$opened		= '<div class="toC" id="toContent"><ol>';
	$closed		= '</ol></div>';
	$link_list	= $link_list;
	$tocs		= $buka.$title.$opened.$link_list.$closed.$tutup;

	if($fixed_location && !$comment_found) {
		$first_paragraph 	= strpos($content, '</p>', 0) + 4;
		$second_paragraph 	= strpos($content, '</p>', $first_paragraph);
		return substr_replace($content, $tocs, $second_paragraph + 4 , 0);
	} else {
		return str_replace($html_comment, $tocs, $content);
	}
	if (is_page()) {
	if($fixed_location && !$comment_found) {
		$first_paragraph	= strpos($content, '</p>', 0) + 4;
		$second_paragraph	= strpos($content, '</p>', $first_paragraph);
		return substr_replace($content, $tocs, $second_paragraph + 4 , 0);
	}
    }
} 
//add_filter('the_content', 'toc_dalam_artikel');  

function auto_id_headings( $content ) {
	$content = preg_replace_callback( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {
    if ( ! stripos( $matches[0], 'id=' ) ) {
			$heading_link   = '<a href="#'.sanitize_title($matches[3]).'" class="heading-link"></a>';
			$matches[0]     = $matches[1].$matches[2].' id="'.sanitize_title($matches[3]).'">'.$heading_link.ucfirst($matches[3]).$matches[4];
	}
    return $matches[0];
	}, $content );
    return $content;
}
add_filter( 'the_content', 'auto_id_headings' );

function get_toc($content) {
  global $opt_themes;
  $headings     = get_headings($content, 1, 6);
  $titleX       = 'Table of Contents';
  ob_start();
  if($headings){
  ?> 
 
<input class="tocI hidden" id="forTocJs" type="checkbox">
<div class="tocL">
<div class="tocLi">
<div class="tocLs">
<label aria-label="<?php echo $opt_themes['opts_title_other_10']; ?>" class="tocH fixH" for="forTocJs">
<div class="tocC">
<svg class="rad" viewBox="0 0 160 160"><path d="M0-10,150,0l10,150S137.643,80.734,100.143,43.234,0-10,0-10Z" transform="translate(0 10)"></path></svg>
<span>
<svg class="line" viewBox="0 0 24 24"><g transform="translate(3.610000, 2.750100)"><line x1="11.9858" x2="4.7658" y1="12.9463" y2="12.9463"></line><line x1="11.9858" x2="4.7658" y1="9.1865" y2="9.1865"></line><line x1="7.521" x2="4.766" y1="5.4272" y2="5.4272"></line><path d="M7.63833441e-14,9.25 C7.63833441e-14,16.187 2.098,18.5 8.391,18.5 C14.685,18.5 16.782,16.187 16.782,9.25 C16.782,2.313 14.685,0 8.391,0 C2.098,0 7.63833441e-14,2.313 7.63833441e-14,9.25 Z"></path></g></svg>
</span>
<svg class="rad in" viewBox="0 0 160 160"><path d="M0-10,150,0l10,150S137.643,80.734,100.143,43.234,0-10,0-10Z" transform="translate(0 10)"></path></svg>
</div>
<div class="tocT fixT" data-text="<?php echo $opt_themes['opts_title_other_17']; ?>">
<span class="c cl" data-text="<?php echo $opt_themes['opts_title_other_10']; ?>"></span>
</div>
</label>

<div class="tocIn" id="tocAuto">
  <?php
  parse_toc($headings, 0, 0);
  ?>
</div>

</div>
</div>
<label class="fCls" for="forTocJs"></label>
</div>
 
<?php }
  return ob_get_clean();
}
function parse_toc($headings, $index, $recursive_counter) {
  if($recursive_counter > 60 || !count($headings)) return;
  $last_element         = $index > 0 ? $headings[$index - 1] : NULL;
  $current_element      = $headings[$index];
  $next_element         = NULL;
  if($index < count($headings) && isset($headings[$index + 1])) {
    $next_element       = $headings[$index + 1];
  } 
  if($current_element == NULL) return; 
  $tag                  = intval($headings[$index]["tag"]);
  $id                   = $headings[$index]["id"]; 
  $id				    = str_replace('-', '_', $id);
  $classes              = isset($headings[$index]["classes"]) ? $headings[$index]["classes"] : array();
  $name                 = $headings[$index]["name"];
 
  if(isset($current_element["classes"]) && $current_element["classes"] && in_array("nitoc", $current_element["classes"])) {
    parse_toc($headings, $index + 1, $recursive_counter + 1);
    return;
  }
 
  if($last_element == NULL) echo "<ol>";
  if($last_element != NULL && $last_element["tag"] < $tag) {
    for($i = 0; $i < $tag - $last_element["tag"]; $i++) {
      echo "<ol>";
    }
  }
 
  $li_classes = "";
  if(isset($current_element["classes"]) && $current_element["classes"] && in_array("toc-bold", $current_element["classes"])) $li_classes = " class='bold'";
  echo "<li".$li_classes.">";
  if(isset($current_element["classes"]) && $current_element["classes"] && in_array("toc-bold", $current_element["classes"])) {
    echo ucfirst($name);
  } else {
    echo "<a href='#".sanitize_title($id)."'>".ucfirst($name)."</a>";
  }
  if($next_element && intval($next_element["tag"]) > $tag) {
    parse_toc($headings, $index + 1, $recursive_counter + 1);
  }

  echo "</li>";

  if($next_element && intval($next_element["tag"]) == $tag) {
    parse_toc($headings, $index + 1, $recursive_counter + 1);
  }

  if ($next_element == NULL || ($next_element && $next_element["tag"] < $tag)) {
    echo "</ol>";
    if ($next_element && $tag - intval($next_element["tag"]) >= 2) {
      echo "</li>";
      for($i = 1; $i < $tag - intval($next_element["tag"]); $i++) {
        echo "</ol>";
      }
    }
  }

  if($next_element != NULL && $next_element["tag"] < $tag) {
    parse_toc($headings, $index + 1, $recursive_counter + 1);
  }
}
function get_headings($content, $from_tag = 1, $to_tag = 6) {
  $headings = array();
  preg_match_all("/<h([".$from_tag."-".$to_tag."])([^<]*)>(.*)<\/h[".$from_tag."-".$to_tag."]>/", $content, $matches);
  
  for($i = 0; $i < count($matches[1]); $i++) {
    $headings[$i]["tag"] = $matches[1][$i];
    // get id
    $att_string = $matches[2][$i];
    preg_match("/id=\"([^\"]*)\"/", $att_string , $id_matches);
    $headings[$i]["id"] = $id_matches[1];
    // get classes
    $att_string = $matches[2][$i];
    preg_match_all("/class=\"([^\"]*)\"/", $att_string , $class_matches);
    for($j = 0; $j < count($class_matches[1]); $j++) {
      $headings[$i]["classes"] = explode(" ", $class_matches[1][$j]);
    }
    $headings[$i]["name"] = strip_tags($matches[3][$i]);
  }
  return $headings;
}

function add_table_of_content($content) {
  if (!is_single()) return $content;
    $paragraphs = explode("</p>", $content);
    $paragraphs_count = count($paragraphs);
    $middle_index= absint(floor($paragraphs_count / 2));
    $new_content = '';
    for ($i = 0; $i < $paragraphs_count; $i++) {
        if ($i === 1) {
          $new_content .= get_toc($content);
        }
        $new_content .= $paragraphs[$i] . "</p>";
    }
    return $new_content;
}
// add our table of contents filter (from webdeasy.de)
//add_filter('the_content', 'add_table_of_content');

// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
// TOC (from webdeasy.de)
function toc_floatings() {
    return get_toc(auto_id_headings(get_the_content()));
}
add_shortcode('toc_floatings', 'toc_floatings');
 