<?php

/**
 * @file
 * Contains \Drupal\myroute\Routing\CTRoutes.
 */

namespace Drupal\myroute\Routing;

use Symfony\Component\Routing\Route;

/**
 * Dynamic routes for content types.
 */
class CTRoutes {

  /**
   * {@inheritdoc}
   */
  public function routes() {
    $routes = [];
    $content_types = \Drupal::service('entity.manager')->getStorage('node_type')->loadMultiple();
    foreach ($content_types as $content_type) {
      $routes['myroute.content_type_controller.' . $content_type->id() ] = new Route(
        '/content_types/' . $content_type->id(),
        array(
          '_controller' => '\Drupal\myroute\Controller\CTController::fields',
          '_title' => 'Field info for ' . $content_type->label(),
          'content_type' => $content_type->id(),
        ),
        array(
          '_permission'  => 'access content',
        )
      );
    }
    return $routes;
  }
}
