<?php

namespace Drupal\video\Element;

use Drupal\Core\Render\Element\RenderElement;

/**
 * Provides an HTML5 video element.
 *
 * Usage example:
 * @code
 * $build['introduction'] = array(
 *   //required
 *   '#type' => 'video',
 *   '#sources' => array('intro.mp4', 'intro.ogg', 'intro.webm'),
 *
 *   // optional
 *   '#fallback_message' => $this->t('Video element is not supported.'),
 *
 *   // Remember: If you do not want an attribute to be included in the final
 *   // markup, instead of setting it to false, simply do not include it in the
 *   // '#attributes' array.
 *   '#attributes' => array(
 *     'autoplay' => TRUE,
 *     'controls' => TRUE,
 *     'height' => 240,
 *     'loop' => FALSE,
 *     'muted' => FALSE,
 *     'poster' => 'thumbnail.jpg',
 *     'preload' => 'auto',
 *     'width' => 320
 *   )
 * );
 * @endcode
 *
 * @RenderElement("video")
 */
class Video extends RenderElement {

  /**
   * Currently, only three video formats are supported: MP4, WebM, and Ogg.
   *
   * @var array
   */
  protected const SUPPORTED_FORMATS = ['video/mp4', 'video/webm', 'video/ogg'];

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    return [
      '#theme' => 'video',
      '#pre_render' => [
        [static::class, 'preRenderVideo']
      ],
      '#sources' => [],
      '#attributes' => [],
      '#fallback_message' => '',
    ];
  }

  /**
   * Pre-render callback; Process custom attribute options.
   *
   * @param array $element
   *   The renderable array representing the element with '#type' => 'video'
   *   property set.
   *
   * @return array
   *   The passed in element with changes made to attributes depending on
   *   context.
   */
  public static function preRenderVideo(array $element) {
    // If no source is provided, return the unchanged element.
    if (empty($element['#sources'])) {
      return $element;
    }
    else {
      // The 'source' element takes two attributes: src and type.
      // e.g. <source src="file.mp4" type="video/mp4">
      // We need to re-structure the '#sources' array, and provide values for
      // both attributes.
      $sources = $element['#sources'];
      unset($element['#sources']);

      foreach ($sources as $source) {
        $format = self::getVideoFormat($source);
        if ($format && in_array($format, self::SUPPORTED_FORMATS)) {
          $element['#sources'][] = [
            'src' => $source,
            'type' => $format
          ];
        }
      }
    }

    if (empty($element['#fallback_message'])) {
      $element['#fallback_message'] = t("Your browser does not support video element.");
    }

    return $element;
  }

  /**
   * Returns mime-type for provided file.
   *
   * @param string $filename
   *   The filename to check mime-types.
   *
   * @return null|string
   */
  protected static function getVideoFormat(string $filename) {
    $mime_type = (new \finfo())->file($filename, FILEINFO_MIME_TYPE);

    $matched = preg_match('/^video/', $mime_type);
    return (!$matched) ? NULL : $mime_type;
  }

}
