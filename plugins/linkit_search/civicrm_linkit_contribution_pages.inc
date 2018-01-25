<?php
/**
 * @file
 * Linkit 'CiviCRM' plugin.
 */

$plugin = array(
  'ui_title' => t("CiviCRM Contribution pages"),
  'ui_description' => t('Extend Linkit with CiviCRM Contribution pages.'),
  'handler' => array(
    'class' => 'CiviCRMContributionPagesLinkitPlugin',
    'file' => 'civicrm_linkit_contribution_pages.php',
  ),
);