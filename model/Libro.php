<?php
namespace model;

class Libro extends DomainObject
{
    private $titulo;
    private $autores;
    private $contenido;
    private $imagen;
    private $editorial;

    public function __construct(
        string $titulo = "",       
        string $contenido = "",
        string $imagen = "",
        array $autores = [],
        Editorial $editorial = null       
        
    ) {
        $this->titulo = $titulo;
        $this->autores = $autores;
        $this->contenido = $contenido;
        $this->imagen = $imagen;
        $this->autores = $autores;
        $this->editorial = $editorial;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function addAutor(Autor $autor)
    {
        if (!in_array($autor, $this->autores)) {
            $this->autores[] = $autor;
        }
    }

    public function removeAutores()
    {
        $this->autores = [];
    }

    public function getAutores()
    {
        return $this->autores;
    }

    public function getContenido(): string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido)
    {
        $this->contenido = $contenido;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen)
    {
        $this->imagen = $imagen;
    }    

    public function getEditorial(): Editorial
    {
        return $this->editorial;
    }

    public function setEditorial(Editorial $editorial)
    {
        $this->editorial = $editorial;
    }

    public function __toString()
    {
        return $this->titulo;
    }
   
}
