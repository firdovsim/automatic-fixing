<?php

namespace App\Controller;

use App\Transformers\UserDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\WebLink\Link;

class DocumentController extends AbstractController
{
    #[Route(
        path: '/document',
        name: 'app_document',
        //        requirements: ['subdomain'],
        //        defaults: ['subdomain' => 'mobile'],
        //        host: '{subdomain}.exchange.com'
    )]
    public function index(Request $request): Response
    {
        $this->generateUrl('app_lucky', [], UrlGeneratorInterface::ABSOLUTE_URL);

        if (! $request->query->has('enable')) {
            throw $this->createNotFoundException('The "enable" query param not given');
        }

        if ($request->isXmlHttpRequest()) {
            return $this->json(['']);
        }

        $response = $this->sendEarlyHints([
            new Link('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css'),
        ]);

        $request->getPreferredLanguage(['en', 'fr']);

        return $this->render('document/index.html.twig', [
            'controller_name' => 'DocumentController',
        ], response: $response);
    }

    #[Route(path: '/documents/legacy', name: 'app_documents_legacy')]
    public function legacyCode(
        #[MapQueryParameter]
        string $documentType,
        #[MapQueryParameter]
        string $language
    ): Response {
        return new JsonResponse([
            'documentType' => $documentType,
            'language' => $language,
        ]);
    }

    #[Route(path: '/documents/users')]
    public function getUsers(
        #[MapQueryString]
        UserDTO $user
    ): JsonResponse {
        return $this->json($user->firstName);
    }
}
