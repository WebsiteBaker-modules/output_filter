<?php
/**
 *
 * @category        modules
 * @package         output_filter
 * @copyright       WebsiteBaker Org. e.V.
 * @author          Manuela v.d.Decken <manuela@isteam.de>
 * @link            http://websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.3
 * @requirements    PHP 5.3.6 and higher
 * @version         $Id: cmdInstall.inc 67 2017-03-03 22:14:28Z manu $
 * @filesource      $HeadURL: svn://isteam.dynxs.de/wb2.10/tags/WB-2.10.0/wb/modules/output_filter/cmd/cmdInstall.inc $
 * @lastmodified    $Date: 2017-03-03 23:14:28 +0100 (Fr, 03. Mrz 2017) $
 *
 */
if(defined('WB_PATH'))
{

    $sTable = TABLE_PREFIX.'mod_output_filter';
    $i = (!isset($i) ? 1 : $i);
    $OK   = "<span class=\"ok\">OK</span>";
    $FAIL = "<span class=\"error\">FAILED</span>";
    $iErr = false;
    $msg = array(
        '<div style="margin:1em auto;font-size:1.1em;">',
        '<h4>Step '.$i++.': Installing Output Filter Settings</h4>'
    );
    if (is_writable($sAddonPath.'/filters/filterShortUrl.php')){
        unlink($sAddonPath.'/filters/filterShortUrl.php');
    }
    // create tables from sql dump file
    $sInstallStruct = $sAddonPath.'/install-struct.sql';
    if ( !is_readable($sInstallStruct)) {
        $msg[] = '<strong>\'missing or not readable file [install-struct.sql]\'</strong> '.$FAIL.'<br />';
        $iErr = true;
    } else {
        $getDefaultSettings = (function() use ( $sAddonName ){
            $aDefaults = array(
                'at_replacement'  => '@',
                'dot_replacement' => '.',
                'email_filter'    => '1',
                'mailto_filter'   => '1'
            );
            $aFiles = glob(WB_PATH.'/modules/'.$sAddonName.'/filters/*');
            foreach ( $aFiles  as $sFilterFile) {
                $key = preg_replace('=^.*?filter([^\.\/\\\\]+)(\.[^\.]+)?$=is', '\1', $sFilterFile);
                $aDefaults[$key] = '0';
            }
          return $aDefaults;
        });
        $aDefaults =  $getDefaultSettings();

        // drop old table and create new one
        if ($database->SqlImport($sInstallStruct, TABLE_PREFIX, false)) {
            if ($aDefaults) {
            // restore old settings if there any
                $sNameValPairs = '';
                foreach ($aDefaults as $index => $val) {
                    $sNameValPairs .= ', (\''.$index.'\', \''.$database->escapeString($val).'\')';
                }
                $sValues = ltrim($sNameValPairs, ', ');
                $sql = 'INSERT INTO `'.$sTable.'` (`name`, `value`) '
                     . 'VALUES '.$sValues;
                if (!$database->query($sql)) {
                    $msg[] = '<strong>\'Output Filter install settings\'</strong> '.$FAIL.'<br />';
                    $iErr = true;
                } else {
                    $msg[] = '<strong>\'Output Filter settings successful installed\'</strong> '.$OK.'<br />';
                }
            }
        } else {
          $msg[] = '<strong>\'installing or not readable file [install-struct.sql]\'</strong> '.$FAIL.'<br />';
          $iErr = true;
        }
        unset($getDefaultSettings);
    }
    $msg[] = '</div>';
//    print implode("\n", $msg)."\n";
}
