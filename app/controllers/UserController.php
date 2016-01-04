<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$users=User::orderBy('id','DESC')->get();
		return View::make('users.index')->with('users', $users);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user= new User;
		$user->nombre=Input::get('nombre');
		$user->email=Input::get('email');
		$user->edad=Input::get('edad');

		if($user->save()){
			Session::flash('message','Guardado exitosamente :D');
			Session::flash('class','success');
		}else{
			Session::flash('message','Hubo un error :(');
			Session::flash('class','danger');
		}
		return Redirect::to('users/create');
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id= null)
	{
		$user =User::find($id);

		return View::make('users.show')->with('user',$user);//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id=null)
	{
		//
		$user =User::find($id);
		return View::make('users.edit')->with('user',$user);//

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user =User::find($id);

		$user->nombre=Input::get('nombre');
		$user->email=Input::get('email');
		$user->edad=Input::get('edad');

		if($user->save()){
			Session::flash('message','Actualizado exitosamente :D');
			Session::flash('class','success');
		}else{
			Session::flash('message','Hubo un error :(');
			Session::flash('class','danger');
		}
		return Redirect::to('users/edit/'.$id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user =User::find($id);

			if($user->delete()){
				Session::flash('message','Eliminado exitosamente :D');
				Session::flash('class','success');
			}else{
				Session::flash('message','Hubo un error :(');
				Session::flash('class','danger');
			}
			return Redirect::to('users/');

	}


}
