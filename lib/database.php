<?php
class Database
{
    private static $database_host = 'localhost';
    private static $database_name = 'test';
    private static $database_user = 'root';
    private static $database_user_password = '';
    private static $connection_status = null;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
        die('Init function is not allowed');
    }

    /**
     * Summary of connect
     * @return PDO|null
     */
    public static function connect()
    {
        if (self::$connection_status == null)
            try {
                self::$connection_status = new PDO(
                    'mysql:host=' . self::$database_host . ';dbname=' . self::$database_name . '',
                    self::$database_user,
                    self::$database_user_password
                );
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        return self::$connection_status;
    }

    /**
     * Summary of disconnect
     * @return void
     */
    public static function disconnect()
    {
        self::$connection_status = null;
    }
}
