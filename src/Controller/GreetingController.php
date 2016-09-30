<?php

namespace Drupal\myroute\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class GreetingController.
 *
 * @package Drupal\myroute\Controller
 */
class GreetingController extends ControllerBase {

  /**
   * Greeting.
   *
   * @return string
   *   Return Hello string.
   */
  public function greeting($name) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello, @name!', ['@name' => $name]),
    ];
  }

}
