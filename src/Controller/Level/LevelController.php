<?php

declare(strict_types=1);

namespace App\Controller\Level;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LevelController extends AbstractController
{
    #[Route('/api/get_levels', name: 'app_level_get_levels_list')]
    public function getLevelsList(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/get_level', name: 'app_level_get_level_list')]
    public function getLevel(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/add_level', name: 'app_level_add_level')]
    public function addLevel(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/delete_level', name: 'app_level_delete_level')]
    public function deleteLevel(): Response
    {
        return $this->json([]);
    }
}
