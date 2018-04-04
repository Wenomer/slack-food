<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends Controller
{
    /**
     * @Route("/", name="index_page")
     */
    public function index()
    {
        var_dump('Hello World');
        die;
    }
}
