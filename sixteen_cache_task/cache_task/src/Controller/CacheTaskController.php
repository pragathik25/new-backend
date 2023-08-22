<?php

namespace Drupal\cache_task\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Cache\Cache;

/**
 * Cache task.
 */
class CacheTaskController extends ControllerBase {

  /**
   * Function.
   */
  public function build(Node $node) {
    $nid = $node->id();
    $cid = 'marksix:' . $nid;

    if ($item = \Drupal::cache()->get($cid)) {
      return $item->data;
    }

    // Build up the marksix array we're going to use later.
    $node = Node::load($nid);
    $marksix = [
      '#title' => $node->get('title')->value,
      // ...
    ];

    // Set the cache so we don't need to do this work again until $node changes.
    \Drupal::cache()->set($cid, $marksix, Cache::PERMANENT, $node->getCacheTags());

    return $marksix;
  }

}
