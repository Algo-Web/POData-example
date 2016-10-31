<?php
namespace PODataExample;

use POData\OperationContext\ServiceHost;
use POData\SimpleDataService;
use POData\OperationContext\Web\Illuminate\IlluminateOperationContext as OperationContextAdapter;
use PODataExample\RequestAdapter;
use PODataExample\QueryProvider;
use PODataExample\models\MetadataProvider;
use PODataExample\models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// DB Connection

class router{
public function route($request = null){
$dsn = 'mysql:dbname=odata;host=127.0.0.1';
$user = 'root';
$password = "rhinoplasty";
$db = new \PDO($dsn, $user, $password);

// Realisation of QueryProvider
$db->queryProviderClassName = "\\PODataExample\\SimpleQueryProvider";

// Controller
if(null == $request){
    $request = Request::capture();
}
$op = new OperationContextAdapter($request);
$host = new ServiceHost($op,$request);
$host->setServiceUri("/odata.svc/");
$service = new SimpleDataService($db, MetadataProvider::create());
$service->setHost($host);
$service->handleRequest();
$odataResponse = $op->outgoingResponse();
/*
// Headers for response
foreach ($odataResponse->getHeaders() as $headerName => $headerValue) {
    if (!is_null($headerValue)) {
        header($headerName . ": " . $headerValue);
    }
}

// Body of response
return $odataResponse->getStream();*/
 $content = $odataResponse->getStream();
        $response = new Response($content, 200);

        foreach ($odataResponse->getHeaders() as $headerName => $headerValue) {
            if (!is_null($headerValue)) {
                $response->headers->set($headerName, $headerValue);
            }
        }
        return $response;
}
}


