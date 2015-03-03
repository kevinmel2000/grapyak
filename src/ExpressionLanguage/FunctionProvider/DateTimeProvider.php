<?php

namespace Grapyak\ExpressionLanguage\FunctionProvider;

use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionFunctionProviderInterface;

class DateTimeProvider implements ExpressionFunctionProviderInterface
{
    public function getFunctions()
    {
        $functions = [
            new ExpressionFunction('now', function () {
                return 'new \DateTime()';
            }, function ($arguments) {
                return new \DateTime();
            }),
        ];

        return $functions;
    }
}
