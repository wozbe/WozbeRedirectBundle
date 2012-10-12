<?php

namespace Armetiz\RedirectBundle;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener {
    private $aliases;
    
    public function onKernelRequest(GetResponseEvent $event) {
        $request = $event->getRequest();
        
        $aliases = $this->getAliases();
        
        if ($this->getAliases() && array_key_exists($request->getHost(), $aliases)) {
            
            $host = $aliases[$request->getHost()];
            
            $uri = str_replace($request->getHost(), $host, $request->getUri());
            
            $event->setResponse(new RedirectResponse($uri));
        }
    }
    
    public function setAliases (array $value) {
        $this->aliases = $value;
    }
    
    public function getAliases () {
        return $this->aliases;
    }
}
