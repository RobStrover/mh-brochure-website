<?php
/** @var array $partialArray */

$title = array_key_exists('text_section_title', $partialArray) ? ($partialArray['text_section_title']) : '';
$text = array_key_exists('text_section_content', $partialArray) ? ($partialArray['text_section_content']) : '';

?>



<div class="row custom-template-section text-and-image-section animated fadeIn">
    <div class="col-sm-12 text-section">
        <?php if (!empty($title)) { ?>
            <h2><?= $title ?></h2>
        <?php } ?>
        <?php if (!empty($text)) { ?>
            <?= $text ?>
        <?php } ?>
    </div>
</div>
