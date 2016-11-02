<?php
namespace PODataExample\models;

use POData\Providers\Metadata\Type\EdmPrimitiveType;
use POData\Providers\Metadata\SimpleMetadataProvider;
use PODataExample\models\Product;
use POData\Providers\Metadata\ResourceStreamInfo;

class MetadataProvider
{
    const MetaNamespace = "Data";

    /**
     * Description of service
     *
     * @return IMetadataProvider
     */
    public static function create()
    {
        $metadata = new SimpleMetadataProvider('Data', self::MetaNamespace);
	$staffEntity = self::createStaffEntityType($metadata);
        $customerEntity = self::createCustomerEntityType($metadata);
        $photoEntity = self::createPhotoEntityType($metadata);

        $staffResourceSet = $metadata->addResourceSet('staff', $staffEntity);
        $customerResourceSet = $metadata->addResourceSet('customer', $customerEntity);
        $photoResourceSet = $metadata->addResourceSet('photo', $photoEntity);

        $metadata->addResourceReferenceProperty($staffEntity, "partner", $staffResourceSet);
        $metadata->addResourceSetReferenceProperty($staffEntity, "customers", $customerResourceSet);
	$metadata->addResourceReferenceProperty($customerEntity,"staff",$staffResourceSet);


        return $metadata;
    }

    /**
     * Describtion of Staff
     */
    private static function createStaffEntityType(SimpleMetadataProvider $metadata)
    {
        $et = $metadata->addEntityType(new \ReflectionClass('PODataExample\models\staff'), 'staff', self::MetaNamespace);

        $metadata->addKeyProperty($et, 'id', EdmPrimitiveType::INT32); 
        $metadata->addPrimitiveProperty($et, 'name', EdmPrimitiveType::STRING);
//        $metadata->addPrimitiveProperty($et, 'partner', EdmPrimitiveType::INT32);

        return $et;
    }

    /**
     * Describtion of Customer
     */
    private static function createCustomerEntityType(SimpleMetadataProvider $metadata)
    {
        $et = $metadata->addEntityType(new \ReflectionClass('PODataExample\models\customer'), 'customer', self::MetaNamespace);

        $metadata->addKeyProperty($et, 'id', EdmPrimitiveType::INT32);
        $metadata->addPrimitiveProperty($et, 'name', EdmPrimitiveType::STRING);

        return $et;
    }

    /**
     * Describtion of Photo
     */
    private static function createPhotoEntityType(SimpleMetadataProvider $metadata)
    {
        $et = $metadata->addEntityType(new \ReflectionClass('PODataExample\models\photo'), 'photo', self::MetaNamespace);

        $metadata->addKeyProperty($et, 'id', EdmPrimitiveType::INT32);
        $et->setMediaLinkEntry(true);
//        $streamInfo = new ResourceStreamInfo('Content');
//        $et->addNamedStream($streamInfo);
        return $et;
    }



}
