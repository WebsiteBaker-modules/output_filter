<?php
/**
 *
 * @param string $content
 * @return string
 */
    function doFilterScriptVars($content) {
        $aFilterSettings = getOutputFilterSettings();
        $key = preg_replace('=^.*?filter([^\.\/\\\\]+)(\.[^\.]+)?$=is', '\1', __FILE__);
        if ($aFilterSettings[$key]) { }
            $scriptLink  = '';
            if( !preg_match('/<head.*<.*src=\".*\/domReady.js.*>.*<\/head/siU', $content) ) {
                  $scriptLink .= "\t".'<script src="'.WB_URL.'/include/jquery/domReady.js" type="text/javascript"></script>'."\n";
            }
            if (!preg_match('/<head.*<.*var WB_URL.*<\/head/siU', $content) ) {
                  $scriptLink .= "\t"."<script type=\"text/javascript\">\n"
                              ."\t\t"."<!--\n"
                              ."\t\t"."var URL = '".WB_URL."';\n"
                              ."\t\t"."var WB_URL = '".WB_URL."';\n"
                              ."\t\t"."var THEME_URL = '".THEME_URL."';\n"
                              ."\t\t"."var TEMPLATE_DIR = '".TEMPLATE_DIR."';\n"
                              ."\t\t"."var TEMPLATE = '".TEMPLATE."';\n"
                              ."\t\t"."var EDITOR = '".WYSIWYG_EDITOR."';\n"
                              ."\t\t"."-->\n"
                              ."\t"."</script>\n";
            }
            if ($scriptLink!='') {
                  $regex = '/(.*)(<\s*?\/\s*?head\s*>.*)/isU';
                  $replace = '$1'.$scriptLink.'$2';
                  $content = preg_replace ($regex, $replace, $content);
            }
        return $content;
    }
