<?php
/**
 * Created by PhpStorm.
 * User: DANIEL
 * Date: 03/01/2016
 * Time: 06:24 PM
 */

namespace App\Http\Controllers;

class ProfesorController extends Controller
{
    public function getIndex(){
        return 'profesor index';
    }

    public function create()
    {
        return view ('profesor.create');
    }


}