<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;

class UserController extends FOSRestController
{
    /**
     * @Rest\Post("/login")
     * @return View
     */
    public function loginAction()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            if (is_array($decoded)) {
                /** @var user|null $restResult */
                $restResult = $this->getDoctrine()->getRepository('AppBundle:user')->findOneBy(['benutzername' => $decoded['username']]);

                if ($restResult === null) {
                    return new View("There are no users exist", Response::HTTP_NOT_FOUND);
                }

                if ($restResult->getPasswort() === $decoded['password']) {
                    return new View($restResult->getId(), Response::HTTP_OK);
                } else {
                    return new View("Something went wrong, please try again", Response::HTTP_BAD_REQUEST);
                }
            } else {
                return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
            }
        }
        return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
    }

    /**
     * @Rest\Post("/register")
     * @return View
     */
    public function registerAction()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            if (is_array($decoded)) {
                /** @var user|null $restResult */
                $restResult = $this->getDoctrine()->getRepository('AppBundle:user')->findOneBy(['benutzername' => $decoded['username']]);
                if ($restResult !== null) {
                    return new View("There exists already a user with this username", Response::HTTP_BAD_REQUEST);
                }

                /** @var user|null $restResult */
                $restResult = $this->getDoctrine()->getRepository('AppBundle:user')->findOneBy(['email' => $decoded['email']]);
                if ($restResult !== null) {
                    return new View("There exists already a user with this email", Response::HTTP_BAD_REQUEST);
                }

                $date = new \DateTime($decoded['birthday']);

                $data = new user();
                $data->setVorname($decoded['firstname']);
                $data->setNachname($decoded['lastname']);
                $data->setGeburtstag(!empty($date) ? $date : new \DateTime("0000-00-00 00-00"));
                $data->setBenutzername($decoded['username']);
                $data->setPasswort($decoded['password']);
                $data->setEmail($decoded['email']);
                $data->setAvatar('/');
                $data->setRole($this->getDoctrine()->getRepository('AppBundle:role')->findOneBy(['name' => 'guest']));

                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->flush();

                /** @var user $restResult */
                $restResult = $this->getDoctrine()->getRepository('AppBundle:user')->findOneBy(['email' => $decoded['email']]);
                if ($restResult === null) {
                    return new View("Something went wrong, please try again.", Response::HTTP_BAD_REQUEST);
                }

                return new View($restResult->getId(), Response::HTTP_OK);
            } else {
                return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
            }
        }
        return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
    }

    /**
     * @Rest\Put("/user/{id}")
     */
    public function updateAction($id, Request $request)
    {
        $data = new User;
        $name = $request->get('name');
        $role = $request->get('role');
        $sn = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        if (empty($user)) {
            return new View("user not found", Response::HTTP_NOT_FOUND);
        } elseif (!empty($name) && !empty($role)) {
            $user->setName($name);
            $user->setRole($role);
            $sn->flush();
            return new View("User Updated Successfully", Response::HTTP_OK);
        } elseif (empty($name) && !empty($role)) {
            $user->setRole($role);
            $sn->flush();
            return new View("role Updated Successfully", Response::HTTP_OK);
        } elseif (!empty($name) && empty($role)) {
            $user->setName($name);
            $sn->flush();
            return new View("User Name Updated Successfully", Response::HTTP_OK);
        } else return new View("User name or role cannot be empty", Response::HTTP_NOT_ACCEPTABLE);
    }

    /**
     * @Rest\Delete("/user/{id}")
     */
    public function deleteAction($id)
    {
        $data = new User;
        $sn = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        if (empty($user)) {
            return new View("user not found", Response::HTTP_NOT_FOUND);
        } else {
            $sn->remove($user);
            $sn->flush();
        }
        return new View("deleted successfully", Response::HTTP_OK);
    }
}