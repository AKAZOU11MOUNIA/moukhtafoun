<?php

namespace App\Controller\Admin;

use App\Entity\Reclamations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReclamationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reclamations::class;
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
