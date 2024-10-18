<?php
/*
Plugin Name: Custom Table Creator and Deleter
Description: A plugin to create and delete custom tables with user-defined columns.
Version: 1.1
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class CustomTableCreator {

    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'process_form'));
    }

    public function add_admin_menu() {
        add_menu_page('Custom Table Creator', 'Table Creator', 'manage_options', 'custom-table-creator', array($this, 'plugin_page'));
    }

    public function plugin_page() {
        ?>
        <div class="wrap">
            <h1>Create Custom Table</h1>
            <form method="post">
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="table_name">Table Name</label></th>
                        <td><input type="text" name="table_name" id="table_name" required></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="columns">Columns (comma-separated)</label></th>
                        <td><input type="text" name="columns" id="columns" required></td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" name="submit_create" class="button-primary" value="Create Table">
                </p>
            </form>

            <h1>Delete Custom Table</h1>
            <form method="post">
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="delete_table_name">Table Name</label></th>
                        <td><input type="text" name="delete_table_name" id="delete_table_name" required></td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" name="submit_delete" class="button-danger" value="Delete Table">
                </p>
            </form>
        </div>
        <?php
    }

    public function process_form() {
        global $wpdb;

        // Handle table creation.
        if (isset($_POST['submit_create'])) {
            $table_name = sanitize_text_field($_POST['table_name']);
            $columns = sanitize_text_field($_POST['columns']);
            $column_array = explode(',', $columns);

            if (!empty($table_name) && !empty($column_array)) {
                $table_name = $wpdb->prefix . $table_name; // Prefix table name with wp_

                $charset_collate = $wpdb->get_charset_collate();

                // Dynamically build the SQL query for table creation.
                $sql = "CREATE TABLE $table_name (
                    id mediumint(9) NOT NULL AUTO_INCREMENT,
                    ";
                foreach ($column_array as $column) {
                    $column = trim($column);
                    $sql .= "$column varchar(255) NOT NULL, ";
                }
                $sql .= "PRIMARY KEY (id)
                ) $charset_collate;";

                // Include the upgrade.php file for dbDelta function.
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
                dbDelta($sql);

                // Add an admin notice for success.
                add_action('admin_notices', function () use ($table_name) {
                    echo '<div class="notice notice-success is-dismissible">
                        <p>Table ' . esc_html($table_name) . ' created successfully!</p>
                    </div>';
                });
            }
        }

        // Handle table deletion.
        if (isset($_POST['submit_delete'])) {
            $delete_table_name = sanitize_text_field($_POST['delete_table_name']);

            if (!empty($delete_table_name)) {
                $delete_table_name = $wpdb->prefix . $delete_table_name; // Prefix table name with wp_

                // Check if the table exists before attempting to delete it.
                if ($wpdb->get_var("SHOW TABLES LIKE '$delete_table_name'") == $delete_table_name) {
                    $sql = "DROP TABLE IF EXISTS $delete_table_name;";
                    $wpdb->query($sql);

                    // Add an admin notice for success.
                    add_action('admin_notices', function () use ($delete_table_name) {
                        echo '<div class="notice notice-success is-dismissible">
                            <p>Table ' . esc_html($delete_table_name) . ' deleted successfully!</p>
                        </div>';
                    });
                } else {
                    // Add an admin notice if the table does not exist.
                    add_action('admin_notices', function () use ($delete_table_name) {
                        echo '<div class="notice notice-error is-dismissible">
                            <p>Table ' . esc_html($delete_table_name) . ' does not exist.</p>
                        </div>';
                    });
                }
            }
        }
    }
}

// Instantiate the plugin class.
new CustomTableCreator();

?>
