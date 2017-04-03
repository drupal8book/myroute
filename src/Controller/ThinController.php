<?php

namespace Drupal\myroute\Controller;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;


class ThinController implements ContainerInjectionInterface {

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static();
  }

  public function getRepos($handle) {
    $response = \Drupal::httpClient()->get('https://api.github.com/users/' . $handle . '/repos');
    return new Response($response->getBody(), 200, array(
        'Content-Type' => 'application/json'
      ));
  }
}
