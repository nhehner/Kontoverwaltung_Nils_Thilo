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

class PaymentController extends FOSRestController
{
    /**
     * @Rest\Post("/getPayments")
     * @return View
     */
    public function getPayments()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            if (is_array($decoded)) {
                /** @var array $restResult */
                $restResult = $this->getDoctrine()->getRepository('AppBundle:payment')->findAll();

                if ($restResult === null) {
                    return new View("There are no konto exist", Response::HTTP_NOT_FOUND);
                }

                $result = [];

                /** @var payment $payment */
                foreach ($restResult as $payment) {
                    $result[] = [
                        'id' => $payment->getId(),
                        'zahlungsanbieter' => $payment->getZahlungsanbieter(),
                        'beschreibung' => $payment->getBeschreibung(),
                        'logo' => $payment->getLogo(),
                        'api_url' => $payment->getApiUrl()
                    ];

                }
                return new View($result, Response::HTTP_OK);
            } else {
                return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
            }
        }
        return new View("Recieved non valid json data", Response::HTTP_BAD_REQUEST);
    }
}