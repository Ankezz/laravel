<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AvatarController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('avatars'), $fileName);

            // Дополнительные действия, например, сохранение пути к файлу в базе данных
            User::find(Auth()->user()->id)->update([
                'avatar'=>'avatars/'.$fileName,
            ]);

            return redirect()->back()->with('success','Аватарка успешно загружена!');
        }

        return redirect()->back()->with('success','Ошибка загрузки аватарки.');;
    }
}
