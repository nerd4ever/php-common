<?php
/**
 * Created by Sileno de Oliveira Brito on 08/07/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Nerd4ever\Common\Tools\IdTools;

class UniqueStringGenerator extends AbstractIdGenerator
{
    public function generate(EntityManager $em, $entity): string
    {
        return $this->generateId($em, $entity);
    }

    public function generateId(EntityManagerInterface $em, $entity): string
    {
        return IdTools::gen();
    }
}