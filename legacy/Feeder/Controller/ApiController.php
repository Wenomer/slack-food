<?php
namespace Feeder\Controller;

use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller
{
    public function boundAction(Request $request)
    {
        return $this->jsonResponse(['challenge' => $this->getPost($request, 'challenge')]);
    }

    public function interactAction(Request $request)
    {
        return $this->jsonResponse(['text' => 'interact']);
    }

    public function loadOptionsAction(Request $request)
    {
        return $this->jsonResponse(['challenge' => $this->getPost($request, 'challenge')]);
    }
}