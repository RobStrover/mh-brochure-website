<?php

?>

<div class="row" itemscope itemtype="http://schema.org/Event">
                <div class="col-sm-4 col-md-3">
                    <p>image here</p>
                </div>
                <div class="col-sm-8 col-md-9">
                    <span class="event-name" itemprop="name"><?= $eventName ?></span>
<div class="event-date" itemprop="startDate" content="<?= $eventSchemeDateTime ?>">
    <?= !empty($eventDate) ? $eventDateObj->format('D jS F Y') : '' ?>
    <?= !empty($eventTime) ? ' - ' . $eventDateObj->format('g:ia') : '' ?>
</div>
</div>
</div>