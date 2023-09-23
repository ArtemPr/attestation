<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Developers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Developers>
 *
 * @method Developers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Developers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Developers[]    findAll()
 * @method Developers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DevelopersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Developers::class);
    }

    /** @phpstan-ignore-next-line */
    public function getDeveloperList(int $page = 1, int $onPage = 50): array
    {
        return $this->createQueryBuilder('developers')
            ->setMaxResults($onPage)
            ->setFirstResult($page * $page)
            ->getQuery()
            ->getArrayResult();
    }

    /** @phpstan-ignore-next-line */
    public function getDeveloper(int $developerId = 1): array
    {
        return $this->createQueryBuilder('developers')
            ->where('developers.id = :id')
            ->setParameters(
                [
                    'id' => $developerId
                ]
            )
            ->getQuery()
            ->getArrayResult();
    }
}
