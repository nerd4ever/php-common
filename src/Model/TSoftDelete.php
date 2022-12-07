<?php

namespace Nerd4ever\Common\Model;

use DateTime;

trait TSoftDelete
{
    protected ?DateTime $deletedAt = null;

    /**
     * @return DateTime|null
     */
    public function getDeletedAt(): ?DateTime
    {
        return $this->deletedAt;
    }

    /**
     * @param DateTime|null $deletedAt
     * @return TSoftDelete
     */
    public function setDeletedAt(?DateTime $deletedAt): object
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

}