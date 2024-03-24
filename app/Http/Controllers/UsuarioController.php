<?php

namespace App\Http\Controllers;

use App\Repositories\UsuarioRepository;

class UsuarioController extends Controller
{
    private $repositoryUsuario;

    public function __construct(UsuarioRepository $repositoryUsuario) {
        $this->repositoryUsuario = $repositoryUsuario;
    }
    
    public function index()
    {
        $usuarios = $this->repositoryUsuario->all();

        return view('usuario.index', compact('usuarios'));
    }
}
