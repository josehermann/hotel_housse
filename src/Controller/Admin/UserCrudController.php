<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudController extends AbstractCrudController
{
    public function __construct(public UserPasswordHasherInterface $hasher)
    {

    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email', 'E-mail'),
            TextField::new('prenom', 'Prénom'),
            TextField::new('nom', 'Nom de famille'),
            TextField::new('adresse'),
            TextField::new('ville'),
            IntegerField::new('codePostal', 'Code Postal'),
            TextField::new('password', 'Mot de passe')->setFormType(PasswordType::class)->onlyWhenCreating(),
            CollectionField::new('roles')->setTemplatePath('/admin/field/roles.html.twig'),
            ChoiceField::new('civilite')->setChoices(['Homme' => 'homme',
            'Femme' => 'femme',
            'Autres' => 'other']),
            DateTimeField::new('date_enregistrement')->setFormat('d/M/Y à H:m:s')->hideOnForm(),
        ];
    }

    public function persistEntity(EntityManagerInterface $manager, $entityInstance): void
    {
        //! si mon user n'a pas d'id (création de l'utilisateur)
        if(!$entityInstance->getId())
        {
            $entityInstance->setPassword(
                $this->hasher->hashPassword($entityInstance, $entityInstance->getPassword())
            );
        }

        $manager->persist($entityInstance);
        $manager->flush();
    }    


}
