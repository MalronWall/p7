<?php

namespace App\Domain\Repositories;

use App\Application\APIs\Interfaces\InputInterface;
use App\Domain\Models\Interfaces\PhoneInterface;
use App\Domain\Models\Phone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;

class PhoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Phone::class);
    }

    /**
     * @param InputInterface|null $inputFilters
     *
     * @return array
     */
    public function loadPhonesWithFilters(?InputInterface $inputFilters = null): array
    {
        $qb = $this->createQueryBuilder('phone')
                   ->select('phone.id', 'phone.brand', 'phone.os', 'phone.name');

        if ($inputFilters->getLimit() !== 0) {
            $qb->setMaxResults($inputFilters->getLimit());
        }

        if ($inputFilters->getOffset() !== 0) {
            $qb->setFirstResult($inputFilters->getOffset());
        }

        if (!is_null($inputFilters->getCategory())) {
            $qb->where('phone.brand = :brand')
               ->setParameter('brand', $inputFilters->getCategory());
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * @param string $id
     *
     * @return PhoneInterface|null
     *
     * @throws NonUniqueResultException
     */
    public function loadOnePhoneById(string $id): ?PhoneInterface
    {
        return $this->createQueryBuilder('phone')
                    ->where('phone.id = :id')
                    ->setParameter('id', $id)
                    ->getQuery()
                    ->getOneOrNullResult();
    }
}