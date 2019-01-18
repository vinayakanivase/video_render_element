Provides an HTML5 video element for Drupal 8 Render API.

## Dependencies
The 'video' module does not have any dependencies. The 'video_example' module, which demonstrates the usage of video element, depends on the 'video' module.

## Usage example
```php
$build['introduction'] = array(
  //required
  '#type' => 'video',
  '#sources' => array('intro.mp4', 'intro.ogg', 'intro.webm'),
  // optional
  '#fallback_message' => $this->t('Video element is not supported.'),
  // Remember: If you do not want an attribute to be included in the final
  // markup, instead of setting it to false, simply do not include it in the
  // '#attributes' array.
  '#attributes' => array(
    'id' => 'introduction-video',
    'class' => ['class-1', 'class-2'],
    'autoplay' => TRUE,
    'controls' => TRUE,
    'height' => 240,
    'loop' => FALSE,
    'muted' => FALSE,
    'poster' => 'thumbnail.jpg',
    'preload' => 'auto',
    'width' => 320
  )
);
```
