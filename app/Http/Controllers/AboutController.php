<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        return (
            "
                <div>
                    <h1>NIM: 2241720155</h1>
                    <h2>Nama: Aji Hamdani Ahmad</h2>
                </div>
            "
        );
    }
}
