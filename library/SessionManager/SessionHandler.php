<?php

namespace SessionManager;

/**
 * 
 *
 * @author leandro <leandro@leandroleite.info>
 */
interface SessionHandler {
    
    public function open($savePath, $sessionId);

    public function close();

    public function read($sessionId);

    public function write($id, $data);

    public function destroy($sessionId);

    public function gc($maxlifetime);
}
