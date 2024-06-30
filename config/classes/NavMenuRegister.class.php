<?php

namespace config\classes;

class NavMenuRegister
{
  private string $menu_slug;
  private string $menu_location_name;

  public function __construct(string $slug, string $menu_location_name)
  {
    $this->menu_slug = $slug;
    $this->menu_location_name = $menu_location_name;
    add_action('after_setup_theme', [&$this, 'registerNavMenues']);
  }

  public function registerNavMenues(): void
  {
    register_nav_menu($this->menu_slug, $this->menu_location_name);
  }
}
