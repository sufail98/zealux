<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class QrCodeController extends Controller
{
    public function index()
    {
        return view('qr_code_form');
    }

    public function generate()
    {
        $text = $this->request->getGet('text');

        if ($text) {
            $qrCode = Builder::create()
                ->writer(new PngWriter())
                ->data($text)
                ->size(280)
                ->margin(10)
                ->build();

            return $this->response
                ->setHeader('Content-Type', $qrCode->getMimeType())
                ->setBody($qrCode->getString());
        } else {
            return 'No text provided';
        }
    }

    // public function GpayQrgenerate()
    // {
    //     $text = $this->request->getGet('text');

    //     if ($text) {
    //         // Path to your GPay logo
    //         $logoPath = FCPATH . 'images/gpay1.png'; // Ensure the logo exists at this path

    //         $qrCode = Builder::create()
    //             ->writer(new PngWriter())
    //             ->data($text)
    //             ->size(300)
    //             ->margin(10)
    //             ->logoPath($logoPath) // Add the logo here
    //             ->logoResizeToWidth(100) // Resize the logo to fit in the center
    //             ->logoResizeToHeight(100)
    //             ->build();

    //         return $this->response
    //             ->setHeader('Content-Type', $qrCode->getMimeType())
    //             ->setBody($qrCode->getString());
    //     } else {
    //         return $this->response
    //             ->setStatusCode(400)
    //             ->setBody('No text provided');
    //     }
    // }
}
