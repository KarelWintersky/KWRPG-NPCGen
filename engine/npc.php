<?php
require_once 'npc.core.php';

/**
 *
 */
class NPC extends npcCore
{
    private $npc;
    
    /**
     * @param npcFilters
     */
    private $filter;
    
    /**
     * NPC constructor.
     * @param npcFilters $filterClass
     */
    public function __construct(npcFilters $filterClass)
    {
        $this->npc = $this->npc_template;
        $this->filter = $filterClass;
    }
    
    /**
     * @return array
     */
    public function getNPC()
    {
        $this->filter::init();
        
        $this->Generate();
        return $this->npc;
    }
    
    /* ============================================= PRIVATE FUNCTIONS ========================================== */

    /**
     * увеличивает на 1 количество баллов по тесту (зависит от параметра, отвечающего за тест)
     * @param $test_name
     * @param $test_stat
     */
    private function gainTest($test_name, $test_stat)
    {
        // это зависимость роста значения теста от параметра
        $chance = 30 + $this->npc['stats'][$test_stat] * 6;
        if (d100() <= $chance)
            $this->npc['tests'][$test_name] += 1;

        // может ли зависеть вероятность роста теста от происхождения?
        // или только базовое значение?
    }

    /**
     * Тесты
     */
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

    /**
     * Раса и базовые параметры от расы
     */
    private function evalRace()
    {
        // выясняем расу
        $race = $this->rndWithFilter($this->filter::$race);
        $this->npc['race'] = $race;

        // выставляем базовые значения параметров в зависимости от расы
        foreach ($this->npc['stats'] as $stat_id => $stat_val) {
            $this->npc['stats'][$stat_id] = $this->filter::$base_stats_with_race [$race] [$stat_id];
        }
    }

    /**
     * вероисповедание
     */
    private function eval_confession()
    {
        $this->npc['confession'] = $this->rndWithFilter($this->filter::$confession);

    }

    /**
     * вычисляем агрессию, зависящую от расы, происхождения и рандома
     * @return int
     */
    private function evalAggro()
    {
        $aggro = 3;
        $aggro += (
                $this->filter::$base_aggro_with_race [$this->npc['race']] +
                $this->filter::$base_aggro_with_origin [$this->npc['origin']] + roll2d6()
        );
        return $aggro;
    }

    /**
     * Происхождение, раса и зависящие от них результаты тестов
     * @return mixed
     */
    private function evalOrigin()
    {
        // происхождение
        $origin = $this->npc['origin'] = $this->rndWithFilter($this->filter::$origins);
        $this->npc['origin_wealth'] = dice(1, 100);

        $base_test_value = 2;
        // инициализация базовым значением
        foreach ($this->npc['tests'] as $test_id => $test_value) {
            $this->npc['tests'] [$test_id] = $base_test_value;
        }

        // базовые значения тестов в зависимости от ПРОИСХОЖДЕНИЯ
        foreach ($this->npc['tests'] as $test_id => $test_value) {
            $this->npc['tests'] [$test_id] += $this->filter::$base_tests_with_origin [$origin] [$test_id];
        }
        // базовые значения тестов в зависимости от РАСЫ
        foreach ($this->npc['tests'] as $test_id => $test_value) {
            $this->npc['tests'] [$test_id] += $this->filter::$base_tests_with_race [$this->npc['race']] [$test_id];
        }

        // цикл генерации предварительных значений тестов (по году c самого рождения до ... 6 лет)
        for ($i = 0; $i < 6; $i++) {
            $this->gainAllTests();
        }

        return $origin;
    }

    /**
     * пол и связанные с ним штуковины (рост и вес, зависящие от возраста и расы)
     */
    private function evalSex()
    {
        $this->npc['sex'] = $this->rndWithFilter($this->filter::$sex);
    }

    /**
     * Здоровье -- болезни, зрение, инвалидность и первичная визуализация
     */
    private function evalHealth()
    {
        //@warning: визуализируем не там где надо, слишком увлекшись flatten-версией оверрайда
        $h_base = $this->rndWithFilter($this->filter::$health_base);
        if ($h_base == 'плохое' || $h_base == 'болен') {
            $h_disease_type = $this->rndWithFilter($this->filter::$health_disease_type);
            $h_disease_severity = d100();

            $this->npc['base']['disease_type'] = $h_disease_type;
            $this->npc['base']['disease_severity'] = $h_disease_severity;

            $h_base = "<small>{$h_disease_type} ({$h_disease_severity})</small>";
        }
        $this->npc['health']['base'] = $h_base;

        // Зрение и нарушения
        $h_vision = $this->npc['health']['vision'] = $this->rndWithFilter($this->filter::$health_vision);
        if ($h_vision == '+' || $h_vision == '-')
            $this->npc['health']['vision'] .= $this->rndWithFilter($this->filter::$health_vision_severity);

        // Инвалидность и тяжесть
        $h_disabled = $this->npc['health']['disabled'] = $this->rndWithFilter($this->filter::$health_disabled);
        if ($h_disabled != 'нет') {
            $this->npc['health']['disabled'] .= '(' . d100() . ')';
        } else {
            $this->npc['health']['disabled'] = '--';
        }
    }

    /**
     * цвета волос и глаз!
     */
    private function evalColors()
    {
        $this->npc['color']['hair'] = $this->rndWithFilter($this->filter::$color_hair);
        $this->npc['color']['eye'] = $this->rndWithFilter($this->filter::$color_eyes);
    }
    
    /**
     * @return mixed|string|void|null
     */
    public function evalPsi()
    {
        return $this->rndWithFilter($this->filter::$is_psi);
    }

    /**
     * @return array
     */
    private function Generate()
    {
        // возраст
        if (is_callable($this->filter::$age)) {
            $age = call_user_func($this->filter::$age);
        } else {
            $age = $this->rndWithFilter($this->filter::$age);
        }
        $this->npc['age'] = $age;
        
        // раса и базовые параметры
        $this->evalRace();

        // цвета волос, глаз! (по хорошему %%-ы зависят от расы, но мы упростим, сделаем common-фильтр )

        // пол
        $this->evalSex();

        // происхождение и зависящие от него данные (значения тестов)
        $origin = $this->evalOrigin();

        // цикл генерации параметров и значений тестов в зависимости от параметра
        for ($i = 6; $i <= min($age, 25); $i++) {
            // параметры
            $gained_stat = $this->rndWithFilter($this->filter::$stats_gain_chance[$origin]);
            $this->npc['stats'][$gained_stat]++;

            // тесты
            $this->gainAllTests();
        }
        
        if ($age > 25) {
            for($i = min($age, 25); $i <= $age; $i++) {
                $this->gainAllTests(); // после 25 лет растут только тесты
            }
        }
        
        // аггро
        $this->npc['psi']['aggro'] = $this->evalAggro();
        $this->npc['psi']['psi'] = $this->evalPsi();

        // здоровье
        $this->evalHealth();

        // первая буква имени
        $this->npc['letter1'] = $this->getRandomKey($this->filter::$letters);
        $this->npc['letter2'] = $this->getRandomKey($this->filter::$letters);

        // цвета волос и глаз
        $this->evalColors();
        
        $this->eval_confession();

        return $this->npc;
    }
    
}

