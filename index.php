<?php
namespace PODataExample;
require(__DIR__ . '/vendor/autoload.php');

use POData\OperationContext\ServiceHost;
use POData\SimpleDataService;
use POData\OperationContext\Web\Illuminate\IlluminateOperationContext as OperationContextAdapter;
use PODataExample\RequestAdapter;
use PODataExample\QueryProvider;
use PODataExample\models\MetadataProvider;
use PODataExample\models\Product;
use Illuminate\Http\Request;
// DB Connection
$dsn = 'mysql:dbname=odata;host=127.0.0.1';
$user = 'root';
$password = "rhinoplasty";
$db = new \PDO($dsn, $user, $password);

// Realisation of QueryProvider
$db->queryProviderClassName = "\\PODataExample\\SimpleQueryProvider";

// Controller
$request = Request::capture();
$op = new OperationContextAdapter($request);
$host = new ServiceHost($op,$request);
$host->setServiceUri("/odata.svc/");
$service = new SimpleDataService($db, MetadataProvider::create());
$service->setHost($host);
$service->handleRequest();
$odataResponse = $op->outgoingResponse();

// Headers for response
foreach ($odataResponse->getHeaders() as $headerName => $headerValue) {
    if (!is_null($headerValue)) {
        header($headerName . ": " . $headerValue);
    }
}

// Body of response
echo $odataResponse->getStream();
