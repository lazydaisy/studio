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
 * Moodle's studio theme, an example of how to make a Bootstrap theme
 *
 * DO NOT MODIFY THIS THEME!
 * COPY IT FIRST, THEN RENAME THE COPY AND MODIFY IT INSTEAD.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_studio
 * @copyright 2014 byLazyDaisy.co.uk
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
// Get the HTML for the settings bits.
$html = theme_studio_get_html_for_settings($OUTPUT, $PAGE);

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page" class="container-fluid">

<div id="studio-header-wrap">

<div id="page-header">
 <h1 class="headermain logosml"></h1>
</div>

<header class="navbar navbar-default">
    <nav role="navigation" class="navbar-inner">
        <div id="studio-menu" class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
                <!-- HINT: Set the class of any menu link below to "active" to make it appear active -->
                <ul class="nav nav-tabs">
                    <li><a href="<?php echo $CFG->wwwroot; ?>" class="active">Studio Home</a></li>
                    <li><?php include('includes/loginlogout.php'); ?></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div id="studio-menubottom"></div>
</div><!-- ends studio-header-wrap-->


    <div id="page-content" class="row-fluid">
        <section id="region-main" class="span12">
            <?php
            echo $OUTPUT->main_content();
            ?>
        </section>
    </div>

    <footer id="page-footer">
        <p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>
        <?php
        echo $html->footnote;
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>
