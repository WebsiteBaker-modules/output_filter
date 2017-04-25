<?php
/**
 *
 * @category        modules
 * @package         output_filter
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id: NL.php 67 2017-03-03 22:14:28Z manu $
 * @filesource        $HeadURL: svn://isteam.dynxs.de/wb2.10/tags/WB-2.10.0/wb/modules/output_filter/themes/default/languages/NL.php $
 * @lastmodified    $Date: 2017-03-03 23:14:28 +0100 (Fr, 03. Mrz 2017) $
 *
 */

// Headings and text outputs
$MOD_MAIL_FILTER['HEADING']                = 'Beheersinstellingen: Output Filter';
$MOD_MAIL_FILTER['HOWTO']                = 'Hier kan je de uitvoer filteren met onderstaande opties.<strong>Tip: </strong>Mailto links kunnen gecodeerd worden door een Javascript functie. Om van deze optie gebruik te kunnen maken moet je de PHP code <code style="background:#FFA;color:#900;">&lt;?php register_frontend_modfiles(\'js\');?&gt;</code> in de &lt;head&gt; sectie van het index.php bestand van je template plaatsen. Zonder deze aanpassing zal enkel het @ teken in het mailto deel vervangen worden.';
$MOD_MAIL_FILTER['WARNING']                = '';

// Text and captions of form elements
$MOD_MAIL_FILTER['SET_ACTIVE']            = 'Activate Filter';
$MOD_MAIL_FILTER['BASIC_CONF']            = 'E-mail Configuratie';
$MOD_MAIL_FILTER['SYS_REL'] = 'Frontendoutput with  relative Urls';
$MOD_MAIL_FILTER['opf']        = 'Output filter Dashboard';
$MOD_MAIL_FILTER['EMAIL_FILTER']        = 'Filter E-mail adressen in tekst';
$MOD_MAIL_FILTER['MAILTO_FILTER']        = 'Filter E-mail adressen in mailto links';
$MOD_MAIL_FILTER['ENABLED']                = 'Aan';
$MOD_MAIL_FILTER['DISABLED']            = 'Uit';

$MOD_MAIL_FILTER['REPLACEMENT_CONF']    = 'Vervang E-mail tekens';
$MOD_MAIL_FILTER['AT_REPLACEMENT']        = 'Vervang "@" door';
$MOD_MAIL_FILTER['DOT_REPLACEMENT']        = 'Vervang "." door';
