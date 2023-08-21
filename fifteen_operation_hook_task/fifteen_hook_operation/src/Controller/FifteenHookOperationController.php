<?php

namespace Drupal\fifteen_hook_operation\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

/**
 * Returns responses for fifteen_hook_operation routes.
 */
class FifteenHookOperationController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function title(Node $node) {
    $title = $node->getTitle();
    $build['content'] = [
      '#markup' => $title,
    ];

    return $build;
  }

}
