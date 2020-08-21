<?php

namespace Drupal\custom_block_plugin\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a Custom Block Plugin For Database Dynamic Query To get Latest Article Type Content.
 *
 * @Block(
 *   id = "cusotm_block_dbquery",
 *   admin_label = @Translation("Custom Block Plugin For Database Query"),
 * )
 */
class CustomBlockDBQuery extends BlockBase {
  /**
   * {@inheritdoc}
   */

  public function build() {
    return [
      '#markup' => $this->getRecentContent(),
    ];
  }

/**
 * Get Recent Article By Database Dynamic query
 *
 * @return $content
 */

  public function getRecentContent() {

    // Create an object of type Select.
    $query = \Drupal::database()->select('node_field_data', 'nfd');
    $query->addField('nfd', 'nid');
    $query->addField('nfd', 'title');
    $query->condition('nfd.type', 'article');
    $query->condition('nfd.status', 1);
    $query->orderBy('changed', 'DESC');
    $query->range(0, 5); //get only top 5 rows

    $result = $query->execute()->fetchAll();
    foreach($result as $obj) {
      $items[] = $obj->title;
    }
    //Theming
    $content = [
      '#theme' => 'item_list',
      '#list_type' => 'ul',
      '#title' => '',
      '#items' => $items,
      '#attributes' => ['class' => 'view-content'],
      '#wrapper_attributes' => ['class' => 'container'],
    ];
   return render($content);
  }
}
