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

    private function getRace()
    {
        // выясняем расу
        $race = $this->rndWithFilter( npcFilters::$race );
        $this->npc['race'] = $race;

        // выставляем базовые значения параметров в зависимости от расы
        foreach ($this->npc['stats'] as $stat_id => $stat_val ) {
            $this->npc['stats'][ $stat_id ] = npcFilters::$base_stats_with_race [ $race ] [ $stat_id ];
        }
    }

    private function getOrigin()
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

    private function Generate()
    {
        // возраст
        $age = $this->npc['age'] = $this->rndWithFilter( npcFilters::$age );

        // раса и базовые параметры
        $this->getRace();
        // цвета волос, глаз! (по хорошему %%-ы зависят от расы, но мы упростим, сделаем common-фильтр )

        // пол
        $this->npc['sex'] = $this->rndWithFilter( npcFilters::$sex );

        // происхождение и зависящие от него данные (значения тестов)
        $origin = $this->getOrigin();

        // цикл генерации параметров и значений тестов в зависимости от параметра
        for ($i=6; $i <= $age; $i++)
        {
            // параметры
            $gained_stat = $this->rndWithFilter( npcFilters::$stats_gain_chance[ $origin ]  );
            $this->npc['stats'][ $gained_stat ]++;

            // тесты
            $this->gainAllTests();
        }


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