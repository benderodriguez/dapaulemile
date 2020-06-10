<?php

declare(strict_types=1);

namespace AppBundle\Registry;

use AppBundle\Calculator\CalculatorInterface;

class CalculatorRegistry implements CalculatorRegistryInterface
{
    private $calculators;

    public function __construct(iterable $calculators)
    {
        $this->calculators = $calculators;
    }

    /**
     * @inheritDoc
     *
     */
    public function getCalculatorFor(string $model): ?CalculatorInterface
    {
        foreach ($this->calculators as $calculator){
            if ($model === $calculator->getSupportedModel()){
                return $calculator;
            }
        }
        return null;
    }
}