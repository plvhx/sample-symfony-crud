<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FooController extends Controller
{
	/**
	 * @Route("/data/insert", name="insert_data")
	 * @Method("POST")
	 */
	public function insertAction(Request $request)
	{
		$manager = $this->getDoctrine()->getManager();
		$user = new User;
		$user->setFirstName($request->get('first-name'));
		$user->setMiddleName($request->get('middle-name'));
		$user->setLastName($request->get('last-name'));
		$manager->persist($user);
		$manager->flush();

		return new RedirectResponse('http://localhost:8000/base');
	}

	/**
	 * @Route("/data/update/{id}", name="update_data")
	 * @Method("POST")
	 */
	public function updateAction(Request $request, $id)
	{
		$manager = $this->getDoctrine()->getManager();
		$user = $manager->getRepository(User::class)->find((int)$id);

		if (!$user) {
			throw $this->createNotFoundException(
				sprintf("User with ID: %d not found.", (int)$id)
			);
		}

		$user->setFirstName($request->get('first-name'));
		$user->setMiddleName($request->get('middle-name'));
		$user->setLastName($request->get('last-name'));

		$manager->flush();

		return new RedirectResponse('http://localhost:8000/base');
	}

	/**
	 * @Route("/data/delete/{id}", name="delete_data")
	 * @Method("GET")
	 */
	public function deleteAction(Request $request, $id)
	{
		$manager = $this->getDoctrine()->getManager();
		$user = $manager->getRepository(User::class)->find((int)$id);

		if (!$user) {
			throw $this->createNotFoundException(
				sprintf("User with ID: %d not found.", (int)$id)
			);
		}

		$manager->remove($user);
		$manager->flush();

		return new RedirectResponse('http://localhost:8000/base');
	}
}