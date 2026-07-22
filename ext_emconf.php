<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Picture Credits',
    'description' => 'Implements a central image rights management in FAL and automated rendering of picture credits on regular content pages.',
    'category' => 'frontend',
    'author' => 'Marketing Factory Digital GmbH',
    'author_email' => 'info@marketing-factory.de',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '3.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-14.3.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
