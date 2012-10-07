<?php

namespace SessionManager;

/**
 * SessionTestHandler
 *
 * @author leandro <leandro@leandroleite.info>
 */
class SessionTestHandler implements ISessionHandler {

    protected $sessionPath;

    public function __construct() {
        ini_set('session.save_path', '/tmp');
    }

    public function open($savePath, $sessionName = 'PHPSESSID') {

        $sessionName = $sessionName;

        try {
            $this->sessionPath = $savePath . DIRECTORY_SEPARATOR . 'PHPSESSION';

            if (!file_exists($this->sessionPath)) {
                mkdir($this->sessionPath, 0775, true);
            }
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return false;
        }
        return true;
    }

    public function close() {
        return true;
    }

    public function read($id) {
        return (string) @file_get_contents($this->sessionPath . DIRECTORY_SEPARATOR . $id);
    }

    public function write($id, $data) {
        return file_put_contents($this->sessionPath . DIRECTORY_SEPARATOR . $id, $data) === false ?
                false : true;
    }

    public function destroy($id) {
        $file = $this->savePath . DIRECTORY_SEPARATOR . $id;
        if (file_exists($file)) {
            unlink($file);
        }
        return true;
    }

    public function gc($maxlifetime) {
        foreach (glob($this->savePath . DIRECTORY_SEPARATOR . '*') as $file) {
            if (filemtime($file) + $maxlifetime < time() && file_exists($file)) {
                unlink($file);
            }
        }
        return true;
    }

}
