<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Domain\Repository;

use Doctrine\DBAL\Driver\Exception;
use Doctrine\DBAL\DBALException;
use Mfc\Picturecredits\Domain\Model\FileReference;
use Mfc\Picturecredits\Domain\Model\PictureCredit;
use TYPO3\CMS\Core\Database\ConnectionPool;

/**
 * Class PictureCreditRepository
 * @package Mfc\Picturecredits\Domain\Repository
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 */
class PictureCreditRepository
{
    public function __construct(
        protected ConnectionPool $connectionPool,
        private FileReferenceRepository $fileReferenceRepository
    ) {
    }

    public function getCreditsForResourcesOnPage(int $pageId): array
    {
        $query = $this->fileReferenceRepository->createQuery();
        $result = $query
            ->matching(
                $query->equals('pid', $pageId)
            )
            ->execute();

        $credits = [];
        while ($result->valid()) {
            /** @var FileReference $reference */
            $reference = $result->current();

            $file = $reference->getOriginalResource()->getOriginalFile();

            $credit = new PictureCredit(
                $file,
                $file->getProperty('title')
            );
            $credits[] = $credit;

            $result->next();
        }

        return $credits;
    }
}
