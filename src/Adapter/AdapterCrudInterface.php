<?php
/**
 * Created by Sileno de Oliveira Brito on 28/03/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Adapter;

interface AdapterCrudInterface extends AdapterCreateInterface, AdapterReadInterface, AdapterUpdateInterface, AdapterDeleteInterface, AdapterListInterface
{

}