<?php

class TaxZoneOffsetCalculator {
    protected $zone_offset;

    function __construct(TaxZoneOffset $zone_offset) {
        $this->zone_offset = $zone_offset;
    }

    public function getDescription() {
        return "Zone Offset";
    }

    public function getAmount() {
        $amount = 0;

        if ($this->zone_offset->zone_a_days > 183) {
            $amount += $this->zone_offset->zone_a_amount;
        }
        if ($this->zone_offset->zone_b_days > 183) {
            $amount += $this->zone_offset->zone_b_amount;
        }
        if ($this->zone_offset->zone_x_days > 183) {
            $amount += $this->zone_offset->zone_x_amount;
        }
        if ($this->zone_offset->zone_y_days > 183) {
            $amount += $this->zone_offset->zone_y_amount;
        }
        if ($this->zone_offset->zone_z_days > 183) {
            $amount += $this->zone_offset->zone_z_amount;
        }

        return $amount;
    }

    public function getAmountWords() {
        return $this->getAmount();
    }

    public function getElementID() {
        return "#zone_offset";
    }

    public function getTargetItem() {
        return '#zone_offset';
    }

}