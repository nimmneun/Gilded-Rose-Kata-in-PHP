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
        if ($this->name == 'Sulfuras, Hand of Ragnaros') {
            return;
        }

        // aged bree logic
        if ($this->name == 'Aged Brie') {

            $this->raiseQuality();
            $this->sellIn--;

            if ($this->sellIn < 0) {
                $this->raiseQuality();
            }

            return;
        }

        // backstage pass logic
        if ($this->name == 'Backstage passes to a TAFKAL80ETC concert') {
            $this->raiseQuality();

            if ($this->name == 'Backstage passes to a TAFKAL80ETC concert') {
                if ($this->sellIn < 11) {
                    $this->raiseQuality();
                }
                if ($this->sellIn < 6) {
                    $this->raiseQuality();
                }
            }

            $this->sellIn--;

            if ($this->sellIn < 0) {
                $this->quality = 0;
            }

            return;
        }

        // entire default item logic
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
    }
}
