<?php

namespace Drupal\video_example\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides a demonstration for video render element.
 */
class VideoExampleController extends ControllerBase {

  /**
   * The controller action for demonstration.
   *
   * @return array
   */
  public function demo() {
    $module = $this->moduleHandler()->getModule('video_example')->getPath();

    return [
      '#type' => 'video',
      '#sources' => [
        $module . '/videos/flower.mp4',
        $module . '/videos/flower.webm',
      ],
      '#attributes' => [
        'id' => 'custom-video',
        'controls' => TRUE,
        'poster' => $module . '/videos/thumbnail.jpg',
      ],
    ];
  }

}
