<?php
/** @var array $partialArray */

$text = array_key_exists('text_and_image_text', $partialArray) ? ($partialArray['text_and_image_text']) : '';
$image = array_key_exists('text_and_image_image', $partialArray) ? ($partialArray['text_and_image_image']) : array();
$imagePosition = array_key_exists('text_and_image_image_alignment', $partialArray) ? ($partialArray['text_and_image_image_alignment']) : array();

$imageArray = array();

$textColumnClass = "col-sm-7";
$imageColumnClass = "col-sm-5";

if ($imagePosition == 'right') {
    $textColumnClass = "col-sm-7 col-sm-pull-5";
    $imageColumnClass = "col-sm-5 col-sm-push-7";
}

$imageArray['medium'] = array_key_exists('medium', $image['sizes']) ? ($image['sizes']['medium']) : '';
$imageArray['large'] = array_key_exists('large', $image['sizes']) ? ($image['sizes']['large']) : '';
$imageArray['full-quality'] = array_key_exists('url', $image) ? $image['url'] : '';

?>



<div class="row custom-template-section text-and-image-section animated fadeIn">
    <div class="<?= $imageColumnClass ?> <?= !empty($imagePosition) ? 'image-' . $imagePosition : '' ?>">
        <img
            src="<?= reset($imageArray) ?>"
            class="img-responsive lazy-image"
            <?php foreach($imageArray as $imageKey => $image) {
                if (empty($image)) {
                    continue;
                }
                ?>
                data-<?= $imageKey ?>="<?= $image ?>"
            <?php } ?>
        />
    </div>
    <div class="text-section <?= $textColumnClass ?>">
        <?= $text ?>
    </div>
</div>
