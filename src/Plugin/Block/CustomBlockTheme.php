<?php

namespace Drupal\custom_block_plugin\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a Custom Block Theme Template Twig file For Recent Content.
 *
 * @Block(
 *   id = "cusotm_block_theme",
 *   admin_label = @Translation("Custom Block Theme For Recent Content"),
 * )
 */
class CustomBlockTheme extends BlockBase {
  /**
   * {@inheritdoc}
   */

  public function build() {
  $output = [
      '#theme' => 'block__customtemplate',
      '#recent_content' => 'Test Output',
    ];

    return $output;
  }
}
