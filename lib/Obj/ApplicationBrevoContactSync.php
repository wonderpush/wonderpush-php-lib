<?php

namespace WonderPush\Obj;

class ApplicationBrevoContactSync extends BaseObject {
  /** @var boolean */
  private $enabled;

  /**
   * @return bool
   */
  public function getEnabled() {
    return (bool)$this->enabled;
  }

  /**
   * @param bool $enabled
   * @return ApplicationBrevoContactSync
   */
  public function setEnabled($enabled) {
    $this->enabled = $enabled;
    return $this;
  }

}