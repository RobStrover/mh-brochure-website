<?php
/**
 * Template Name: Custom Template
 */

get_header();

$pageTitle = get_the_title();

$page = get_page_by_title( $pageTitle );
$pageContentSections = get_field('custom_page_sections');
$sidebarContentSections = get_field('custom_sidebar_items');

$showHeader = get_field('custom_layout_show_header');
$showFooter = get_field('custom_layout_show_footer');

if ($showHeader == 'yes') get_template_part('partials/standard-navigation');

?>
<div class="container">
    <div class="row">
        <div class="custom-template-content col-sm-8 <?= empty($sidebarContentSections) ? 'col-sm-push-2' : ''?>">
            <?php
            foreach($pageContentSections as $pageContentSection) {
                set_query_var( 'partialArray', $pageContentSection );
                get_template_part('partials/custom-template/' . $pageContentSection['section_type']);
            }

            ?>
        </div>
            <?php if (!empty($sidebarContentSections)) { ?>
                <div class="sidebar col-sm-4">
                    <?php
                    foreach($sidebarContentSections as $sidebarContentSection) {
                        set_query_var( 'partialArray', $sidebarContentSection );
                        get_template_part('partials/custom-sidebar/' . $sidebarContentSection['custom_sidebar_item_type']);
                    }

                    ?>
                </div>
            <?php } ?>
    </div>
</div>
<?php

if ($showFooter == 'yes') get_template_part('partials/standard-footer');

get_footer();

?>