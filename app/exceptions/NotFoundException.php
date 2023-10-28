<?php
    namespace App\Exceptions;
    use Exception;
    use Throwable;
    class NotFoundException extends Exception{
        public function error404()
        {
            http_response_code('404');
           require VIEW . 'errors' .DIRECTORY_SEPARATOR . '404.php';
        }
    }
?>