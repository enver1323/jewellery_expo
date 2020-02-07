<?php

namespace App\Domain\User\Entities;


interface Permission
{
    const ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_VISITOR,
        self::ROLE_EXHIBITOR
    ];

    const ROLE_ADMIN = 'admin';
    const ROLE_VISITOR = 'visitor';
    const ROLE_EXHIBITOR = 'exhibitor';
}
