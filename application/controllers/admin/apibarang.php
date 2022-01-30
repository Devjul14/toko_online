
<?php

use chriskacerguis\RestServer\RestController;

class Apibarang extends RestController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $this->response([
            'status' => true,
            'data' => 'ini test api'
        ], RestController::HTTP_OK);
    }
}
