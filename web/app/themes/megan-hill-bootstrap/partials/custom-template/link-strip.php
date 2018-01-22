<?php
/** @var array $partialArray */

$links = array_key_exists('section_links', $partialArray) ? ($partialArray['section_links']) : array();

$linkCount = count($links);
switch( $linkCount ) {
    case 4:
        $desktopClass = 'col-sm-6 col-md-3';
        break;
    case 3:
        $desktopClass = 'col-sm-6 col-md-4';
        break;
    case 2:
        $desktopClass = 'col-sm-6 col-md-6';
        break;
    default:
        $desktopClass = 'col-sm-12 col-md-12';
        break;
} ?>

<div class="row">
<?php
    foreach ($links as $link) {
        $linkText = array_key_exists('link_text', $link) ? ($link['link_text']) : '';
        $linkUrl = array_key_exists('link_url', $link) ? $link['link_url'] : '';
        ?>
            <div class="<?= $desktopClass ?>">
                <p class="text-center"><a href="<?= $linkUrl ?>"><?= $linkText ?></a></p>
            </div>
<?php } ?>
</div>



