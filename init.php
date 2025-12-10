<?php

// WonderPush\Util
if (!interface_exists('WonderPush\Util\JsonSerializable')) require(dirname(__FILE__) . '/lib/Util/JsonSerializable.php');
if (!interface_exists('WonderPush\Util\Logger')) require(dirname(__FILE__) . '/lib/Util/Logger.php');
if (!class_exists('WonderPush\Util\DefaultLogger')) require(dirname(__FILE__) . '/lib/Util/DefaultLogger.php');
if (!class_exists('WonderPush\Util\ArrayUtil')) require(dirname(__FILE__) . '/lib/Util/ArrayUtil.php');
if (!class_exists('WonderPush\Util\StringUtil')) require(dirname(__FILE__) . '/lib/Util/StringUtil.php');
if (!class_exists('WonderPush\Util\TimeUnit')) require(dirname(__FILE__) . '/lib/Util/TimeUnit.php');
if (!class_exists('WonderPush\Util\TimeUtil')) require(dirname(__FILE__) . '/lib/Util/TimeUtil.php');
if (!class_exists('WonderPush\Util\TimeValue')) require(dirname(__FILE__) . '/lib/Util/TimeValue.php');
if (!class_exists('WonderPush\Util\UrlUtil')) require(dirname(__FILE__) . '/lib/Util/UrlUtil.php');

// WonderPush
if (!class_exists('WonderPush\WonderPush')) require(dirname(__FILE__) . '/lib/WonderPush.php');

