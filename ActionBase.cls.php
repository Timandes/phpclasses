<?php
/**
 * 动作类基类
 *
 * @author 亚男
 * @package timandes
 * @subpackage core
 */
class ActionBase {
    /**
     * 重定向并显示消息文本
     * <p>函数执行后会自动终止脚本。</p>
     *
     * @param string $sMessage 消息
     * @param string $sRedirectTo 重定向地址
     */
    protected function _redirect($sMessage, $sRedirectTo = "") {
        // import template
        $aArgs = array(
            "message" => $sMessage,
            "redirect_to" => $sRedirectTo,
            );
        define("TEMPLATES_FILE", "message.php");
        Tpl::get($aArgs);

        exit(1);
    }

    /**
     * 获取GET方式传递的参数
     *
     * @param string $sKey 参数名
     * @return string|false 参数值。无此参数返回false
     */
    protected function _get($sKey) {
        if(!isset($_GET[$sKey]))
            return false;

        return $_GET[$sKey];
    }

    /**
     * 模板替换
     * <p>函数执行后会自动终止脚本。</p>
     *
     * @param array $aArgs 模板参数
     * @param string $sPath 模板路径（默认为空时使用默认路径）
     */
    protected function _display($aArgs, $sPath = "") {
        if(!empty($sPath))
            define("TEMPLATES_FILE", $sPath);

        Tpl::get($aArgs);

        exit(0);
    }
}