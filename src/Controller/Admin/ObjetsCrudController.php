<?php

namespace App\Controller\Admin;

use App\Entity\Objets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ObjetsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Objets::class;
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