// WonderPush\Obj
if (!class_exists('WonderPush\Obj\BaseObject')) require(dirname(__FILE__) . '/lib/Obj/BaseObject.php');
if (!class_exists('WonderPush\Obj\SuccessResponse')) require(dirname(__FILE__) . '/lib/Obj/SuccessResponse.php');
if (!class_exists('WonderPush\Obj\CampaignSuccessResponse')) require(dirname(__FILE__) . '/lib/Obj/CampaignSuccessResponse.php');
if (!class_exists('WonderPush\Obj\DeliveriesCreateResponse')) require(dirname(__FILE__) . '/lib/Obj/DeliveriesCreateResponse.php');
if (!class_exists('WonderPush\Obj\Pagination')) require(dirname(__FILE__) . '/lib/Obj/Pagination.php');
if (!class_exists('WonderPush\Obj\NullObject')) require(dirname(__FILE__) . '/lib/Obj/NullObject.php');
if (!class_exists('WonderPush\Obj\Application')) require(dirname(__FILE__) . '/lib/Obj/Application.php');
if (!class_exists('WonderPush\Obj\ApplicationBrevoContactSync')) require(dirname(__FILE__) . '/lib/Obj/ApplicationBrevoContactSync.php');
if (!class_exists('WonderPush\Obj\Segment')) require(dirname(__FILE__) . '/lib/Obj/Segment.php');
if (!class_exists('WonderPush\Obj\GeoLocation')) require(dirname(__FILE__) . '/lib/Obj/GeoLocation.php');
if (!class_exists('WonderPush\Obj\User')) require(dirname(__FILE__) . '/lib/Obj/User.php');
if (!class_exists('WonderPush\Obj\Collection')) require(dirname(__FILE__) . '/lib/Obj/Collection.php');
if (!class_exists('WonderPush\Obj\CampaignCollection')) require(dirname(__FILE__) . '/lib/Obj/CampaignCollection.php');
if (!class_exists('WonderPush\Obj\ApplicationCollection')) require(dirname(__FILE__) . '/lib/Obj/ApplicationCollection.php');
if (!class_exists('WonderPush\Obj\SegmentCollection')) require(dirname(__FILE__) . '/lib/Obj/SegmentCollection.php');
if (!class_exists('WonderPush\Obj\Installation')) require(dirname(__FILE__) . '/lib/Obj/Installation.php');
if (!class_exists('WonderPush\Obj\InstallationCollection')) require(dirname(__FILE__) . '/lib/Obj/InstallationCollection.php');
if (!class_exists('WonderPush\Obj\InstallationApplicationApple')) require(dirname(__FILE__) . '/lib/Obj/InstallationApplicationApple.php');
if (!class_exists('WonderPush\Obj\InstallationApplication')) require(dirname(__FILE__) . '/lib/Obj/InstallationApplication.php');
if (!class_exists('WonderPush\Obj\InstallationDeviceCapabilities')) require(dirname(__FILE__) . '/lib/Obj/InstallationDeviceCapabilities.php');
if (!class_exists('WonderPush\Obj\InstallationDeviceConfiguration')) require(dirname(__FILE__) . '/lib/Obj/InstallationDeviceConfiguration.php');
if (!class_exists('WonderPush\Obj\InstallationDevice')) require(dirname(__FILE__) . '/lib/Obj/InstallationDevice.php');
if (!class_exists('WonderPush\Obj\InstallationPreferences')) require(dirname(__FILE__) . '/lib/Obj/InstallationPreferences.php');
if (!class_exists('WonderPush\Obj\InstallationPushToken')) require(dirname(__FILE__) . '/lib/Obj/InstallationPushToken.php');
if (!class_exists('WonderPush\Obj\Event')) require(dirname(__FILE__) . '/lib/Obj/Event.php');
if (!class_exists('WonderPush\Obj\FrequentFieldValues')) require(dirname(__FILE__) . '/lib/Obj/FrequentFieldValues.php');
if (!class_exists('WonderPush\Obj\NotificationButton')) require(dirname(__FILE__) . '/lib/Obj/NotificationButton.php');
if (!class_exists('WonderPush\Obj\NotificationButtonAction')) require(dirname(__FILE__) . '/lib/Obj/NotificationButtonAction.php');
if (!class_exists('WonderPush\Obj\NotificationButtonActionEvent')) require(dirname(__FILE__) . '/lib/Obj/NotificationButtonActionEvent.php');
if (!class_exists('WonderPush\Obj\Notification')) require(dirname(__FILE__) . '/lib/Obj/Notification.php');
if (!class_exists('WonderPush\Obj\NotificationAlert')) require(dirname(__FILE__) . '/lib/Obj/NotificationAlert.php');
if (!class_exists('WonderPush\Obj\NotificationAlertAndroid')) require(dirname(__FILE__) . '/lib/Obj/NotificationAlertAndroid.php');
if (!class_exists('WonderPush\Obj\NotificationAlertAndroidButton')) require(dirname(__FILE__) . '/lib/Obj/NotificationAlertAndroidButton.php');
if (!class_exists('WonderPush\Obj\NotificationAlertIos')) require(dirname(__FILE__) . '/lib/Obj/NotificationAlertIos.php');
if (!class_exists('WonderPush\Obj\NotificationAlertIosAttachment')) require(dirname(__FILE__) . '/lib/Obj/NotificationAlertIosAttachment.php');
if (!class_exists('WonderPush\Obj\NotificationAlertIosForeground')) require(dirname(__FILE__) . '/lib/Obj/NotificationAlertIosForeground.php');
if (!class_exists('WonderPush\Obj\NotificationAlertWeb')) require(dirname(__FILE__) . '/lib/Obj/NotificationAlertWeb.php');
if (!class_exists('WonderPush\Obj\NotificationAlertWebButton')) require(dirname(__FILE__) . '/lib/Obj/NotificationAlertWebButton.php');
if (!class_exists('WonderPush\Obj\NotificationInApp')) require(dirname(__FILE__) . '/lib/Obj/NotificationInApp.php');
if (!class_exists('WonderPush\Obj\NotificationInAppButton')) require(dirname(__FILE__) . '/lib/Obj/NotificationInAppButton.php');
if (!class_exists('WonderPush\Obj\NotificationInAppMap')) require(dirname(__FILE__) . '/lib/Obj/NotificationInAppMap.php');
if (!class_exists('WonderPush\Obj\NotificationInAppMapPlace')) require(dirname(__FILE__) . '/lib/Obj/NotificationInAppMapPlace.php');
if (!class_exists('WonderPush\Obj\NotificationPush')) require(dirname(__FILE__) . '/lib/Obj/NotificationPush.php');
if (!class_exists('WonderPush\Obj\NotificationPushAndroid')) require(dirname(__FILE__) . '/lib/Obj/NotificationPushAndroid.php');
if (!class_exists('WonderPush\Obj\NotificationPushIos')) require(dirname(__FILE__) . '/lib/Obj/NotificationPushIos.php');
if (!class_exists('WonderPush\Obj\NotificationPushWeb')) require(dirname(__FILE__) . '/lib/Obj/NotificationPushWeb.php');
if (!class_exists('WonderPush\Obj\Campaign')) require(dirname(__FILE__) . '/lib/Obj/Campaign.php');
if (!class_exists('WonderPush\Obj\CampaignSchedule')) require(dirname(__FILE__) . '/lib/Obj/CampaignSchedule.php');
if (!class_exists('WonderPush\Obj\CampaignSchedulePressure')) require(dirname(__FILE__) . '/lib/Obj/CampaignSchedulePressure.php');
if (!class_exists('WonderPush\Obj\CampaignScheduleUrlCriterion')) require(dirname(__FILE__) . '/lib/Obj/CampaignScheduleUrlCriterion.php');
if (!class_exists('WonderPush\Obj\CampaignStats')) require(dirname(__FILE__) . '/lib/Obj/CampaignStats.php');
if (!class_exists('WonderPush\Obj\CampaignUrlFilters')) require(dirname(__FILE__) . '/lib/Obj/CampaignUrlFilters.php');
if (!class_exists('WonderPush\Obj\CampaignCapping')) require(dirname(__FILE__) . '/lib/Obj/CampaignCapping.php');

