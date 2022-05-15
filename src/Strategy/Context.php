<?php

namespace Fjborquez\Dwight\Strategy;

use Exception;

class Context
{
    private Strategy $strategy;

    public function execute(): mixed
    {
        if (!isset($this->strategy)) {
            throw new Exception('No strategy set');
        }

        $params = func_get_args();
        return $this->strategy->execute($params);
    }

    public function setStrategy(Strategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function getStrategy(): Strategy
    {
        return $this->strategy;
    }
}
