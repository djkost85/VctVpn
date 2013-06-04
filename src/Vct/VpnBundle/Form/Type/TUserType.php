<?php

namespace Vct\VpnBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
// use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TUserType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder,array $options) {
		// TODO: Auto-generated method stub
		$builder->add('vpnServerId','text');
		$builder->add('email','text');
		$builder->add('registerDate','date');
	}

	public function getName() {
		// TODO: Auto-generated method stub
		return 'TUserType';
	}	
	
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
				'data_class'=>'Vct\VpnBundle\Entity\TUser')
// 				'validation_groups' => array('registration'),
				);
	}
	
}