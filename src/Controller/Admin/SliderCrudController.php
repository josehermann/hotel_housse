<?php

namespace App\Controller\Admin;

use Datetime;
use App\Entity\Slider;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SliderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Slider::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('photo')->setUploadDir('public/uploads/img/')->setUploadedFileNamePattern('[timestamp]-[slug]-[contenthash].[extension]')->onlyWhenUpdating()->setFormTypeOptions([
                'required' => false, // Rendre le champ non requis lors de la mise à jour
            ]),
            ImageField::new('photo')->setUploadDir('public/uploads/img/')->setUploadedFileNamePattern('[timestamp]-[slug]-[contenthash].[extension]')->onlyWhenCreating(),
            ImageField::new('photo')->setBasePath('uploads/img/')->hideOnForm(),
            IntegerField::new('ordre', 'Ordre'),
            DateTimeField::new('dateEnregistrement', "Date d'enregistrement")->hideOnForm()->setFormat('dd.MM.yyyy à HH:mm:ss zzz'),
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $slider = new $entityFqcn;
        $slider->setDateEnregistrement(new Datetime());
        return $slider;
    }

}