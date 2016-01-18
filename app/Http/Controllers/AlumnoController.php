<?php
/**
 * Created by PhpStorm.
 * User: DANIEL
 * Date: 03/01/2016
 * Time: 06:24 PM
 */

namespace App\Http\Controllers;


class AlumnoController extends Controller
{

    public function create()
    {
        return view ('alumno.create');
    }
}