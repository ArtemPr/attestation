<?php

declare(strict_types=1);

namespace App\Controller\Questions;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionsController extends AbstractController
{
    #[Route('/api/get_questions', name: 'app_questions_get_questions_list')]
    public function getQuestionsList(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/get_question', name: 'app_questions_get_question_list')]
    public function getQuestion(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/add_question', name: 'app_questions_add_question')]
    public function addQuestion(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/delete_question', name: 'app_questions_delete_question')]
    public function deleteQuestion(): Response
    {
        return $this->json([]);
    }
}
