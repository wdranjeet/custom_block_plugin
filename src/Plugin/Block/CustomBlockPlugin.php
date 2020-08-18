<?php

namespace Drupal\custom_block_plugin\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a Custom Block Plugin For Recent Content.
 *
 * @Block(
 *   id = "cusotm_block_plugin",
 *   admin_label = @Translation("Custom Block Plugin For Recent Content"),
 * )
 */
class CustomBlockPlugin extends BlockBase {
  /**
   * {@inheritdoc}
   */

  public function build() {
    return [
      '#markup' => $this->getRecentContent(),
    ];
  }

/**
 * Get Recent Content Provided By Default Drupal
 *
 * @return $content
 */

  public function getRecentContent() {
    //Embed Default View
    $content = views_embed_view('content_recent', 'block_1');
    return render($content);
  }
}
