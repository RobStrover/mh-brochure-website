<?php
$menuItems = wp_get_nav_menu_items('Main');
$thisPage = get_the_id();

$frontpageId = get_option('page_on_front');
$frontPageTitle = get_the_title($frontpageId);
$frontPageLink = get_the_permalink($frontpageId);

$customMenuItems = array();

if (!empty($menuItems)) {
?>

<nav class="animated fadeIn navbar yamm navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= $frontPageLink ?>"><?= $frontPageTitle ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php foreach ($menuItems as $menuItem) {
                        if(in_array($menuItem->post_name, $customMenuItems)) { ?>
                            <?php
                            get_template_part('partials/navigation/' . $menuItem->post_name . '-navitem');
                            continue;
                        } ?>
                        <li <?= ($menuItem->object_id == $thisPage) ? 'class="active"' : '' ?>><a
                                href="<?= $menuItem->url ?>"><?= $menuItem->title ?><?= ($menuItem->object_id == $thisPage) ? '<span class="sr-only">(current)</span>' : '' ?>
                            </a></li>
                    <?php } ?>
                </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<?php } ?>