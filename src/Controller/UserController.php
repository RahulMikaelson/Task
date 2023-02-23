<?php

namespace App\Controller;

use App\Document\User;
use App\Form\UserType;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'user')]
    public function createAction(DocumentManager $dm, Request $request, UserPasswordHasherInterface $uph)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $uph->hashPassword($user,$form->get('password')->getData())
            );
            $user = $form->getData();
            
            $dm->persist($user);
            $dm->flush();
    
            return $this->redirect('/login');
        }
    
        return $this->render('User/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
