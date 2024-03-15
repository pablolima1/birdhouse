<?php

namespace App\Http\Controllers;

use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private $repositoryUsuario;

    public function __construct(UsuarioRepository $repositoryUsuario) {
        $this->repositoryUsuario = $repositoryUsuario;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = $this->repositoryUsuario->all();

        return view('usuario.index', compact('usuarios'));
    }
}
