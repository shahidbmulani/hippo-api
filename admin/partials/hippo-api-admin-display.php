<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/shahidbmulani
 * @since      1.0.0
 *
 * @package    Hippo_Api
 * @subpackage Hippo_Api/admin/partials
 */
?>

<div class="wrap">
    <h1>Hippo API</h1>
    <div class="admin-menu-setting">
      <div class="tabset">
        <input type="radio" name="tabset" id="tab1" aria-controls="1" checked>
        <label for="tab1">
          <?php esc_html_e('General Settings', 'hippo-api'); ?>
        </label>

        <div class="tab-panels">
          <section id="1" class="tab-panel">
            <form action="options.php" method="post">
              <?php
              settings_fields('ha_general_settings');
              do_settings_sections('ha_general_settings');
              submit_button();
              ?>
            </form>
          </section>
        </div>
      </div>
    </div>
</div>
