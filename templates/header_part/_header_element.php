<?php
require_once(MODELS_DIR . '/NavMenu.class.php');

use models\NavMenuItems;
?>
<header class="border-b border-b-slate-500 py-4 mb-8">
  <div class="container mx-auto">
    <!-- header upper part -->
    <div class="flex align-middle justify-between">
      <h1 class=" mb-0 capitalize font-ubuntu_regular">
        <a href="/" class="font-extrabold no-underline hover:underline"><?= bloginfo('title') ?></a>
      </h1>
      <button type="button" class="btn btn-primary md:hidden" x-on:click="drawerOpen=!drawerOpen">menu</button>
    </div>
    <!-- /header upper part ends -->
    <!-- nav menu -->
    <nav class="hidden md:block" x-bind:class="{'hidden' : !drawerOpen}">
      <ul class="flex flex-col md:flex-row gap-4 list-none my-0 bg-base-100 text-lg">
        <?php
        $items = (new NavMenuItems(GLOBAL_NAV_SLUG))->menuItems();
        foreach ($items as $key => $item) {
          $current = ($_SERVER['REQUEST_URI'] == parse_url($item->url, PHP_URL_PATH)) ? 'font-bold' : '';
        ?>
          <li class="">
            <a href="<?= $item->url ?>" class="no-underline hover:underline underline-offset-4 <?= $current ?>"><?= $item->title ?></a>
          </li>
        <?php
        }
        ?>
      </ul>
    </nav>
    <!-- /nav menu ends -->

  </div>

</header>
