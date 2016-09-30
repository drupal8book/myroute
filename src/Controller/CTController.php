<?php

namespace Drupal\myroute\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CTController.
 *
 * @package Drupal\myroute\Controller
 */
class CTController extends ControllerBase {

  /**
   * List fields info of a content type.
   *
   * @return string
   *   Return field list.
   */
  public function fields($content_type) {
    $render = '<table><tr><th>' . $this->t('Field type') . '</th><th>' . $this->t('Label') . '</th></tr>';
    $field_definitions = \Drupal::entityManager()->getFieldDefinitions('node', $content_type);
    foreach ($field_definitions as $field_name => $field_definition) {
      if (!empty($field_definition->getTargetBundle())) {
        $render .= '<tr><td>' . $field_definition->getType() . '</td><td>' . $field_definition->getLabel() . '</td></tr>';
      }
    }
    $render .= '</table>';
    return [
      '#type' => 'markup',
      '#markup' => $render,
    ];
  }
}
