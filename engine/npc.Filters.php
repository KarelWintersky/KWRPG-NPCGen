<?php

/**
 * Class npcFilters
 */
class npcFilters
{
    public static function init() { }
    
    public static $template_header = "";
    public static $_;
    
    // Родная планета
    public static $race;
    
    // Происхождение (генкарта)
    public static $origins;
    
    // возраст
    public static $age;
    
    // пол
    public static $sex;
    
    // базовые статы в возрасте 5 лет
    public static $base_stats_with_race;
    
    // шансы роста параметров в зависимости от происхождения
    public static $stats_gain_chance;
    
    // **** МОДИФИКАТОРЫ ТЕСТОВ
    // модификаторы (базовые значения) к тестам в зависимости от происхождения (origin)
    public static $base_tests_with_origin;
    
    // модификаторы (базовые значения) к тестам в зависимости от расы)
    public static $base_tests_with_race;
    
    // ***** АГГРО
    // бонус агрессии от расы
    public static $base_aggro_with_race;
    // бонус агрессии от расы
    public static $base_aggro_with_origin;
    
    // *** возможные буквы для имени
    public static $letters = array(
        "А", "Б", "В", "Г", "Д", "Е", "Ж", "З", "И", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ш", "Э", "Ю", "Я"
    );
    
    // *** ЗДОРОВЬЕ
    // здоровье, зрение и инвалидность
    public static $health_base;
    public static $health_disabled ;
    // зрение
    public static $health_vision;
    public static $health_vision_severity;
    
    // Категории болезней, см: http://www.dna-club.com.ua/kategorii_bolezney.htm
    public static $health_disease_type;
    
    // *** ЦВЕТ ВОЛОС
    // https://ru.wikipedia.org/wiki/%D0%9F%D0%B8%D0%B3%D0%BC%D0%B5%D0%BD%D1%82%D0%B0%D1%86%D0%B8%D1%8F_%D0%B2%D0%BE%D0%BB%D0%BE%D1%81
    public static $color_hair;
    
    // *** ЦВЕТ ГЛАЗ
    // https://ru.wikipedia.org/wiki/%D0%A6%D0%B2%D0%B5%D1%82_%D0%B3%D0%BB%D0%B0%D0%B7
    public static $color_eyes;
    
    // *** ЭТНОСЫ
    public static $etnic;
    
    public static $confession;
}