<?php
/**
 *  Copyright (C) 2013 Werner v.d. Decken <wkl@isteam.de>
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * OutputFilterApi.php
 *
 * @category     Addons
 * @package      Addons_OutputFilter
 * @copyright    Manuela v.d.Decken <manuela@isteam.de>
 * @author       Manuela v.d.Decken <manuela@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      0.0.1
 * @lastmodified $Date: 2017-03-03 23:14:28 +0100 (Fr, 03. Mrz 2017) $
 * @since        File available since 25.12.2013
 * @description  can apply one ore more filters to $content
 *      Example: $sContent = OutputFilterApi('WbLink', $sContent);
 *      or..     $sContent = OutputFilterApi('WbLink|Relurl', $sContent);
 *      or..     $sContent = OutputFilterApi(array('WbLink', 'RelUrl'), $sContent);
 */
/**
 * OutputFilterApi
 * @param   string|array $mFilters  list of one or more filters
 * @param   string $sContent  content to apply filters
 * @return  string
 */
    function OutputFilterApi($mFilters, $sContent)
    {
        if (!is_array($mFilters)) {
            $mFilters = preg_split('/\s*?[,;| +]\s*?/', $mFilters, -1, PREG_SPLIT_NO_EMPTY);
        }
        foreach ($mFilters as $sFilter) {
            $aTmp = preg_split('/\?/', $sFilter, 2, PREG_SPLIT_NO_EMPTY);
            $sFilterName = $aTmp[0];
            $sOptions = (isset($aTmp[1])) ? $aTmp[1] : '';
            if (!preg_match('/^[A-Z][A-Za-z0-9]+$/s', $sFilterName)) { continue; }
            $sFilterFile = __DIR__.'/filters/'.'filter'.$sFilterName.'.php';
            $sFilterFunc = 'doFilter'.$sFilterName;
            if (is_readable($sFilterFile)) {
                if (!function_exists($sFilterFunc)) {
                    require($sFilterFile);
                }
                $sContent = $sFilterFunc($sContent, $sOptions);
            }
        }
        return $sContent;
    }
/* ************************************************************************** */
/**
 * function to read the current filter settings
 * @global object $database
 * @global object $admin
 * @param void
 * @return array contains all settings
 */
    function getOutputFilterSettings()
    {
        global $database;
    // set default values
        $aSettings = array(
            'at_replacement'  => '(at)',
            'dot_replacement' => '(dot)'
        );
    // request settings from database
        $sql = 'SELECT * FROM `'.TABLE_PREFIX.'mod_output_filter`';
        if (($oRes = $database->query($sql))) {
            while (($aRec = $oRes->fetchRow(MYSQLI_ASSOC))) {
                $aSettings[$aRec['name']] = $aRec['value'];
            }
        }
        $aSettings['OutputFilterMode'] = 0;
        $aSettings['OutputFilterMode'] |= ((int)$aSettings['email_filter'] * pow(2, 0));  // n | 2^0
        $aSettings['OutputFilterMode'] |= ((int)$aSettings['mailto_filter'] * pow(2, 1)); // n | 2^1
    // return array with filter settings
        return $aSettings;
    }
/* ************************************************************************** */

