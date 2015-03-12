<?php
 class UsersController extends BaseController {

  public function index() {
   return View::make('users.index');
   }

   public function mostrarUsuarios(){
        $users  = User::all();

      if(count($users) >= 1){
        return View::make('users.table', array('users' => $users));
      }
       return "No existen usuarios"; 
      }

   public function show($id) { 
   $user = User::find($id);
   return View::make('users.show')->with('user', $user);
   }

   public function create() { 
   $user = new User();
   return View::make('users.save')->with('user', $user);
   }

   public function store() { 
   
   $input = Input::get();
   $validator = User::validate($input);
   if($validator->fails()){
   return Response::json(array(
          'success' => false,
          'errors' => $validator->getMessageBag()->toArray()
      ));
   }else{
   $user = new User();
   $user->firstname = $input['firstname'];
   $user->lastname = $input['lastname'];
   $user->username = $input['username'];
   $user->password = Hash::make($input['password']);
      $user->save();
          return Response::json(array(
            'success'     =>  true,
            'message'   =>  "El usuario se creó correctamente"
        ));
   }
   }

   public function edit($id) { 
   $user = User::find($id);
   return View::make('users.save')->with('user', $user);
   }

  public function update($id)
  {
    $user = User::find($id);
    $input = Input::get();
    
    $validator = User::validate(array(
       'firstname'=> $input['firstname'],
       'lastname' => $input['lastname'],
       'username' => $input['username'],
       'password' => $user->password,
       ), $user->id);
  
    if($validator->fails()){
      return Response::json(array(
      'success' => false,
      'errors' => $validator->getMessageBag()->toArray()
    ));
    }
else{
    $user->firstname = $input['firstname'];
    $user->lastname = $input['lastname'];
    $user->username = $input['username'];
    //$user->password = Hash::make($input['password']);
    $user->save();
    return Response::json(array(
      'success' => true,
      'message'   =>  "El usuario se modificó correctamente"
    ));
  }
  }

   public function destroy($id) { 
   	$user = User::find($id);
    $user->delete();
    return Response::json(array(
        'success' => true,
        'message' => 'El usuario fue eliminado con éxito'
        ));
   }
 }
?>