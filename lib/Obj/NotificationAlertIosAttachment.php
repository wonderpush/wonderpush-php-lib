<?php

namespace WonderPush\Obj;

if (count(get_included_files()) === 1) { http_response_code(403); exit(); } // Prevent direct access

/**
 * DTO part for `notification.alert.ios.attachments` items.
 * @see NotificationAlertIos
 * @codeCoverageIgnore
 */
class NotificationAlertIosAttachment extends BaseObject {

  /** @var string */
  protected $id;
  /**
   * @var string
   * Audio files should not be over 5 MB.
   * Image files should not be over 10 MB.
   * Video files should not be over 50 MB.
   */
  protected $url;
  /**
   * @var string
   * Derived from the url file-extension by iOS itself if not given.
   * The SDK understands the following shortcuts, and raw values, described in `options`.
   * Images:
   *   png,jpg,jpeg,gif,
   *   image/png,image/x-png,image/jpeg,image/gif,
   * Audio:
   *   wav,wave,aiff,mp3,m4a,mp4a,
   *   audio/wav,audio/x-wav,audio/aiff,audio/x-aiff,audio/mpeg,audio/mp3,audio/mpeg3,audio/mp4,
   * Video:
   *   mpg,mpeg,mp2,m2v,mp4,avi,
   *   video/mpeg,video/x-mpeg1,video/mpeg2,video/x-mpeg2,video/mp4,video/mpeg4,video/avi
   */
  protected $type;
  /**
   * @var array
   * https://trello.com/c/QERhnU9Y/987-ios-10-rich-notifications-memento
   * https://developer.apple.com/reference/usernotifications/unnotificationattachment/attachment_attributes
   * typeHint: "a UNNotificationAttachmentOptionsTypeHintKey value constant",
   *   kUTTypeAudioInterchangeFileFormat = "public.aiff-audio"
   *   kUTTypeWaveformAudio = "com.microsoft.waveform-audio"
   *   kUTTypeMP3 = "public.mp3"
   *   kUTTypeMPEG4Audio = "public.mpeg-4-audio"
   *   kUTTypeJPEG = "public.jpeg"
   *   kUTTypeGIF = "com.compuserve.gif"
   *   kUTTypePNG = "public.png"
   *   kUTTypeMPEG = "public.mpeg"
   *   kUTTypeMPEG2Video = "public.mpeg-2-video"
   *   kUTTypeMPEG4 = "public.mpeg-4"
   *   kUTTypeAVIMovie = "public.avi"
   * thumbnailHidden: false,
   * thumbnailClippingRect: {"X":0.0, "Y":0.0, "Width":1.0, "Height":1.0},
   * thumbnailTime: a UNNotificationAttachmentOptionsThumbnailTimeKey value
   *   Frame number [0;N-1], don't go outside the range
   *   Time in seconds for movies (not for gifs)
   *   {value,timescale,epoch:0,flags=1} (not for gifs) (eg: value=241, timescale=24 is 10 seconds plus one frame)
   */
  protected $options;

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $id
   * @return NotificationAlertIosAttachment
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return string
   */
  public function getUrl() {
    return $this->url;
  }

  /**
   * @param string $url
   * @return NotificationAlertIosAttachment
   */
  public function setUrl($url) {
    $this->url = $url;
    return $this;
  }

  /**
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $type
   * @return NotificationAlertIosAttachment
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * @return array
   */
  public function getOptions() {
    return $this->options;
  }

  /**
   * @param array $options
   * @return NotificationAlertIosAttachment
   */
  public function setOptions($options) {
    $this->options = $options;
    return $this;
  }

}
