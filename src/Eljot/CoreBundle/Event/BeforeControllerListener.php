<?php
namespace Eljot\CoreBundle\Event;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Bundle\TwigBundle\Controller\ExceptionController;
use Eljot\CoreBundle\Model\InitializableControllerInterface;
use Symfony\Component\DependencyInjection\Container;

class BeforeControllerListener
{
    /**
     * @var Container
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();
        if (!is_array($controller)) {
            return;
        }

        $controllerObject = $controller[0];

        if ($controllerObject instanceof ExceptionController) {
            return;
        }

        if ($event->getRequestType() == HttpKernelInterface::SUB_REQUEST) {
            return;
        }

        if ($controllerObject instanceof InitializableControllerInterface) {
            $controllerObject->initialize($event->getRequest(), $this->container);
        }
    }
}