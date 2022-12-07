<?php


namespace Nerd4ever\Common\Model;

use DateTime;

trait TChronological
{

    protected ?DateTime $createdAt = null;
    protected ?DateTime $modifiedAt = null;

    /**
     * @return DateTime|null
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime|null $createdAt
     * @return TChronological
     */
    public function setCreatedAt(?DateTime $createdAt): object
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getModifiedAt(): ?DateTime
    {
        return $this->modifiedAt;
    }

    /**
     * @param DateTime|null $modifiedAt
     * @return TChronological
     */
    public function setModifiedAt(?DateTime $modifiedAt): object
    {
        $this->modifiedAt = $modifiedAt;
        return $this;
    }

}