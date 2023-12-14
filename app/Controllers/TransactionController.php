<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class TransactionController extends ResourceController
{
    public function index($seg1 = null)
    {
        $client = \Config\Services::curlrequest();
        $apiURL = 'http://localhost:8080/pemesananAPI/"' . $seg1;
        $response = $client->request("get", $apiURL, [
            "headers" => [
                "Accept" => "application/json"
            ],
            'debug' => true,
        ]);
        if ($response->getStatusCode() == 200) {
            $data['pemesanan'] = json_decode($response->getBody(), true);
            $data['restoranId'] = session()->get('id');
        }
        return view('transaction', $data);
    }
}