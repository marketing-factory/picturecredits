<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Updates;

use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\AbstractListTypeToCTypeUpdate;

#[UpgradeWizard('picturecredits_pluginToCTypeMigration')]
final class PluginToCTypeMigration extends AbstractListTypeToCTypeUpdate
{
    protected function getListTypeToCTypeMapping(): array
    {
        return ['picturecredits_picturecredits' => 'picturecredits_picturecredits'];
    }

    public function getTitle(): string
    {
        return 'Migrate "Picture credits" plugins to content elements.';
    }

    public function getDescription(): string
    {
        return 'The "Picture credits" plugin is now registered as content element. Update migrates existing records and backend user permissions.';
    }
}
