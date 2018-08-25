<?php
namespace core;

class HelperView
{
    private $reg;
    private $templateManager; //instancia del motor de plantillas
    private $raw; // datos a incluir en la plantilla
    private $template; //archivo de plantilla de vista

    public function __construct(array $raw = null)
    {
        $this->raw = $raw;
        $this->init();
    }

    private function init()
    {
        $this->reg = Registry::instance();
        $this->setTemplateManager();
        $this->confAssets();
    }

    private function setTemplateManager()
    {
        $this->templateManager = TemplateEngineManager::getTemplateEngine();
    }

    private function confAssets()
    {
        // Se cargan en la plantilla los assets generales
        $styles = $this->reg->getAssets('styles');
        $scripts = $this->reg->getAssets('scripts');
        $this->templateManager->assign('styles', $styles);
        $this->templateManager->assign('scripts', $scripts);
    }

    // Añadir scripts propios de una plantilla en particular
    public function setScriptsExtras(array $scripts)
    {
        if (!empty($scripts)) {
            $this->templateManager->assign('scripts_extra', $scripts);
        }
    }

    // Añadir hojas de estilo propias de una plantilla en particular
    public function setStylesExtras(array $styles)
    {
        if (!empty($styles)) {
            $this->templateManager->assign('styles_extra', $styles);
        }
    }

    // Asignamos la plantilla
    public function setTemplate(string $template)
    {
        $this->template = $template;
    }

    // Envía la vista al cliente
    public function view()
    {
        if (! empty($this->raw)) {
            foreach ($this->raw as $key => $value) {
                $this->templateManager->assign($key, $value);
            }
        }
        $this->templateManager->display($this->template);
    }

    // Establece los elementos básicos de paginación en la plantilla
    public function paginar(
        int $pagina, 
        int $totalPaginas, 
        string $search = ''
    ) {
        $paginaAnterior = 1; //calcula
        $paginaSiguiente = 2; //calcula

        if ($pagina < $totalPaginas) {
            $paginaSiguiente = $pagina + 1;
        } else {
            $paginaSiguiente = $pagina;
        }
        if ($pagina > 1) {
            $paginaAnterior = $pagina - 1;
        }

        $this->templateManager->assign('paginaAnterior', $paginaAnterior);
        $this->templateManager->assign('paginaSiguiente', $paginaSiguiente);
        $this->templateManager->assign('totalPaginas', $totalPaginas);
        $this->templateManager->assign('search', $search);
    }
}
