<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Domain\Repository;

use Mfc\Picturecredits\Domain\Model\FileReference;
use Mfc\Picturecredits\Event\AfterImageReferencesDeduplicatedEvent;
use Mfc\Picturecredits\Event\AfterImageReferencesLoadedEvent;
use Mfc\Picturecredits\Utility\ArrayUtility;
use Psr\EventDispatcher\EventDispatcherInterface;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class FileReferenceRepository
 * @package Mfc\Picturecredits\Domain\Repository
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 */
class FileReferenceRepository extends Repository
{
    public function __construct(
        private ConnectionPool $connectionPool,
        protected EventDispatcherInterface $eventDispatcher
    ) {
        parent::__construct();
    }

    public function initializeObject(): void
    {
        /** @var QuerySettingsInterface $defaultQuerySettings */
        $defaultQuerySettings = GeneralUtility::makeInstance(QuerySettingsInterface::class);
        $defaultQuerySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($defaultQuerySettings);
    }

    public function getReferencesOnPage(int $pageId): array
    {
        $query = $this->createQuery();
        $result = $query
            ->matching(
                $query->logicalAnd(
                    $query->equals('pid', $pageId),
                ),
            )
            ->execute();

        $event = new AfterImageReferencesLoadedEvent($result->toArray());
        $this->eventDispatcher->dispatch($event);

        $result = ArrayUtility::uniqueObjectsByProperty(array_filter(
            $event->getFileReferences(),
            function (FileReference $reference) {
                if ($reference->getTablenames() === '') {
                    return false;
                }

                $qb = $this->connectionPool->getQueryBuilderForTable($reference->getTablenames());
                $query = $qb->from($reference->getTablenames())
                    ->select('uid')
                    ->where(
                        $qb->expr()->eq(
                            'uid',
                            $qb->createNamedParameter($reference->getUidForeign())
                        )
                    );

                $rowCount = $query->executeQuery()->rowCount();
                return $rowCount > 0;
            }
        ), 'uidLocal');

        $event = new AfterImageReferencesDeduplicatedEvent($result);
        $this->eventDispatcher->dispatch($event);

        return $event->getFileReferences();
    }
}
