<?php
require('npc.core.php');
require('npc.filters.php');

class npc extends npcCore
{

    private $npc;

    public function __construct()
    {
        $this->npc = $this->npc_template;
    }

    // увеличивает на 1 количество баллов по тесту (зависит от параметра, отвечающего за тест)
    private function gainTest($test_name, $test_stat)
    {
        // это зависимость роста значения теста от параметра
        $chance = 30 + $this->npc['stats'][ $test_stat ] * 6;
        if ( d100() <= $chance )
            $this->npc['tests'][ $test_name ] += 1;

        // может ли зависеть вероятность роста теста от происхождения?
        // или только базовое значение?
    }

    private function gainAllTests()
    {
        $this->gainTest('endurance', 'str');
        $this->gainTest('fitness', 'str');

        $this->gainTest('dexterity', 'dex');
        $this->gainTest('memory', 'dex');

        $this->gainTest('curiosity', 'int');
        $this->gainTest('savvy', 'int');

        $this->gainTest('even_tempered', 'wpw');
        $this->gainTest('leadership', 'wpw');
    }

    private function evalRace()
    {
        // выясняем расу
        $race = $this->rndWithFilter( npcFilters::$race );
        $this->npc['race'] = $race;

        // выставляем базовые значения параметров в зависимости от расы
        foreach ($this->npc['stats'] as $stat_id => $stat_val ) {
            $this->npc['stats'][ $stat_id ] = npcFilters::$base_stats_with_race [ $race ] [ $stat_id ];
        }
    }

    // вычисляем агрессию, зависящую от расы, происхождения и рандома
    private function evalAggro()
    {
        $aggro = 3;
        $aggro += npcFilters::$base_aggro_with_race [ $this->npc['race'] ]
            + npcFilters::$base_aggro_with_origin [ $this->npc['origin'] ];
        $aggro += roll2d6();
        return $aggro;
    }

    private function evalOrigin()
    {
        // происхождение
        $origin = $this->npc['origin'] = $this->rndWithFilter( npcFilters::$origins );
        $this->npc['origin_wealth'] = dice(1, 100);

        $base_test_value = 2;
        // инициализация базовым значением
        foreach ($this->npc['tests'] as $test_id => $test_value ) {
            $this->npc[ 'tests' ] [ $test_id ] = $base_test_value;
        }

        // базовые значения тестов в зависимости от ПРОИСХОЖДЕНИЯ
        foreach ($this->npc['tests'] as $test_id => $test_value ) {
            $this->npc[ 'tests' ] [ $test_id ] += npcFilters::$base_tests_with_origin [ $origin ] [ $test_id ];
        }
        // базовые значения тестов в зависимости от РАСЫ
        foreach ($this->npc['tests'] as $test_id => $test_value ) {
            $this->npc[ 'tests' ] [ $test_id ] += npcFilters::$base_tests_with_race [ $this->npc['race'] ] [ $test_id ];
        }

        // цикл генерации предварительных значений тестов (по году c самого рождения до ... 6 лет)
        for ($i = 0; $i < 6; $i++ ) {
            $this->gainAllTests();
        }

        return $origin;
    }

    // пол и связанные с ним штуковины (рост и вес, зависящие от возраста и расы)
    private function evalSex()
    {
        $this->npc['sex'] = $this->rndWithFilter( npcFilters::$sex );
    }

    // Здоровье -- болезни, зрение, инвалидность и первичная визуализация
    private function evalHealth()
    {
        //@warning: визуализируем не там где надо, слишком увлекшись flatten-версией оверрайда
        $h_base = $this->rndWithFilter( npcFilters::$health_base );
        if ($h_base == 'плохое' || $h_base == 'болен') {
            $h_disease_type = $this->rndWithFilter( npcFilters::$health_disease_type );
            $h_disease_severity = d100();

            $this->npc['base']['disease_type'] = $h_disease_type;
            $this->npc['base']['disease_severity'] = $h_disease_severity;

            $h_base = "<small>{$h_disease_type} ({$h_disease_severity})</small>";
        }
        $this->npc['health']['base'] = $h_base;

        // Зрение и нарушения
        $h_vision = $this->npc['health']['vision'] = $this->rndWithFilter( npcFilters::$health_vision );
        if ($h_vision == '+' || $h_vision == '-')
            $this->npc['health']['vision'] .= $this->rndWithFilter( npcFilters::$health_vision_severity );

        // Инвалидность и тяжесть
        $h_disabled = $this->npc['health']['disabled'] = $this->rndWithFilter( npcFilters::$health_disabled );
        if ($h_disabled != 'нет' ) {
            $this->npc['health']['disabled'] .= '('.d100().')';
        } else {
            $this->npc['health']['disabled'] = '--';
        }
    }

    // цвета волос и глаз!
    private function evalColors()
    {
        $this->npc['color']['hair'] = $this->rndWithFilter( npcFilters::$color_hair );
        $this->npc['color']['eye']  = $this->rndWithFilter( npcFilters::$color_eyes );
    }

    private function Generate()
    {
        // возраст
        $age = $this->npc['age'] = $this->rndWithFilter( npcFilters::$age );

        // раса и базовые параметры
        $this->evalRace();

        // цвета волос, глаз! (по хорошему %%-ы зависят от расы, но мы упростим, сделаем common-фильтр )

        // пол
        $this->evalSex();

        // происхождение и зависящие от него данные (значения тестов)
        $origin = $this->evalOrigin();

        // цикл генерации параметров и значений тестов в зависимости от параметра
        for ($i=6; $i <= $age; $i++)
        {
            // параметры
            $gained_stat = $this->rndWithFilter( npcFilters::$stats_gain_chance[ $origin ]  );
            $this->npc['stats'][ $gained_stat ]++;

            // тесты
            $this->gainAllTests();
        }

        // аггро
        $this->npc['psi']['aggro'] = $this->evalAggro();

        // здоровье
        $this->evalHealth();

        // первая буква имени
        $this->npc['letter1'] = $this->getRandomKey( npcFilters::$letters );
        $this->npc['letter2'] = $this->getRandomKey( npcFilters::$letters );

        // цвета волос и глаз
        $this->evalColors();

        return $this->npc;
    }

    /* ==== PUBLIC FUNCTIONS ==== */
    public function getNPC()
    {
        $this->Generate();
        return $this->npc;
    }
}


?>