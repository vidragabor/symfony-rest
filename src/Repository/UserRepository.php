<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

class UserRepository extends ServiceEntityRepository
{
    private $manager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, User::class);
        $this->manager = $manager;
    }

    public function saveUser($firstName, $lastName, $email)
    {
        $user = new User();
        $user
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setEmail($email);
        $this->manager->persist($user);
        $this->manager->flush();
    }

    public function updateUser(User $user): User
    {
        $this->manager->persist($user);
        $this->manager->flush();
        return $user;
    }

    public function removeUser(User $user)
    {
        $this->manager->remove($user);
        $this->manager->flush();
    }
}
