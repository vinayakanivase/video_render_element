Provides an HTML5 video element for Drupal 8 Render API.

## Dependencies
The 'video' module does not have any dependencies. The companion 'video_example' module, which demonstrates the usage of video element, depends on the 'video' module.

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

## Rendered output example
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
- **#sources:** (array) An array of absolute or relative URLs. It is commonly used to serve the same media content in multiple formats supported by different browsers.

### Optional
- **#fallback_message:** (string) The content to be shown as a fallback in browsers that don't support the element.
- **#attributes:** (array) HTML attributes for the element. The first-level keys are the attribute names, such as 'id', 'class', and the attributes are usually given as an array of string values to apply to that attribute (the rendering system will concatenate them together into a string in the HTML output).

## Video element attributes
Like all other HTML elements, this element supports the [global attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes).

- **autoplay:** A Boolean attribute; if specified, the video automatically begins to play back as soon as it can do so without stopping to finish loading the data.
- **controls:** If this attribute is present, the browser will offer controls to allow the user to control video playback, including volume, seeking, and pause/resume playback.
- **height:** The height of the video's display area, in CSS pixels (absolute values only; no percentages.)
- **loop:** A Boolean attribute; if specified, the browser will automatically seek back to the start upon reaching the end of the video.
- **muted:** A Boolean attribute that indicates the default setting of the audio contained in the video. If set, the audio will be initially silenced. Its default value is false, meaning that the audio will be played when the video is played.
- **preload:** This enumerated attribute is intended to provide a hint to the browser about what the author thinks will lead to the best user experience with regards to what content is loaded before the video is played. It may have one of the following values:
  + **none:** Indicates that the video should not be preloaded.
  + **metadata:** Indicates that only video metadata (e.g. length) is fetched.
  + **auto:** Indicates that the whole video file can be downloaded, even if the user is not expected to use it.
  + **empty string:** Synonym of the auto value.
 - **poster:** A URL for an image to be shown while the video is downloading. If this attribute isn't specified, nothing is displayed until the first frame is available, then the first frame is shown as the poster frame.
 - **width:** The width of the video's display area, in CSS pixels (absolute values only; no percentages).
 
> [Read more at MDN web docs.](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video)
