<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Logging;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function Logging($user, $status, $data = null)
    {
        switch ($status) {
            case '1':
                $messages = 'Melakukan Login';
                break;
            case '2':
                $messages = 'Melakukan Sign pada document #'.$data;
                break;
            case '3':
                $messages = 'Melakukan export pdf #'.$data;
                break;
            case '4':
                $messages = 'Membuat redmine #'.$data;
                break;
            default:
                $messages = 'Vacation';
                break;
        }
        $hit = Logging::create([
            'id_user' => $user->id,
            'messages' => $messages
        ]);

        if($hit) {
            return true;
        } else {
            return false;
        }
    }
}
