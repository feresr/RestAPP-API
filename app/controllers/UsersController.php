<?php
 class UsersController extends BaseController {

  public function index() {
   $users  = User::all();
   return View::make('users.index')->with('users', $users);
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
            'success'     =>  true
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
    
    $validator = User::validate($input, $user->id);
  
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
    $user->save();
    return Response::json(array(
      'success' => true,
      'types' => 'edit'
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