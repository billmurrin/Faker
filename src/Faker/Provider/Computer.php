<?php

namespace Faker\Provider;

class Computer extends \Faker\Provider\Base
{

    /*
    manufacturer
    make
    modelNumber
    computerType
    processor
    memory
    bios
    operatingSystem
    servicePack
    versionNumber
    */

    //protected static $manufacturers = array('Alienware', 'Apple', 'Acer', 'AOpen', 'ASUS', 'Compaq', 'Dell', 'Emachines', 'Gateway', 'GIGABYTE', 'HP', 'IBM', 'Lenovo', 'Toshiba', 'Samsung', 'Sony', 'Voodoo',);
    /**
     * Array of computer manufacturers
     *
     * @var array
     */
    protected static $manufacturers = array('Alienware', 'Dell');

    /**
     * Array of serial number (S/N) patterns
     *
     * @var array
     */
    protected static $serialnumbers = array(
      '????######', '??#?#', '?##?##', '??##????####??#??#??#', '?########??', '?##??###??##', '####??#', '##?##?#'
    );

    /**
     * Alienware computer models and types
     *
     * @var array
     */
    protected static $alienwaremodels = array(
        '13'                            => 'Laptop',
        '15'                            => 'Laptop',
        '17'                            => 'Laptop',
        'X51'                           => 'Desktop',
        'Area-51'                       => 'Desktop',
    );

    /**
     * Dell computer models and types
     *
     * @var array
     */
    protected static $dellmakemodels = array(
        'Precision'                     => 'Desktop',
        'Dimension'                     => 'Desktop',
        'Optiplex'                      => 'Desktop',
        'XPS'                           => 'Desktop',
        'Precision Mobile Workstation'  => 'Laptop',
        'Inspiron'                      => 'Laptop',
        'Latitude'                      => 'Laptop',
        'Studio'                        => 'Laptop',
        'Venue'                         => 'Tablet',
        'PowerEdge'                     => 'Server',
    );

    /**
     * Various Computer system types
     *
     * @var array
     */
    protected static $systemtypes = array(
        'Laptop', 'Desktop', 'Tablet', 'Server'
    );

    /**
     * Various Dell model number patterns based on the System Type
     *
     * @var array
     */
    protected static $dellpatterns = array(
        'Desktop'                       => array('?#00', '##00', '?#50', '##50', 'GX###', 'SX###', '###'),
        'Laptop'                        => array('M####','M###?', '1# M#0#0', 'E##00'),
        'Tablet'                        => array('1# Pro', '#0#0'),
        'Server'                        => array('##00','T###', 'R##0xd')
    );

    /**
     * Returns a computer manufacturer
     *
     * @return string
     * @example 'Alienware'
     */
    public static function systemManufacturer()
    {
        return static::randomElement(static::$manufacturers);
    }

    /**
     * Calls a ComputerModel method based on the manufacturer
     * Optionally accepts a manufacturer and system type as
     * input to filter on specific types of systems
     *
     * @param string $manufacturer
     * @param string $type
     *
     * @return string
     */
    public static function systemModel($manufacturer = "", $type = "")
    {
        if ($manufacturer === "" || !in_array($manufacturer, static::$manufacturers)) {
            $manufacturer = static::randomElement(static::$manufacturers);
        }

        $modelName = static::toLower($manufacturer) . 'ComputerModel';

        return static::$modelName($type);
    }

    /**
     * Returns a computer serial number
     *
     * @return string
     * @example 'T82899840HZ'
     */
    public static function serialNumber()
    {
        return static::toUpper(static::bothify(static::randomElement(static::$serialnumbers)));
    }

    /**
     * Provides an Alienware Computer Model
     * Can accept type as input to filter on a particular type of system (E.g. Desktop, Laptop)
     *
     * @param string $type
     * @return string
     * @example 'Alienware X51'
     */
    public static function alienwareComputerModel($type = "")
    {
        if ($type === "" || !in_array($type, array_values(static::$alienwaremodels)))
        {
            $type = static::randomElement(array_values(static::$alienwaremodels));
        }

        return 'Alienware ' . static::randomKey(static::$alienwaremodels, $type);
    }

    /**
     * Provides a Dell Computer Model
     * Can accept type as input to filter on a particular type of system (E.g. Desktop, Laptop)
     *
     * @param string $type
     * @return string
     * @example 'Dell PowerEdge 7000'
     */
    public static function dellComputerModel($type = "")
    {
        if ($type === "" || !in_array($type, array_values(static::$dellmakemodels)))
        {
            $type = static::randomElement(array_values(static::$dellmakemodels));
        }

        return 'Dell ' . static::randomKey(static::$dellmakemodels, $type) . ' ' . static::toUpper(static::bothify(static::randomElement(static::$dellpatterns["$type"])));
    }

    /**
     * Returns a random system type
     *
     * @return string
     * @example 'Desktop'
     */
    public static function systemType()
    {
        return static::randomElement(static::$systemtypes);
    }
}
