<?php
/**
 *
 * @param string $content
 * @return string
 */
    function doFilterLoadOnFly($content) {
        $aFilterSettings = getOutputFilterSettings();
        $key = preg_replace('=^.*?filter([^\.\/\\\\]+)(\.[^\.]+)?$=is', '\1', __FILE__);
        if ($aFilterSettings[$key]) {
            $scriptLink  = '';
            if( !preg_match('/<head.*<.*src=\".*\/domReady.js.*>.*<\/head/siU', $content) ) {
                  $scriptLink .= "\t".'<script src="'.WB_URL.'/include/jquery/domReady.js" type="text/javascript"></script>'."\n";
            }
            if( !preg_match('/<head.*<.*src=\".*\/LoadOnFly.js.*>.*<\/head/siU', $content) ) {
                  $scriptLink .= "\t".'<script src="'.WB_URL.'/include/jquery/LoadOnFly.js" type="text/javascript"></script>'."\n";
            }
            if ($scriptLink!='') {
                  $regex = '/(.*)(<\s*?\/\s*?head\s*>.*)/isU';
                  $replace = '$1'.$scriptLink.'$2';
                  $content = preg_replace ($regex, $replace, $content);
            }
        }
        return $content;
    }
