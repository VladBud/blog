<?php
// src/BlogBundle/Controller/AdminController.php
namespace BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
class AdminController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function adminAction()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('BlogBundle:Post')->findAll();

        return $this->render('post/admin.html.twig', array(
            'posts' => $posts,
        ));
    }

    private function createDeleteForm(Post $post)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('post_delete', array('id' => $post->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}