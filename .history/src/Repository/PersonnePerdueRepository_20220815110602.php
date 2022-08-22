<?php

namespace App\Repository;

use App\Entity\Search;
use App\Entity\PersonnePerdue;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<PersonnePerdue>
 *
 * @method PersonnePerdue|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonnePerdue|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonnePerdue[]    findAll()
 * @method PersonnePerdue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnePerdueRepository extends ServiceEntityRepository
{
    /**
     * @var PaginationInterface
     */
    public $paginator;
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonnePerdue::class);
    }

    public function add(PersonnePerdue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PersonnePerdue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PersonnePerdue[] Returns an array of PersonnePerdue objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PersonnePerdue
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
public function findSearch(Search $search): QueryBuilder
{
    $query = $this
    ->createQueryBuilder('p')
    ;

if (!empty($search->ville)) {
    $query = $query
        ->andWhere('p.Ville_et_lieu_de_disparition LIKE :ville')
        ->setParameter('ville', "%{$search->ville}%");
}
if (!empty($search->age)) {
    if($search->age==0){
        $query = $query
        ->andWhere('p.Age <= 17')
        ->setParameter('age', $search->age);
    }
    
}
return $query;
}

private function getSearchQuery(Search $search, $ignorePrice = false)
{
}
}
