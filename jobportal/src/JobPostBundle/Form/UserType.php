<?php

namespace JobPostBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use JobPostBundle\Entity\RequirementMaster;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $req = [];
        if(count($options['requirements'])){
            foreach($options['requirements'] as $requirements){
                $req[$requirements->getId()] = $requirements->getRequirementName();
            }
        }
        $builder
            ->add('firstName', TextType::class, [
                'constraints' => new Length(['min' => 3]),
            ])
            ->add('lastName', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 3]),
                ],
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 3]),
                ],
            ])
            ->add('skills',ChoiceType::class,[ 'choices'=>array_flip($req),
                                                'expanded'=> true,
                                                'multiple'=> true,                            
                                            ])
        ;
    }
    
        
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'requirements'=> null
        ));
    }
}