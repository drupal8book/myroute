<?php

namespace Drupal\myroute\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

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

  /**
   * Custom access check
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   access checking done against this account.
   */
  public function custom_access_check(AccountInterface $account) {
    return AccessResult::allowedIf($account->hasPermission('access content') &&
      $account->hasPermission('administer content'));
  }
}
