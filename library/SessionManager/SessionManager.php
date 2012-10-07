<?php

namespace SessionManager;

/**
 * SessionManager
 *
 * @author leandro <leandro@leandroleite.info>
 */
class SessionManager implements ISessionHandler {

    protected $sessionHandler;

    public function __construct(ISessionHandler $sessionHandler) {

        $this->sessionHandler = $sessionHandler;

        session_set_save_handler(
                array($this, "open")
                , array($this, "close")
                , array($this, "read")
                , array($this, "write")
                , array($this, "destroy")
                , array($this, "gc")
        );
    }

    public function open($savePath, $sessionId) {
        return $this->sessionHandler->open($savePath, $sessionId);
    }

    public function close() {
        return $this->sessionHandler->close();
    }

    public function read($sessionId) {
        return $this->sessionHandler->read($sessionId);
    }

    public function write($sessioId, $sessionData) {
        return $this->sessionHandler->write($sessioId, $sessionData);
    }

    public function destroy($sessionId) {
        return $this->sessionHandler->destroy($sessionId);
    }

    public function gc($maxlifetime) {
        return $this->sessionHandler->gc($maxlifetime);
    }

}
