<?php

get_header();

$pageTitle = get_the_title();
$pageId = get_the_ID();

$page = get_page_by_title ( $pageTitle );

get_template_part('partials/standard-navigation');

$eventId = get_the_ID();
$eventName = get_the_title();
$eventExcerpt = get_the_excerpt($eventId);
$eventImage = get_field('event_image', $eventId);
$eventDate = get_field('date', $eventId);
$eventTime = get_field('start_time', $eventId);

$eventBuildingPlaceName = get_field('building_place_name', $eventId);

$pageMainImage = get_field( 'event_image', $page );

if ($eventDate) $eventDateObj = DateTime::createFromFormat('d/m/Y', $eventDate);
if ($eventTime) $eventTimeObj = DateTime::createFromFormat('H:i', $eventTime);

?>
<div class="container page-container animated fadeIn">
    <div class="row">
        <div class="col-sm-12">
            <?php
            set_query_var( 'pageMainImage', $pageMainImage );
            set_query_var ('pageMainTitle', $eventName);
            set_query_var ('pageSubTitle', $eventBuildingPlaceName);
            get_template_part('partials/default-page/main-image');
            ?>
        </div>
    </div>
    <div class="row" itemscope itemtype="http://schema.org/Event">
        <div class="col-sm-12">
            <span class="event-name" itemprop="name"><?= $eventName ?></span>
            <div class="event-date" itemprop="startDate" content="<?= $eventSchemeDateTime ?>">
                <?= !empty($eventDate) ? $eventDateObj->format('D jS F Y') : '' ?>
                <?= !empty($eventTime) ? ' - ' . $eventDateObj->format('g:ia') : '' ?>
            </div>
        </div>
    </div>
</div>
<?php

get_template_part('partials/standard-footer');

get_footer();