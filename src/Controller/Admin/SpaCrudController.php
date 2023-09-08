<?php

namespace App\Controller\Admin;

use App\Entity\Spa;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SpaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Spa::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            ImageField::new('photo')->setUploadDir('public/uploads/img/')->setUploadedFileNamePattern('[timestamp]-[slug]-[contenthash].[extension]')->onlyWhenUpdating()->setFormTypeOptions([
                'required' => false, // Rendre le champ non requis lors de la mise à jour
            ]),
            ImageField::new('photo')->setUploadDir('public/uploads/img/')->setUploadedFileNamePattern('[timestamp]-[slug]-[contenthash].[extension]')->onlyWhenCreating(),
            TextEditorField::new('description')->onlyOnForms(),
            MoneyField::new('prix')->setCurrency('EUR')->setNumDecimals(2),
        ];
    }
    

    public function createEntity(string $entityFqcn)
    {
        $spa =new $entityFqcn;
        $spa->setDateEnregistrement(new \DateTime);
        return $spa;
    }
    
}
