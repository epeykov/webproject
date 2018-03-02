<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;

class ContactForm extends Form
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('_name', 'string')
            ->addField('_email', ['type' => 'string'])
            ->addField('_message', ['type' => 'text']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('_name', 'length', [
                'rule' => ['minLength', 5],
                'message' => 'A name is required'
            ])->add('_email', 'format', [
                'rule' => 'email',
                'message' => 'A valid email address is required',
            ])->add('_message','length', ['rule' => ['minLength', 5],
                'message' => 'Message could not be empty.']);
    }

    protected function _execute(array $data)
    {
		$email = new Email();
		$email->profile('default');

		$email->from([$data['_email']])
		->to('epeykov@gmail.com')
		->subject('Emil Peykov Blog Contact Form')
		->send([$data['_message']]);

        return true;
    }
}
?>