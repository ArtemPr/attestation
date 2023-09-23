<?php

declare(strict_types=1);

namespace App\Controller\System;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SystemController extends AbstractController
{
    #[Route('/api/get_systems', name: 'app_system_get_systems_list')]
    public function getSystemsList(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/get_system', name: 'app_system_get_system_list')]
    public function getSystem(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/add_system', name: 'app_system_add_system')]
    public function addSystem(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/delete_system', name: 'app_system_delete_system')]
    public function deleteSystem(): Response
    {
        return $this->json([]);
    }
}
