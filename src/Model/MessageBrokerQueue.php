<?php
/**
 * Created by Sileno de Oliveira Brito on 17/07/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class MessageBrokerQueue
{
    private string $identifier;
    private ?string $description;

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): MessageBrokerQueue
    {
        $this->identifier = $identifier;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): MessageBrokerQueue
    {
        $this->description = $description;
        return $this;
    }

}
