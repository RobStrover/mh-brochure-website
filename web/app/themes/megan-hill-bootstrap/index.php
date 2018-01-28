<?php

get_header();

$pageTitle = get_the_title();
$pageId = get_the_ID();

$page = get_page_by_title ( $pageTitle );

$pageMainImage = get_field( 'default_template_main_image', $page );

get_template_part('partials/standard-navigation');

?>

<div class="container page-container">
    <div class="row">
        <div class="col-sm-12 animated fadeIn">

            <?php
            set_query_var( 'pageMainImage', $pageMainImage );
            get_template_part('partials/default-page/main-image');

            echo apply_filters('the_content', $page->post_content);
            ?>
        </div>
    </div>
</div>

<?php

get_template_part('partials/standard-footer');

get_footer();