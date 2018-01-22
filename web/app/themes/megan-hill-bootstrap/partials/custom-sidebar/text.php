<?php
/** @var array $partialArray */

$title = array_key_exists('custom_sidebar_text_title', $partialArray) ? ($partialArray['custom_sidebar_text_title']) : '';
$text = array_key_exists('custom_sidebar_text_field', $partialArray) ? ($partialArray['custom_sidebar_text_field']) : '';

?>



<div class="row custom-template-section text-and-image-section animated fadeIn">
    <div class="col-sm-12 text-section">
        <?php if (!empty($title)) { ?>
            <h3><?= $title ?></h3>
        <?php } ?>
        <?php if (!empty($text)) { ?>
            <?= $text ?>
        <?php } ?>
    </div>
</div>
