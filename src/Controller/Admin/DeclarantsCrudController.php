<?php

namespace App\Controller\Admin;

use App\Entity\Declarants;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DeclarantsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Declarants::class;
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
