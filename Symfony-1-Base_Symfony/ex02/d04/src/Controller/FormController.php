<?php

namespace App\Controller;

use App\Form\MessageForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    #[Route('/e02', name: 'form_page', methods: ['GET', 'POST'])]
    public function form_page(Request $request): Response
    {
        # Initialisation of the variables
        $error = null;
        $message = null;
        $last_message = null;
        $timestamp = null;

        # Get the path of the log file
        $filePath = $this->getParameter('form_log_file');

        # Create the log file if he does not exist
        if (!file_exists($filePath)) {
            file_put_contents($filePath, '');
        }

        # Get the last message in the log file
        $allMessages = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $last_message = end($allMessages) ?: null;

        # Get the form
        $form = $this->createForm(MessageForm::class);
        $form->handleRequest($request);

        # Check when the user submit the form
        if ($form->isSubmitted() && $form->isValid()) {

            # Get the value of the form
            $data = $form->getData();
            $message = $data['message'];
            $timestamp = $data['timestamp'];

            # Check the text area is not empty
            if (empty($message)) {
                $error = "Error: the message field is mandatory !";
            } 
            
            # Check the timestamp checkbox and write in the log file
              else {
                $entry = ($timestamp === 'yes' ? date('Y-m-d H:i:s') . " - " : '') . $message . PHP_EOL;
                file_put_contents($filePath, $entry, FILE_APPEND);

                # Update de last message
                $last_message = trim($entry);

                return $this->redirectToRoute('form_page');
            }
        }

        # The render with the error message for the user
        return $this->render('form_page.html.twig', [
            'error' => $error,
            'form' => $form->createView(),
            'last_message' => $last_message,
        ]);
    }
}