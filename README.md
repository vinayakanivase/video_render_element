Provides an HTML5 video element for Drupal 8 Render API.

## Dependencies
The 'video' module does not have any dependencies. The 'video_example' module, which demonstrates the usage of video element, depends on the 'video' module.

## Usage example
```php
$build['introduction'] = array(
  '#type' => 'video',
  '#sources' => array('intro.mp4', 'intro.ogg', 'intro.webm'),
  
  '#fallback_message' => $this->t('Your browser does not support video element.'),
  
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

## Output example
```html
<video id="introduction-video" class="class-1 class-2" controls="" autoplay="" preload="auto" height="240" width="320" poster="thumbnail.jpg">
  <source src="intro.mp4" type="video/mp4">
  <source src="intro.ogg" type="video/ogg">
  <source src="intro.webm" type="video/webm">
    
  <p>Your browser does not support video element.</p>
 </video>
```

## Properties
Here is the list of the properties used during the rendering of the video element:

### Required
- **#type:** (string) The machine name of the type of render element.
- **#sources:** (array) An array of file names (handles). It is commonly used to serve the same media content in multiple formats supported by different browsers.

### Optional
- **#fallback_message:** (string) The content to be shown as a fallback in browsers that don't support the element.
