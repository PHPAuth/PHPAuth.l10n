<?php

namespace PHPAuth;

use PDO;

interface PHPAuthLocalizationInterface
{
    public const DEFAULT_SQL_TABLE = 'phpauth_translation_dictionary';

    /**
     * Set language code
     *
     * @param string $language
     * @param bool $use_fallback_dictionary - fallback to en_GB language
     */
    public function __construct(string $language = 'en_GB', bool $use_fallback_dictionary = false);

    /**
     * Load and return language from PHP Dictionary File
     *
     * @return array
     */
    public function use():array;

    /**
     * Load localization data from Database table phpauth_translation_dictionary
     *
     * @param string $sql_table
     * @param PDO $pdo
     * @return array|false
     */
    public function useDB(PDO $pdo, string $sql_table = self::DEFAULT_SQL_TABLE);

}