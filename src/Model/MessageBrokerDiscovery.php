<?php
/**
 * Created by Sileno de Oliveira Brito on 17/07/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class MessageBrokerDiscovery
{
    private string $exchange;
    private array $routingKeys = [];
    private ?string $description;

    public function getExchange(): string
    {
        return $this->exchange;
    }

    public function setExchange(string $exchange): MessageBrokerDiscovery
    {
        $this->exchange = $exchange;
        return $this;
    }

    public function getRoutingKeys(): array
    {
        return $this->routingKeys;
    }

    public function setRoutingKeys(array $routingKeys): MessageBrokerDiscovery
    {
        $this->routingKeys = $routingKeys;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): MessageBrokerDiscovery
    {
        $this->description = $description;
        return $this;
    }

}
