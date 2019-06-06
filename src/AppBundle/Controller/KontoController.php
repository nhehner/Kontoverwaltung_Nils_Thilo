<?php

namespace AppBundle\Controller;

use AppBundle\Entity\konto;
use AppBundle\Entity\user;
use DateTime;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class KontoController extends FOSRestController
{
    /**
     * @Rest\Post("/getKontoById")
     * @return View
     */
    public function getKontoByIdAction()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            if (is_array($decoded)) {
                /** @var array $restResult */
                $restResult = $this->getDoctrine()->getRepository('AppBundle:user')->findBy(['id' => $decoded['userId']]);

                if ($restResult === null) {
                    return new View("There are no konto exist", Response::HTTP_NOT_FOUND);
                }

                $result = [];

                /** @var user $user */
                foreach ($restResult as $user) {
                    /** @var konto $konto */
                    foreach ($user->getKontos() as $konto) {
                        $result[] = [
                            'id' => $konto->getId(),
                            'guthaben' => $konto->getGuthaben(),
                            'beschreibung' => $konto->getBeschreibung(),
                            'iban' => $konto->getIban(),
                            'bic' => $konto->getBic(),
                            'inhaber' => $konto->getInhaber(),
                            'kreditkarte' => $konto->getKreditkarte(),
                            'gueltigBis' => $konto->getGueltigBis()->format('m/Y'),
                            'aktiv' => $konto->getAktiv()
                        ];
                    }
                }
                return new View($result, Response::HTTP_OK);
            } else {
                return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
            }
        }
        return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
    }

    /**
     * @Rest\Post("/createKonto")
     * @return View
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function createKonto()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            if (is_array($decoded)) {
                /** @var konto $restResult */
                $restResult = $this->getDoctrine()
                    ->getRepository('AppBundle:konto')
                    ->findOneByIbanJoinedToUser($decoded['userId'], $decoded['iban']);

                if (!empty($restResult)) {
                    return new View("There already exists a konto", Response::HTTP_NOT_FOUND);
                }

                $data = new konto();
                $data->setBeschreibung($decoded['beschreibung']);
                $data->setIban($decoded['iban']);
                $data->setBic($decoded['bic']);
                $data->setInhaber($decoded['inhaber']);
                $data->setGuthaben(0.00);
                $data->setAktiv(false);
                $data->setKreditkarte($decoded['kreditkarte']);
                $data->setGueltigBis(new DateTIme($decoded['gueltigBis']));
                
                /** @var user|null $restResult */
                $user = $this->getDoctrine()->getRepository('AppBundle:user')->find($decoded['userId']);

                $user->setKontos($data);

                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->persist($user);
                $em->flush();

                return new View('Successfully created', Response::HTTP_OK);
            } else {
                return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
            }
        }
        return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
    }
}