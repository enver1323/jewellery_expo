<?php

namespace App\Domain\User\Entities;


interface Permission
{
    const ROLE_ADMIN = 'admin';
    const ROLE_VISITOR = 'visitor';
    const ROLE_EXHIBITOR = 'exhibitor';
}
