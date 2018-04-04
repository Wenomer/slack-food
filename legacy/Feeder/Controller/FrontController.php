<?php
namespace Feeder\Controller;

class FrontController extends Controller
{
    public function indexAction()
    {
        return $this->response('Hello slack-food');
    }
}