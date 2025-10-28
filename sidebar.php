<?php
if (is_single()) {
if (!empty('sidebar-2') && function_exists('is_dynamic_sidebar') && is_active_sidebar('sidebar-2')){ ?>
<aside class="blogItm sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
<div class="sideIn"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-2')): endif; ?></div>
</aside> 
<?php } } if (is_page() || is_search() || is_archive() || is_404() || is_tag()) { 
if (!empty('sidebar-1') && function_exists('is_dynamic_sidebar') && is_active_sidebar('sidebar-1')){ ?>
<aside class="blogItm sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
<div class="sideIn"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1')): endif; ?></div>
</aside> 
<?php } } if (is_home() || is_front_page()) { ?>
<aside class="blogItm sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
<div class="sideIn">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1')): endif; ?>
</div>
</aside> 
<?php } 