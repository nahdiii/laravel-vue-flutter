<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use Validator;
class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     // 'name'    => 'required|string|max:100',
        //     // 'nameBelakang'    => 'required|string|max:100',
        //     'level_id'    => 'required|integer|max:10',
        //     'email'    => 'required|string|email|max:35|unique:users',
        //     'password'    => 'required|string|max:191',
        // ]);

               $validator = Validator::make($request->all(), [
                'name' => 'required',
                'nameBelakang' => 'required',
                'level' => 'required',
				'email' => 'required|email',
				'password' => 'required',
				// 'c_password' => 'required|same:password',
			]);
  

			$input = $request->all();
			$input['password'] = bcrypt($input['password']);
			$user = User::create($input);
			$success['token'] =  $user->createToken('nApp')->accessToken;
			$success['name'] =  $user->name;

            return response()->json(['success' => $success], $this->successStatus);
            // return response()->json(['success' => $success], $this->successStatus);
             

        // return User::create([
        //     'name' => $request->name,
        //     'nameBelakang'    => $request->nameBelakang,
        //     'level'    => $request['level'],
        //     'email'    => $request['email'],
        //     'password'    => bcrypt($request['password']),
        //     'remember_token'    =>str_random(60)
        // ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

     public function profile()
    {
        //return User::all();
        return auth('api')->user();
        //return ["pesan" => "dapat"];
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $pengguna =User::findOrFail( $id);

       
         $this->validate($request,[
            // 'name'    => 'required|string|max:100',
            // 'nameBelakang'    => 'required|string|max:100',
            'level_id'    => 'required|integer|max:10',
            'email'    => 'required|string|email|max:35|unique:users,email,'.$pengguna->id,
            'password'    => 'sometimes|max:191',
        ]);

        if(!empty($request->password)){
            $request->merge(['password' => bcrypt($request['password'])]);
        }
        // $dtPengguna=[
        //     'name'    => $request['name'],
        //     'nameBelakang'    => $request['nameBelakang'],
        //     'level_id'    => $request['level_id'],
        //     'email'    => $request['email'],
        //     'password'    => $pass,
        //     'remember_token'    =>str_random(60)
        // ];
        // User::where('id',$request->id)->update($dtPengguna);
        $pengguna->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengguna = User::findOrFail($id);
        $pengguna->delete();
    }
}
