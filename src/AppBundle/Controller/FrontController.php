<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller
{
	/**
	 * @Route("/base")
	 * @Method("GET")
	 */
	public function frontPageAction()
	{
		$repo = $this->getDoctrine()->getRepository(User::class);
		$users = $repo->findAll();

		return $this->render('default/list.html.twig', [
			'root_uri' => 'http://localhost:8000/',
			'users' => $users
		]);
	}

	/**
	 * @Route("/base/input")
	 * @Method("GET")
	 */
	public function inputAction()
	{
		return $this->render('default/input.html.twig', [
			'root_uri' => 'http://localhost:8000/'
		]);
	}

	/**
	 * @Route("/base/update/{id}")
	 * @Method("GET")
	 */
	public function updateAction($id)
	{
		$manager = $this->getDoctrine()->getManager();
		$user = $manager->getRepository(User::class)->find((int)$id);

		if (!$user) {
			throw $this->createNotFoundException(
				sprintf("User with ID: %d not found.", (int)$id)
			);
		}

		return $this->render('default/update.html.twig', [
			'root_uri' => 'http://localhost:8000/',
			'user' => $user
		]);
	}
}