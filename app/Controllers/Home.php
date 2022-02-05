<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('./template/index');
    }

    public function tambah()
    {
        echo view('./template/tambahpegawai');
    }

    public function login()
    {
        $session = \Config\Services::session();
        if ($this->request->getPost()) {
            $client = \Config\Services::curlRequest();
            $response = $client->request(
                'POST',
                'http://localhost:8080/penerima/login',
                [
                    'auth' => [
                        $this->request->getPost('email'),
                        $this->request->getPost('password'),
                    ],
                ],
            );

            $data = json_decode($response->getJSON());
            $data = json_decode($data, true);
            // dd($data);
            if (isset($data['token'])) {
                $session->token = $data['token'];
                $session->token = $data['email'];
                echo "Your Token Is" . $data['token'] . '<br />';
                echo "Your Token Is" . $data['email'] . '<br />';
            } else {
                echo "Your Email Or Password Is False";
            }
            return redirect()->to('./home/showAll');
        }
        echo view('./template/login');
    }

    public function showAll()
    {
        $session = \Config\Services::session();
        $client = \Config\Services::curlRequest();
        $response = $client->request(
            'GET',
            'http://localhost:8080/penerima/',
            [
                'headers' => [
                    'authorization' => 'Bearer ' . $session->token,
                ],

                'body' => [
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'nama' => $this->request->getPost('nama'),
                ]
            ],
        );

        $data = json_decode($response->getJSON());
        $data = json_decode($data, true);
        // dd($data);
        $dataPenerima =
            [
                'data' => $data,
            ];

        echo view('./template/index', $dataPenerima);
    }

    public function create()
    {
        $session = \Config\Services::session();
        $request = \Config\Services::request();
        if ($request->getPost()) {
            // dd($request->getPost());
            $client = \Config\Services::curlRequest();
            $response = $client->request(
                'POST',
                'http://localhost:8080/penerima/create',
                [
                    'header' => [
                        'authorization' => 'Bearer ' . $session->token,
                    ],

                    'form_params' => [
                        'email' => $request->getPost('email'),
                        'password' => $request->getPost('password'),
                        'nama' => $request->getPost('nama'),
                    ]
                ],
            );

            $data = json_decode($response->getJSON());
            $data = json_decode($data, true);
            return redirect()->to('home/showAll');
        }
        echo view('./template/tambahpegawai');
    }

    public function update($id = null)
    {
        $session = \Config\Services::session();
        $request = \Config\Services::request();
        $client = \Config\Services::curlrequest();
        $response = $client->request(
            'GET',
            'http://localhost:8080/penerima/' . $id,
            [
                'header' => [
                    'authorization' => 'Bearer ' . $session->token,
                ],

                'body' => [
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'nama' => $this->request->getPost('nama'),
                ]
            ],
        );

        $data = json_decode($response->getJSON());
        $data = json_decode($data, true);

        $dataPenerima = [
            'data' => $data[0],
        ];

        if ($request->getPost()) {
            // dd($request->getPost());


            $response = $client->request(
                'PUT',
                'http://localhost:8080/penerima/' . $id,
                [
                    'header' => [
                        'authorization' => 'Bearer ' . $session->token,
                    ],

                    'form_params' => [
                        'email' => $request->getPost('email'),
                        'password' => $request->getPost('password'),
                        'nama' => $request->getPost('nama'),
                    ]
                ],
            );

            $data = json_decode($response->getJSON());
            $data = json_decode($data, true);
            return redirect()->to('home/showAll');
        }

        // dd($data);
        echo view('./template/editpegawai', $dataPenerima);
    }

    public function delete($id = null)
    {
        $session = \Config\Services::session();
        if ($id != null) {
            $client = \Config\Services::curlRequest();
            $response = $client->request(
                'DELETE',
                'http://localhost:8080/penerima/' . $id,
                [
                    'header' => [
                        'authorization' => 'Bearer ' . $session->token,
                    ],
                ],
            );
        }
        return redirect()->to('home/showAll');
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('home/login');
    }
}
