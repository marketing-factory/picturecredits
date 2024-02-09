<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Domain\Repository;

use Doctrine\DBAL\Driver\Exception;
use Doctrine\DBAL\DBALException;
use Mfc\Picturecredits\Domain\Model\FileReference;
use Mfc\Picturecredits\Domain\Model\PictureCredit;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class PictureTermsRepository
 * @package Mfc\Picturecredits\Domain\Repository
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 * @author Sebastian Klein <sebastian.klein@marketing-factory.de>
 */
class PictureTermsRepository extends Repository
{
    /**
     * @var array
     */
    protected array $termsRecords = [];

    /**
     * @param int $uid
     *
     * @return array
     * @throws DBALException
     * @throws Exception
     */
    public function findByTermsUid(int $uid): array
    {
        if (!MathUtility::canBeInterpretedAsInteger($uid)) {
            throw new \InvalidArgumentException('The UID has to be an integer. UID given: "' . $uid . '"', 1663924153);
        }

        $queryBuilder = self::getQueryBuilderForTable('picture_terms');
        $queryBuilder->getRestrictions()->removeAll();

        $row = $queryBuilder
            ->select('*')
            ->from('picture_terms')
            ->where(
                $queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($uid, \TYPO3\CMS\Core\Database\Connection::PARAM_INT))
            )
            ->executeQuery()
            ->fetchAssociative();

        if (!is_array($row)) {
            throw new \RuntimeException(
                'Record "picture_terms" with uid "' . $uid . '" does not exist',
                1660915041
            );
        }

        $this->termsRecords[$uid] = $row;

        return $this->termsRecords[$uid];
    }

    /**
     * @param string $table
     *
     * @return QueryBuilder
     */
    protected static function getQueryBuilderForTable(string $table): QueryBuilder
    {
        return GeneralUtility::makeInstance(
            ConnectionPool::class
        )->getQueryBuilderForTable($table);
    }
}
