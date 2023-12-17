<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class TransactionController extends ResourceController
{
    public function pemesanan()
    {
        $client = \Config\Services::curlrequest();
        $apiURL = 'http://localhost:8080/pemesananAPI/' . session()->get('restoranId') . '?username=customer1&password=password';
        $response = $client->request("get", $apiURL, [
            "headers" => [
                "Accept" => "application/json"
            ],
            'debug' => true,
        ]);
        if ($response->getStatusCode() == 200) {
            $data['pemesanan'] = json_decode($response->getBody(), true);
        }

        // return $this->respond($data, 200);
        return view('transaction', $data);
    }
}
