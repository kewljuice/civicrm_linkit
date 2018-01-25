<?php
/**
 * @file
 * Linkit 'CiviCRM' plugin.
 */

$plugin = array(
  'ui_title' => t("CiviCRM Events"),
  'ui_description' => t('Extend Linkit with CiviCRM Events.'),
  'handler' => array(
    'class' => 'CiviCRMEventsLinkitPlugin',
    'file' => 'civicrm_linkit_events.php',
  ),
);
