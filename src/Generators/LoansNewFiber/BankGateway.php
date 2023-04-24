<?php
declare(strict_types=1);
namespace App\DDD\Generators\LoansNewFiber;

class BankGateway
{
    public string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function request(int $amount): string
    {
        $errno = $errstr = null;
        $socket = stream_socket_client(
            "tcp://test-otus.ru:80",
            $errno,
            $errstr,
            30,
            STREAM_CLIENT_ASYNC_CONNECT
        );
        stream_set_blocking($socket, false);

        //Ждем, пока в сокет можно будет начать писать

        do {
            \Fiber::suspend();
            $socketStatus = stream_get_meta_data($socket);
        } while ($socketStatus['blocked'] === true);

        //Отправляем тело запроса

        $request = "GET /generators/3/api.php HTTP/1.0\r\nHost: test-otus.ru\r\nConnection: Close\r\n\r\n";
        fwrite($socket, $request);

        //Ждем когда можно будет начать читать из сокета
        $response = '';
        $isStopped = false;

        while(!feof($socket)) {
            $action = \Fiber::suspend();
            if($action === 'stop') {
                $isStopped = true;
                break;
            }
            $response .= fread($socket, 8192);
            echo '.';
        }

        fclose($socket);

        if($isStopped === true) {
            return "{$this->name}: Остановка по таймауту";
        } else {
            $responseBody = '';
            if(preg_match('/\r\n\r\n(.*)/s', $response, $matches)) {
                $responseBody = $matches[1];
            }
            return "{$this->name}: {$responseBody}";
        }
    }
}