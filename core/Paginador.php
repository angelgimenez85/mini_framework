<?php
namespace core;

class Paginador
{
    //extraer valores de configuración desde archivo
    private $resultadosPorPagina = 6;
    private $desde = 1;
    private $paginaAnterior = 1;
    private $paginaSiguiente = 2;

    public function paginar(
        int $totalRegistros, 
        TemplateEngineManager $tplMgr,
        int $pagina = 1
    ) {
        /*
        * realiza los cálculos de la cantidad de páginas a mostrar.   
        */    
        
        $totalPaginas = ceil($totalRegistros / $this->resultadosPorPagina);

        $this->desde = ($pagina - 1) * $this->resultadosPorPagina;
        $hasta = $this->resultadosPorPagina;
        // se determina la posición de navegación
        if ($pagina < $totalPaginas) {
            $this->paginaSiguiente = $pagina + 1;
        } else {
            $this->paginaSiguiente = $pagina;
        }
        if ($pagina > 1) {
            $this->paginaAnterior = $pagina - 1;
        }

        $tplMgr->assign('paginaAnterior', $this->paginaAnterior);
        $tplMgr->assign('paginaSiguiente', $this->paginaSiguiente);
        $tplMgr->assign('totalPaginas', $totalPaginas);

        return $query;
    }
}
