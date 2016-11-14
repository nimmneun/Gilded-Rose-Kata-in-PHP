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

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        if ($this->name == 'Sulfuras, Hand of Ragnaros') {
            return;
        }

        if ($this->name != 'Aged Brie' and $this->name != 'Backstage passes to a TAFKAL80ETC concert') {
            $this->lowerQuality();
        } else {
            $this->raiseQuality();

            if ($this->name == 'Backstage passes to a TAFKAL80ETC concert') {
                if ($this->sellIn < 11) {
                    $this->raiseQuality();
                }

                if ($this->sellIn < 6) {
                    $this->raiseQuality();
                }
            }
        }

        $this->sellIn--;

        if ($this->sellIn < 0) {
            if ($this->name != 'Aged Brie') {
                if ($this->name != 'Backstage passes to a TAFKAL80ETC concert') {
                    $this->lowerQuality();
                } else {
                    $this->quality = $this->quality - $this->quality;
                }
            } else {
                $this->raiseQuality();
            }
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
