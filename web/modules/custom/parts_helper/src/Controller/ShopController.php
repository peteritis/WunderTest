<?php

namespace Drupal\parts_helper\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ShopController.
 */
class ShopController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t(''),
      '#attached' => [
          'library' => [
              'parts_helper/parts_helper'
          ]
      ]
    ];
  }

}
