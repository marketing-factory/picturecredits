<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Picture Credits',
    'description' => 'Implements a central image rights management in FAL and automated rendering of picture credits on regular content pages.',
    'category' => 'frontend',
    'author' => 'Marketing Factory Consulting GmbH',
    'author_email' => 'info@marketing-factory.de',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '1.1.3',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
