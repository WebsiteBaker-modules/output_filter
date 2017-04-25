<?php
/**
 *
 * @category        modules
 * @package         output_filter
 * @copyright       WebsiteBaker Org. e.V.
 * @author          Christian Sommer
 * @author          Dietmar Wöllbrink <dietmar.woellbrink@websitebaker.org>
 * @author          Manuela v.d.Decken <manuela@isteam.de>
 * @link            http://websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.3-SP7 and higher
 * @requirements    PHP 5.6 and higher
 * @version         $Id: info.php 67 2017-03-03 22:14:28Z manu $
 * @filesource      $HeadURL: svn://isteam.dynxs.de/wb2.10/tags/WB-2.10.0/wb/modules/output_filter/info.php $
 * @lastmodified    $Date: 2017-03-03 23:14:28 +0100 (Fr, 03. Mrz 2017) $
 *
 */

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(defined('WB_PATH') == false) { die('Illegale file access /'.basename(__DIR__).'/'.basename(__FILE__).''); }
/* -------------------------------------------------------- */

$module_directory   = 'output_filter';
$module_name        = 'Output Filter Frontend v1.1.7';
$module_function    = 'tool';
$module_version     = '1.1.7';
$module_platform    = '2.10.0';
$module_author      = 'Christian Sommer(doc), Manuela v.d. Decken(DarkViper), Dietmar Wöllbrink(luisehahne)';
$module_license     = 'GNU General Public License';
$module_description = 'This Add-On allows to filter the output directly before it is sent to the browser. '
                    . 'Each individual filter can be activated/deactivated by the ACP.'
                    . 'To add a new filter simply create a new filter file in \'modules/output_filter/filters\' '
                    . 'and add it to the \'individual\' section of \'modules/output_filter/index.php\'. '
                    . '';
