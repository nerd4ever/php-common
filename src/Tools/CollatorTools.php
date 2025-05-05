<?php
/**
 * Created by Sileno de Oliveira Brito on 05/05/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Tools;

use Collator;

class CollatorTools
{
    public static function br(): Collator
    {
        static $collator = null;
        if ($collator === null) {
            $collator = new Collator('pt_BR');
            $collator->setAttribute(Collator::NORMALIZATION_MODE, Collator::ON);
            $collator->setStrength(Collator::PRIMARY);
        }
        return $collator;
    }

}