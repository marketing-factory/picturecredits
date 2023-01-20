<?php
declare(strict_types=1);

use Mfc\Picturecredits\Domain\Model\FileReference;
use Mfc\Picturecredits\Domain\Model\PictureTerms;

return [
    FileReference::class => [
        'tableName' => 'sys_file_reference',
    ],
    PictureTerms::class => [
        'tableName' => 'picture_terms',
        'storagePid' => 0,
        'properties' => [
            'name' => [
                'fieldName' => 'name',
            ],
        ],
    ],
];
