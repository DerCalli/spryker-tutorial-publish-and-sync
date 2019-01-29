<?php

namespace Pyz\Zed\HelloWorld\Communication\Controller;

use Orm\Zed\HelloWorld\Persistence\SpyHelloWorldMessage;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function indexAction()
    {
        $helloWorldMessage = new SpyHelloWorldMessage();
        $helloWorldMessage->setName('John');
        $helloWorldMessage->setMessage('Hello World');
        $helloWorldMessage->save();

        return $this->jsonResponse([
            'status' => 'success',
        ]);
    }
}
