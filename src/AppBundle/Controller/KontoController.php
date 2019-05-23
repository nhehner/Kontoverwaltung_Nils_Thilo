<?php

namespace AppBundle\Controller;

use AppBundle\Entity\konto;
use AppBundle\Entity\user;
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
     */
    public function createKonto()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            if (is_array($decoded)) {
                /** @var user|null $restResult */
                $restResult = $this->getDoctrine()->getRepository('AppBundle:konto')->findOneBy(['userId' => $decoded['userId'], 'iban' => $decoded['iban']]);

                if ($restResult !== null) {
                    return new View("There are no konto exist", Response::HTTP_NOT_FOUND);
                }

                $result = [];
                $data = new konto();

                $data->setBeschreibung($decoded['beschreibung']);
                $data->setIban($decoded['iban']);
                $data->setBic($decoded['bic']);
                $data->setInhaber($decoded['inhaber']);
                $data->setKreditkarte($decoded['kreditkarte']);
                $data->setGueltigBis($decoded['gueltigBis']);

                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->flush();

                $restResult->setKontos($data);

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
}