<?php

namespace config\euqueue_scripts_manager;

use config\euqueue_scripts_manager\ScriptToEnqueue;

require_once(__DIR__ . '/ScriptToEnqueue.class.php');

/**
 * css / js を enqueue
 */
class EnqueueScriptsManager
{
  private bool $is_develop;
  private array $scripts = [];

  function __construct(bool $is_develop = false)
  {
    $this->is_develop = $is_develop;
    $this->addMain();
    $this->addPrism();
    $this->excute();
  }

  function addMain()
  {
    $this->scripts[] = new ScriptToEnqueue('main_css', 'assets/dist/index.css', []);
    $this->scripts[] = new ScriptToEnqueue('main_js', 'assets/dist/index.js', []);
  }

  function addPrism()
  {
    $this->scripts[] = new ScriptToEnqueue('prism_css', 'assets/prism/prism.css', ['main_css']);
    $this->scripts[] = new ScriptToEnqueue('prism_js', 'assets/prism/prism.js', ['main_js'], true);
  }

  function excute()
  {
    add_action('wp_enqueue_scripts', [&$this, 'enqueue_scripts_callback_func']);
  }

  function enqueue_scripts_callback_func()
  {
    foreach ($this->scripts as $script) {
      $script->EnqueueSelf($this->is_develop);
    }
  }
}
