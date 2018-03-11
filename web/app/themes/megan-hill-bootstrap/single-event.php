<?php

get_header();

$pageTitle = get_the_title();
$pageId = get_the_ID();

$page = get_page_by_title ( $pageTitle );

$eventId = get_the_ID();
$eventName = get_the_title();
$eventExcerpt = get_the_excerpt($eventId);

$eventContent = $post->post_content;
$eventContent = apply_filters('the_content', $eventContent);

$eventImage = get_field('event_image', $eventId);
$eventDate = get_field('date', $eventId);
$eventTime = get_field('start_time', $eventId);

$eventBuildingPlaceName = get_field('building_place_name', $eventId);
$eventTownCity = get_field('town_city', $eventId);
$eventLocationPostcode = get_field('location_postcode', $eventId);

$addressArray = array (
    $eventBuildingPlaceName,
    $eventTownCity,
    $eventLocationPostcode
);

$pageMainImage = get_field( 'event_image', $page );

if ($eventDate) $eventDateObj = DateTime::createFromFormat('d/m/Y', $eventDate);
if ($eventTime) $eventTimeObj = DateTime::createFromFormat('H:i', $eventTime);

get_template_part('partials/standard-navigation');

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
        <div class="col-sm-8">
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <p class="lead" itemprop="name"><?= $eventName ?></p>
                </div>
                <div class="col-sm-6">
                    <p class="lead hidden-xs text-right" itemprop="startDate" content="<?= $eventSchemeDateTime ?>">
                            <?= !empty($eventDate) ? $eventDateObj->format('l jS F Y') : '' ?>
                            <?= !empty($eventTime) ? ' - ' . $eventTimeObj->format('g:ia') : '' ?>
                    </p>
                    <p class="event-date visible-xs" itemprop="startDate" content="<?= $eventSchemeDateTime ?>">
                        <strong>
                            <?= !empty($eventDate) ? $eventDateObj->format('l jS F Y') : '' ?>
                            <?= !empty($eventTime) ? ' - ' . $eventTimeObj->format('g:ia') : '' ?>
                        </strong>
                    </p>
                </div>
            </div>
            <?= $eventContent ?>
        </div>
        <div class="col-sm-4">
            <hr>
            <?php
            set_query_var('mapAddressLines', $addressArray);
            get_template_part('partials/event-sidebar/map');
            get_template_part('partials/event-sidebar/address');
            ?>
        </div>
    </div>
</div>
<?php

get_template_part('partials/standard-footer');

get_footer();