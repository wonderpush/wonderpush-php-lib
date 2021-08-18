<?php


namespace WonderPush\Obj;

if (count(get_included_files()) === 1) {
  http_response_code(403);
  exit();
} // Prevent direct access

/**
 * DTO for segments.
 *
 * See {@link https://www.wonderpush.com/docs/concepts/segments}
 * @codeCoverageIgnore
 */
class Segment extends BaseObject
{

  /** @var string */
  private $id;
  /** @var integer */
  private $creationDate;
  /** @var integer */
  private $updateDate;
  /** @var string */
  private $name;
  /** @var string */
  private $applicationId;
  /** @var string */
  private $campaignId;
  /** @var object */
  private $stats;
  /** @var object */
  private $query;

  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param string $id
   * @return Segment
   */
  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  /**
   * @return integer
   */
  public function getCreationDate()
  {
    return $this->creationDate;
  }

  /**
   * @param integer $creationDate
   * @return Segment
   */
  public function setCreationDate($creationDate)
  {
    $this->creationDate = $creationDate;
    return $this;
  }

  /**
   * @return integer
   */
  public function getUpdateDate()
  {
    return $this->updateDate;
  }

  /**
   * @param integer $updateDate
   * @return Segment
   */
  public function setUpdateDate($updateDate)
  {
    $this->updateDate = $updateDate;
    return $this;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param string $name
   * @return Segment
   */
  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  /**
   * @return string
   */
  public function getApplicationId()
  {
    return $this->applicationId;
  }

  /**
   * @param string $applicationId
   * @return Segment
   */
  public function setApplicationId($applicationId)
  {
    $this->applicationId = $applicationId;
    return $this;
  }

  /**
   * @return string
   */
  public function getCampaignId()
  {
    return $this->campaignId;
  }

  /**
   * @param string $campaignId
   * @return Segment
   */
  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
    return $this;
  }

  /**
   * @return array
   */
  public function getStats()
  {
    return $this->stats;
  }

  /**
   * @param array $stats
   * @return Segment
   */
  public function setStats($stats)
  {
    $this->stats = (object)$stats;
    return $this;
  }

  /**
   * @return array
   */
  public function getQuery()
  {
    return $this->query;
  }

  /**
   * @param array $query
   * @return Segment
   */
  public function setQuery($query)
  {
    $this->query = (object)$query;
    return $this;
  }
}
