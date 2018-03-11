<?php

/**
 * @var array $mapAddressLines
 */

?>

<blockquote>
    <?php

    foreach ($mapAddressLines as $mapAddressLine) {
        $addressItems = explode(',', $mapAddressLine);
        foreach ($addressItems as $addressItem) {
            if (!empty($addressItem)) {
                echo $addressItem . '<br />';
            }
        }
    }

    ?>
</blockquote>

<hr>