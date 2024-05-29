<?php
/**
 * Created by Sileno de Oliveira Brito on 29/05/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Tools;

use Doctrine\Common\Collections\Collection;

class CollectionTools
{
    public static function syncCollections(Collection $collectionToUpdate, Collection $newCollection): void
    {
        foreach ($newCollection as $item) {
            if (!$collectionToUpdate->contains($item)) {
                $collectionToUpdate->add($item);
            }
        }

        foreach ($collectionToUpdate as $item) {
            if (!$newCollection->contains($item)) {
                $collectionToUpdate->removeElement($item);
            }
        }
    }
}