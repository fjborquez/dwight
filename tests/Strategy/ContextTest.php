<?php
use Fjborquez\Dwight\Strategy\Context;
use Fjborquez\Dwight\Strategy\Strategy;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase {
    public function test_given_a_strategy_when_execute_is_called_then_the_strategy_execute_method_is_called() {
        $strategyMock = $this->createMock(Strategy::class);
        $strategyMock->expects($this->once())->method('execute');

        $context = new Context();
        $context->setStrategy($strategyMock);
        $context->execute();
    }

    public function test_given_there_is_no_strategy_when_execute_is_called_then_an_exception_is_thrown() {
        $this->expectException(Exception::class);

        $context = new Context();
        $context->execute();
    }

    public function test_given_a_strategy_when_set_strategy_is_called_then_the_strategy_is_set() {
        $strategyMock = $this->createMock(Strategy::class);

        $context = new Context();
        $context->setStrategy($strategyMock);

        $this->assertEquals($strategyMock, $context->getStrategy());
    }
}
