<?php
/** @var array $pageMainImage */
//var_dump($pageMainImage);

$image = $pageMainImage;

$imageArray = array();
if ($image['sizes']) {
    $imageArray['medium'] = array_key_exists('medium', $image['sizes']) ? ($image['sizes']['medium']) : '';
    $imageArray['large'] = array_key_exists('large', $image['sizes']) ? ($image['sizes']['large']) : '';
    $imageArray['full-quality'] = array_key_exists('url', $image) ? $image['url'] : '';
}
?>

<div
    class="jumbotron lazy-background-image"
    style="background-image: url('<?= array_key_exists('medium', $imageArray) ? $imageArray['medium'] : '' ?>')"
    <?php foreach($imageArray as $imageKey => $image) {
        if (empty($image)) {
            continue;
        }
        ?>
        data-<?= $imageKey ?>="<?= $image ?>"
    <?php } ?>
>
</div>