if (!class_exists('WonderPush\Obj\WebSdkInitOptions')) require(dirname(__FILE__) . '/lib/Obj/WebSdkInitOptions.php');
if (!class_exists('WonderPush\Obj\WebDomainSdkConfig')) require(dirname(__FILE__) . '/lib/Obj/WebDomainSdkConfig.php');
if (!class_exists('WonderPush\Obj\WebDomain')) require(dirname(__FILE__) . '/lib/Obj/WebDomain.php');

// WonderPush\Params
if (!class_exists('WonderPush\Params\CollectionParams')) require(dirname(__FILE__) . '/lib/Params/CollectionParams.php');
if (!class_exists('WonderPush\Params\DeliveriesCreateParams')) require(dirname(__FILE__) . '/lib/Params/DeliveriesCreateParams.php');
if (!class_exists('WonderPush\Params\FrequentFieldValuesParams')) require(dirname(__FILE__) . '/lib/Params/FrequentFieldValuesParams.php');
if (!class_exists('WonderPush\Params\AllInstallationsParams')) require(dirname(__FILE__) . '/lib/Params/AllInstallationsParams.php');
if (!class_exists('WonderPush\Params\PatchInstallationParams')) require(dirname(__FILE__) . '/lib/Params/PatchInstallationParams.php');
if (!class_exists('WonderPush\Params\TrackEventParams')) require(dirname(__FILE__) . '/lib/Params/TrackEventParams.php');
if (!class_exists('WonderPush\Params\PatchCampaignParams')) require(dirname(__FILE__) . '/lib/Params/PatchCampaignParams.php');
if (!class_exists('WonderPush\Params\CreateCampaignParams')) require(dirname(__FILE__) . '/lib/Params/CreateCampaignParams.php');

// WonderPush\Net
if (!class_exists('WonderPush\Net\Request')) require(dirname(__FILE__) . '/lib/Net/Request.php');
if (!class_exists('WonderPush\Net\Response')) require(dirname(__FILE__) . '/lib/Net/Response.php');
if (!interface_exists('WonderPush\Net\HttpClientInterface')) require(dirname(__FILE__) . '/lib/Net/HttpClientInterface.php');
if (!class_exists('WonderPush\Net\CurlHttpClient')) require(dirname(__FILE__) . '/lib/Net/CurlHttpClient.php');

// WonderPush\Errors
if (!class_exists('WonderPush\Errors\Base')) require(dirname(__FILE__) . '/lib/Errors/Base.php');
if (!class_exists('WonderPush\Errors\Parsing')) require(dirname(__FILE__) . '/lib/Errors/Parsing.php');
if (!class_exists('WonderPush\Errors\Server')) require(dirname(__FILE__) . '/lib/Errors/Server.php');
if (!class_exists('WonderPush\Errors\Network')) require(dirname(__FILE__) . '/lib/Errors/Network.php');

// WonderPush\Api
if (!class_exists('WonderPush\Api\Rest')) require(dirname(__FILE__) . '/lib/Api/Rest.php');
if (!class_exists('WonderPush\Api\Deliveries')) require(dirname(__FILE__) . '/lib/Api/Deliveries.php');
if (!class_exists('WonderPush\Api\Applications')) require(dirname(__FILE__) . '/lib/Api/Applications.php');
if (!class_exists('WonderPush\Api\Segments')) require(dirname(__FILE__) . '/lib/Api/Segments.php');
if (!class_exists('WonderPush\Api\Stats')) require(dirname(__FILE__) . '/lib/Api/Stats.php');
if (!class_exists('WonderPush\Api\Installations')) require(dirname(__FILE__) . '/lib/Api/Installations.php');
if (!class_exists('WonderPush\Api\Campaigns')) require(dirname(__FILE__) . '/lib/Api/Campaigns.php');
if (!class_exists('WonderPush\Api\Events')) require(dirname(__FILE__) . '/lib/Api/Events.php');