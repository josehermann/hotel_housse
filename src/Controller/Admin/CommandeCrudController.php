<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use App\Form\ReservationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
            DateTimeField::new('date_arrivee')->setFormat('d/M/Y à H:m:s')->hideOnForm(),
            DateTimeField::new('date_depart')->setFormat('d/M/Y à H:m:s')->hideOnForm(),
            MoneyField::new('prix_totale')->setCurrency('EUR')->setNumDecimals(2),
            TextField::new('prenom', 'Prénom'),
            TextField::new('nom', 'Nom'),
            IntegerField::new('téléphone', 'Téléphone'),
            TextField::new('email', 'E-mail'),
            DateTimeField::new('dateEnregistrement', "Date d'enregistrement")->hideOnForm()->setFormat('dd.MM.yyyy à HH:mm:ss zzz'),
        ];
    }


   
}

    

