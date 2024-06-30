<?php

namespace models;

/**
 * register された nav menu のうち、引数のスラグで指定されたメニューの、アイテムだけを配列で取得するクラス
 */
class NavMenuItems
{
  private array $menuItems;

  /**
   * @param string $menu_slug : register_nav_menu する時に使った引数と同じスラグを指定することで、そのメニューのアイテムを取得させる。
   */
  public function __construct(string $menu_slug)
  {
    $id = get_nav_menu_locations()[$menu_slug];
    // 上記処理で取得に失敗した場合、空配列が返るので、それで存在チェック。
    if (!empty($id)) {
      $menu_obj = wp_get_nav_menu_object($id);
      $this->menuItems = wp_get_nav_menu_items($menu_obj);
    } else {
      $this->menuItems = [];
    }
  }

  /**
   * 取得したメニューアイテムを返す。
   */
  public function menuItems(): array
  {
    return $this->menuItems;
  }
}
