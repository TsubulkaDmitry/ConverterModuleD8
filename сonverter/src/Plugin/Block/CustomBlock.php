<?php

/**
 * @file
 * Contains \Drupal\converter\Plugin\Block\CustomBlock.
 */

namespace Drupal\converter\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "converter_block",
 *   admin_label = @Translation("Converter Custom block"),
 *   category = @Translation("Custom block example")
 * )
 */
class CustomBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => $this->test(),
    );
  }

  private function test(){
    return \Drupal::service('converter.convert')->convert(1,'USD','BYN');
  }
}
