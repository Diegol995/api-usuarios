<?php

use App\Domain\Entity\User;
use Doctrine\ORM\Mapping\ClassMetadata;

$metadata->setPrimaryTable(['name' => 'users']);
$metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_AUTO);

$metadata->mapField(['id' => true, 'fieldName' => 'id', 'type' => 'integer']);
$metadata->mapField(['fieldName' => 'name', 'type' => 'string', 'length' => 100]);
$metadata->mapField(['fieldName' => 'email', 'type' => 'string', 'length' => 150]);
$metadata->mapField(['fieldName' => 'createdAt', 'type' => 'datetime_immutable']);
