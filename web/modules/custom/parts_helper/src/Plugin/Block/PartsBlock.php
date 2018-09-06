<?php

namespace Drupal\parts_helper\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'PartsBlock' block.
 *
 * @Block(
 *  id = "parts_block",
 *  admin_label = @Translation("Parts block"),
 * )
 */
class PartsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['parts_block']['#markup'] = 'Implement PartsBlock.';

    return $build;
  }

}
