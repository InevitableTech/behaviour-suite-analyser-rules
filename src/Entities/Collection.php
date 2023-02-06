<?php

namespace Forceedge01\BDDStaticAnalyserRules\Entities;

class Collection {
    protected $items = [];

    public function add($item) {
        $this->items[] = $item;
    }

    public function remove($item) {
        if (($key = array_search($item, $this->items)) !== false) {
            unset($this->items[$key]);
        }
    }

    public function getItems(): array {
        return $this->items;
    }

    public function getCount(): int {
        return count($this->items);
    }
}