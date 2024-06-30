<?php

namespace config;

require_once(__DIR__ . '/classes/EssentialFeaturesActivator.class.php');
require_once(__DIR__ . '/euqueue_scripts_manager/EnqueueScriptsManager.class.php');
require_once(__DIR__ . '/classes/RelativePath.class.php');
require_once(__DIR__ . '/classes/WidgetsActivator.class.php');
require_once(__DIR__ . '/classes/NavMenuRegister.class.php');
require_once(__DIR__ . '/classes/PostModifyer.class.php');
require_once(__DIR__ . '/customposts/TechNotePost.class.php');

class ConfigManager
{
  public function __construct()
  {
    new classes\EssentialFeaturesActivator();
    new euqueue_scripts_manager\EnqueueScriptsManager(true);
    new classes\RelativePath();
    new classes\WidgetsActivator();
    new classes\NavMenuRegister(GLOBAL_NAV_SLUG, 'グローバルメニュー');
    new classes\PostModifyer();
    new customposts\TechNotePost(TECH_NOTE_POST_SLUG, '技術メモ');
  }
}
