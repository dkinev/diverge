<?php

declare(strict_types=1);

namespace dkinev\diverge;

/**
 * Client class that validates the markup/discount between the current price and the previous one
 *
 * Class Diverge
 * @package dkinev\diverge
 */
class Diverge implements DivergeInterface
{
    /**
     * Permissible deviation in %
     *
     * @var float $diffLimit
     */
    private float $diffLimit = 25;

    /**
     * Deviation result in %
     *
     * @var float $deviation
     */
    private float $deviation;

    public function diffPrice(float $new, float $out): bool
    {
        $this->deviation = $out * ($this->diffLimit / 100);

        if ($new <= 0) {
            return false;
        }

        return (($new >= ($out - $this->deviation)) && ($new <= ($out + $this->deviation)));
    }

    public function getDeviation(): float
    {
        return $this->deviation ?? 0.0;
    }
}
