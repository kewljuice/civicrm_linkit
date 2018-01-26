<?php
/**
 * Plugin class.
 */

class CiviCRMContributionPagesLinkitPlugin extends LinkitSearchPlugin {

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
    // Fetch all CiviCRM contribution pages where the title contains the search string.
    try {
      $contributions = civicrm_api3('ContributionPage', 'get', [
        'sequential' => 1,
        'return' => "title",
        'title' => ['LIKE' => '%' . $search_string . '%'],
      ]);
      // Loop all results and display to user.
      foreach ($contributions['values'] as $key => $contribution) {
        $matches[] = [
          'title' => $contribution['title'] . ' (' . $contribution['id'] . ')',
          'path' => base_path() . 'civicrm/contribute/transact?reset=1&id=' . $contribution['id'],
          'group' => t('CiviCRM Contribution Pages'),
        ];
      }
    } catch (Exception $e) {

    }
    // Return.
    return $matches;
  }
}
