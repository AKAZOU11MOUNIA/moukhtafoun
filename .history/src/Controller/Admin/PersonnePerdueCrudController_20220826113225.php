<?php

namespace App\Controller\Admin;

use App\Entity\PersonnePerdue;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PersonnePerdueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PersonnePerdue::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('start')
                ->setFormat('Y-MM-dd'),
            DateTimeField::new('stop')
                ->setFormat('Y-MM-dd'),
        ];
    }
    
}
