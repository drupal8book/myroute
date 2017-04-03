<?php

namespace Drupal\myroute\Controller;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use \Drupal\Core\Session\AccountInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;


class ThinController implements ContainerInjectionInterface {

  /**
   * The current user service.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * Class constructor.
   */
  public function __construct(AccountInterface $currentUser) {
    $this->currentUser = $currentUser;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('current_user')
    );
  }

  public function getRepos() {
    $handle = $this->currentUser->getAccountName();
    if(!$handle) {
      return new RedirectResponse('/system/403');
    }
    $response = \Drupal::httpClient()->get('https://api.github.com/users/' . $handle . '/repos');
    return new Response($response->getBody(), 200, array(
        'Content-Type' => 'application/json'
      ));
  }
}
