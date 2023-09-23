<?php

declare(strict_types=1);

namespace App\Controller\Type;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeController extends AbstractController
{
    #[Route('/api/get_types', name: 'app_type_get_types_list')]
    public function getQuestionsList(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/get_type', name: 'app_type_get_type_list')]
    public function getQuestion(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/add_type', name: 'app_type_add_type')]
    public function addQuestion(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/delete_type', name: 'app_type_delete_type')]
    public function deleteQuestion(): Response
    {
        return $this->json([]);
    }
}
