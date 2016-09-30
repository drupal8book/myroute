<?php

namespace Drupal\myroute\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class HelloWorldController.
 *
 * @package Drupal\myroute\Controller
 */
class HelloWorldController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello World')
    ];
  }

}
