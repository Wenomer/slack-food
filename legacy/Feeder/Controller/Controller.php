<?php
namespace Feeder\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class Controller
{
    public function jsonResponse(array $data)
    {
        return $this->response(\GuzzleHttp\json_encode($data));
    }

    public function response($data)
    {
        return new Response($data);
    }

    public function getPost(Request $request, $key)
    {
        $content = $request->getContent();

        if (empty($content)) {
            throw new BadRequestHttpException('Content is empty');
        }

        $data  = \GuzzleHttp\json_decode($content, true);

        return $data[$key];
    }
}