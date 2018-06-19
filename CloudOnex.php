<?php
/**
 * CloudOnex PHP Library
 * https://www.cloudonex.com
 * (c) Razib M <razib@cloudonex.com>
 */
class CloudOnex {

    public $options;
    public $handle; // cURL resource handle.

    // Populated after execution:
    public $body; // Response body.

    public $info; // Response info object.
    public $error; // Response error string.
    public $response_status_lines; // indexed array of raw HTTP response status lines.

    public $decoded_response; // Decoded response body.



    public function __construct($options=[]){
        $default_options = [
            'base_url' => 'https://demo.cloudonex.com/api/v2/',
            'api_key' => '4fy5ays2yuplj8c1g0bja033uueu8q3e4rsm3g4y'
        ];
        $this->options = array_merge($default_options, $options);

    }


    // Request methods:
    public function get($url, $parameters=[]){
        return $this->execute($url, 'GET', $parameters);
    }

    public function post($url, $parameters=[]){
        return $this->execute($url, 'POST', $parameters);
    }

    public function put($url, $parameters=[]){
        return $this->execute($url, 'PUT', $parameters);
    }

    public function patch($url, $parameters=[]){
        return $this->execute($url, 'PATCH', $parameters);
    }

    public function delete($url, $parameters=[]){
        return $this->execute($url, 'DELETE', $parameters);
    }

    public function head($url, $parameters=[]){
        return $this->execute($url, 'HEAD', $parameters);
    }

    public function execute($url, $method='GET', $parameters=[]){
        $client = clone $this;
        $client->url = $url;
        $client->handle = curl_init();
        $curlopt = [
            CURLOPT_HEADER => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_USERAGENT => 'CloudOnex API Library 1.0.1',
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer '.$client->options['api_key']

            ]
        ];






        if(is_array($parameters)){
            $parameters_string = http_build_query($parameters);
        }
        else
            $parameters_string = (string) $parameters;

        if(strtoupper($method) == 'POST'){
            $curlopt[CURLOPT_POST] = TRUE;
            $curlopt[CURLOPT_POSTFIELDS] = $parameters_string;
        }
        elseif(strtoupper($method) != 'GET'){
            $curlopt[CURLOPT_CUSTOMREQUEST] = strtoupper($method);
            $curlopt[CURLOPT_POSTFIELDS] = $parameters_string;
        }
        elseif($parameters_string){
            $client->url .= strpos($client->url, '?')? '&' : '?';
            $client->url .= $parameters_string;
        }

        if($client->options['base_url']){
            if($client->url[0] != '/' && substr($client->options['base_url'], -1) != '/')
                $client->url = '/' . $client->url;
            $client->url = $client->options['base_url'] . $client->url;
        }
        $curlopt[CURLOPT_URL] = $client->url;


        curl_setopt_array($client->handle, $curlopt);

        $client->parse_response(curl_exec($client->handle));
        $client->info = (object) curl_getinfo($client->handle);
        $client->error = curl_error($client->handle);

        curl_close($client->handle);
        return $client;
    }

    public function parse_response($response){
        $headers = [];
        $this->response_status_lines = [];
        $line = strtok($response, "\n");
        do {
            if(strlen(trim($line)) == 0){
                // Since we tokenize on \n, use the remaining \r to detect empty lines.
                if(count($headers) > 0) break; // Must be the newline after headers, move on to response body
            }
            elseif(strpos($line, 'HTTP') === 0){
                // One or more HTTP status lines
                $this->response_status_lines[] = trim($line);
            }
            else {
                // Has to be a header
                list($key, $value) = explode(':', $line, 2);
                $key = trim(strtolower(str_replace('-', '_', $key)));
                $value = trim($value);

                if(empty($headers[$key]))
                    $headers[$key] = $value;
                elseif(is_array($headers[$key]))
                    $headers[$key][] = $value;
                else
                    $headers[$key] = [$headers[$key], $value];
            }
        } while($line = strtok("\n"));

        $this->headers = (object) $headers;
        $this->body = strtok("");
    }



    public function response(){
        return $this->body;
    }
}