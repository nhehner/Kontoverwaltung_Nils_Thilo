<?php

namespace AppBundle\Controller;

use AppBundle\Entity\konto;
use AppBundle\Entity\transaction;
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
    public function getKontoById()
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
     * @Rest\Post("/getTransactionInformation")
     * @return View
     */
    public function getTransactionInformation()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            if (is_array($decoded)) {
                /** @var array $restResult */
                $restResult = $this->getDoctrine()
                    ->getRepository('AppBundle:konto')
                    ->findTransactionsForKonto($decoded['kontoId']);

                if (empty($restResult)) {
                    return new View("There does not exists transaction", Response::HTTP_NOT_FOUND);
                }

                $result = [];

                /** @var transaction $transactions */
                foreach ($restResult as $transactions) {
                    $result[] = [
                        'id' => $transactions->getId(),
                        'erstellDatum' => $transactions->getErstellDatum(),
                        'zielIban' => $transactions->getZielIban(),
                        'zielBic' => $transactions->getZielBic(),
                        'zielInhaber' => $transactions->getZielInhaber(),
                        'betrag' => $transactions->getBetrag(),
                        'addInfos' => $transactions->getAddInfos(),
                        'payment' => $transactions->getTransactionPayment()->getZahlungsanbieter()
                    ];

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

                $konto = new konto();
                $konto->setBeschreibung($decoded['beschreibung']);
                $konto->setIban($decoded['iban']);
                $konto->setBic($decoded['bic']);
                $konto->setInhaber($decoded['inhaber']);
                $konto->setGuthaben(0.00);
                $konto->setAktiv(false);
                $konto->setKreditkarte($decoded['kreditkarte']);
                $konto->setGueltigBis(new DateTIme($decoded['gueltigBis']));

                /** @var user|null $restResult */
                $user = $this->getDoctrine()->getRepository('AppBundle:user')->find($decoded['userId']);

                $user->setKontos($konto);

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->persist($konto);

                $em->flush();

                return new View('Successfully created', Response::HTTP_OK);
            } else {
                return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
            }
        }
        return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
    }
}