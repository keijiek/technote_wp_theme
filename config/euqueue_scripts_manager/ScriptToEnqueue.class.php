<?php

namespace config\euqueue_scripts_manager;

class ScriptToEnqueue
{
  private string $handle;
  private string $src;
  private string $src_uri;
  private array $depends;
  private bool $in_footer;

  public function __construct(string $handle, string $src, array $depends, bool $in_footer = false)
  {
    $this->handle = $handle;
    $this->src = $src;
    $this->src_uri = get_theme_file_uri($this->src);
    $this->depends = $depends;
    $this->in_footer = $in_footer;
  }

  public function EnqueueSelf(bool $isDevMode = false)
  {
    $version = !$isDevMode ? filemtime(get_theme_file_path($this->src)) : (new \DateTimeImmutable())->format('YmdHis');
    if (preg_match('/\.(css)$/i', $this->src)) {
      wp_enqueue_style($this->handle, $this->src_uri, $this->depends, $version);
    } elseif (preg_match('/\.(js)$/i', $this->src)) {
      wp_enqueue_script($this->handle, $this->src_uri, $this->depends, $version, $this->in_footer);
    }
  }
}
