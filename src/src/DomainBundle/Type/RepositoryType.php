<?php

namespace DomainBundle\Type;

class RepositoryType
{
    const GIT = 'Git';
    const SVN = 'SVN';

    const REPOSITORY_TYPES = [
        self::SVN,
        self::GIT,
    ];
}
