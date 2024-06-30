<!DOCTYPE html>
<html <?php language_attributes(); ?> class="font-myFamily prose dark:prose-invert max-w-none" data-theme="night">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <!-- Alpinejs -->
  <!-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top_of_page" x-data="{drawerOpen: false}" x-bind:class="{'overflow-hidden':drawerOpen}">
  <?php
  wp_body_open();
  require_once(__DIR__ . '/_header_element.php');
  ?>
  <main class="mb-8">
    <div class="container mx-auto" role="presentation">
