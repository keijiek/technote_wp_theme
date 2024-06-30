<?php

namespace config\classes;

class PostModifyer
{

  public function __construct()
  {
    add_filter('register_post_type_args', [&$this, 'post_has_archive'], 10, 2);
  }

  function post_has_archive($args, $post_type)
  {
    if ('post' == $post_type) {
      $args['rewrite'] = true;
      $args['has_archive'] = 'post'; //任意のスラッグ名
    }
    return $args;
  }
}
