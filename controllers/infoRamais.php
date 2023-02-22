<?php

class InfoRamal {
    public $informacoesRamal;
    public $informacoesMonitor = array(
        'chamando' => 0,
        'ocupado' => 0,
        'disponivel' => 0,
        'pausa' => 0,
        'indisponivel' => 0
    );

    public function __construct() {
        $filas = file('../lib/filas');
        $ramais = file('../lib/ramais');
        $statusRamal = array();
    
        foreach($filas as $linhas){ //DEFINE STATUS DO RAMAL
            if(strstr($linhas,'SIP/')){ 

                $linha = explode(' ', trim($linhas));
                $nome = end($linha);
                list($tech,$ramal) = explode('/',$linha[0]);

                if(strstr($linhas,'(Ring)')){  
                    $linha = explode(' ', trim($linhas));
                    list($tech,$ramal) = explode('/',$linha[0]);
                    $statusRamal[$ramal] = array('username' => $nome, 'status' => 'chamando');  
                    $this->informacoesMonitor['chamando'] += 1;
                }

                if(strstr($linhas,'(In use)')){
                    $linha = explode(' ', trim($linhas));
                    list($tech,$ramal) = explode('/',$linha[0]);
                    $statusRamal[$ramal] = array('username' => $nome, 'status' => 'ocupado');
                    $this->informacoesMonitor['ocupado'] += 1;
                }

                if(strstr($linhas,'(Not in use)')){  
                    $linha = explode(' ', trim($linhas));       
                    list($tech,$ramal)  = explode('/',$linha[0]);
                    $statusRamal[$ramal] = array('username' => $nome, 'status' => 'disponivel'); 
                    $this->informacoesMonitor['disponivel'] ;
                }

                if(strstr($linhas,'(paused)')){
                    $linha = explode(' ', trim($linhas));
                    list($tech,$ramal)  = explode('/',$linha[0]);
                    $statusRamal[$ramal] = array('username' => $nome, 'status' => 'pausa'); 
                    $this->informacoesMonitor['pausa'] += 1;
                }

                if(strstr($linhas,'(Unavailable)')){ 
                    $linha = explode(' ', trim($linhas));
                    list($tech,$ramal) = explode('/',$linha[0]);
                    $statusRamal[$ramal] = array('username' => $nome, 'status' => 'indisponivel');
                    $this->informacoesMonitor['indisponivel'] += 1;  
                }       
            }
        }

        foreach($ramais as $linhas){
            $linha = array_filter(explode(' ',$linhas));
            $arr = array_values($linha);
            $host = trim($arr[1]);

            if(trim($arr[1]) == '(Unspecified)' AND trim($arr[4]) == 'UNKNOWN'){  
                list($name,$username) = explode('/',$arr[0]);    

                $this->informacoesRamal[$name] = array(
                    'ramal' => $username,
                    'online' => 'offline',
                    'status' => $statusRamal[$name]['status'],
                    'username' => $statusRamal[$name]['username'],
                    'ip' => $host
                );
            }
            
            if(!empty($arr[5]) AND trim($arr[5]) == "OK"){        
                list($name,$username) = explode('/',$arr[0]);
                $this->informacoesRamal[$name] = array(
                    'ramal' => $username,
                    'online' => 'online',
                    'status' => $statusRamal[$name]['status'],
                    'username' => $statusRamal[$name]['username'],
                    'ip' => $host
                );
            }
        }
    }
}

?>