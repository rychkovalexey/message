<?php
namespace App\Twig;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigExtension extends AbstractExtension
{
    private $entityManager;

    /**
     * TwigExtension constructor.
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }

    public function getFunctions()
    {
        return [
        new TwigFunction('countUsers', [$this, 'countUsers']),
        ];
    }

    public function countUsers(): int
    {

      return count($this->entityManager->getRepository(User::class)->findAll());
    }
}