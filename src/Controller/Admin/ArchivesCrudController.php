<?php

namespace App\Controller\Admin;

use App\Entity\Archives;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArchivesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Archives::class;
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
