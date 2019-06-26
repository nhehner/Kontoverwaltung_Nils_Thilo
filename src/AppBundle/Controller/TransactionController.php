<?php

namespace AppBundle\Controller;

use AppBundle\Entity\konto;
use AppBundle\Entity\payment;
use AppBundle\Entity\transaction;
use AppBundle\Entity\user;
use DateTime;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class TransactionController extends FOSRestController
{
    /**
     * @Rest\Post("/createTransaction")
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
                $transaction = new transaction();
                $transaction->setErstellDatum(new DateTime('now'));
                $transaction->setZielIban($decoded['ziel_iban']);
                $transaction->setZielBic($decoded['ziel_bic']);
                $transaction->setZielInhaber($decoded['ziel_inhaber']);
                $transaction->setBetrag($decoded['betrag']);
                $transaction->setAddInfos($decoded['add_infos']);

                /** @var user|null $user */
                $user = $this->getDoctrine()->getRepository('AppBundle:user')->find($decoded['userId']);
                $user->setTransactions($transaction);

                /** @var konto|null $konto */
                $konto = $this->getDoctrine()->getRepository('AppBundle:konto')->findby(['konto' => $decoded['userId']]);
                $konto->setTransaction($transaction);

                /** @var payment|null $payment */
                $payment = $this->getDoctrine()->getRepository('AppBundle:payment')->find($decoded['paymentId']);
                $payment->setTransaction($transaction);

                $em = $this->getDoctrine()->getManager();
                $em->persist($transaction);
                $em->persist($user);
                $em->persist($konto);
                $em->persist($payment);
                $em->flush();

                return new View('Successfully created', Response::HTTP_OK);
            } else {
                return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
            }
        }
        return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
    }
}