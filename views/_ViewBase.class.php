<?php

namespace views;

/**
 * View 系 Class の基底 Class。
 * header と footer の両パートを自動で出力。
 * 子クラスは、その間の content だけを出力。
 */
abstract class ViewBase
{
  protected function __construct()
  {

    get_template_part(HEADER_PART_SLUG);
    $this->content();
    get_template_part(FOOTER_PART_SLUG);
  }

  abstract protected function content();
}
