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

$r = new router();
$response = $r->route();
echo $response;

