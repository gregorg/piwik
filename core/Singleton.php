<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 * @category Piwik
 * @package Piwik
 */

namespace Piwik;

/**
 * The singleton class restricts the Instantiation of a class to one object only.
 *
 * @package Piwik
 */
class Singleton
{
    protected static $instances;

    protected function __construct() { }

    final private function __clone() { }

    /**
     * @return self
     */
    public static function getInstance() {
        $class = get_called_class();

        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new $class;
        }
        return self::$instances[$class];
    }

    /**
     * Used in tests only
     * @ignore
     */
    public static function unsetInstance()
    {
        $class = get_called_class();
        unset(self::$instances[$class]);
    }

    /**
     * Sets the singleton instance. For testing purposes.
     * @ignore
     */
    public static function setSingletonInstance($instance)
    {
        $class = get_called_class();
        self::$instances[$class] = $instance;
    }
}
