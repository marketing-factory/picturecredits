<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Picture Credits',
    'description' => 'Implements a central image rights management in FAL and automated rendering of picture credits on regular content pages.',
    'category' => 'frontend',
    'author' => 'Marketing Factory Consulting GmbH',
    'author_email' => 'info@marketing-factory.de',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '2.0.2',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.9-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
