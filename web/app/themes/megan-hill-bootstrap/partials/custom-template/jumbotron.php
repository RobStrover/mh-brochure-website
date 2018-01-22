<?php
/** @var array $partialArray */

$title = array_key_exists('jumbotron_section_title', $partialArray) ? ($partialArray['jumbotron_section_title']) : '';
$text = array_key_exists('jumbotron_section_text', $partialArray) ? ($partialArray['jumbotron_section_text']) : '';
$image = array_key_exists('jumbotron_section_image', $partialArray) ? ($partialArray['jumbotron_section_image']) : array();

$imageArray = array();
if ($image['sizes']) {
    $imageArray['medium'] = array_key_exists('medium', $image['sizes']) ? ($image['sizes']['medium']) : '';
    $imageArray['large'] = array_key_exists('large', $image['sizes']) ? ($image['sizes']['large']) : '';
    $imageArray['full-quality'] = array_key_exists('url', $image) ? $image['url'] : '';
}
?>
<div class="row custom-template-section jumbotron-section animated fadeIn">
<div
        class="animated fadeIn jumbotron lazy-background-image"
        style="background-image: url('<?= array_key_exists('medium', $imageArray) ? $imageArray['medium'] : '' ?>')"
    <?php foreach($imageArray as $imageKey => $image) {
        if (empty($image)) {
            continue;
        }
        ?>
        data-<?= $imageKey ?>="<?= $image ?>"
    <?php } ?>
>
    <div class="row">
        <div class="col-sm-12">
            <?php if (!empty($title)) { ?>
                <h1><?= $title ?></h1>
            <?php } ?>
            <?php if (!empty($text)) { ?>
                <?= $text ?>
            <?php } ?>
        </div>
    </div>
</div>
</div>