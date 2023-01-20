<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Updates;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Driver\Exception;
use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Updates\ChattyInterface;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\ReferenceIndexUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\RepeatableInterface;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

/**
 * Class MigratePictureVendorIntoPictureTermsWizard
 * @package Mfc\Picturecredits\Updates
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 */
class MigratePictureVendorIntoPictureTermsWizard implements UpgradeWizardInterface, RepeatableInterface, ChattyInterface
{
    private const COLUMN_MAPPINGS = [
        [
            'source_table' => 'picture_vendor',
            'destination_table' => 'picture_terms',
            'columns' => [
                'uid' => 'uid',
                'pid' => 'pid',
                'tstamp' => 'tstamp',
                'crdate' => 'crdate',
                'cruser_id' => 'cruser_id',
                'deleted' => 'deleted',
                'hidden' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
                'sorting' => 'sorting',
                'sys_language_uid' => 'sys_language_uid',
                'l10n_parent' => 'l10n_parent',
                'l10n_diffsource' => 'l10n_diffsource',
                'name' => 'name',
                'template_name' => 'template_name',
                'disclaimer' => 'disclaimer',
                'creator_name' => 'creator_name',
                'creator_link' => 'creator_link',
                'vendor_collection' => 'vendor_collection',
                'vendor_link' => 'vendor_link',
                'vendor_name' => 'name',
                'license_name' => 'license_name',
                'license_link' => 'license_link',
                'socialmedia_usage' => 'socialmedia_usage',
                'credits_on_image' => 'credits_on_image',
                'field_picture_name' => 'field_picture_name',
                'field_picture_link' => 'field_picture_link',
                'field_disclaimer' => 'field_disclaimer',
                'field_creator_name' => 'field_creator_name',
                'field_creator_link' => 'field_creator_link',
                'field_vendor_collection' => 'field_vendor_collection',
                'field_vendor_link' => 'field_vendor_link',
                'field_license_name' => 'field_license_name',
                'field_license_link' => 'field_license_link',
                'field_additional_info' => 'field_additional_info',
                'field_socialmedia_usage' => 'field_socialmedia_usage',
                'field_credits_on_image' => 'field_credits_on_image',
            ],
        ],
    ];

    private OutputInterface $output;

    public function getIdentifier(): string
    {
        return 'picturecredits_MigratePictureVendorIntoPictureTermsWizard';
    }

    public function getTitle(): string
    {
        return 'Migrate picture terms';
    }

    public function getDescription(): string
    {
        return 'Migrates data from "picture_vendor" into the "picture_terms" table';
    }

    public function executeUpdate(): bool
    {
        foreach (self::COLUMN_MAPPINGS as $mapping) {
            $columns = $mapping['columns'];
            if (!$this->checkIfTableIsPresentAndNotEmpty($mapping['source_table'], end($columns))) {
                continue;
            }

            $this->migrateTableRows($mapping['source_table'], $mapping['destination_table'], $mapping['columns']);
        }

        return true;
    }

    public function updateNecessary(): bool
    {
        $updateNecessary = false;
        foreach (self::COLUMN_MAPPINGS as $mapping) {
            $columns = $mapping['columns'];
            if ($this->checkIfTableIsPresentAndNotEmpty($mapping['source_table'], end($columns))) {
                $updateNecessary = true;
            }
        }

        return $updateNecessary;
    }

    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class,
            ReferenceIndexUpdatedPrerequisite::class,
        ];
    }

    /**
     * @return OutputInterface
     */
    public function getOutput(): OutputInterface
    {
        return $this->output;
    }

    /**
     * @param OutputInterface $output
     * @return void
     */
    public function setOutput(OutputInterface $output): void
    {
        $this->output = $output;
    }

    private function checkIfTableIsPresentAndNotEmpty(string $tableName, string $checkedColumn): bool
    {
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $connection = $connectionPool->getConnectionForTable($tableName);

        $tableColumns = $connection->getSchemaManager()->listTableColumns($tableName);
        if (!is_array($tableColumns) || !isset($tableColumns[strtolower($checkedColumn)])) {
            return false;
        }

        $numberOfEntries = $connection->count('*', $tableName, []);
        return $numberOfEntries > 0;
    }

    /**
     * @throws DBALException
     * @throws Exception
     */
    private function migrateTableRows(string $sourceTable, string $destinationTable, array $columnMapping): bool
    {
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $sourceConnection = $connectionPool->getConnectionForTable($sourceTable);
        $destinationConnection = $connectionPool->getConnectionForTable($destinationTable);

        $queryBuilder = $connectionPool->getQueryBuilderForTable($sourceTable);
        $queryBuilder->getRestrictions()
            ->removeAll();

        $result = $queryBuilder->select(...array_unique(array_values($columnMapping)))
            ->from($sourceTable)->executeQuery();

        while ($row = $result->fetchAssociative()) {
            $data = [];
            foreach ($columnMapping as $destColumn => $sourceColumn) {
                $data[$destColumn] = $row[$sourceColumn];
            }

            $destinationConnection->insert(
                $destinationTable,
                $data
            );

            $sourceConnection->delete(
                $sourceTable,
                [
                    'uid' => (int)$data['uid'],
                ]
            );
        }

        return true;
    }
}
