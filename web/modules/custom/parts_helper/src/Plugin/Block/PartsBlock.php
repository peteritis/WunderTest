<?php

namespace Drupal\parts_helper\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

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
    $build['#markup'] = '<div id="map"></div>';
    $build['#attached']['library'][] = 'parts_helper/parts_map';
    $build['#attached']['drupalSettings']['parts_helper']['PartsBlock']['coordinates'] = 'location';

    // $config = $this->getConfiguration();

    // $coordinates = isset($config['coordinates']) ? $config['coordinates'] : '';

    return $build;
  }

  public function blockForm($form, FormStateInterface $form_state){
      $form = parent::blockForm($form, $form_state);

       $config = $this->getConfiguration();

      $form['coordinates'] = [
          '#type' => 'textfield',
          '#title' => 'Location',
          '#default_value' => '56.97598, 24.11431',
          '#required' => 'TRUE',
      ];
      return $form;
  }

}
