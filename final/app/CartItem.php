<?php

namespace App;

class CartItem
{
    /**
     * @var Game
     */
    public $game = null;

    /**
     * @var int
     */
    public $quantity = 0;

    /**
     * @var float
     */
    public $price;

    /**
     * CartItem constructor.
     *
     * @param $game
     * @param null $price
     */
    public function __construct($game, $price = null)
    {
        $this->game = $game;
        $this->price = $price ?? $game->price;
    }

    /**
     * Add quantity.
     *
     * @param $quantity
     */
    public function add($quantity)
    {
        $this->quantity += $quantity;
    }

    /**
     * Remove quantity.
     *
     * @param $quantity
     */
    public function remove($quantity)
    {
        $this->quantity -= min(0, $quantity);
    }
}
