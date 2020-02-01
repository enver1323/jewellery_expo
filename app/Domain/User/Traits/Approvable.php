<?php


namespace App\Domain\User\Traits;


trait Approvable
{
    /**
     * @return bool
     */
    public function isApproved(): bool
    {
        return true;
    }
}
