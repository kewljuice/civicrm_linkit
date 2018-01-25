<?php
/**
 * @file
 * Linkit 'CiviCRM' plugin.
 */

$plugin = array(
  'ui_title' => t("CiviCRM Contacts"),
  'ui_description' => t('Extend Linkit with CiviCRM Contacts.'),
  'handler' => array(
    'class' => 'CiviCRMContactsLinkitPlugin',
    'file' => 'civicrm_linkit_contacts.php',
  ),
);
