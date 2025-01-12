<?php
/**
 * Created by Sileno de Oliveira Brito on 29/05/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Tools;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;

class CollectionTools
{
    public static function syncCollections(Collection $collectionToUpdate, Collection $newCollection, ?EntityManagerInterface $orphanRemoveEntity): void
    {
        foreach ($newCollection as $item) {
            if (!$collectionToUpdate->contains($item)) {
                $collectionToUpdate->add($item);
            }
        }

        foreach ($collectionToUpdate as $item) {
            if ($newCollection->contains($item)) {
                continue;
            }
            $collectionToUpdate->removeElement($item);
            if ($orphanRemoveEntity instanceof EntityManagerInterface) {
                $orphanRemoveEntity->remove($item);
            }
        }
    }
}