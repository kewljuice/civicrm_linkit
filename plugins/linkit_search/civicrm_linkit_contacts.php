<?php
/**
 * Plugin class.
 */

class CiviCRMContactsLinkitPlugin extends LinkitSearchPlugin {

  /**
   * Initialize this plugin.
   */
  public function __construct($plugin, $profile) {
    parent::__construct($plugin, $profile);
  }

  /**
   * Implements LinkitSearchPluginInterface::fetchResults().
   */
  public function fetchResults($search_string) {
    $matches = [];
    // Get variables from CiviCRM.
    if (!civicrm_initialize()) {
      return [];
    }
    // Fetch all CiviCRM contacts where the display_name contains the search string.
    try {
      $contacts = civicrm_api3('Contact', 'get', [
        'sequential' => 1,
        'display_name' => $search_string,
      ]);
      // Loop all results and display to user.
      foreach ($contacts['values'] as $key => $contact) {
        $matches[] = [
          'title' => $contact['display_name'] . ' (' . $contact['id'] . ')',
          'path' => base_path() . 'civicrm/contact/view?reset=1&cid=' . $contact['id'],
          'group' => t('CiviCRM Contacts'),
        ];
      }
    } catch (Exception $e) {

    }
    // Return.
    return $matches;
  }
}
