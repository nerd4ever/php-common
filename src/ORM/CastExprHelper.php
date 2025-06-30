<?php
/**
 * Created by Sileno de Oliveira Brito on 30/06/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\ORM;

use Doctrine\ORM\Query\AST\ASTException;
use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\AST\Node;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\QueryException;
use Doctrine\ORM\Query\SqlWalker;
use Doctrine\ORM\Query\TokenType;

class CastExprHelper extends FunctionNode
{
    public Node $field;

    /**
     * @throws ASTException
     */
    public function getSql(SqlWalker $sqlWalker): string
    {
        return sprintf('CAST(%s AS VARCHAR)', $this->field->dispatch($sqlWalker));
    }

    /**
     * @throws QueryException
     */
    public function parse(Parser $parser): void
    {
        $parser->match(TokenType::T_IDENTIFIER);
        $parser->match(TokenType::T_OPEN_PARENTHESIS);
        $this->field = $parser->ArithmeticPrimary();
        $parser->match(TokenType::T_CLOSE_PARENTHESIS);
    }
}