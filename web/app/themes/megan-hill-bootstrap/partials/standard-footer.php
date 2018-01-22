<?php
$menuItems = wp_get_nav_menu_items('Footer');
?>

<div class="container-fluid footer animated fadeIn">
    <div class="row">
        <div class="col-sm-12">
            <?php
            if($menuItems) {
                foreach($menuItems as $menuItem) {
                    ?>
                    <p class="text-center"><a class="footer-link" href="<?= $menuItem->url ?>"><?= $menuItem->title ?></a></p>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>