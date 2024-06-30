<?php

/**
 * デバッグ用
 */
function vardump($arg): void
{
  echo "<pre>";
  var_dump($arg);
  echo "</pre>";
}

/**
 * パスの定数
 */
define('MODELS_DIR', __DIR__ . '/models');
define('TMPLATES_DIR', __DIR__ . '/templates');
define('VIEWS_DIR', __DIR__ . '/views');

/**
 * スラグの定数
 */
define('HEADER_PART_SLUG', 'templates/header_part/header_part');
define('FOOTER_PART_SLUG', 'templates/footer_part/footer_part');
define('GLOBAL_NAV_SLUG', 'global_nav');
define('TECH_NOTE_POST_SLUG', 'tech_note_post');

/**
 * コンフィグ
 */
require_once(__DIR__ . '/config/ConfigManager.class.php');
new config\ConfigManager();
