<?php

namespace Eljot\CoreBundle\Service\Email;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Bundle\TwigBundle\TwigEngine as Templating;
use Inhouse\MigrationBundle\Entity\Template;
use Doctrine\ORM\EntityManager;

use \Swift_Mailer;

class EmailManager
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var Templating
     */
    private $templating;

    public function __construct(EntityManager $em, Swift_Mailer $mailer, Router $router, Templating $templating)
    {
        $this->em = $em;
        $this->mailer = $mailer;
        $this->router = $router;
        $this->templating = $templating;
    }

    public function setSenderEmail($sender)
    {
        $this->sender = $sender;
    }

    /**
     * Example function to send an email
     */
    public function sendMigrationSuccessEmail($user)
    {
//        $repository = $this->em->getRepository('InhouseMigrationBundle:Template');
//        $template = $repository->findEmailTemplateByName(Template::MIGRATION_SUCCESS_EMAIL);
//        $this->send($template->getTitle(), $user, $template->getContent());
    }

    private function send($subject, $recipient, $template)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setTo($recipient)
            ->setFrom($this->sender)
            ->setBody($template, 'text/html');

        return $this->mailer->send($message);
    }
}