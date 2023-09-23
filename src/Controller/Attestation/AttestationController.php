<?php

declare(strict_types=1);

namespace App\Controller\Attestation;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttestationController extends AbstractController
{
    #[Route('/api/get_attestations', name: 'app_attestation_get_attestations_list')]
    public function getAttestationsList(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/get_attestation', name: 'app_attestation_get_attestation_list')]
    public function getAttestation(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/add_attestation', name: 'app_attestation_add_attestation')]
    public function addAttestation(): Response
    {
        return $this->json([]);
    }

    #[Route('/api/delete_attestation', name: 'app_attestation_delete_attestation')]
    public function deleteAttestation(): Response
    {
        return $this->json([]);
    }
}
