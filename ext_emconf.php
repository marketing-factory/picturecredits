<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Picture Credits',
    'description' => 'Implements a central image rights management in FAL and automated rendering of picture credits on regular content pages.',
    'category' => 'frontend',
    'author' => 'Marketing Factory Consulting GmbH',
    'author_email' => 'info@marketing-factory.de',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '2.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.9-13.0.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
