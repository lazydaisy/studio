<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * studio upgrades.
 *
 * @package    theme_studio
 * @copyright  2013 Petr Skoda {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function xmldb_theme_studio_upgrade($oldversion) {
    global $CFG, $DB, $OUTPUT;

    $dbman = $DB->get_manager();

    if ($oldversion < 2013041200) {
        // Migrate logo and logosml URL.

            $logo = get_config('theme_studio', 'logo');
        if ($logo === '') {
            // No logo means nothing to do.

        } else if ($logo = clean_param($logo, PARAM_URL)) {
            require_once("$CFG->libdir/filelib.php");
            if ($content = download_file_content($logo)) {
                $filename = preg_replace('/^.*\//', '', $logo);
                if (!$filename = clean_param($filename, PARAM_FILE)) {
                    // Some name is better than no name...
                    $filename = 'studio-logo.jpg';
                }
                $fs = get_file_storage();
                $record = array(
                    'contextid' => context_system::instance()->id, 'component' => 'theme_studio',
                    'filearea' => 'logo', 'itemid'=>0, 'filepath'=>'/', 'filename'=>$filename);
                $fs->create_file_from_string($record, $content);
                set_config('logo', '/'.$filename, 'theme_studio');
                unset($content);

            } else {
                unset_config('theme_studio', 'logo');
            }
        } else {
            // Prompt for new logo, the old setting was invalid.
            unset_config('theme_studio', 'logo');
        }

            $logosml = get_config('theme_studio', 'logosml');
        if ($logosml === '') {
            // No logosml means nothing to do.

        } else if ($logosml = clean_param($logosml, PARAM_URL)) {
            require_once("$CFG->libdir/filelib.php");
            if ($content = download_file_content($logosml)) {
                $filename = preg_replace('/^.*\//', '', $logosml);
                if (!$filename = clean_param($filename, PARAM_FILE)) {
                    // Some name is better than no name...
                    $filename = 'studio-logosml.jpg';
                }
                $fs = get_file_storage();
                $record = array(
                    'contextid' => context_system::instance()->id, 'component' => 'theme_studio',
                    'filearea' => 'logosml', 'itemid'=>0, 'filepath'=>'/', 'filename'=>$filename);
                $fs->create_file_from_string($record, $content);
                set_config('logosml', '/'.$filename, 'theme_studio');
                unset($content);

            } else {
                unset_config('theme_studio', 'logosml');
            }
        } else {
            // Prompt for new logosml, the old setting was invalid.
            unset_config('theme_studio', 'logosml');
        }

        upgrade_plugin_savepoint(true, 2013041200, 'theme', 'studio');
    }


    // Moodle v2.5.0 release upgrade line.
    // Put any upgrade step following this.


    // Moodle v2.6.0 release upgrade line.
    // Put any upgrade step following this.


    // Moodle v2.7.0 release upgrade line.
    // Put any upgrade step following this.

    return true;
}
