<?php
/**
 * Plugin class.
 */

class CiviCRMEventsLinkitPlugin extends LinkitSearchPlugin {

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
    // Fetch all CiviCRM events where the title contains the search string.
    try {
      $events = civicrm_api3('Event', 'get', [
        'sequential' => 1,
        'return' => "title",
        'title' => ['LIKE' => '%' . $search_string . '%'],
      ]);
      // Loop all results and display to user.
      foreach ($events['values'] as $key => $event) {
        $matches[] = [
          'title' => $event['title'] . ' (' . $event['id'] . ')',
          'path' => base_path() . 'civicrm/event/info?reset=1&id=' . $event['id'],
          'group' => t('CiviCRM Events'),
        ];
      }
    } catch (Exception $e) {

    }
    // Return.
    return $matches;
  }
}
