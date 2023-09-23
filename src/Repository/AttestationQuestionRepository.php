<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\AttestationQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AttestationQuestion>
 *
 * @method AttestationQuestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttestationQuestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttestationQuestion[]    findAll()
 * @method AttestationQuestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttestationQuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttestationQuestion::class);
    }
}
