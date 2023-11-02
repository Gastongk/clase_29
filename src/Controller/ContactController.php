<?php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Form\ContactFormType;

class ContactController extends AbstractController
{
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
             $email = (new Email())
                ->from($data['email'])
                ->to('admin@example.com')
                ->subject('Nuevo mensaje de contacto')
                ->text($data['message']);

            $mailer->send($email);

             $this->addFlash('success', '¡Mensaje enviado con éxito!');

              return $this->redirectToRoute('app_home');
        }

        return $this->render('contact/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
