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

    public function getRace()
    {
        // выясняем расу
        $race = $this->rndWithFilter( npcFilters::$race );
        $this->npc['race'] = $race;

        // выставляем базовые значения параметров в зависимости от расы
        foreach ($this->npc['stats'] as $stat_id => $stat_val ) {
            $this->npc['stats'][ $stat_id ] = npcFilters::$race_base_stats [ $race ] [ $stat_id ];
        }
    }

    public function Generate()
    {
        $this->npc['age'] = $this->rndWithFilter( npcFilters::$age );

        $this->getRace();

        $this->npc['sex'] = $this->rndWithFilter( npcFilters::$sex );

        $origin = $this->npc['origin'] = $this->rndWithFilter( npcFilters::$origins );

        // цикл генерации параметров
        for ($i=9; $i <= $this->npc['age']; $i++)
        {
            $gained_stat = $this->rndWithFilter( npcFilters::$stats_gain_chance[ $origin ]  );
            $this->npc['stats'][ $gained_stat ]++;
        }


        return $this->npc;
    }
}


?>