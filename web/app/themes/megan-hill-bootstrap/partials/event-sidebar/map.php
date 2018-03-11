<?php

/**
 * @var array $mapAddressLines
 */

$mapAddressLines = implode(',', $mapAddressLines);
$mapAddressLines = urlencode($mapAddressLines);

?>


<div class="embed-responsive embed-responsive-4by3">
    <iframe class="embed-responsive-item" src="
    https://www.google.com/maps/embed/v1/place?key=AIzaSyDPG-Rdgs-Os3F3QMLU418uNObFMi38cy0&q=<?= $mapAddressLines ?>"></iframe>
</div>

<hr>