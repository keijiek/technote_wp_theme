<?php

namespace config\customposts;

class TechNotePost
{
  private string $post_slug;
  private string $post_label;

  function __construct(string $post_slug, string $post_label)
  {
    $this->post_slug = $post_slug;
    $this->post_label = $post_label;
    add_action('init', [&$this, 'register_post_type']);
  }

  function register_post_type()
  {
    register_post_type(
      $this->post_slug,
      [
        'label'         => $this->post_label,
        'public'        => true,
        'has_archive'   => true,
        'show_in_rest'  => true,
        'menu_position' => 05,
        'menu_icon'     => 'dashicons-media-document',
        'supports'      => [
          'title',
          'editor'
        ]
      ]
    );
  }
}
