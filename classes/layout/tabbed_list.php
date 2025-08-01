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
 * Behaviour for tabbed-list layout.
 *
 * @package   block_multiblock
 * @copyright 2020 Peter Spicer <peter.spicer@catalyst-eu.net>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_multiblock\layout;

use block_multiblock\helper;

/**
 * Behaviour for tabbed-list layout.
 *
 * @package   block_multiblock
 * @copyright 2020 Peter Spicer <peter.spicer@catalyst-eu.net>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class tabbed_list extends abstract_layout {

    /**
     * Returns the recommended uses for this block.
     *
     * @return string 'sidebar' or 'main' to suggest which is recommended for this block.
     */
    public function get_suggested_use() : string {
        return 'main';
    }

    /**
     * Returns the internal ID that this layout would use and be identified by.
     *
     * Defaults to the class name.
     *
     * @return string The layout ID.
     */
    public function get_layout_id() : string {
        return 'tabbed-list';
    }

    /**
     * Returns the Mustache template required to render this block.
     *
     * @return string The Mustache template.
     */
    public function get_template() : string {
        global $CFG;
        // Totara uses Bootstrap 3.
        if (helper::is_totara()) {
            return 'block_multiblock/tabbed-list-bootstrap3';
        }
        // Starting with Moodle 5.0, Moodle uses Bootstrap 5.
        if ($CFG->version >= 2025041400) {
            return 'block_multiblock/tabbed-list-bootstrap5';
        }
        // For Moodle versions before 5.0, use Bootstrap 4.
        return 'block_multiblock/tabbed-list-bootstrap4';
    }
}
