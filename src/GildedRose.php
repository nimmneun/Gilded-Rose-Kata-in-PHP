<?php

namespace App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn)
    {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        switch ($this->name) {
            case 'Sulfuras, Hand of Ragnaros':
                break;
            case 'Aged Brie':
                $this->tickAgedBrie();
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                $this->tickBackstagePass();
                break;
            default:
                $this->tickDefault();
        }
    }

    private function tickAgedBrie()
    {
        $this->raiseQuality();
        $this->sellIn--;
        if ($this->sellIn < 0) {
            $this->raiseQuality();
        }
    }

    private function tickBackstagePass()
    {
        $this->raiseQuality();

        if ($this->sellIn < 11) {
            $this->raiseQuality();
        }

        if ($this->sellIn < 6) {
            $this->raiseQuality();
        }

        $this->sellIn--;

        if ($this->sellIn < 0) {
            $this->quality = 0;
        }
    }

    private function tickDefault()
    {
        $this->lowerQuality();

        $this->sellIn--;

        if ($this->sellIn < 0) {
            $this->lowerQuality();
        }
    }

    private function raiseQuality()
    {
        if ($this->quality < 50) {
            $this->quality++;
        }
    }

    private function lowerQuality()
    {
        if ($this->quality > 0) {
            $this->quality--;
        }

        if ($this->quality > 0
            && 0 === strpos($this->name, 'Conjured')
        ) {
            $this->quality--;
        }
    }
}
