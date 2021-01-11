<?php


namespace App\Controller\Forms;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class LoginFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //On ajoute les champs du formulaire avec un nom et un type pour chaque
        //<input type="text" name="login" />
        $builder->add('login', TextType::class, [
            'constraints' => new NotBlank()
        ]);
        //<input type="password" name="password" />
        $builder->add('password', PasswordType::class, [
            'constraints' => [
                new NotBlank(),
                new Length(
                    null,
                    3,
                    10,
                    null,
                    null,
                    null,
                    "{{ value }} is too short you moron ! Please put more than {{ limit }} characters !",
                    "{{ value }} is too long you moron ! Please put less than {{ limit }} characters !"),
            ]
        ]);
        //<input type="submit" name="submit" />
        $builder->add('submit', SubmitType::class);
    }

}