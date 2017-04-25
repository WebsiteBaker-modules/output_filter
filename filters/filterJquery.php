<?php
/**
 * protect email addresses (replace '@' and '.' and obfuscate address
 * @param string $content
 * @return string
 */
    function doFilterJquery($content) {
        $aFilterSettings = getOutputFilterSettings();
        $key = preg_replace('=^.*?filter([^\.\/\\\\]+)(\.[^\.]+)?$=is', '\1', __FILE__);
        if ($aFilterSettings[$key]) {
            $scriptLink  = '';
            if( !preg_match('/<head.*<.*src=\".*\/jquery-min.js.*>.*<\/head/siU', $content) ) {
                  $scriptLink .= "\t".'<script src="'.WB_URL.'/include/jquery/jquery-min.js" type="text/javascript"></script>'."\n";
                  $scriptLink .= "\t".'<script src="'.WB_URL.'/include/jquery/jquery-insert.js" type="text/javascript"></script>'."\n";
                  $scriptLink .= "\t".'<script src="'.WB_URL.'/include/jquery/jquery-include.js" type="text/javascript"></script>'."\n";
                  $sJqueryThemeRel =  '/modules/jquery/jquery_theme.js';
                  $scriptLink .=  (is_readable(WB_PATH.$sJqueryThemeRel)
                      ? "\t".'<script src="'.WB_URL.$sJqueryThemeRel.'" type="text/javascript"></script>'."\n"
                      : "\t".'<script src="'.WB_URL.'/include/jquery/jquery_theme.js" type="text/javascript"></script>'."\n");
                  $sJqueryTemplateRel =  '/templates/'.TEMPLATE.'/jquery_frontend.js';
                  $scriptLink .=  (is_readable(WB_PATH.$sJqueryTemplateRel)
                      ? "\t".'<script src="'.WB_URL.$sJqueryTemplateRel.'" type="text/javascript"></script>'."\n"
                      : '');
                  $regex = '/(.*)(<\s*?\/\s*?head\s*>.*)/isU';
                  $replace = '$1'.$scriptLink.'$2';
                  $content = preg_replace ($regex, $replace, $content);
            }
        }
        return $content;
    }
