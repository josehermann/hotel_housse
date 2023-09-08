<?php

namespace App\Controller\Admin;

use App\Entity\Chambre;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChambreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chambre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            TextEditorField::new('description_courte')->onlyOnForms(), 
            TextEditorField::new('description_longue')->onlyOnForms(),
            //* pour la création du produit
            ImageField::new('photo')->setUploadDir('public/uploads/img/')->setUploadedFileNamePattern('[timestamp]-[slug]-[contenthash].[extension]')->onlyWhenCreating(),
            //* affichage des images dans le tableau
            ImageField::new('photo')->setBasePath('uploads/img/')->hideOnForm(),
             //* pour l'update de l'image du produit
             ImageField::new('photo')->setUploadDir('public/uploads/img/')->setUploadedFileNamePattern('[timestamp]-[slug]-[contenthash].[extension]')->onlyWhenUpdating()->setFormTypeOptions([
                'required' => false, // Rendre le champ non requis lors de la mise à jour
            ]),
            MoneyField::new('prix_journalier')->setCurrency('EUR')->setNumDecimals(2),
            
            DateTimeField::new('date_enregistrement')->setFormat('d/M/Y à H:m:s')->hideOnForm(),

            
        ];
    }
    public function createEntity(string $entityFqcn)
    {
        $chambre =new $entityFqcn;
        $chambre->setDateEnregistrement(new \DateTime);
        return $chambre;
    }
    
}
