<?php
/**
 * Template Name: Homepage Template
 */

$pageTitle = get_the_title();

$page = get_page_by_title( $pageTitle );

get_template_part('partials/standard-navigation');

get_template_part('partials/standard-footer');

get_footer();

?>