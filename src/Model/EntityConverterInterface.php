<?php
/**
 * Created by Sileno de Oliveira Brito on 09/05/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

use JMS\Serializer\SerializerInterface;

interface EntityConverterInterface
{
    public function getEntityConverterIdentifier(): string;

    public function toArray(): array;

    public function toObject(SerializerInterface $serializer, array $data): void;
}