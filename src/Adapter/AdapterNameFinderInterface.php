<?php
/**
 * Created by Sileno de Oliveira Brito on 02/04/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Adapter;

use Nerd4ever\Common\Model\NameFinder;

interface AdapterNameFinderInterface
{
    public function nameFinder(NameFinder $nameFinder): bool;
}