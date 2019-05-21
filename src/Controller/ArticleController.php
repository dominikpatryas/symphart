<?php

namespace App\Controller;

use App\Entity\Aricle;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method; 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ArticleController extends Controller {
/**
 * @Route("/")
 * @Method({"GET"})
 */

    public function index()
    {
        $articles = $this->getDoctrine()->getRepository(Aricle::class)->findAll();

        return $this->render('articles/index.html.twig', array('articles' => $articles));
    }


/**
 * @Route("/article/{id}", name="article_show")
 */

    public function show($id) {
        $article = $this->getDoctrine()->getRepository(Aricle::class)->find($id);

        return $this->render('articles/show.html.twig', array('article' => $article));
    }




    // /**
    //  *  @Route("/article/save")
    //  */
    // public function save() {
    //     $entityManager = $this->getDoctrine()->getManager();

    //     $article = new Aricle();

    //     $article->setTitle('Aricle 2');
    //     $article->setBody('This is body for the aricle one');

    //     $entityManager->persist($article);

    //     $entityManager->flush();

    //     return new Response('Saved an article with the id of' . $article->getId());
    // }
}

?>