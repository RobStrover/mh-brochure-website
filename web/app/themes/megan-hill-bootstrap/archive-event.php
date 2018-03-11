<?php

get_header();

$pageTitle = get_the_title();
$pageId = get_the_ID();

$page = get_page_by_title ( $pageTitle );

$pageMainImage = get_field( 'default_template_main_image', $page );

$dateNow = new DateTIme('now');

$args = array(
    'post_type' => 'event',
    'meta_key'   => 'date',
    'orderby'    => 'meta_value_num',
    'order'      => 'desc',
    'meta_query' => array(
            'key' => 'date',
            'value' => $dateNow->format('Ymd'),
            'compare' => '>'
    )
);

    $upcomingEventsQuery = new WP_Query( $args );
    $upcomingEvents = $upcomingEventsQuery->posts;

get_template_part('partials/standard-navigation');

?>

    <div class="container page-container animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <?php
                    set_query_var( 'pageMainImage', $pageMainImage );
                    get_template_part('partials/default-page/main-image');
                ?>
            </div>
        </div>
        <?php if (count($upcomingEvents) > 0) { ?>
            <div class="row">
                <div class="col-sm-12">
                    <h2>Upcoming Events</h2>
                </div>
            </div>
        <?php } ?>
        <?php

        foreach ($upcomingEvents as $upcomingEvent) {

            $eventId = $upcomingEvent->ID;
            $eventName = $upcomingEvent->post_title;
            $eventExcerpt = get_the_excerpt($eventId);
            $eventLink = get_the_permalink($eventId);
            $eventImage = get_field('event_image', $eventId);

            if (array_key_exists('sizes', $eventImage)) {
                $eventImage = $eventImage['sizes'];
            } else {
                $eventImage = '';
            }

            $eventDate = get_field('date', $eventId);
            $eventTime = get_field('start_time', $eventId);


            if ($eventDate) $eventDateObj = DateTime::createFromFormat('d/m/Y', $eventDate);
            if ($eventTime) $eventTimeObj = DateTime::createFromFormat('H:i', $eventTime);

            ?>
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <?php if ($eventImage) { ?>
                        <a href="<?= $eventLink ?>">
                            <img
                                src="<?= reset($eventImage) ?>"
                                <?php foreach($eventImage as $imageKey => $image) {
                                    if (empty($image)) {
                                        continue;
                                    }
                                    ?>
                                    data-<?= $imageKey ?>="<?= $image ?>"
                                <?php } ?>
                                class="img-responsive lazy-image"/>
                        </a>
                    <?php } ?>
                </div>
                <div class="col-sm-8 col-md-9">
                    <a href="<?= $eventLink ?>">
                        <span class="event-name"><?= $eventName ?></span>
                    </a>
                    <?php if (!empty($eventDate) || !empty($eventTime)) { ?>
                        <p class="event-date">
                            <?= !empty($eventDate) ? $eventDateObj->format('D jS F Y') : '' ?>
                            <?= !empty($eventTime) ? ' - ' . $eventTimeObj->format('g:ia') : '' ?>
                        </p>
                    <?php } ?>
                    <?php if (!empty($eventExcerpt)) { ?>
                        <p><?= $eventExcerpt ?></p>
                    <?php } ?>
                    <a href="<?= $eventLink ?>" class="btn btn-default">Read More</a>
                </div>
            </div>

        <?php } ?>
    </div>

<?php

get_template_part('partials/standard-footer');

get_footer();