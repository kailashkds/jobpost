<?php

namespace JobPostBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use JobPostBundle\Form\RequirementJobType;

class JobDetailsType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cname',null,['label'=>'Company Name'])
                ->add('cdescription',null,['label'=>'Job Description'])
                ->add('status',Type\ChoiceType::class, array(
                    'label' => 'Status',
                    'choices' => array(
                        'Inactive' => 0,
                        'Active' => 1
                    )
                ))
               // ->add('requirementJob',
                 //      RequirementJobType::class
                   //  )
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JobPostBundle\Entity\JobDetails'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jobpostbundle_jobdetails';
    }


}
