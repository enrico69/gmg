<?php
/**
 * View helper
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Helper;

use Games\Config\General;

/**
 * Class View
 *
 * @package Games\Helper
 */
class View
{
    /**
     * Render the page
     *
     * @param string $title
     * @param string $content
     * @return string
     */
    public static function renderPage($title, $content)
    {
        $siteURL = General::SITE_URL;

        ob_start();
        include self::getTemplatePath('Layout.php');

        return ob_get_clean();
    }

    /**
     * Render a template
     *
     * @param string $templateName
     * @param string $content
     * @return string
     */
    public static function render($templateName, $content)
    {
        ob_start();
        include self::getTemplatePath($templateName);

        return ob_get_clean();
    }

    /**
     * Get a template path according to its name
     *
     * @param string $file
     *
     * @return string
     */
    public static function getTemplatePath($file)
    {
        return 'src' . DIRECTORY_SEPARATOR . 'Games' . DIRECTORY_SEPARATOR .
            'View' . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR . $file;
    }
}
