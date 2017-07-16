<?php
/**
 * Helper to validate data
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Helper;

/**
 * Class Validator
 *
 * @package Games\Helper
 */
class Validator
{
    /**
     * Check if value is numerical boolean
     *
     * @param int $value is the value to test
     *
     * @return bool
     */
    public static function isOneOrZero($value)
    {
        $blnResponse = false;
        if ($value == 0 || $value == 1) {
            $blnResponse = true;
        }

        return $blnResponse;
    }
}
