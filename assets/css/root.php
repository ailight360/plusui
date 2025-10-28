<?php 
global $opt_themes;  
function r_g_b_3($hex, $asString = true) {
	if (0 === strpos($hex, '#')) {
	$hex		= substr($hex, 1);
	} else if (0 === strpos($hex, '&H')) {
	$hex		= substr($hex, 2);
	}      
	$cutpoint	= ceil(strlen($hex) / 2)-1;
	$rgb		= explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
	$rgb[0]		= (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
	$rgb[1]		= (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
	$rgb[2]		= (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
	return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .03)" : $rgb);
} 
function r_g_b_5($hex, $asString = true) {
	if (0 === strpos($hex, '#')) {
	$hex		= substr($hex, 1);
	} else if (0 === strpos($hex, '&H')) {
	$hex		= substr($hex, 2);
	}      
	$cutpoint	= ceil(strlen($hex) / 2)-1;
	$rgb		= explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
	$rgb[0]		= (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
	$rgb[1]		= (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
	$rgb[2]		= (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
	return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .05)" : $rgb);
}
?>
<style> 
<!--
:root, :root .lgT:not(.drK), :root .theme0:not(.drK) {--themeC: <?php echo $opt_themes['themeC'];?>;--headC: <?php echo $opt_themes['headC'];?>;--bodyC: <?php echo $opt_themes['bodyC'];?>;--bodyCa: <?php echo $opt_themes['bodyCa'];?>;--bodyB: <?php echo $opt_themes['bodyB'];?>;--linkC: <?php echo $opt_themes['linkC'];?>;--linkB: <?php echo $opt_themes['linkB'];?>;--waveB: <?php echo $opt_themes['waveB'];?>;--iconC: <?php echo $opt_themes['iconC'];?>;--iconCa: <?php echo $opt_themes['iconCa'];?>;--iconCs: <?php echo $opt_themes['iconCs'];?>;--headerC: <?php echo $opt_themes['headerC'];?>;--headerLogo: <?php echo $opt_themes['headerLogo'];?>;--headerT: <?php echo $opt_themes['headerT'];?>px;--headerW: 400;--headerB: <?php echo $opt_themes['headerB'];?>;--headerL: 1px;--headerI: <?php echo $opt_themes['headerI'];?>;--headerH: <?php echo $opt_themes['headerH'];?>px;--headerHi: -<?php echo $opt_themes['headerH'];?>px;--headerHm: <?php echo $opt_themes['headerH'];?>px;--headerR: 30px;--notifH: <?php echo $opt_themes['notifH'];?>px;--notifU: <?php echo $opt_themes['notifU'];?>;--notifC: <?php echo $opt_themes['notifC'];?>;--contentB: <?php echo $opt_themes['contentB'];?>;--contentL: <?php echo $opt_themes['contentL'];?>;--contentW: <?php echo $opt_themes['contentW'];?>px;--sideW: <?php echo $opt_themes['sideW'];?>px;--transB: <?php echo r_g_b_3($opt_themes['themeC']);?>;--pageW: <?php echo $opt_themes['pageW'];?>px;--postT: <?php echo $opt_themes['postT'];?>px;--postF: <?php echo $opt_themes['postF'];?>px;--postTm: 28px;--postFm: 15px;--widgetT: <?php echo $opt_themes['widgetT'];?>px;--widgetTw: 400;--widgetTa: 25px;--widgetTac: <?php echo $opt_themes['widgetTac'];?>;--navW: 230px;--navT: <?php echo $opt_themes['navT'];?>;--navI: <?php echo $opt_themes['navI'];?>;--navB: <?php echo $opt_themes['navB'];?>;--pagenavB: <?php echo $opt_themes['pagenavB'];?>;--navL: 1px;--srchI: <?php echo $opt_themes['srchI'];?>;--srchB: <?php echo $opt_themes['srchB'];?>;--mobT: <?php echo $opt_themes['mobT'];?>;--mobHv: <?php echo $opt_themes['mobHv'];?>;--mobB: <?php echo $opt_themes['mobB'];?>;--mobL: 1px;--mobBr: 12px;--fotT: <?php echo $opt_themes['fotT'];?>;--fotB: <?php echo $opt_themes['fotB'];?>;--fotL: 1px;--fontH: <?php echo $opt_themes['fontH'];?>;--fontB: <?php echo $opt_themes['fontB'];?>;--fontBa: <?php echo $opt_themes['fontBa'];?>;--fontC: <?php echo $opt_themes['fontC'];?>;--trans-1: all .1s ease;--trans-2: all .2s ease;--trans-3: all .3s ease;--trans-4: all .4s ease;--synxBg: #f6f6f6;--synxC: #2f3337;--synxOrange: #b75501;--synxBlue: #015692;--synxGreen: #54790d;--synxRed: #f15a5a;--synxGray: #656e77;--buttonR: <?php echo $opt_themes['buttonR'];?>px;--greetR: 10px;--iconHr: 15px;--thumbEr: 5px;--srchMr: 20px;--srchDr: 20px;--darkT: <?php echo $opt_themes['darkT'];?>;--darkTa: <?php echo $opt_themes['darkTa'];?>;--darkU: <?php echo $opt_themes['darkU'];?>;--darkW: <?php echo $opt_themes['darkW'];?>;--darkB: <?php echo $opt_themes['darkB'];?>;--darkBa: <?php echo $opt_themes['darkBa'];?>;--darkBs: <?php echo $opt_themes['darkBs'];?>;}:root .drK {--themeC: <?php echo $opt_themes['dark_themeC'];?>;}:root .theme1:not(.drK) {--themeC: <?php echo $opt_themes['dark_themeC'];?>;--bodyB: #FFFCFD;--linkC: #F44336;--linkB: #F44336;--headerB: #FFEBEE;--notifU: #FFEBEE;--notifC: #B71C1C;--srchB: #FFEBEE;--mobB: #FFEBEE;--waveB: #FFEBEE;}:root .theme2:not(.drK) {--themeC: #00796B;--bodyB: #FCFFFC;--linkC: #009688;--linkB: #009688;--headerB: #E0F2F1;--notifU: #E0F2F1;--notifC: #00796B;--srchB: #E0F2F1;--mobB: #E0F2F1;--waveB: #E0F2F1;}:root .theme3:not(.drK) {--themeC: #1565C0;--bodyB: #FBFEFF;--linkC: #1976D2;--linkB: #1976D2;--headerB: #E3F2FD;--notifU: #E3F2FD;--notifC: #1565C0;--srchB: #E3F2FD;--mobB: #E3F2FD;--waveB: #E3F2FD;}:root .theme4:not(.drK) {--themeC: #FFC107;--bodyB: #FFFEFA;--linkC: #FF8F00;--linkB: #FF8F00;--headerB: #FFF8E1;--notifU: #FFF8E1;--notifC: #FF8F00;--srchB: #FFF8E1;--mobB: #FFF8E1;--waveB: #FFF8E1;}:root .theme5:not(.drK) {--themeC: #C2185B;--bodyB: #FFFCFD;--linkC: #D81B60;--linkB: #D81B60;--headerB: #FCE4EC;--notifU: #FCE4EC;--notifC: #C2185B;--srchB: #FCE4EC;--mobB: #FCE4EC;--waveB: #FCE4EC;}:root .theme6:not(.drK) {--themeC: #E64A19;--bodyB: #FBFEFF;--linkC: #F4511E;--linkB: #F4511E;--headerB: #FBE9E7;--notifU: #FBE9E7;--notifC: #E64A19;--srchB: #FBE9E7;--mobB: #FBE9E7;--waveB: #FBE9E7;}:root .theme7:not(.drK) {--themeC: #455A64;--bodyB: #FBFEFF;--linkC: #546E7A;--linkB: #546E7A;--headerB: #ECEFF1;--notifU: #ECEFF1;--notifC: #455A64;--srchB: #ECEFF1;--mobB: #ECEFF1;--waveB: #ECEFF1;}:root .theme8:not(.drK) {--themeC: #5D4037;--bodyB: #FBFEFF;--linkC: #5D4037;--linkB: #5D4037;--headerB: #EFEBE9;--notifU: #EFEBE9;--notifC: #5D4037;--srchB: #EFEBE9;--mobB: #EFEBE9;--waveB: #EFEBE9;}:root .theme9:not(.drK) {--themeC: #7B1FA2;--bodyB: #FBFEFF;--linkC: #8E24AA;--linkB: #8E24AA;--headerB: #F3E5F5;--notifU: #F3E5F5;--notifC: #7B1FA2;--srchB: #F3E5F5;--mobB: #F3E5F5;--waveB: #F3E5F5;}:root .theme10:not(.drK) {--themeC: #283593;--bodyB: #FBFEFF;--linkC: #3949AB;--linkB: #3949AB;--headerB: #E8EAF6;--notifU: #E8EAF6;--notifC: #283593;--srchB: #E8EAF6;--mobB: #E8EAF6;--waveB: #E8EAF6;}
-->
</style>

<style>/*<![CDATA[*/
@media screen and (min-width:897px) {header .BlogSearch input {background: <?php echo r_g_b_3($opt_themes['themeC']);?>!important;}}.pGV .pVws::after {content: attr(data-text) ' <?php echo $opt_themes['opt_title_others_2'];?>'!important;}
/*]]>*/</style>

