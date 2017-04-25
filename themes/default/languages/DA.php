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
 * @version         $Id: DA.php 67 2017-03-03 22:14:28Z manu $
 * @filesource        $HeadURL: svn://isteam.dynxs.de/wb2.10/tags/WB-2.10.0/wb/modules/output_filter/themes/default/languages/DA.php $
 * @lastmodified    $Date: 2017-03-03 23:14:28 +0100 (Fr, 03. Mrz 2017) $
 *
 */

// Headings and text outputs
$MOD_MAIL_FILTER['HEADING'] = 'Indstillinger: Output-filter';
$MOD_MAIL_FILTER['HOWTO'] = 'Du kan konfigurere output-filteret med indstillingerne nedenfor.<strong>Tip: </strong>Mailadresser kan krypteres vedhj&Atilde;&brvbar;lp af en  Javascript-funktion. For at g&Atilde;�re brug af denne indstilling, skal du tilf&Atilde;�je PHP-koden <code style="background:#FFA;color:#900;"><?php register_frontend_modfiles(js);?></code> til <head> sektionnen af  index.php i din template (layout-skabelon). Uden denne &Atilde;&brvbar;ndring vil kun @-tegnet i email-adressen blive erstattet.';
$MOD_MAIL_FILTER['WARNING']                = '';

// Text and captions of form elements
$MOD_MAIL_FILTER['SET_ACTIVE']            = 'Activate Filter';
$MOD_MAIL_FILTER['BASIC_CONF'] = 'Email grundindstillinger';
$MOD_MAIL_FILTER['SYS_REL'] = 'Frontendoutput with  relative Urls';
$MOD_MAIL_FILTER['opf']        = 'Output filter Dashboard';
$MOD_MAIL_FILTER['EMAIL_FILTER'] = 'Filtrer emailadresser i tekst';
$MOD_MAIL_FILTER['MAILTO_FILTER'] = 'Filtrer emailadresser i mailto-links';
$MOD_MAIL_FILTER['ENABLED'] = 'Aktiveret';
$MOD_MAIL_FILTER['DISABLED'] = 'Deaktiveret';

$MOD_MAIL_FILTER['REPLACEMENT_CONF'] = 'Email erstatninger';
$MOD_MAIL_FILTER['AT_REPLACEMENT'] = 'Erstat "@" med';
$MOD_MAIL_FILTER['DOT_REPLACEMENT'] = 'Erstat "." med';

