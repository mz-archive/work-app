<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Articles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Article controller.
 *
 * @Route("/")
 */
class ArticlesController extends Controller
{
    /**
     * Lists all article entities.
     *
     * @Route("/", name="_index")
     * @Method("GET")
     */
    public function indexAction(String $tag="")
    {
        $em = $this->getDoctrine()->getManager();
        $conn = $this->getDoctrine()->getConnection();

        $articles = $em->getRepository('AppBundle:Articles');
        $authors = $em->getRepository('AppBundle:Authors');

        if (empty($tag)) {
            $articles = $articles->findAll();

            foreach ($articles as $article) {
                $authorId = $article->getAuthor()->getId();
                $author = $authors->findOneBy(['id' => $authorId]);
                $authorName = $author->getName();
                $authorEmail = $author->getEmail();
                $article->setAuthor([$authorName, $authorEmail]);
                $tags = explode(' ',trim($article->getTags()));

                $article->setTags($this->convertTags($tags));

            }
        }
        else {
            // Быстрый вариант, по-хорошему надо было создать отдельную таблицу под теги =(
            $sql = "SELECT * FROM articles WHERE LOCATE('".$tag ."', tags);";
            $res = $conn->prepare($sql);
            $res->execute();
            $articles = $res->fetchAll();

            foreach ($articles as  $k => $article) {
                $author = $authors->findOneBy(['id' => $article['author']]);
                $authorName = $author->getName();
                $authorEmail = $author->getEmail();
                $articles[$k]['author'] = [$authorName, $authorEmail];
                $tags = explode(' ',trim($article['tags']));
                $articles[$k]['tags'] = $this->convertTags($tags);
            }

        }

        return $this->render('articles/index.html.twig', array(
            'articles' => $articles,
        ));
    }

    /**
     * Finds and displays a article entity.
     *
     * @Route("/{id}", name="_show")
     * @Method("GET")
     */
    public function showAction(Articles $article)
    {

        return $this->render('articles/show.html.twig', array(
            'article' => $article,
        ));
    }

    /**
     * Apply filter for articles.
     *
     * @Route("/tags/{tag}", name="_tfilter")
     * @Method("GET")
     */
    public function tagFilter(String $tag)
    {
       return $this->indexAction($tag);
    }

    /**
     * @param array $tags
     * @return array|string
     */
    public function convertTags(Array $tags)
    {
        foreach ($tags as $k => $tag) {
            $tags[$k] = trim('<a href="/tags/'.$tag.'">'.$tag.'</a> ');
        }

        $tags = implode(' ',$tags);

        return $tags;
    }
}
