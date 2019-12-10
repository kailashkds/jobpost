<?php

namespace JobPostBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use JobPostBundle\Form\RequirementJobType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RequirementJobType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $req = [];
        $req[0]= 'Select';
        $req['add'] = 'Add New';
        if(count($options['requirements'])){
            foreach($options['requirements'] as $requirements){
                $req[$requirements->getId()] = $requirements->getRequirementName();
            }
        }
        $builder
                ->add('requirement',Type\ChoiceType::class, array(
                    'label' => 'Requirement',
                    'choices' => array_flip($req)
                ))
                ->add('customRequirement',null,['required'=>false])
                ->add('operator',Type\ChoiceType::class, array(
                    'label' => 'Operator',
                    'choices' => array(
                        'OR' => 'OR',
                        'AND' => 'AND',
                        'None' => ''
                    )
                ))
               // ->add('ts')

;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JobPostBundle\Entity\RequirementJob',
            'requirements'=> null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jobpostbundle_requirementjob';
    }


}
