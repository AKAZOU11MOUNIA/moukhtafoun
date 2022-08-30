<?php

namespace App\Controller\Admin;

use App\Entity\PersonnePerdue;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PersonnePerdueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PersonnePerdue::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
