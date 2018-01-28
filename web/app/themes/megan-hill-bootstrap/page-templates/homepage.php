<?php
/**
 * Template Name: Homepage Template
 */

get_header();

$pageTitle = get_the_title();
$pageId = get_the_ID();

$page = get_post ( $pageId );

get_template_part('partials/standard-navigation');

get_template_part('partials/standard-footer');

get_footer();

?>