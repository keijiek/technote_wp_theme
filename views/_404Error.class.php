<?php

namespace views;

require_once(__DIR__ . '/_ViewBase.class.php');

class _404Error extends ViewBase
{
  function __construct()
  {
    parent::__construct();
  }

  function content()
  {
    echo "404";
  }
}
