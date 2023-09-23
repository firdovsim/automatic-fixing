<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\Types\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    #[Route('/task', name: 'app_task')]
    public function index(Request $request, FormFactoryInterface $formFactory): Response
    {
        $task = new Task();
        $task->setTask('Pay taxes');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $formFactory->createNamed('tasks', TaskType::class, $task, [
            'action' => '/task',
            'method' => 'GET',
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            return $this->redirectToRoute('app_task');
        }

        return $this->render('task/index.html.twig', [
            'form' => $form,
        ]);
    }
}
