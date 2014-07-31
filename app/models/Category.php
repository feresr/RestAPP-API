<?php

class Category extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'categories';

    public static $messages = array(
     'name.required' => 'El nombre es obligatorio.',
     'name.min' => 'El nombre debe contener al menos dos caracteres.',
     'description.required' => 'La descripcion es obligatoria.',
     'descripcion.min' => 'La descripcion debe contener al menos 10 caracteres.',
    );

    public function getName() {
        return $this->name;
    }

    public function items() {
        return $this->hasMany('Item');
    }

    //VALIDACIONES
    public static $rules = array(
        'name' => 'required|min:2'
   );

    public static function validate($data, $id=null) {
        $rules = self::$rules;
        $messages = self::$messages;
        return Validator::make($data, $rules, $messages);
    }
}
