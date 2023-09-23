<?php

declare(strict_types=1);

namespace App\Controller\Developers;

use App\Repository\DevelopersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DevelopersController extends AbstractController
{
    const ONPAGE = 25;
    #[Route('/api/get_developers', name: 'app_developers_developers_get_developers_list')]
    public function getDevelopersList(
        DevelopersRepository $developersRepository,
        Request $request
    ): Response
    {
        $page = $request->get('page') ?? 1;
        return $this->json(
            $developersRepository->getDeveloperList($page, self::ONPAGE)
        );
    }

    #[Route('/api/get_developer/{developerId}', name: 'app_developers_developers_get_developer_list')]
    public function getDeveloper(
        string $developerId,
        DevelopersRepository $developersRepository
    ): Response
    {
        return $this->json(
            $developersRepository->getDeveloper(intval($developerId))
        );
    }

    #[Route('/api/add_developer', name: 'app_developers_developers_add_developer')]
    public function addDeveloper(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/delete_developer', name: 'app_developers_developers_delete_developer')]
    public function deleteDeveloper(): Response
    {
        return $this->json([]);
    }
}
